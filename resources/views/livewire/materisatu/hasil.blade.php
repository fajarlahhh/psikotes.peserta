<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Materi Satu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Dashboard</li>
            <li class="breadcrumb-item active"><a href="#">Hasil Materi Satu</a></li>
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
            <tr>
              <th style="width: 200px">Benar</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($benar) }}</td>
            </tr>
            <tr>
              <th style="width: 200px">Salah</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($salah) }}</td>
            </tr>
            <tr>
              <th style="width: 200px">Tidak Terjawab</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($belum) }}</td>
            </tr>
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
