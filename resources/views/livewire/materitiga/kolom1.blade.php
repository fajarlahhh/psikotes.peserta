<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Soal Materi Tiga</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Materi Tiga</li>
            <li class="breadcrumb-item active"><a href="#">Soal</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      @if ($waktu > 0)
        <div class="card">
          <div class="card-header ">
            <h3 class="card-title">
              <strong>Kolom 1</strong>
            </h3>
            <div class="card-tools" wire:ignore>
              Waktu Tersisa: <label id="countdown"></label>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <td colspan="4">
                  <strong>Soal:</strong>
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
                <td colspan="5">
                  <strong>Jawaban:</strong>
                </td>
              <tr>
              </tr>
              @php
                $jawaban = json_decode($tampil->ruangKerjaMateriTiga->soal);
              @endphp
              @foreach ($jawaban as $index => $row)
                <td class="text-center">
                  <button class="btn btn-success" style="width: 100%" wire:click="submit({{ $index }})">
                    <h4>{{ $row }}</h4>
                  </button><br>
                  @switch($index)
                    @case(0)
                      {{ 'a' }}
                    @break

                    @case(1)
                      {{ 'b' }}
                    @break

                    @case(2)
                      {{ 'c' }}
                    @break

                    @case(3)
                      {{ 'd' }}
                    @break

                    @case(4)
                      {{ 'e' }}
                    @break
                  @endswitch
                </td>
              @endforeach
              </tr>
            </table>
          </div>
        </div>
      @else
        @php
          redirect('/materitiga/' . $key . '/2');
        @endphp
      @endif
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

          document.getElementById('countdown').innerHTML = hours + ' jam ';
          document.getElementById('countdown').innerHTML += minutes + ' menit ';
          document.getElementById('countdown').innerHTML += seconds + ' detik ';
        }
        timer = setInterval(showRemaining, 1000);
      }
    </script>
  @endpush
</div>
