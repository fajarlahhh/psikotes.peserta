<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\JawabanMateriSatu;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $benar = 0, $salah = 0, $belum = 0;

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materisatu/' . $this->key . '/soal');
    }
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
    return view('livewire.materisatu.hasil');
  }
}
