<div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Petunjuk Soal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Petunjuk Soal</li>
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
              <select class="form-control" wire:model="materi">
                <option value="1">Materi Satu</option>
                <option value="2">Materi Dua</option>
                <option value="3">Materi Tiga</option>
              </select>
            </div>
            <div class="card-body">
              <div wire:ignore>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Isi</label>
                  <textarea id="editor" rows="10">{{ $data->isi }}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <x-alert />
      <x-info />
    </div>
  </section>
  @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

    <script>
      ClassicEditor
        .create(document.querySelector('#editor'), {
          ckfinder: {
            uploadUrl: '{{ route('file.upload') . '?_token=' . csrf_token() }}',
            options: {
              resourceType: 'Images'
            }
          }
        }).then(soal => {
          soal.ui.focusTracker.on('change:isFocused', (evt, name, isFocused) => {
            if (!isFocused) {
              window.livewire.emit('set:setisi', soal.getData());
            }
          });
        })
        .catch(error => {
          console.error(error);
        });
    </script>
  @endpush
</div>
