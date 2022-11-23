<?php

namespace App\Http\Livewire\Backend;

use App\Models\Petunjuk as ModelsPetunjuk;
use Livewire\Component;

class Petunjuk extends Component
{
  public $data, $isi, $materi;

  public $queryString = ['materi'];

  public function mount()
  {
    $this->materi = $this->materi ?: 1;
    $this->setMateri();
  }

  public function updatedMateri()
  {
    return redirect('/admin/petunjuk?materi=' . $this->materi);
  }

  public function setMateri()
  {
    $data = ModelsPetunjuk::where('materi', $this->materi)->get();

    if ($data->count() > 0) {
      $this->data = $data->first();
    } else {
      $this->data = new ModelsPetunjuk();
    }
  }

  protected $listeners = [
    'set:setisi' => 'setIsi',
  ];

  public function setIsi($isi)
  {
    $this->isi = $isi;
    $this->validate([
      'isi' => 'required',
      'materi' => 'required',
    ]);

    $this->data->materi = $this->materi;
    $this->data->isi = $this->isi;
    $this->data->save();
  }

  public function render()
  {
    return view('livewire.backend.petunjuk');
  }
}
