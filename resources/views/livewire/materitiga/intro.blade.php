<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Materi Tiga</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Materi Tiga</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-body">
          @php
            echo $data->isi;
          @endphp
        </div>
        <div class="card-footer text-center">
          <a href="javascript:;" wire:click="mulai" class="btn btn-success">Mulai</a>
        </div>
      </div>
    </div>
  </section>
</div>
