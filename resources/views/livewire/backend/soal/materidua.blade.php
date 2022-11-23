<div>
  <div class="card">
    <div class="card-header form-inline">
      Jenis :&nbsp;
      <select wire:model="jenis" class="form-control">
        @for ($i = 1; $i < 21; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
    <div class="card-body table-responsive">
      @if ($data->count() > 0)
        <table class="table">
          <tr>
            <th>No.</th>
            <th>Soal</th>
            <th>Kunci</th>
            <th>Aspek</th>
          </tr>
          @foreach ($data as $i => $row)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $row->soal }}</td>
              <td>{{ $row->kunci }}</td>
              <td>{{ $row->aspek }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="5" class="text-center">
              @if ($key == $jenis)
                <button class="btn btn-danger" wire:click="hapus">Ya, Hapus</button>
                <button class="btn btn-secondary" wire:click="batal">Batal</button>
              @else
                <button class="btn btn-danger" wire:click="setKey({{ $jenis }})"
                  class="btn btn-danger">Hapus</button>
              @endif
            </td>
          </tr>
        </table>
      @else
        <form wire:submit.prevent="submit" class="text-center">
          <label>File Soal</label>
          <br>
          <input type="file" wire:model.defer="fileSoal" class="form-control"
            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
          <br>
          <br>
          <input class="btn btn-success" type="submit" value="Simpan">
        </form>
      @endif
    </div>
  </div>
  <x-alert />
  <x-info />
</div>
