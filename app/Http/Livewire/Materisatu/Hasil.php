<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $benar = 0, $aspek = [], $dataJawabanMateriSatu;

  public function selanjutnya($id)
  {
    $ruangKerja = RuangKerja::findOrFail($id);
    if ($ruangKerja->materi_dua_id) {
      return redirect('/materidua/' . $ruangKerja->getKey());
    }
    if ($ruangKerja->materi_tiga_id) {
      return redirect('/materitiga/' . $ruangKerja->getKey());
    }
  }

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materisatu/' . $this->key . '/soal');
    }
    $this->dataJawabanMateriSatu = RuangKerjaPesertaJawaban::with('ruangKerjaMateriSatu')->whereNotNull('ruang_kerja_materi_satu_id')->leftJoin('ruang_kerja_materi_satu', 'ruang_kerja_materi_satu.id', '=', 'ruang_kerja_materi_satu_id')->get();
    $this->benar = $this->dataJawabanMateriSatu->where('nilai', 1)->count();
    foreach ($this->dataJawabanMateriSatu->groupBy('aspek') as $key => $row) {
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
