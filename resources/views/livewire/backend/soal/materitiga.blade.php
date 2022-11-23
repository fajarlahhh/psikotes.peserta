<div>
  <div class="card">
    <div class="card-header form-inline">
      Jenis :&nbsp;
      <select wire:model="jenis" class="form-control">
        <option value="1">Angka</option>
        <option value="2">Huruf</option>
        <option value="3">Simbol</option>
      </select>
    </div>
    <div class="card-body table-responsive  p-0">
      <table class="table table-borderless">
        <tr>
          @for ($i = 1; $i <= 10; $i++)
            <td>
              <table class="table table-bordered">
                @php
                  $kolom = $data->where('kolom', $i)->first();
                @endphp
                <tr>
                  <th colspan="5" class="bg-primary">KOLOM {{ $i }}</th>
                </tr>
                <tr>
                  <th class="text-center">a</th>
                  <th class="text-center">b</th>
                  <th class="text-center">c</th>
                  <th class="text-center">d</th>
                  <th class="text-center">e</th>
                </tr>
                @if ($kolom)
                  <tr>
                    <th class="text-center">{{ $kolom['a'] }}</th>
                    <th class="text-center">{{ $kolom['b'] }}</th>
                    <th class="text-center">{{ $kolom['c'] }}</th>
                    <th class="text-center">{{ $kolom['d'] }}</th>
                    <th class="text-center">{{ $kolom['e'] }}</th>
                  </tr>
                @else
                  <tr>
                    <td><input type="text" wire:model.defer="soalKolom.{{ $i }}.a"
                        class="form-control text-center" style="width: 50px"></td>
                    <td><input type="text" wire:model.defer="soalKolom.{{ $i }}.b"
                        class="form-control text-center" style="width: 50px"></td>
                    <td><input type="text" wire:model.defer="soalKolom.{{ $i }}.c"
                        class="form-control text-center" style="width: 50px"></td>
                    <td><input type="text" wire:model.defer="soalKolom.{{ $i }}.d"
                        class="form-control text-center" style="width: 50px"></td>
                    <td><input type="text" wire:model.defer="soalKolom.{{ $i }}.e"
                        class="form-control text-center" style="width: 50px"></td>
                  </tr>
                @endif
                <tr>
                  <th colspan="5" class="bg-secondary">Soal</th>
                </tr>
                @if ($kolom)
                  @foreach ($kolom['detail'] as $row)
                    <tr>
                      <td class="text-center">{{ $row['a'] }}</td>
                      <td class="text-center">{{ $row['b'] }}</td>
                      <td class="text-center">{{ $row['c'] }}</td>
                      <td class="text-center">{{ $row['d'] }}</td>
                      <td class="text-center">{{ $row['kunci'] }}</td>
                    </tr>
                  @endforeach
                  <tr>
                    <td colspan="5" class="text-center">
                      @if ($key == $kolom['id'])
                        <button class="btn btn-danger" wire:click="hapus">Ya, Hapus</button>
                        <button class="btn btn-secondary" wire:click="batal">Batal</button>
                      @else
                        <button class="btn btn-danger" wire:click="setKey({{ $kolom['id'] }})"
                          class="btn btn-danger">Hapus</button>
                      @endif
                    </td>
                  </tr>
                @else
                  <tr>
                    <td colspan="5" class="text-center">
                      <input type="file" wire:model.defer="file.{{ $i }}"
                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5" class="text-center">
                      <button class="btn btn-success" wire:click="simpan({{ $i }})">Simpan Kolom
                        1</button>
                    </td>
                  </tr>
                @endif
              </table>
            </td>
          @endfor
        </tr>
      </table>
    </div>
  </div>
  <x-alert />
  <x-info />
</div>
