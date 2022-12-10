<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\RuangKerjaPesertaWaktu;
use Carbon\Carbon;
use Livewire\Component;

class Jeda extends Component
{
  public $key, $kolom, $now, $end;

  public function mount($key, $kolom)
  {
    if ($kolom > 10) {
      return redirect('/dashboard');
    }
    if (RuangKerjaPesertaWaktu::where('waktu', 0)->where('materi', '3' . $this->kolom)->count() > 0) {
      return redirect('/materitiga/' . $this->key . '/jeda/' . ($this->kolom + 1));
    }
    $this->key = $key;
    $this->kolom = $kolom;
    $this->now = now();
    $this->end = Carbon::now()->addSeconds(3);
  }

  protected $listeners = [
    'selanjutnya' => 'selanjutnya',
  ];

  public function selanjutnya()
  {
    return redirect('/materitiga/' . $this->key . '/kolom/' . $this->kolom);
  }

  public function render()
  {
    return view('livewire.materitiga.jeda');
  }
}
