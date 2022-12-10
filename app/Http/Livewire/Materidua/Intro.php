<?php

namespace App\Http\Livewire\Materidua;

use App\Models\Petunjuk;
use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaWaktu;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount($key)
  {
    $this->key = $key;
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', 2)->count() > 0) {
      $data = RuangKerja::findOrFail($this->key);
      if ($data->materi_tiga_id) {
        return redirect('/materitiga/' . $this->key);
      }
      return redirect('/dashboard');
    }
  }

  public function mulai()
  {
    return redirect('/materidua/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materidua.intro', [
      'data' => Petunjuk::where('materi', 2)->first(),
    ]);
  }
}
