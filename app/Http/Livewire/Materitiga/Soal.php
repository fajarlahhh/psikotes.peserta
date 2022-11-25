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
  public $kolom = 1, $dataSoal, $dataRuangKerja, $soal, $key, $dataRuangKerjaPesertaJawaban, $dataRuangKerjaPesertaJawabanAll, $waktu, $now, $end, $tampil;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $data = new RuangKerjaPesertaWaktu();
    $data->ruang_kerja_peserta_id = auth()->id();
    $data->materi = '3' . $this->kolom;
    $data->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $data->save();

    if ($selesai == true) {
      return redirect('/materitiga/' . $this->key . '/hasil');
    }
  }

  public function mount($key)
  {
    $this->key = $key;
    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereNull('jawaban')->get();

    if ($this->dataRuangKerjaPesertaJawaban->first()->kolom != $this->kolom) {
      $this->kolom = $this->tampil->ruangKerjaMateriTiga->kolom;
    }
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', '3')->count() > 0) {
      return redirect('/materitiga/' . $this->key . '/hasil');
    }

    $this->dataRuangKerja = RuangKerja::findOrFail($this->key);
    $this->waktu = RuangKerjaPesertaWaktu::where('materi', '3')->count() == 0 ? $this->dataRuangKerja->waktu_materi_tiga : RuangKerjaPesertaWaktu::where('materi', 1)->orderBy('waktu')->first()->waktu;

    $this->soal = $this->dataRuangKerjaPesertaJawaban->first()->id;
    $this->now = now();
    $this->end = Carbon::now()->addSeconds($this->waktu);
  }

  protected $listeners = [
    'waktu' => 'waktu',
    'submit' => 'submit',
  ];

  public function submit($int)
  {
    switch ($int) {
      case 0:
        $jawaban = 'a';
        break;
      case 1:
        $jawaban = 'b';
        break;
      case 2:
        $jawaban = 'c';
        break;
      case 3:
        $jawaban = 'd';
        break;
      case 4:
        $jawaban = 'e';
        break;
    }
    if ($this->waktu > 0) {
      DB::transaction(function () use ($jawaban) {
        RuangKerjaPesertaJawaban::find($this->soal)->update([
          'ruang_kerja_peserta_id' => auth()->id(),
          'jawaban' => $jawaban,
          'nilai' => ($jawaban == $this->tampil->ruangKerjaMateriTiga->kunci ? 1 : 0),
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataRuangKerjaPesertaJawabanAll->sortByDesc('id')->first()->id) {
        $this->soal++;
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->dataRuangKerjaPesertaJawabanAll = RuangKerjaPesertaJawaban::all();
    $this->tampil = RuangKerjaPesertaJawaban::findOrFail($this->soal);
    if ($this->tampil->ruangKerjaMateriTiga->kolom != $this->kolom) {
      $this->kolom = $this->tampil->ruangKerjaMateriTiga->kolom;
    }
    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', $this->kolom))->get();
    return view('livewire.materitiga.soal');
  }
}
