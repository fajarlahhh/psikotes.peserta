<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h4>Hasil Materi Satu</h4>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 300px">Kecerdasan Umum (Jumlah Benar)</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($benar) }}</td>
            </tr>
            @foreach ($aspek as $row)
              <tr>
                <th>{{ $row['aspek'] }}</th>
                <th>:</th>
                <td>{{ number_format($row['jumlah']) }}</td>
              </tr>
            @endforeach
          </table>
          <br>
          <div class="text-center">
            <a href="/" class="btn btn-primary text-center">Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
