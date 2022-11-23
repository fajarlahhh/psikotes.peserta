<?php

namespace App\Imports;

use App\Models\UjianPeserta as ModelsUjianPeserta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class UjianPeserta implements ToModel
{
  /**
   * @param array $row
   *
   * @return User|null
   */
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function model(array $row)
  {
    //
    return new ModelsUjianPeserta([
      'ujian_id' => $this->id,
      'nomor' => $row[0],
      'nama' => $row[1],
      'kata_sandi' => Hash::make(Str::random(6)),
    ]);
  }
}
