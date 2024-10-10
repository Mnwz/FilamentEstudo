<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class StudentsExport implements FromCollection, withMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct(public Collection $records)
    {
        //
    }

    public function collection()
    {
        return $this->records;
    }

    public function map($student): array
    {
        return [
            $student->name,
            $student->email,
            $student->class->name,
            $student->section->name,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Class',
            'Section',
        ];
    }
}
