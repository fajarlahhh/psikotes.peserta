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
    </div>
  </div>
</div>
