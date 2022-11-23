<?php

namespace App\Http\Livewire\Backend\Soal;

use App\Imports\MateriTigaSubDetail as ImportsMateriTigaSubDetail;
use App\Models\MateriTiga as ModelsMateriTiga;
use App\Models\MateriTigaDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Materitiga extends Component
{
  use WithFileUploads;

  public $key, $jenis = 1;

  public $soalKolom = [], $file = [];

  public function setKey($key = null)
  {
    $this->key = $key;
  }

  public function hapus()
  {
    MateriTigaDetail::findOrFail($this->key)->delete();
    $this->key = null;
  }

  public function batal()
  {
    $this->key = null;
  }

  public function simpan($kolom)
  {
    $this->validate([
      'soalKolom.' . $kolom . '.a' => 'required',
      'soalKolom.' . $kolom . '.b' => 'required',
      'soalKolom.' . $kolom . '.c' => 'required',
      'soalKolom.' . $kolom . '.d' => 'required',
      'soalKolom.' . $kolom . '.e' => 'required',
      'file.' . $kolom => 'required|mimes:xls,xlsx',
    ]);

    DB::transaction(function () use ($kolom) {
      MateriTigaDetail::where('materi_tiga_id', $this->jenis)->where('kolom', $kolom)->delete();

      $data = new MateriTigaDetail();
      $data->materi_tiga_id = $this->jenis;
      $data->kolom = $kolom;
      $data->a = $this->soalKolom[$kolom]['a'];
      $data->b = $this->soalKolom[$kolom]['b'];
      $data->c = $this->soalKolom[$kolom]['c'];
      $data->d = $this->soalKolom[$kolom]['d'];
      $data->e = $this->soalKolom[$kolom]['e'];
      $data->save();

      $extension = $this->file[$kolom]->getClientOriginalExtension();
      Storage::putFileAs('public', $this->file[$kolom], 'kolom' . $kolom . '.' . $extension);
      Excel::import(new ImportsMateriTigaSubDetail($data->id), '/public/' . 'kolom' . $kolom . '.' . $extension);
      Storage::delete('public/kolom' . $kolom . '.' . $extension);
    });
  }

  public function render()
  {
    if (!ModelsMateriTiga::find($this->jenis)) {
      $data = new ModelsMateriTiga();
      $data->id = $this->jenis;
      $data->save();
    }
    return view('livewire.backend.soal.materitiga', [
      'data' => MateriTigaDetail::where('materi_tiga_id', $this->jenis)->with('detail')->get(),
    ]);
  }
}
