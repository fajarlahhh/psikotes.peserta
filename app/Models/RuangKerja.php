<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuangKerja extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = "ruang_kerja";

  public function materiSatu()
  {
    return $this->belongsTo(MateriSatu::class);
  }

  public function materiDua()
  {
    return $this->belongsTo(MateriDua::class);
  }

  public function materiTiga()
  {
    return $this->belongsTo(MateriTiga::class);
  }

  public function peserta()
  {
    return $this->hasMany(Pengguna::class);
  }
}
