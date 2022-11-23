<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriTigaSubDetail extends Model
{
  use HasFactory;
  protected $table = "materi_tiga_sub_detail";
  protected $fillable = ['materi_tiga_detail_id', 'a', 'b', 'c', 'd', 'e', 'kunci'];
}
