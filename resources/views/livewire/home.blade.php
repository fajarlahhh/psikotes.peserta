<div>
  <br>
  <div class="content">
    <div class="container text-center">
      <div class="alert alert-info">
        <p>
          Anda terdaftar sebagai peserta pada
          @if ($data->materi_satu_id)
            Materi 1{{ $data->materi_dua_id || $data->materi_dua_id ? ', ' : '' }}
          @endif
          @if ($data->materi_dua_id)
            Materi 2{{ $data->materi_tiga_id ? ', ' : '' }}
          @endif
          @if ($data->materi_tiga_id)
            Materi 3
          @endif
          <br>
          Klik tombol di bawah ini untuk memulai
        </p>
        <button class="btn btn-primary" wire:click="mulai">Mulai</button>
      </div>
    </div>
  </div>
</div>
