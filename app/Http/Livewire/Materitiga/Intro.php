<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\Petunjuk;
use Livewire\Component;

class Intro extends Component
{
  public $key;

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
