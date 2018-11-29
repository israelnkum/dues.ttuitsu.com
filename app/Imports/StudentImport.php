<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
    public function model(array $row)
    {
        return new Student([
            'firstName'     => $row[0],
            'lastName'    => $row[1],
            'otherName' => $row[2],
            'indexNumber' => $row[3],
            'level'    => $row[4],


            ]);
    }
}
