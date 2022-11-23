<?php

namespace App\Http\Livewire\Materisatu;

use App\Models\RuangKerja;
use App\Models\RuangKerjaMateriSatu;
use App\Models\RuangKerjaPesertaJawaban;
use App\Models\RuangKerjaPesertaWaktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Soal extends Component
{
  public $dataSoal, $dataRuangKerja, $soal, $key, $dataRuangKerjaPesertaJawaban, $waktu, $now, $end, $tampil;

  public function waktu($selesai = false)
  {
    $now = Carbon::now();
    $data = new RuangKerjaPesertaWaktu();
    $data->ruang_kerja_peserta_id = auth()->id();
    $data->materi = 1;
    $data->waktu = ($selesai == true ? 0 : $this->end->diffInSeconds($now));
    $data->save();

    if ($selesai == true) {
      return redirect('/materisatu/' . $this->key . '/hasil');
    }
  }

  public function mount($key)
  {
    $this->key = $key;

    if (RuangKerjaPesertaWaktu::where('waktu', 0)->count() > 0) {
      return redirect('/materisatu/' . $this->key . '/hasil');
    }

    $this->dataRuangKerja = RuangKerja::findOrFail($this->key);
    $this->waktu = RuangKerjaPesertaWaktu::count() == 0 ? $this->dataRuangKerja->waktu_materi_satu : RuangKerjaPesertaWaktu::orderBy('waktu')->first()->waktu;

    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::all();
    $this->soal = $this->dataRuangKerjaPesertaJawaban->first()->id;
    $this->now = now();
    $this->end = Carbon::now()->addSeconds($this->waktu);
  }

  protected $listeners = [
    'waktu' => 'waktu',
    'submit' => 'submit',
  ];

  public function submit($jawaban)
  {
    if ($this->waktu > 0) {
      DB::transaction(function () use ($jawaban) {
        RuangKerjaPesertaJawaban::find($this->soal)->update([
          'ruang_kerja_peserta_id' => auth()->id(),
          'jawaban' => $jawaban,
          'benar' => ($jawaban == $this->tampil->ruangKerjaMateriSatu->kunci ? 1 : 0),
        ]);
        $this->waktu();
      });
      if ($this->soal < $this->dataRuangKerjaPesertaJawaban->sortByDesc('id')->first()->id) {
        $this->soal++;
      }
    }
  }

  public function render()
  {
    $this->emit('reinit');
    $this->dataRuangKerjaPesertaJawaban = RuangKerjaPesertaJawaban::all();
    $this->tampil = RuangKerjaPesertaJawaban::findOrFail($this->soal);
    return view('livewire.materisatu.soal');
  }
}
