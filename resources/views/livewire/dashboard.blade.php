<div>
  <br>
  <div class="content">
    <div class="container text-center">
      @php
        $materi = 0;
        $selesai = 0;
        if ($data->materi_satu_id) {
            $materi++;
            if (
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', 1)
                    ->count() > 0
            ) {
                $selesai++;
            }
        }
        if ($data->materi_dua_id) {
            $materi++;
            if (
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', 2)
                    ->count() > 0
            ) {
                $selesai++;
            }
        }
        if ($data->materi_tiga_id) {
            $materi++;
            if (
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '31')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '32')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '33')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '34')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '35')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '36')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '37')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '38')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '39')
                    ->count() > 0 &&
                \App\Models\RuangKerjaPesertaWaktu::where('waktu', 0)
                    ->where('materi', '310')
                    ->count() > 0
            ) {
                $selesai++;
            }
        }
      @endphp
      @if ($selesai == $materi)
        @if ($data->materi_satu_id)
          @php
            $dataJawabanMateriSatu = \App\Models\RuangKerjaPesertaJawaban::with('ruangKerjaMateriSatu')
                ->whereNotNull('ruang_kerja_materi_satu_id')
                ->leftJoin('ruang_kerja_materi_satu', 'ruang_kerja_materi_satu.id', '=', 'ruang_kerja_materi_satu_id')
                ->get();
            $aspek = [];
            foreach ($dataJawabanMateriSatu->groupBy('aspek') as $key => $row) {
                $aspek[] = [
                    'aspek' => $key,
                    'benar' => $row
                        ->whereNotNull('jawaban')
                        ->where('nilai', 1)
                        ->count(),
                    'salah' => $row
                        ->whereNotNull('jawaban')
                        ->where('nilai', 0)
                        ->count(),
                    'jumlah' => $row->whereNotNull('jawaban')->count(),
                ];
            }
          @endphp
          <div class="card">
            <div class="card-header">

              <h5>Hasil Materi Satu</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>ASPEK</th>
                  <th>JUMLAH YG DIKERJAKAN</th>
                  <th>JUMLAH SALAH</th>
                  <th>JUMLAH BENAR</th>
                </tr>
                @foreach ($aspek as $row)
                  <tr>
                    <td>{{ $row['aspek'] }}</td>
                    <td>{{ number_format($row['jumlah']) }}</td>
                    <td>{{ number_format($row['salah']) }}</td>
                    <td>{{ number_format($row['benar']) }}</td>
                  </tr>
                @endforeach
                <tr>
                  <td style="width: 300px">TOTAL</td>
                  <td class="text-end">{{ number_format(collect($aspek)->sum('jumlah')) }}</td>
                  <td class="text-end">{{ number_format(collect($aspek)->sum('salah')) }}</td>
                  <td class="text-end">{{ number_format(collect($aspek)->sum('benar')) }}</td>
                </tr>
              </table>
            </div>
          </div>
        @endif
        @if ($data->materi_dua_id)
          @php
            $dataJawabanMateriDua = \App\Models\RuangKerjaPesertaJawaban::with('ruangKerjaMateriDua')
                ->whereNotNull('ruang_kerja_materi_dua_id')
                ->leftJoin('ruang_kerja_materi_dua', 'ruang_kerja_materi_dua.id', '=', 'ruang_kerja_materi_dua_id')
                ->get();
            $aspek = [];
            foreach ($dataJawabanMateriDua->groupBy('aspek') as $key => $row) {
                $aspek[] = [
                    'aspek' => $key,
                    'jumlah' => $row->sum('nilai'),
                ];
            }
          @endphp
          <div class="card">
            <div class="card-header">
              <h5>Hasil Materi Dua</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>ASPEK</th>
                  <th>NILAI</th>
                </tr>
                @foreach ($aspek as $row)
                  <tr>
                    <td>{{ $row['aspek'] }}</td>
                    <td>{{ number_format($row['jumlah']) }}</td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        @endif
        @if ($data->materi_tiga_id)
          @php
            $dataJawabanMateriTiga = \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')
                ->leftJoin('ruang_kerja_materi_tiga', 'ruang_kerja_materi_tiga.id', '=', 'ruang_kerja_materi_tiga_id')
                ->get();
          @endphp
          <div class="card">
            <div class="card-header">
              <h5>Hasil Materi Tiga</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th></th>
                  @for ($i = 1; $i < 11; $i++)
                    <th>Kolom {{ $i }}</th>
                  @endfor
                </tr>
                <tr>
                  <th>JUMLAH BENAR</th>
                  @for ($i = 1; $i < 11; $i++)
                    <td>
                      {{ $dataJawabanMateriTiga->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 1)->count() }}
                    </td>
                  @endfor
                </tr>
                <tr>
                  <th class="pt-0 pb-0">&nbsp;</th>
                  @for ($i = 1; $i < 11; $i++)
                    <td class="pt-0 pb-0">
                      <small>{{ $i == 1? '': $dataJawabanMateriTiga->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 1)->count() -$dataJawabanMateriTiga->whereNotNull('jawaban')->where('kolom', $i - 1)->where('nilai', 1)->count() }}</small>
                    </td>
                  @endfor
                </tr>
                <tr>
                  <th>JUMLAH SALAH</th>
                  @for ($i = 1; $i < 11; $i++)
                    <td>
                      {{ $dataJawabanMateriTiga->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 0)->count() }}
                    </td>
                  @endfor
                </tr>
                <tr>
                  <th>JUMLAH YANG DIKERJAKAN</th>
                  @for ($i = 1; $i < 11; $i++)
                    <td> {{ $dataJawabanMateriTiga->where('kolom', $i)->whereNotNull('jawaban')->count() }}</td>
                  @endfor
                </tr>
              </table>
            </div>
          </div>
        @endif
      @else
        <div class="alert alert-info">
          <img src="{{ asset('/dist/img/kerjakan.png') }}" style="height: 200px" alt="">
          <br>
          <br>
          @if (\App\Models\RuangKerjaPesertaJawaban::whereNotNull('jawaban')->count() > 0)
            <p>Klik tombol di bawah ini untuk melanjutkan</p>
            <button class="btn btn-primary" wire:click="mulai">Lanjutkan</button>
          @else
            <p>
              Anda terdaftar sebagai peserta pada
              @if ($data->materi_satu_id)
                Materi 1{{ $data->materi_dua_id || $data->materi_dua_id ? ', ' : '' }}
              @endif
              @if ($data->materi_dua_id)
                Materi 2{{ $data->materi_tiga_id ? ', ' : '' }}
              @endif
              @if ($data->materi_tiga_id)
                Materi 3
              @endif
              <br>
              Klik tombol di bawah ini untuk memulai
            </p>
            <button class="btn btn-primary" wire:click="mulai">Mulai</button>
          @endif
        </div>
      @endif
    </div>
  </div>
</div>
