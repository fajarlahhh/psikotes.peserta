<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $benar = 0, $aspek = [];

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materitiga/' . $this->key . '/soal');
    }
    $dataJawabanMateriTiga = RuangKerjaPesertaJawaban::with('ruangKerjaMateriTiga')->whereNotNull('ruang_kerja_materi_tiga_id')->leftJoin('ruang_kerja_materi_tiga', 'ruang_kerja_materi_tiga.id', '=', 'ruang_kerja_materi_tiga_id')->get();
    $this->benar = $dataJawabanMateriTiga->where('nilai', 1)->count();
    foreach ($dataJawabanMateriTiga->groupBy('aspek') as $key => $row) {
      $this->aspek[] = [
        'aspek' => $key,
        'jumlah' => $row->where('nilai', 1)->count(),
      ];
    }
  }

  public function render()
  {
    return view('livewire.materitiga.hasil');
  }
}
