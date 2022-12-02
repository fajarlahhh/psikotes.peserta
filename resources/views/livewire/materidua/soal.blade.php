<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="row">
        @if ($waktu > 0)
          <div class="col-xl-9">
            <div class="card">
              <div class="card-body">
                <h4>Materi Dua</h4>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-borderless">
                  <tr>
                    <td colspan="5" style="height: 430px">
                      <strong>Soal:</strong><br>
                      @php
                        echo $tampil->ruangKerjaMateriDua->soal;
                      @endphp
                    </td>
                  </tr>
                </table>
              </div>
              <div class="card-footer">
                <a style="width: 100%" class="btn btn-success mt-2" href="javascript:;" wire:click="submit('SS')">Sangat
                  Setuju</a>&nbsp;&nbsp;
                <a style="width: 100%" class="btn btn-success mt-2" href="javascript:;"
                  wire:click="submit('S')">Setuju</a>&nbsp;&nbsp;
                <a style="width: 100%" class="btn btn-success mt-2" href="javascript:;" wire:click="submit('TS')">Tidak
                  Setuju</a>&nbsp;&nbsp;
                <a style="width: 100%" class="btn btn-success mt-2" href="javascript:;"
                  wire:click="submit('STS')">Sangat
                  Tidak Setuju</a>&nbsp;&nbsp;
              </div>
            </div>
            @if ($dataRuangKerjaPesertaJawaban->count() == $dataRuangKerjaPesertaJawaban->whereNotNull('jawaban')->count())
              <div class="alert alert-warning">
                Semua soal sudah terjawab, <a href="javascript:;" wire:click="waktu(true)">klik disini</a>
                untuk
                menyelesaikan tes dan melihat hasil.
              </div>
            @endif
          </div>
          <div class="col-xl-3">
            <div class="text-center" wire:ignore>
              <small>Sisa Waktu</small>
              <h1><label id="countdown" class="text-blue">00:00:00</label></h1>
            </div>
            <div class="alert alert-primary">
              <div class="row">
                @foreach ($dataRuangKerjaPesertaJawaban as $index => $row)
                  <div class="col-3 mb-2 ">
                    <button wire:click="$set('soal',{{ $row->getKey() }})"
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
                      style="width:100%">{{ ++$index }} {{ strtoupper($row->jawaban) }}</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @else
          <div class="col-lg-12 text-center">
            <h5 class="text-danger">Waktu Anda Sudah Habis</h5><br>
            <a href="/materiDua/{{ $key }}/hasil" class="btn btn-primary">Klik Hasil</a>
          </div>
        @endif
      </div>
    </div>
  </div>
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

          window.livewire.emit('waktu');

          var days = Math.floor(distance / _day);
          var hours = Math.floor((distance % _day) / _hour);
          var minutes = Math.floor((distance % _hour) / _minute);
          var seconds = Math.floor((distance % _minute) / _second);

          document.getElementById('countdown').innerHTML = (hours > 10 ? hours : '0' + hours) + ':';
          document.getElementById('countdown').innerHTML += (minutes > 10 ? minutes : '0' + minutes) + ':';
          document.getElementById('countdown').innerHTML += (seconds > 10 ? seconds : '0' + seconds);
        }
        timer = setInterval(showRemaining, 1000);
      }
    </script>
  @endpush
</div>
