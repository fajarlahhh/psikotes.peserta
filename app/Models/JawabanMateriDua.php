<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMateriDua extends Model
{
  use HasFactory;
  protected $table = "jawaban_materi_dua";

  protected $fillable = ['jawaban', 'waktu'];

  public function pengguna()
  {
    return $this->belongsTo(Pengguna::class);
  }

  public function materiDua()
  {
    return $this->belongsTo(MateriDua::class);
  }
}
