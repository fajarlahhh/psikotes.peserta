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
        @foreach ($data as $row)
          @switch($row->materi)
            @case(1)
              <div class="col-lg-4">
                <div class="card card-info">
                  <div class="card-header">
                    <h4 class="card-title">Materi Satu</h4>
                  </div>
                  <div class="card-body">
                    @php
                      $dataWaktu = \App\Models\UjianWaktu::where('ujian_id', $row->getKey())
                          ->where('pengguna_id', auth()->id())
                          ->orderBy('waktu')
                          ->get();
                      $sisaWaktu = $dataWaktu->count() > 0 ? $dataWaktu->first()->waktu : $row->waktu;
                    @endphp
                    Waktu : {{ $sisaWaktu > 0? \Carbon\CarbonInterval::seconds($sisaWaktu)->cascade()->forHumans(): 0 }}<br>
                    Jumlah Soal : {{ $row->soal->count() }}
                    @if ($sisaWaktu > 0)
                      <a href="/materisatu/{{ $row->getKey() }}" type="button"
                        class="w-100 btn btn-lg btn-outline-info">Buka</a>
                    @else
                      <a href="/materisatu/{{ $row->getKey() }}/hasil" type="button"
                        class="w-100 btn btn-lg btn-outline-info">Lihat Hasil</a>
                    @endif
                  </div>
                </div>
              </div>
            @break

            @case(2)
              <div class="col-lg-4">
                <div class="card card-warning">
                  <div class="card-header">
                    <h4 class="card-title">Materi Dua</h4>
                  </div>
                  <div class="card-body">
                    @php
                      $dataWaktu = \App\Models\UjianWaktu::where('ujian_id', $row->getKey())
                          ->where('pengguna_id', auth()->id())
                          ->orderBy('waktu')
                          ->get();
                      $sisaWaktu = $dataWaktu->count() > 0 ? $dataWaktu->first()->waktu : $row->waktu;
                    @endphp
                    Waktu : {{ $sisaWaktu > 0? \Carbon\CarbonInterval::seconds($sisaWaktu)->cascade()->forHumans(): 0 }}<br>
                    Jumlah Soal : {{ $row->soal->count() }}
                    @if ($sisaWaktu > 0)
                      <a href="/materidua/{{ $row->getKey() }}" type="button"
                        class="w-100 btn btn-lg btn-outline-warning">Buka</a>
                    @else
                      <a href="/materidua/{{ $row->getKey() }}/hasil" type="button"
                        class="w-100 btn btn-lg btn-outline-warning">Lihat Hasil</a>
                    @endif
                  </div>
                </div>
              </div>
            @break
          @endswitch
        @endforeach
      </div>
    </div>
  </section>
</div>
