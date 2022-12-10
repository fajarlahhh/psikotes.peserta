<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\Petunjuk;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount($key)
  {
    $this->key = $key;
    if (RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '31')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '32')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '33')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '34')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '35')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '36')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '37')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '38')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '39')
      ->count() > 0 &&
      RuangKerjaPesertaWaktu::where('waktu', 0)
      ->where('materi', '310')
      ->count() > 0) {
      return redirect('/dashboard');
    }
  }

  public function mulai()
  {
    return redirect('/materitiga/' . $this->key . '/kolom/1');
  }

  public function render()
  {
    return view('livewire.materitiga.intro', [
      'data' => Petunjuk::where('materi', 3)->first(),
    ]);
  }
}
