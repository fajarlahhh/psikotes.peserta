<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Hasil extends Component
{
  public $key, $data = [];

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() == 0) {
      return redirect('/materitiga/' . $this->key . '/soal');
    }
    $this->data = RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->leftJoin('ruang_kerja_materi_tiga', 'ruang_kerja_materi_tiga.id', '=', 'ruang_kerja_materi_tiga_id')->get();
  }

  public function render()
  {
    return view('livewire.materitiga.hasil');
  }
}
