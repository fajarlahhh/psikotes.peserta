<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianPeserta extends Model
{
  use HasFactory;
  protected $table = "ujian_peserta";
  protected $fillable = ['uid', 'nama', 'ujian_id', 'kata_sandi'];

  public function ujian()
  {
    return $this->belongsTo(Ujian::class);
  }
}
