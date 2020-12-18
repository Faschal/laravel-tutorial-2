<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Exports\EmployeeExport;
use Excel;
use App\Imports\EmployeeImport;
use App\DataTables\EmployeeDataTable;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $employee = [
            ["name" => "Alice", "email" => "alice@gmail.com", "phone" => "1234567890", "salary" => "2000000", "departement" => "Accounting"],
            ["name" => "Andrew", "email" => "andrew@gmail.com", "phone" => "123451234", "salary" => "2400000", "departement" => "Marketing"],
            ["name" => "Mike", "email" => "mike@gmail.com", "phone" => "1234561233", "salary" => "2100000", "departement" => "Quality"],
            ["name" => "Sophie", "email" => "sophie@gmail.com", "phone" => "8923427483", "salary" => "23000000", "departement" => "Accounting"],
            ["name" => "Steve", "email" => "steve@gmail.com", "phone" => "9013224278", "salary" => "2500000", "departement" => "Marketing"]

        ];
        Employee::insert($employee);
        return "Records are inserted";

    }

    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    }

    public function exportIntoCsv()
    {
        return Excel::download(new EmployeeExport, 'employeelist.csv');
    }

    public function showImportForm()
    {
        return view('import-form');
    }

    public function importForm(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return "Record are imported successfully";
    }

    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employees');
    }
}
