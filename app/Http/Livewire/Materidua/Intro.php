<?php

namespace App\Http\Livewire\Materidua;

use App\Models\Petunjuk;
use App\Models\RuangKerja;
use App\Models\RuangKerjaMateriDua;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Intro extends Component
{
  public $key;

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('materi', 2)->count() > 0) {
      return redirect('/materidua/' . $this->key . '/soal');
    }
  }

  public function mulai()
  {
    if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_dua_id')->count() == 0) {
      DB::transaction(function () {
        $data = RuangKerja::findOrFail($this->key);
        $dataSoal = $data->ruangKerjaMateriDua->shuffle()->map(function ($q) {
          return [
            'ruang_kerja_peserta_id' => auth()->id(),
            'ruang_kerja_materi_dua_id' => $q->id,
            'created_at' => now(),
            'updated_at' => now(),
          ];
        })->toArray();
        RuangKerjaPesertaJawaban::insert($dataSoal);
        $waktu = new RuangKerjaPesertaWaktu();
        $waktu->ruang_kerja_peserta_id = auth()->id();
        $waktu->waktu = $data->waktu_materi_dua;
        $waktu->materi = 2;
        $waktu->save();
      });
    }
    return redirect('/materidua/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materidua.intro', [
      'data' => Petunjuk::where('materi', 2)->first(),
    ]);
  }
}
