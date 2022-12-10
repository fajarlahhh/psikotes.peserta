<div>
  <br>
  <div class="content">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h4>Hasil Materi Tiga</h4>
        </div>
      </div>
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
              <th>JUMLAH BENAR</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 1)->count() }}</td>
              @endfor
            </tr>
            <tr>
              <th class="pt-0 pb-0">&nbsp;</th>
              @for ($i = 1; $i < 11; $i++)
                <td class="pt-0 pb-0">
                  <small>{{ $i == 1? '': $data->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 1)->count() -$data->whereNotNull('jawaban')->where('kolom', $i - 1)->where('nilai', 1)->count() }}</small>
                </td>
              @endfor
            </tr>
            <tr>
              <th>JUMLAH SALAH</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->whereNotNull('jawaban')->where('nilai', 0)->count() }}</td>
              @endfor
            </tr>
            <tr>
              <th>JUMLAH YANG DIKERJAKAN</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->whereNotNull('jawaban')->count() }}</td>
              @endfor
            </tr>
          </table>
          <br>
          <div class="text-center">
            <a href='/dashboard' class="btn btn-primary text-center">Home</a>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
