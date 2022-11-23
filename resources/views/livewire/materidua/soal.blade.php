<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Soal Materi Dua</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Materi Dua</li>
            <li class="breadcrumb-item active"><a href="#">Soal</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @if ($waktu > 0)
          <div class="col-xl-3">
            <div class="alert alert-primary">
              <div class="row">
                @foreach ($dataRuangKerjaPesertaJawaban as $index => $row)
                  <div class="col-3 mb-2 ">
                    <button
                      class="btn-xs btn @php if ($row->jawaban != null) {
                                                if ($soal == $row->getKey()){
                                                    echo 'btn-success';
                                                } else { 
                                                    echo'btn-danger';
                                                }
                                            } else {
                                                if ($soal == $row->getKey()){
                                                    echo 'btn-success';
                                                } else { 
                                                    echo'btn-secondary';
                                                }
                                            } @endphp width-full"
                      style="width:100%">{{ ++$index }} {{ $row->jawaban }}</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-xl-9">
            <div class="card">
              <div class="card-header text-right" wire:ignore>
                Waktu Tersisa: <label id="countdown"></label>
              </div>
              <div class="card-body">
                <table class="table table-borderless">
                  <tr>
                    <td colspan="5">
                      <strong>Soal:</strong><br>
                      @php
                        echo $tampil->ruangKerjaMateriDua->soal;
                      @endphp
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center"><a class="btn btn-success width-100" href="javascript:;"
                        wire:click="submit('SS')">Sangat Setuju</a>
                    </td>
                    <td class="text-center"><a class="btn btn-success width-100" href="javascript:;"
                        wire:click="submit('S')">Setuju</a>
                    </td>
                    <td class="text-center"><a class="btn btn-success width-100" href="javascript:;"
                        wire:click="submit('TS')">Tidak Setuju</a>
                    </td>
                    <td class="text-center"><a class="btn btn-success width-100" href="javascript:;"
                        wire:click="submit('STS')">Sangat Tidak Setuju</a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      @if ($dataRuangKerjaPesertaJawaban->count() == $dataRuangKerjaPesertaJawaban->whereNotNull('jawaban')->count())
                        <div class="alert alert-warning">
                          Semua soal sudah terjawab, <a href="javascript:;" wire:click="waktu(true)">klik disini</a>
                          untuk
                          menyelesaikan tes dan melihat hasil.
                        </div>
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        @else
          <div class="col-lg-12 text-center">
            <h5 class="text-danger">Waktu Anda Sudah Habis</h5><br>
            <a href="/materidua/{{ $key }}/hasil" class="btn btn-primary">Klik Hasil</a>
          </div>
        @endif
      </div>
    </div>
  </section>
  @push('scripts')
    @if ($waktu > 0)
      <script type="text/javascript"></script>
    @endif

    <script>
      var selesai = false
      var now = new Date('{{ $now }}');
      Livewire.on('reinit', () => {
        $('input[name="jawaban"]').attr('checked', false);
      });

      window.onbeforeunload = function(e) {
        window.livewire.emit('waktu');
        if (selesai == false) {
          e = e || window.event;

          if (e) {
            e.returnValue = 'Sure?';
          }

          return 'Sure?';
        }
      };

      function submit() {
        var jawaban = $('input[name="jawaban"]:checked').val();
        if (jawaban) {
          window.livewire.emit('submit', jawaban, now);
        }
      }

      CountDownTimer();

      function CountDownTimer() {
        var end = new Date('{{ $end }}');
        var now = new Date('{{ $now }}');

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
          now.setSeconds(now.getSeconds() + 1);
          var distance = end - now;
          if (distance < 0) {
            selesai = true;
            window.livewire.emit('waktu', true);
            clearInterval(timer);
            return;
          }

          var days = Math.floor(distance / _day);
          var hours = Math.floor((distance % _day) / _hour);
          var minutes = Math.floor((distance % _hour) / _minute);
          var seconds = Math.floor((distance % _minute) / _second);

          document.getElementById('countdown').innerHTML = hours + ' jam ';
          document.getElementById('countdown').innerHTML += minutes + ' menit ';
          document.getElementById('countdown').innerHTML += seconds + ' detik ';
        }
        timer = setInterval(showRemaining, 1000);
      }
    </script>
  @endpush
</div>
