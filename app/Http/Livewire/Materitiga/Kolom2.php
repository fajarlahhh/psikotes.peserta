<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kolom2 extends Component
{
  public $dataSoal, $dataRuangKerja, $soal, $key, $dataRuangKerjaPesertaJawaban, $waktu, $now, $end, $tampil;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $data = new RuangKerjaPesertaWaktu();
    $data->ruang_kerja_peserta_id = auth()->id();
    $data->materi = 32;
    $data->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $data->save();

    if ($selesai == true) {
      return redirect('/materitiga/' . $this->key . '/3');
    }
  }

  public function mount($key)
  {
    $this->key = $key;

    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', 32)->count() > 0) {
      return redirect('/materitiga/' . $this->key . '/3');
    }

    $this->dataRuangKerja = RuangKerja::findOrFail($this->key);
    $this->waktu = RuangKerjaPesertaWaktu::where('materi', 32)->count() == 0 ? $this->dataRuangKerja->waktu_materi_tiga : RuangKerjaPesertaWaktu::where('materi', 32)->orderBy('waktu')->first()->waktu;

    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', 2))->whereNotNull('ruang_kerja_materi_tiga_id')->get();
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
      if ($this->soal < $this->dataRuangKerjaPesertaJawaban->sortByDesc('id')->first()->id) {
        $this->soal++;
      } else {
        return redirect('/materitiga/' . $this->key . '/3');
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->tampil = RuangKerjaPesertaJawaban::findOrFail($this->soal);
    return view('livewire.materitiga.kolom2');
  }
}
