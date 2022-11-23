<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Soal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Soal</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-three-satu-tab" data-toggle="pill"
                href="#custom-tabs-three-satu" role="tab" aria-controls="custom-tabs-three-satu"
                aria-selected="true">Materi Satu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-three-dua-tab" data-toggle="pill" href="#custom-tabs-three-dua"
                role="tab" aria-controls="custom-tabs-three-dua" aria-selected="false">Materi Dua</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-three-tiga-tab" data-toggle="pill" href="#custom-tabs-three-tiga"
                role="tab" aria-controls="custom-tabs-three-tiga" aria-selected="false">Materi Tiga</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-three-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-three-satu" role="tabpanel"
              aria-labelledby="custom-tabs-three-satu-tab">
              <livewire:backend.soal.materisatu />
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-dua" role="tabpanel"
              aria-labelledby="custom-tabs-three-dua-tab">
              <livewire:backend.soal.materidua />
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-tiga" role="tabpanel"
              aria-labelledby="custom-tabs-three-tiga-tab">
              <livewire:backend.soal.materitiga />
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
</div>
