<?php

namespace App\Http\Livewire\Materidua;

use App\Models\RuangKerja;
use App\Models\RuangKerjaMateriDua;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Soal extends Component
{
  public $dataSoal, $dataRuangKerja, $soal, $key, $dataRuangKerjaPesertaJawaban, $waktu, $now, $end, $tampil;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $data = new RuangKerjaPesertaWaktu();
    $data->ruang_kerja_peserta_id = auth()->id();
    $data->materi = 2;
    $data->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $data->save();

    if ($selesai == true) {
      return redirect('/materidua/' . $this->key . '/hasil');
    }
  }

  public function mount($key)
  {
    $this->key = $key;

    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', 2)->count() > 0) {
      return redirect('/materidua/' . $this->key . '/hasil');
    }

    $this->dataRuangKerja = RuangKerja::findOrFail($this->key);
    $this->waktu = RuangKerjaPesertaWaktu::where('materi', 2)->count() == 0 ? $this->dataRuangKerja->waktu_materi_dua : RuangKerjaPesertaWaktu::where('materi', 2)->orderBy('waktu')->first()->waktu;

    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_dua_id')->get();
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
    $nilai = 0;
    if ($this->tampil->ruangKerjaMateriDua->kunci == "+") {
      switch ($jawaban) {
        case 'SS':
          $nilai = 4;
          break;
        case 'S':
          $nilai = 3;
          break;
        case 'TS':
          $nilai = 2;
          break;
        case 'STS':
          $nilai = 1;
          break;

      }
    } else {
      switch ($jawaban) {
        case 'SS':
          $nilai = 1;
          break;
        case 'S':
          $nilai = 2;
          break;
        case 'TS':
          $nilai = 3;
          break;
        case 'STS':
          $nilai = 4;
          break;
      }
    }

    if ($this->waktu > 0) {
      DB::transaction(function () use ($jawaban, $nilai) {
        RuangKerjaPesertaJawaban::find($this->soal)->update([
          'ruang_kerja_peserta_id' => auth()->id(),
          'jawaban' => $jawaban,
          'nilai' => $nilai,
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataRuangKerjaPesertaJawaban->sortByDesc('id')->first()->id) {
        $this->soal++;
      } else {
        return redirect('/materidua/' . $this->key . '/hasil');
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_dua_id')->get();
    $this->tampil = RuangKerjaPesertaJawaban::findOrFail($this->soal);
    return view('livewire.materidua.soal');
  }
}
