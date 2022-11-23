<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'pengguna';

  protected $fillable = [
    'nama', 'no_peserta', 'kata_sandi',
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
