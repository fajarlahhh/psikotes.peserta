<?php

namespace App\Http\Livewire\Backend\Ruangkerja;

use App\Models\RuangKerja;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    return view('livewire.backend.ruangkerja.index', [
      'no' => ($this->page - 1) * 10,
      'data' => RuangKerja::orderBy('id', 'desc')->with('peserta')->with('materiSatu.detail')->with('materiDua.detail')->with('materiTiga.detail')->paginate(10),
    ]);
  }
}
