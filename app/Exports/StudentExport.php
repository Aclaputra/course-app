<?php

namespace App\Exports;

use App\Models\Enrollment;
use App\Models\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
            'StudentName',
            'StudentSemester',
        ];
    }
    public function collection()
    {
        return Students::select('Students.StudentName', 'Students.StudentGPA')
                        ->get();
    }
}
