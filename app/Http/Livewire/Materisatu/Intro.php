<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\Petunjuk;
use App\Models\RuangKerjaMateriSatu;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount($key)
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() > 0) {
      return redirect('/materisatu/' . $this->key . '/hasil');
    }
    $this->key = $key;
  }

  public function mulai()
  {
    if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_satu_id')->count() == 0) {
      $dataSoal = RuangKerjaMateriSatu::where('ruang_kerja_id', $this->key)->get()->shuffle()->map(function ($q) {
        return [
          'ruang_kerja_peserta_id' => auth()->id(),
          'ruang_kerja_materi_satu_id' => $q->id,
          'created_at' => now(),
          'updated_at' => now(),
        ];
      })->toArray();
      RuangKerjaPesertaJawaban::insert($dataSoal);
    }
    return redirect('/materisatu/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materisatu.intro', [
      'data' => Petunjuk::where('materi', 1)->first(),
    ]);
  }
}
