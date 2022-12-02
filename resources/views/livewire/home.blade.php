<div>
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        @if ($data->materi_satu_id)
          <div class="col-lg-4">
            <div class="card card-info">
              <div class="card-header">
                <h4 class="card-title">Materi Satu</h4>
              </div>
              <div class="card-body">
                @php
                  $dataWaktu = \App\Models\RuangKerjaPesertaWaktu::where('materi', 1)
                      ->orderBy('waktu')
                      ->get();
                  $sisaWaktu = $dataWaktu->count() > 0 ? $dataWaktu->first()->waktu : $data->waktu_materi_satu;
                @endphp
                Waktu : {{ $sisaWaktu > 0? \Carbon\CarbonInterval::seconds($sisaWaktu)->cascade()->forHumans(): 0 }}<br>
                Jumlah Soal : {{ $data->ruangKerjaMateriSatu->count() }}
                @if ($sisaWaktu > 0)
                  <a href="/materisatu/{{ $data->getKey() }}" type="button"
                    class="w-100 btn btn-lg btn-outline-info">Buka</a>
                @else
                  <a href="/materisatu/{{ $data->getKey() }}/hasil" type="button"
                    class="w-100 btn btn-lg btn-outline-info">Lihat Hasil</a>
                @endif
              </div>
            </div>
          </div>
        @endif
        @if ($data->materi_dua_id)
          <div class="col-lg-4">
            <div class="card card-warning">
              <div class="card-header">
                <h4 class="card-title">Materi Dua</h4>
              </div>
              <div class="card-body">
                @php
                  $dataWaktu = \App\Models\RuangKerjaPesertaWaktu::where('materi', 2)
                      ->orderBy('waktu', 'asc')
                      ->get();
                  $sisaWaktu = $dataWaktu->count() > 0 ? $dataWaktu->first()->waktu : $data->waktu_materi_dua;
                @endphp
                Waktu : {{ $sisaWaktu > 0? \Carbon\CarbonInterval::seconds($sisaWaktu)->cascade()->forHumans(): 0 }}<br>
                Jumlah Soal : {{ $data->ruangKerjaMateriDua->count() }}
                @if ($sisaWaktu > 0)
                  <a href="/materidua/{{ $data->getKey() }}" type="button"
                    class="w-100 btn btn-lg btn-outline-warning">Buka</a>
                @else
                  <a href="/materidua/{{ $data->getKey() }}/hasil" type="button"
                    class="w-100 btn btn-lg btn-outline-warning">Lihat Hasil</a>
                @endif
              </div>
            </div>
          </div>
        @endif
        @if ($data->materi_tiga_id)
          <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Materi Tiga</h4>
              </div>
              <div class="card-body">
                <table class="table table-bordered p-0">
                  <tr>
                    <th class=" p-1">Kolom</th>
                    <th class=" p-1">Sisa Waktu</th>
                    <th class=" p-1">Sisa Soal</th>
                  </tr>
                  <tr>
                    <td class=" p-1">1</td>
                    <td class="text-right p-1 p-1">
                      @php
                        $dataWaktu1 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '31')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu1 = $dataWaktu1->count() > 0 ? $dataWaktu1->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu1 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu1)->cascade() : 0 }}<br>
                    </td>
                    <td class=" p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '1'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">2</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu2 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '32')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu2 = $dataWaktu2->count() > 0 ? $dataWaktu2->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu2 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu2)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '2'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">3</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu3 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '33')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu3 = $dataWaktu3->count() > 0 ? $dataWaktu3->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu3 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu3)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '3'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">4</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu4 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '34')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu4 = $dataWaktu4->count() > 0 ? $dataWaktu4->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu4 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu4)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '4'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">5</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu5 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '35')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu5 = $dataWaktu5->count() > 0 ? $dataWaktu5->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu5 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu5)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '5'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">6</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu6 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '36')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu6 = $dataWaktu6->count() > 0 ? $dataWaktu6->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu6 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu6)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '6'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">7</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu7 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '37')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu7 = $dataWaktu7->count() > 0 ? $dataWaktu7->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu7 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu7)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '7'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">8</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu8 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '38')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu8 = $dataWaktu8->count() > 0 ? $dataWaktu8->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu8 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu8)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '8'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">9</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu9 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '39')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu9 = $dataWaktu9->count() > 0 ? $dataWaktu9->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu9 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu9)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '9'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td class="p-1">9</td>
                    <td class="text-right p-1">
                      @php
                        $dataWaktu10 = \App\Models\RuangKerjaPesertaWaktu::where('materi', '39')
                            ->orderBy('waktu', 'asc')
                            ->get();
                        $sisaWaktu10 = $dataWaktu10->count() > 0 ? $dataWaktu10->first()->waktu : $data->waktu_materi_tiga;
                      @endphp
                      {{ $sisaWaktu10 > 0 ? \Carbon\CarbonInterval::seconds($sisaWaktu10)->cascade() : 0 }}<br>
                    </td>
                    <td class="p-1">
                      {{ \App\Models\RuangKerjaPesertaJawaban::whereNotNull('ruang_kerja_materi_tiga_id')->whereHas('ruangKerjaMateriTiga', fn($q) => $q->where('kolom', '9'))->whereNull('jawaban')->count() }}
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      @if ($sisaWaktu > 0)
                        <a href="/materitiga/{{ $data->getKey() }}" type="button"
                          class="w-100 btn btn-lg btn-outline-success">Buka</a>
                      @else
                        <a href="/materitiga/{{ $data->getKey() }}/hasil" type="button"
                          class="w-100 btn btn-lg btn-outline-success">Lihat Hasil</a>
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
