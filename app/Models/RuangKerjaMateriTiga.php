<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKerjaMateriTiga extends Model
{
  use HasFactory;
  protected $table = "ruang_kerja_materi_tiga";

  public function ruangKerjaPesertaJawaban()
  {
    return $this->hasOne(RuangKerjaPesertaJawaban::class);
  }

  public function ruangKerja()
  {
    return $this->belongsTo(RuangKerja::class);
  }
}
