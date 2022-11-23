<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriTigaDetail extends Model
{
  use HasFactory;
  protected $table = "materi_tiga_detail";
  protected $fillable = ['materi_tiga_id', 'a', 'b', 'c', 'd', 'e', 'kunci'];

  public function detail()
  {
    return $this->hasMany(MateriTigaSubDetail::class);
  }
}
