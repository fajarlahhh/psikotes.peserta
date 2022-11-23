<?php

namespace App\Http\Livewire\Frontend\Ujian\Materisatu;

use App\Models\JawabanMateriSatu;
use App\Models\MateriSatu;
use App\Models\Ujian;
use App\Models\UjianWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
  public $dataSoal, $soal, $key, $dataJawabanMateriSatu, $jawaban = null, $waktu, $now, $end;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $dataWaktu = new UjianWaktu();
    $dataWaktu->pengguna_id = auth()->id();
    $dataWaktu->ujian_id = $this->key;
    $dataWaktu->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $dataWaktu->save();

    if ($selesai == true) {
      return redirect('/materisatu/' . $this->key . '/hasil');
    }
  }

  public function mount($key)
  {
    $this->key = $key;
    $this->updated();
    $data = Ujian::findOrFail($this->key);
    $this->waktu = UjianWaktu::where('ujian_id', $this->key)->where('pengguna_id', auth()->id())->count() == 0 ? $data->waktu : UjianWaktu::where('ujian_id', $this->key)->where('pengguna_id', auth()->id())->orderBy('waktu')->first()->waktu;
    $this->dataJawabanMateriSatu = JawabanMateriSatu::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->get();
    $this->soal = $this->dataJawabanMateriSatu->whereNull('jawaban')->count() > 0 ? $this->dataJawabanMateriSatu->whereNull('jawaban')->first()->id : $this->dataJawabanMateriSatu->first()->id;
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
        JawabanMateriSatu::find($this->soal)->update([
          'jawaban' => $pilihan,
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataJawabanMateriSatu->sortByDesc('id')->first()->id) {
        $this->soal++;
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->jawaban = JawabanMateriSatu::findOrFail($this->soal)->jawaban ?: null;
    $this->dataJawabanMateriSatu = JawabanMateriSatu::where('pengguna_id', auth()->id())->where('ujian_id', $this->key)->get();
    return view('livewire.frontend.ujian.materisatu.form', [
      'tampil' => MateriSatu::find(JawabanMateriSatu::findOrFail($this->soal)->materi_satu_id),
    ]);
  }
}
