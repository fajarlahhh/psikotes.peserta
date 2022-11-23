<?php

namespace App\Http\Livewire\Materidua;

use App\Models\JawabanMateriDua;
use App\Models\UjianSoal;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $nilai = 0, $terjawab;

  public function mount()
  {
    $dataMateriDua = UjianSoal::where('ujian_id', $this->key)->leftJoin('materi_dua', 'materi_dua.id', '=', 'ujian_soal.materi_dua_id')->get();
    $dataJawabanMateriDua = JawabanMateriDua::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->get();
    $this->terjawab = $dataJawabanMateriDua->whereNotNull('jawaban')->count();
    foreach ($dataJawabanMateriDua as $key => $row) {
      switch ($row->jawaban) {
        case 'a':
          $this->nilai += $dataMateriDua->where('materi_dua_id', $row->materi_dua_id)->first()->a;
          break;
        case 'b':
          $this->nilai += $dataMateriDua->where('materi_dua_id', $row->materi_dua_id)->first()->b;
          break;
        case 'c':
          $this->nilai += $dataMateriDua->where('materi_dua_id', $row->materi_dua_id)->first()->c;
          break;
        case 'd':
          $this->nilai += $dataMateriDua->where('materi_dua_id', $row->materi_dua_id)->first()->d;
          break;
      }
    }
  }

  public function render()
  {
    return view('livewire.frontend.ujian.materidua.hasil');
  }
}
