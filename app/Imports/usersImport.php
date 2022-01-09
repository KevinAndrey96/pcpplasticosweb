<?php

namespace App\Imports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\PriceList;
use Illuminate\Support\Facades\Hash;
use Exception;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;


class usersImport implements ToModel, WithStartRow, SkipsOnError
{
    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $list = PriceList::where('name', 'like', $row[12])->first();
    
        if ($list != null) {
            $id = $list->id;
        } else {
            $id = null;
        }
            return new User([
                'name' => $row[1],
                'document_type' => $row[2],
                'document_number' => $row[3],
                'phone' => $row[4], 
                'email' => $row[5],
                'country' => $row[6],
                'city' => $row[7],
                'role' => $row[8],
                'image' => $row[9],
                'establishment_name' => $row[10],
                'password' => Hash::make($row[11]), 
                'price_list_id' => $id,
            ]);
        
    }
}
