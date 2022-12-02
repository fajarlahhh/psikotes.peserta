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
              <th>JUMlAH BENAR</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->sum('nilai') }}</td>
              @endfor
            </tr>
            <tr>
              <th>JUMlAH YANG DIKERJAKAN</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->whereNotNull('jawaban')->count() }}</td>
              @endfor
            </tr>
            <tr>
              <th>JUMlAH SALAH</th>
              @for ($i = 1; $i < 11; $i++)
                <td> {{ $data->where('kolom', $i)->where('nilai', 0)->count() }}</td>
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
