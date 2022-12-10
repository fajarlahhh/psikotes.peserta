<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Soal extends Component
{
  public $kolom, $dataSoal, $dataRuangKerja, $soal, $key, $dataRuangKerjaPesertaJawaban, $waktu, $now, $end, $tampil;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $data = new RuangKerjaPesertaWaktu();
    $data->ruang_kerja_peserta_id = auth()->id();
    $data->materi = '3' . $this->kolom;
    $data->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $data->save();

    if ($selesai == true) {
      return redirect('/materitiga/' . $this->key . '/jeda/' . ($this->kolom + 1));
    }
  }

  public function mount($key, $kolom)
  {
    $this->key = $key;
    $this->kolom = $kolom;

    if ($kolom > 10) {
      return redirect('/dashboard');
    }

    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', '3' . $this->kolom)->count() > 0) {
      return redirect('/materitiga/' . $this->key . '/jeda/' . ($this->kolom + 1));
    }

    $this->dataRuangKerja = RuangKerja::findOrFail($this->key);
    $this->waktu = RuangKerjaPesertaWaktu::where('materi', '3' . $this->kolom)->count() == 0 ? $this->dataRuangKerja->waktu_materi_tiga : RuangKerjaPesertaWaktu::where('materi', '3' . $this->kolom)->orderBy('waktu')->first()->waktu;

    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', $this->kolom))->whereNotNull('ruang_kerja_materi_tiga_id')->get();
    if ($this->dataRuangKerjaPesertaJawaban->whereNull('jawaban')->count() == 0) {
      return redirect('/materitiga/' . $this->key . '/jeda/' . ($this->kolom + 1));
    }
    $this->soal = $this->dataRuangKerjaPesertaJawaban->whereNull('jawaban')->first()->id;
    $this->now = now();
    $this->end = Carbon::now()->addSeconds($this->waktu);
  }

  protected $listeners = [
    'waktu' => 'waktu',
    'submit' => 'submit',
  ];

  public function submit($jawaban)
  {
    if ($this->waktu > 0) {
      DB::transaction(function () use ($jawaban) {
        RuangKerjaPesertaJawaban::find($this->soal)->update([
          'ruang_kerja_peserta_id' => auth()->id(),
          'jawaban' => $jawaban,
          'nilai' => ($jawaban == trim($this->tampil->ruangKerjaMateriTiga->kunci) ? 1 : 0),
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataRuangKerjaPesertaJawaban->whereNull('jawaban')->sortByDesc('id')->first()->id) {
        $this->soal++;
      } else {
        $this->waktu(true);
        return redirect('/materitiga/' . $this->key . '/jeda/' . ($this->kolom + 1));
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', $this->kolom))->whereNotNull('ruang_kerja_materi_tiga_id')->get();
    $this->tampil = RuangKerjaPesertaJawaban::findOrFail($this->soal);
    return view('livewire.materitiga.soal');
  }
}
