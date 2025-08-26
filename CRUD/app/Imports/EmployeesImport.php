<?php

namespace App\Imports;

use App\Models\employee;
use App\Models\department;
use App\Models\designation;


use Illuminate\Support\Collection;


use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class EmployeesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {


        Validator::make($rows->toArray(), [
            '*.full_name'         => 'required|string',
            '*.contact_number'    => 'required|numeric',
            '*.email'             => 'required|email',
            '*.permanent_address' => 'required|string',
            '*.temporary_address' => 'nullable|string',
            '*.dep_name'          => 'required|string',
            '*.desig_name'        => 'required|string',
        ])->validate();


        foreach ($rows as $row) {
            $department = department::where('dep_name', $row['dep_name'])->first();
            if (!$department)
                throw new \exception("Department'{$row['dep_name']}' Not found , please add it first.");

            $designation = designation::where('desig_name', $row['desig_name'])->first();
            if (!$designation)

                throw new \exception("Designation'{$row['desig_name']}' Not found , please add it first");




            employee::firstOrCreate(
                ['email' => $row['email']],
                [
                    'full_name' => $row['full_name'],
                    'contact_number' => $row['contact_number'],
                    'email' => $row['email'],
                    'permanent_address' => $row['permanent_address'],
                    'temporary_address' => $row['temporary_address'],
                    'dep_id' => $department->dep_id,
                    'desig_id' => $designation->desig_id
                ]
            );
        }
    }
}
