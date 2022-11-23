<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hasil Materi Dua</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Materi Dua</li>
            <li class="breadcrumb-item active"><a href="#">Hasil</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            @foreach ($aspek as $row)
              <tr>
                <th style="width: 300px">{{ $row['aspek'] }}</th>
                <th style="width: 10px">:</th>
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
  </section>
</div>
