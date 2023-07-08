<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Edificio;

class EdificioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    // Esta línea es necesaria para que en una Mac se detecten 
    // correctamente los caracteres de nueva línea
    if (!ini_get("auto_detect_line_endings")) {
      ini_set("auto_detect_line_endings", '1');
    }

    $csv = Reader::createFromPath('database/seeders/faseiv.csv', 'r');

    // indicamos que el delimitador es el punto y coma
    $csv->setDelimiter(';');
    // Indicamos el índice de la fila de nombres de columnas
    $csv->setHeaderOffset(0);
    $records = $csv->getRecords();
    foreach ($records as $r) {
      $edificio = new Edificio();
      $edificio->descripcion =  mb_convert_encoding($r['descripcion'], 'UTF-8', 'ISO-8859-1');
      $edificio->codEdif =  $r['codEdif'];
      $edificio->latitud = $r['latitud'];
      $edificio->longitud = $r['longitud'];
      $edificio->grupo = $r['grupo'];
      $edificio->sigla = mb_convert_encoding($r['sigla'], 'UTF-8', 'ISO-8859-1');
      $edificio->localidad = $r['localidad'];
      $edificio->save();
      /*  dd($r); // para hacer debug en laravel*/
    }
  }
}
