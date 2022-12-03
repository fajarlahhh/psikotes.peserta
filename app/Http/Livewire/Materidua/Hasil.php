<?php

namespace App\Http\Livewire\Materidua;

use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $aspek = [], $dataJawabanMateriDua;

  public function selanjutnya($id)
  {
    $ruangKerja = RuangKerja::findOrFail($id);
    if ($ruangKerja->materi_tiga_id) {
      return redirect('/materitiga/' . $ruangKerja->getKey());
    }
  }

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materidua/' . $this->key . '/soal');
    }
    $this->dataJawabanMateriDua = RuangKerjaPesertaJawaban::with('ruangKerjaMateriDua')->whereNotNull('ruang_kerja_materi_dua_id')->leftJoin('ruang_kerja_materi_dua', 'ruang_kerja_materi_dua.id', '=', 'ruang_kerja_materi_dua_id')->get();
    foreach ($this->dataJawabanMateriDua->groupBy('aspek') as $key => $row) {
      $this->aspek[] = [
        'aspek' => $key,
        'jumlah' => $row->sum('nilai'),
      ];
    }
  }

  public function render()
  {
    return view('livewire.materidua.hasil');
  }
}
