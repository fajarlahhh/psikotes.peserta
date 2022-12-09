<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\Petunjuk;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mulai()
  {
    return redirect('/materisatu/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materisatu.intro', [
      'data' => Petunjuk::where('materi', 1)->first(),
    ]);
  }
}
