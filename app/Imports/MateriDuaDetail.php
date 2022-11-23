<?php

namespace App\Imports;

use App\Models\MateriDuaDetail as ModelsMateriDuaDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class MateriDuaDetail implements ToModel
{
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function model(array $row)
  {
    return new ModelsMateriDuaDetail([
      'materi_dua_id' => $this->id,
      'soal' => $row[0],
      'kunci' => $row[1],
      'aspek' => $row[2],
    ]);
  }
}
