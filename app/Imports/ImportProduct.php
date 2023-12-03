<?php

namespace App\Imports;

use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            // Your existing code here
            return new Product([
                'name' => $row['name'] ?? "null",
                'description' => $row['description'] ?? "dd",
                'price' => $row['price'] ?? 0,
                'status' => $row['status'] ?? 0,
                'categoryID' => $row['categoryID'] ?? 1,
            ]);
        } catch (\Exception $e) {
            Log::error('Error importing product: ' . $e->getMessage());
            return null;
        }
    }
}
