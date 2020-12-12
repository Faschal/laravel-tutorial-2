<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
class EmployeeImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'salary' => $row['salary'],
            'departement' => $row['departement'],
        ]);
    }
}
