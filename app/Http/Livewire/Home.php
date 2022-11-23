<?php

namespace App\Http\Livewire;

use App\Models\RuangKerja;
use Livewire\Component;

class Home extends Component
{
  public $data;

  public function mount()
  {
    $this->data = RuangKerja::with('materiSatu')->with('materiDua')->with('materiTiga')->first();
  }

  public function render()
  {
    return view('livewire.home');
  }
}
