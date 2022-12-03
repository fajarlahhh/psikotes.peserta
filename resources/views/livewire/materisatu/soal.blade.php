<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <div class="card">
            <div class="card-body">
              <h4>Materi Satu</h4>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-borderless">
                <tr>
                  <td colspan="5">
                    <strong>Soal:</strong><br>
                    @php
                      echo $tampil->ruangKerjaMateriSatu->soal;
                    @endphp
                  </td>
                </tr>
              </table>
            </div>
            <div class="card-footer">
              <a class="btn {{ $tampil->jawaban == 'A' ? 'btn-danger' : 'btn-success' }}  mt-2" href="javascript:;"
                wire:click="submit('A')">Jawab A</a>&nbsp;&nbsp;
              <a class="btn {{ $tampil->jawaban == 'B' ? 'btn-danger' : 'btn-success' }}  mt-2" href="javascript:;"
                wire:click="submit('B')">Jawab B</a>&nbsp;&nbsp;
              <a class="btn {{ $tampil->jawaban == 'C' ? 'btn-danger' : 'btn-success' }}  mt-2" href="javascript:;"
                wire:click="submit('C')">Jawab C</a>&nbsp;&nbsp;
              <a class="btn {{ $tampil->jawaban == 'D' ? 'btn-danger' : 'btn-success' }}  mt-2" href="javascript:;"
                wire:click="submit('D')">Jawab D</a>&nbsp;&nbsp;
              <a class="btn {{ $tampil->jawaban == 'E' ? 'btn-danger' : 'btn-success' }}  mt-2" href="javascript:;"
                wire:click="submit('E')">Jawab E</a>
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
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      var selesai = false
      var now = new Date('{{ $now }}');


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
