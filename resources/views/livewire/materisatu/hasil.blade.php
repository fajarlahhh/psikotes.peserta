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
              <th>Aspek</th>
              <th>Nilai</th>
            </tr>
            <tr>
              <td style="width: 300px">Kecerdasan Umum (Jumlah Benar)</td>
              <td class="text-end">{{ number_format($benar) }}</td>
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
            <a href="javascript:;" wire:click="selanjutnya({{ $key }})"
              class="btn btn-primary text-center">Lanjut ke materi selanjutnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
