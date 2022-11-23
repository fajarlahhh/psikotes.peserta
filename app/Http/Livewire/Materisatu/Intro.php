<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\Petunjuk;
use App\Models\RuangKerja;
use App\Models\RuangKerjaMateriSatu;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount($key)
  {
    if (RuangKerjaPesertaWaktu::where('materi', 1)->count() > 0) {
      return redirect('/materisatu/' . $this->key . '/soal');
    }
    $this->key = $key;
  }

  public function mulai()
  {
    if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_satu_id')->count() == 0) {
      DB::transaction(function () {
        $data = RuangKerja::findOrFail($this->key);
        $dataSoal = $data->ruangKerjaMateriSatu->shuffle()->map(function ($q) {
          return [
            'ruang_kerja_peserta_id' => auth()->id(),
            'ruang_kerja_materi_satu_id' => $q->id,
            'created_at' => now(),
            'updated_at' => now(),
          ];
        })->toArray();
        RuangKerjaPesertaJawaban::insert($dataSoal);
        $waktu = new RuangKerjaPesertaWaktu();
        $waktu->ruang_kerja_peserta_id = auth()->id();
        $waktu->waktu = $data->waktu_materi_satu;
        $waktu->materi = 1;
        $waktu->save();
      });
    }
    return redirect('/materisatu/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materisatu.intro', [
      'data' => Petunjuk::where('materi', 1)->first(),
    ]);
  }
}
