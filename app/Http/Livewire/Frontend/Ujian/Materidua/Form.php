<?php

namespace App\Http\Livewire\Frontend\Ujian\Materidua;

use App\Models\JawabanMateriDua;
use App\Models\MateriDua;
use App\Models\Ujian;
use App\Models\UjianWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
  public $dataSoal, $soal, $key, $dataJawabanMateriDua, $jawaban = null, $waktu, $now, $end;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $dataWaktu = new UjianWaktu();
    $dataWaktu->pengguna_id = auth()->id();
    $dataWaktu->ujian_id = $this->key;
    $dataWaktu->waktu = ($selesai === true ? 0 : $this->end->diffInSeconds($now));
    $dataWaktu->save();

    if ($selesai == true) {
      return redirect('/materidua/' . $this->key . '/hasil');
    }
  }

  public function mount($key)
  {
    $this->key = $key;
    $data = Ujian::findOrFail($this->key);
    $this->waktu = UjianWaktu::where('ujian_id', $this->key)->where('pengguna_id', auth()->id())->count() == 0 ? $data->waktu : UjianWaktu::where('ujian_id', $this->key)->where('pengguna_id', auth()->id())->orderBy('waktu')->first()->waktu;
    $this->dataJawabanMateriDua = JawabanMateriDua::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->get();
    $this->soal = $this->dataJawabanMateriDua->whereNull('jawaban')->count() > 0 ? $this->dataJawabanMateriDua->whereNull('jawaban')->first()->id : $this->dataJawabanMateriDua->first()->id;
    $this->now = now();
    $this->end = Carbon::now()->addSeconds($this->waktu);
  }

  protected $listeners = [
    'set:setsoal' => 'setSoal',
    'waktu' => 'waktu',
    'submit' => 'submit',
  ];

  public function submit($pilihan)
  {
    if ($this->waktu > 0) {
      DB::transaction(function () use ($pilihan) {
        JawabanMateriDua::find($this->soal)->update([
          'jawaban' => $pilihan,
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataJawabanMateriDua->sortByDesc('id')->first()->id) {
        $this->soal++;
      } else {
        return redirect('/materidua/' . $this->key . '/hasil');
      }
    }
  }
  public function render()
  {
    $this->emit('reinit');
    $this->jawaban = JawabanMateriDua::findOrFail($this->soal)->jawaban ?: null;
    $this->dataJawabanMateriDua = JawabanMateriDua::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->get();
    return view('livewire.frontend.ujian.materidua.form', [
      'tampil' => MateriDua::find(JawabanMateriDua::findOrFail($this->soal)->materi_dua_id),
    ]);
  }
}
