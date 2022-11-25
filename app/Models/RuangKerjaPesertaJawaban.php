<?php

namespace App\Models;

use App\Models\Scopes\Peserta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKerjaPesertaJawaban extends Model
{
  use HasFactory;
  protected $table = "ruang_kerja_peserta_jawaban";
  protected $fillable = [
    'ruang_kerja_peserta_id', 'jawaban', 'ruang_kerja_materi_satu_id', 'nilai',
  ];

  public function ruangKerjaPeserta()
  {
    return $this->belongsTo(RuangKerjaPeserta::class);
  }

  public function ruangKerjaMateriSatu()
  {
    return $this->belongsTo(RuangKerjaMateriSatu::class);
  }

  public function ruangKerjaMateriDua()
  {
    return $this->belongsTo(RuangKerjaMateriDua::class);
  }

  public function ruangKerjaMateriTiga()
  {
    return $this->belongsTo(RuangKerjaMateriTiga::class);
  }

  protected static function booted()
  {
    static::addGlobalScope(new Peserta);
  }
}
