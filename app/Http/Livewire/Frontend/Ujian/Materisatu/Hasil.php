<?php

namespace App\Http\Livewire\Frontend\Ujian\Materisatu;

use App\Models\JawabanMateriSatu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $benar = 0, $salah = 0, $belum = 0;

  public function mount()
  {
    $dataJawabanMateriSatu = JawabanMateriSatu::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->leftJoin('materi_satu', 'materi_satu.id', '=', 'jawaban_materi_satu.materi_satu_id')->get();
    $this->belum = $dataJawabanMateriSatu->whereNull('jawaban')->count();
    $this->benar = $dataJawabanMateriSatu->where(function ($q) {
      if ($q->jawaban == $q->kunci) {
        return true;
      }
      return false;
    })->count();
    $this->salah = $dataJawabanMateriSatu->count() - $this->benar - $this->belum;
  }

  public function render()
  {
    return view('livewire.frontend.ujian.materisatu.hasil');
  }
}
