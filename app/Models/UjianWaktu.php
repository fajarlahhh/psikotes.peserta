<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianWaktu extends Model
{
  use HasFactory;
  protected $table = "ujian_waktu";

  public function ujian()
  {
    return $this->belongsTo(Ujian::class);
  }
}
