<?php

namespace App\Models;

use App\Models\Scopes\Peserta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKerja extends Model
{
  use HasFactory;

  protected $table = "ruang_kerja";

  public function ruangKerjaMateriSatu()
  {
    return $this->hasMany(RuangKerjaMateriSatu::class);
  }

  public function ruangKerjaMateriDua()
  {
    return $this->hasMany(RuangKerjaMateriDua::class);
  }

  public function ruangKerjaMateriTiga()
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
