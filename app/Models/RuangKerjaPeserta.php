<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class RuangKerjaPeserta extends Authenticatable
{
  use Notifiable;
  protected $table = 'ruang_kerja_peserta';

  protected $fillable = [
    'nomor', 'nama', 'kata_sandi',
  ];

  protected $hidden = [
    'kata_sandi',
    'remember_token',
  ];

  public function getAuthPassword()
  {
    return $this->kata_sandi;
  }
}
