<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMateriSatu extends Model
{
  use HasFactory;

  protected $table = "jawaban_materi_satu";

  protected $fillable = ['jawaban', 'waktu'];

  public function pengguna()
  {
    return $this->belongsTo(Pengguna::class);
  }

  public function materiSatu()
  {
    return $this->belongsTo(MateriSatu::class);
  }
}
