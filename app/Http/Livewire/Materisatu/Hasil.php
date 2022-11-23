<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $benar = 0, $aspek = [];

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materisatu/' . $this->key . '/soal');
    }
    $dataJawabanMateriSatu = RuangKerjaPesertaJawaban::with('ruangKerjaMateriSatu')->whereNotNull('ruang_kerja_materi_satu_id')->leftJoin('ruang_kerja_materi_satu', 'ruang_kerja_materi_satu.id', '=', 'ruang_kerja_materi_satu_id')->get();
    $this->benar = $dataJawabanMateriSatu->where('nilai', 1)->count();
    foreach ($dataJawabanMateriSatu->groupBy('aspek') as $key => $row) {
      $this->aspek[] = [
        'aspek' => $key,
        'jumlah' => $row->where('nilai', 1)->count(),
      ];
    }
  }

  public function render()
  {
    return view('livewire.materisatu.hasil');
  }
}
