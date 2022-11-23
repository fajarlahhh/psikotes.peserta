<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ruang Kerja</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Ruang Kerja</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-primary" href="/admin/ruangkerja/tambah">Tambah</a>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Deskripsi</th>
                    <th>Materi Satu</th>
                    <th>Materi Dua</th>
                    <th>Materi Tiga</th>
                    <th>Waktu</th>
                    <th>Peserta</th>
                    <th style="width: 10px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $i => $row)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $row->deskripsi }}</td>
                      <td>
                        @php
                          if ($row->materi_satu_id) {
                              echo 'Jumlah Soal : ' . $row->materiSatu->detail->count();
                          }
                        @endphp
                      </td>
                      <td>
                        @php
                          if ($row->materi_dua_id) {
                              echo 'Jumlah Soal : ' . $row->materiDua->detail->count();
                          }
                        @endphp
                      </td>
                      <td>
                        @php
                          if ($row->materi_tiga_id) {
                              echo 'Jumlah Soal : ' . $row->materiTiga->detail->count();
                          }
                        @endphp
                      </td>
                      <td>{{ CarbonInterval::seconds($row->waktu)->cascade()->forHumans() }}</td>
                      <td>{{ $row->peserta->count() }}</td>
                      <td>
                        @if ($row->getKey() == $key)
                          <button class="btn btn-success btn-sm" wire:click="hapus">Ya, Hapus</button>
                          <button class="btn btn-danger btn-sm" wire:click="setKey">Batal</button>
                        @else
                          <a class="btn btn-info btn-sm" href="/admin/datapeserta/edit/{{ $row->getKey() }}">Edit</a>
                          <button class="btn btn-danger btn-sm" wire:click="setKey({{ $row->getKey() }})">Hapus</button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-10">
                  {{ $data->links() }}
                </div>
                <div class="col-md-2 text-right">
                  Data : {{ $data->total() }}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
