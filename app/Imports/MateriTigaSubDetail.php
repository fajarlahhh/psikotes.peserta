<?php

namespace App\Imports;

use App\Models\MateriTigaSubDetail as ModelsMateriTigaSubDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class MateriTigaSubDetail implements ToModel
{
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function model(array $row)
  {
    return new ModelsMateriTigaSubDetail([
      'materi_tiga_detail_id' => $this->id,
      'a' => $row[0],
      'b' => $row[1],
      'c' => $row[2],
      'd' => $row[3],
      'kunci' => strtolower($row[4]),
    ]);
  }
}
