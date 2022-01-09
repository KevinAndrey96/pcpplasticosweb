<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToModel, WithStartRow
{
    private $id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        if ($this->id == 'all') {

            if(Product::find($row[0]) == null){
                Product::create([
                    'id' => intval($row[0]),
                    'list_id' => intval($row[1]),
                    'name' => $row[4],
                    'price' => doubleval($row[5]),
                    'code' => $row[6],
                    'image'=> $row[7],
                    'url' => $row[8],
                ]);
            } else {
                Product::where('id', '=', $row[0])
                        ->update(
                            [
                                'list_id' => intval($row[1]),
                                'name' => $row[4],
                                'price' => doubleval($row[5]),
                                'code' => $row[6],
                                'image'=> $row[7],
                                'url' => $row[8],
                            ]);

            }

        } elseif ($row[1] == $this->id) {
                if(Product::find($row[0]) == null){
                    Product::create([
                        'id' => intval($row[0]),
                        'list_id' => intval($row[1]),
                        'name' => $row[2],
                        'price' => doubleval($row[3]),
                        'code' => $row[4],
                        'image'=> $row[5],
                        'url' => $row[6],

                    ]);
                } else {
                    Product::where('id', '=', $row[0])
                            ->update(
                                [
                                    'list_id' => intval($row[1]),
                                    'name' => $row[2],
                                    'price' => doubleval($row[3]),
                                    'code' => $row[4],
                                    'image'=> $row[5],
                                    'url' => $row[6],
                                ]);
                }
            }
        }
}
