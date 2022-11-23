<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriDua extends Model
{
  use HasFactory;
  protected $table = "materi_dua";
  public $incrementing = false;

  public function detail()
  {
    return $this->hasMany(MateriDuaDetail::class);
  }
}
