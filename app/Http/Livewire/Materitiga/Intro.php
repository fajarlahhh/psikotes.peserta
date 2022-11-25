<?php

namespace App\Http\Livewire\Materitiga;

use App\Models\Petunjuk;
use App\Models\RuangKerja;
use App\Models\RuangKerjaMateriTiga;
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
      return redirect('/materitiga/' . $this->key . '/soal');
    }
    $this->key = $key;
  }

  public function mulai()
  {
    if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->count() == 0) {
      DB::transaction(function () {
        $data = RuangKerja::findOrFail($this->key);
        $dataSoal = $data->ruangKerjaMateriTiga->map(function ($q) {
          return [
            'ruang_kerja_peserta_id' => auth()->id(),
            'ruang_kerja_materi_tiga_id' => $q->id,
            'created_at' => now(),
            'updated_at' => now(),
          ];
        })->toArray();
        RuangKerjaPesertaJawaban::insert($dataSoal);
        $waktu = new RuangKerjaPesertaWaktu();
        $waktu->ruang_kerja_peserta_id = auth()->id();
        $waktu->waktu = $data->waktu_materi_tiga;
        $waktu->materi = 1;
        $waktu->save();
      });
    }
    return redirect('/materitiga/' . $this->key . '/soal');
  }

  public function render()
  {
    return view('livewire.materitiga.intro', [
      'data' => Petunjuk::where('materi', 1)->first(),
    ]);
  }
}
