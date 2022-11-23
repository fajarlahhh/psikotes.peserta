<?php

namespace App\Models;

use App\Models\Scopes\Peserta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKerja extends Model
{
  use HasFactory;

  protected $table = "ruang_kerja";

  public function materiSatu()
  {
    return $this->hasMany(RuangKerjaMateriSatu::class);
  }

  public function materiDua()
  {
    return $this->hasMany(RuangKerjaMateriDua::class);
  }

  public function materiTiga()
  {
    return $this->hasMany(RuangKerjaMateriTiga::class);
  }

  public function ruangKerjaPeserta()
  {
    return $this->hasMany(RuangKerjaPeserta::class);
  }

  protected static function booted()
  {
    static::addGlobalScope(new Peserta);
  }
}
