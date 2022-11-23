<?php

namespace App\Http\Livewire\Backend\Soal;

use App\Imports\MateriDuaDetail as ImportsMateriDuaDetail;
use App\Models\MateriDua as ModelsMateriDua;
use App\Models\MateriDuaDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Materidua extends Component
{
  use WithFileUploads;
  public $key, $jenis = 1, $fileSoal;

  public function submit()
  {
    $this->validate([
      'jenis' => 'required',
      'fileSoal' => 'required|mimes:xls,xlsx',
    ]);

    DB::transaction(function () {
      $extension = $this->fileSoal->getClientOriginalExtension();
      Storage::putFileAs('public', $this->fileSoal, 'materidua.' . $extension);
      Excel::import(new ImportsMateriDuaDetail($this->jenis), '/public/materidua.' . $extension);
      Storage::delete('public/materidua.' . $extension);
    });
  }

  public function setKey($key = null)
  {
    $this->key = $key;
  }

  public function hapus()
  {
    ModelsMateriDua::findOrFail($this->key)->delete();
    $this->key = null;
  }

  public function batal()
  {
    $this->key = null;
  }

  public function render()
  {
    if (!ModelsMateriDua::find($this->jenis)) {
      $data = new ModelsMateriDua();
      $data->id = $this->jenis;
      $data->save();
    }
    return view('livewire.backend.soal.materidua', [
      'data' => MateriDuaDetail::where('materi_dua_id', $this->jenis)->get(),
    ]);
  }
}
