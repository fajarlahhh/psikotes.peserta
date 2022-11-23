<?php

namespace App\Http\Livewire\Frontend\Ujian;

use App\Models\Ujian;
use Livewire\Component;

class Index extends Component
{
  public $key, $data;

  protected $queryString = ['key'];

  public function mount()
  {
    $this->data = Ujian::findOrFail($this->key);
  }

  public function render()
  {
    return view('livewire.frontend.ujian.index');
  }
}
