<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hasil Materi Tiga</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Materi Tiga</li>
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
            <tr>
              <th></th>
              @for ($i = 1; $i < 11; $i++)
                <th>Kolom {{ $i }}</th>
              @endfor
            </tr>
            <tr>
              <th>JUMlAH BENAR</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->first()->nilai }}</td>
              @endfor
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
