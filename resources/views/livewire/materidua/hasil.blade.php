<div>
  <div class="content">
    <br>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h4>Hasil Materi Dua</h4>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>Aspek</th>
              <th>Nilai</th>
            </tr>
            @foreach ($aspek as $row)
              <tr>
                <td>{{ $row['aspek'] }}</td>
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
  <br>
</div>
