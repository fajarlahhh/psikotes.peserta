<?php

namespace App\Http\Livewire;

use App\Models\RuangKerja;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
  public $data;

  public function mulai()
  {
    if ($this->data->materi_satu_id) {
      if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_satu_id')->count() == 0) {
        DB::transaction(function () {
          $data = RuangKerja::findOrFail($this->data->getKey());
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
    }

    if ($this->data->materi_dua_id) {
      if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_dua_id')->count() == 0) {
        DB::transaction(function () {
          $data = RuangKerja::findOrFail($this->data->getKey());
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
    }

    if ($this->data->materi_tiga_id) {
      if (RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->count() == 0) {
        DB::transaction(function () {
          $data = RuangKerja::findOrFail($this->data->getKey());
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
    }
    if ($this->data->materi_satu_id) {
      return redirect('/materisatu/' . $this->data->getKey());
    }

    if ($this->data->materi_dua_id) {
      return redirect('/materidua/' . $this->data->getKey());
    }

    if ($this->data->materi_tiga_id) {
      return redirect('/materitiga/' . $this->data->getKey());
    }
  }

  public function mount()
  {
    $this->data = RuangKerja::with('ruangKerjaMateriSatu')->with('ruangKerjaMateriDua')->with('ruangKerjaMateriTiga')->first();
  }

  public function render()
  {
    return view('livewire.home');
  }
}
