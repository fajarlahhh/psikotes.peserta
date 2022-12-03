<?php

namespace App\Http\Livewire;

use App\Models\RuangKerja;
use Livewire\Component;

class Home extends Component
{
  public $data;

  public function mulai()
  {
    if ($this->data->materi_satu_id) {
      return redirect('/materisatu/' . $this->data->getKey());
    }
  }

  public function mount()
  {
    $this->data = RuangKerja::with('ruangKerjaMateriSatu')->with('ruangKerjaMateriDua')->with('ruangKerjaMateriTiga')->first();
  }

  public function render()
  {
    return view('livewire.home');
  }
}
