<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
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
        {{-- @if ($data->materi_tiga_id)
          <div class="col-lg-4">
            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Materi Tiga</h4>
              </div>
              <div class="card-body">
                @php
                  $dataWaktu = \App\Models\RuangKerjaPesertaWaktu::where('materi', 1)
                      ->orderBy('waktu')
                      ->get();
                  $sisaWaktu = $dataWaktu->count() > 0 ? $dataWaktu->first()->waktu : $data->waktu_materi_tiga;
                @endphp
                Waktu : {{ $sisaWaktu > 0? \Carbon\CarbonInterval::seconds($sisaWaktu)->cascade()->forHumans(): 0 }} /
                kolom<br>
                Jumlah Kolom : {{ $data->ruangKerjaMateriTiga->count() }} Kolom
                @if ($sisaWaktu > 0)
                  <a href="/materitiga/{{ $data->getKey() }}" type="button"
                    class="w-100 btn btn-lg btn-outline-success">Buka</a>
                @else
                  <a href="/materitiga/{{ $data->getKey() }}/hasil" type="button"
                    class="w-100 btn btn-lg btn-outline-success">Lihat Hasil</a>
                @endif
              </div>
            </div>
          </div>
        @endif --}}
      </div>
    </div>
  </section>
</div>
