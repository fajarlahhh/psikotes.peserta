<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriDuaDetail extends Model
{
  use HasFactory;
  protected $table = "materi_dua_detail";
  protected $fillable = ['materi_dua_id', 'soal', 'kunci', 'aspek'];
}
