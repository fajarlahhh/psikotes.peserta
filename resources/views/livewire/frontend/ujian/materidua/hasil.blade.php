<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Materi Dua</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Dashboard</li>
            <li class="breadcrumb-item active"><a href="#">Hasil Materi Dua</a></li>
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
              <th style="width: 200px">Terjawab</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($terjawab) }}</td>
            </tr>
            <tr>
              <th style="width: 200px">Nilai</th>
              <th style="width: 10px">:</th>
              <td class="text-end">{{ number_format($nilai) }}</td>
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
