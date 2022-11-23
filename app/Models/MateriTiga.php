<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriTiga extends Model
{
  use HasFactory;
  protected $table = "materi_tiga";
  public $incrementing = false;

  public function detail()
  {
    return $this->hasMany(MateriTigaDetail::class);
  }
}
