<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row['name'])) {
            return null;
        }

        return new Lead([
            'name'     => ['en' => $row['name'], 'ar' => $row['name']],
            'gender' => $row['gender'],
            'mobile_1' => $row['mobile'],
            'email' => $row['email'],
            'branch_id' => $row['branch_id'],
            'lead_source_id' => 6,
        ]);
    }
}
