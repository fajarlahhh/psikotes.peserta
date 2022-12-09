<?php

namespace App\Http\Livewire\Materidua;

use App\Models\Petunjuk;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mulai()
  {
    return redirect('/materidua/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materidua.intro', [
      'data' => Petunjuk::where('materi', 2)->first(),
    ]);
  }
}
