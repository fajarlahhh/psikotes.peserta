<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <h4>Materi Tiga</h4>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="alert alert-info text-center">
            <h5><strong class="text-danger">Mohon tunggu...</strong><br>Sedang mempersiapkan halaman kolom
              {{ $kolom }}<br>
              <label id="countdown" class="text-blue">00:00:03</label>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
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
            window.livewire.emit('selanjutnya');
            clearInterval(timer);
            return;
          }

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
