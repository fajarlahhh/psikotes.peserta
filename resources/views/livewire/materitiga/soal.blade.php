<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="row">
        @if ($waktu > 0)
          <div class="col-xl-9">
            <div class="card">
              <div class="card-body">
                <h4>Materi Tiga</h4>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="text-center" wire:ignore>
              <small>Sisa Waktu</small>
              <h1><label id="countdown" class="text-blue">00:00:00</label></h1>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <strong>Petunjuk</strong>
                    <table class="table table-bordered">
                      <tr>
                        <td colspan="5" class="text-center"><strong>KOLOM {{ $kolom }}</strong></td>
                      </tr>
                      @php
                        $jawaban = json_decode($tampil->ruangKerjaMateriTiga->soal);
                      @endphp
                      <tr>
                        @foreach ($jawaban as $index => $row)
                          <td class="text-center">
                            <h1>{{ $row }}</h1>
                          </td>
                        @endforeach
                      </tr>
                      <tr>
                        @foreach ($jawaban as $index => $row)
                          <td class="text-center">
                            @switch($index)
                              @case(0)
                                @php $pilihan ='a' @endphp
                              @break

                              @case(1)
                                @php $pilihan ='b' @endphp
                              @break

                              @case(2)
                                @php $pilihan ='c' @endphp
                              @break

                              @case(3)
                                @php $pilihan ='d' @endphp
                              @break

                              @case(4)
                                @php $pilihan ='e' @endphp
                              @break
                            @endswitch
                            {{ $pilihan }}
                          </td>
                        @endforeach
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-4">
                    <table class="table table-bordered">
                      <tr>
                        <td colspan="4">
                          <strong>Persoalan:</strong>
                        </td>
                      <tr>
                      <tr>
                        <td class="text-center">
                          <h2>{{ $tampil->ruangKerjaMateriTiga->a }}</h2>
                        </td>
                        <td class="text-center">
                          <h2>{{ $tampil->ruangKerjaMateriTiga->b }}</h2>
                        </td>
                        <td class="text-center">
                          <h2>{{ $tampil->ruangKerjaMateriTiga->c }}</h2>
                        </td>
                        <td class="text-center">
                          <h2>{{ $tampil->ruangKerjaMateriTiga->d }}</h2>
                        </td>
                      </tr>
                    </table>
                    <table class="table table-borderless">
                      <tr>
                        @php
                          $jawaban = json_decode($tampil->ruangKerjaMateriTiga->soal);
                        @endphp
                        @foreach ($jawaban as $index => $row)
                          <td class="text-center">
                            @switch($index)
                              @case(0)
                                @php $pilihan ='a' @endphp
                              @break

                              @case(1)
                                @php $pilihan ='b' @endphp
                              @break

                              @case(2)
                                @php $pilihan ='c' @endphp
                              @break

                              @case(3)
                                @php $pilihan ='d' @endphp
                              @break

                              @case(4)
                                @php $pilihan ='e' @endphp
                              @break
                            @endswitch
                            <button class="btn btn-success" style="width: 100%"
                              wire:click="submit('{{ $pilihan }}')">
                              {{ $pilihan }}
                            </button>
                          </td>
                        @endforeach
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-8">
                  </div>
                </div>
              </div>
            </div>
          </div>
        @else
          @php
            redirect('/materitiga/' . $key . '/kolom/' . ($kolom + 1));
          @endphp
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

      //   window.onbeforeunload = function(e) {
      //     window.livewire.emit('waktu');
      //     if (selesai == false) {
      //       e = e || window.event;

      //       if (e) {
      //         e.returnValue = 'Sure?';
      //       }

      //       return 'Sure?';
      //     }
      //   };

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
