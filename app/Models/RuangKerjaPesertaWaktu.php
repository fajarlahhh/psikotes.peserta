<?php

namespace App\Models;

use App\Models\Scopes\Peserta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKerjaPesertaWaktu extends Model
{
  use HasFactory;
  protected $table = "ruang_kerja_peserta_waktu";

  public function ruangKerjaPeserta()
  {
    return $this->belongsTo(RuangKerjaPeserta::class);
  }

  protected static function booted()
  {
    static::addGlobalScope(new Peserta);
  }
}
