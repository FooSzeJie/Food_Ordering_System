<?php

namespace App\Imports;

use Illuminate\Support\Facades\Log;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCategory implements ToModel, WithHeadingRow
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
            return new Category([
                'name' => $row['name'] ?? "null",
                'status' => $row['status'] ?? 0,
            ]);
        } catch (\Exception $e) {
            Log::error('Error importing product: ' . $e->getMessage());
            return null;
        }
    }
}
