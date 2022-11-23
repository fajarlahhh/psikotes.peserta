<?php

namespace App\Http\Livewire\Frontend\Ujian\Materidua;

use App\Models\JawabanMateriDua;
use App\Models\Petunjuk;
use App\Models\Ujian;
use App\Models\UjianSoal;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount($key)
  {
    $this->key = $key;
  }

  public function mulai()
  {
    if (JawabanMateriDua::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->count() == 0) {
      $dataSoal = UjianSoal::where('ujian_id', $this->key)->get()->shuffle()->map(function ($q) {
        return [
          'pengguna_id' => auth()->id(),
          'materi_dua_id' => $q->materi_dua_id,
          'ujian_id' => $this->key,
          'created_at' => now(),
          'updated_at' => now(),
        ];
      })->toArray();
      JawabanMateriDua::insert($dataSoal);
    }
    return redirect('/materidua/' . $this->key . '/soal');
  }

  public function render()
  {
    Ujian::findOrFail($this->key);
    return view('livewire.frontend.ujian.materidua.intro', [
      'data' => Petunjuk::where('materi', 2)->first(),
    ]);
  }
}
