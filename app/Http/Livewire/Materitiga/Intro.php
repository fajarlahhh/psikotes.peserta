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

  public function mount()
  {
    if (RuangKerjaPesertaWaktu::where('materi', 'like', '3%')->count() > 0) {
      return redirect('/materitiga/' . $this->key . '/kolom/1');
    }
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
        $dataWaktu = [
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 31,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 32,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 33,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 34,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 35,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 36,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 37,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 38,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 39,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'ruang_kerja_peserta_id' => auth()->id(),
            'waktu' => $data->waktu_materi_tiga,
            'materi' => 310,
            'created_at' => now(),
            'updated_at' => now(),
          ],
        ];
        RuangKerjaPesertaJawaban::insert($dataSoal);
        RuangKerjaPesertaWaktu::insert($dataWaktu);
      });
    }
    return redirect('/materitiga/' . $this->key . '/kolom/1');
  }

  public function render()
  {
    return view('livewire.materitiga.intro', [
      'data' => Petunjuk::where('materi', 3)->first(),
    ]);
  }
}
