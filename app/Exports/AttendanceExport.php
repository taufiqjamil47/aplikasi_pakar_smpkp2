<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Absensi;
use Carbon\Carbon;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping
{
    protected $classroomId;
    protected $startDate;
    protected $endDate;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($classroomId, $startDate, $endDate)
    {
        $this->classroomId = $classroomId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Student::with(['absensi' => function ($query) {
            $query->whereBetween('tanggal', [$this->startDate, $this->endDate]);
        }])
            ->where('classroom_id', $this->classroomId)
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'L/P',
            'Sakit',
            'Izin',
            'Alfa'
        ];
    }

    public function map($student): array
    {
        $sakit = $student->absensi->where('status', 'Sakit')->count();
        $izin = $student->absensi->where('status', 'Izin')->count();
        $alfa = $student->absensi->where('status', 'Alfa')->count();

        return [
            $student->id,
            $student->nama_siswa,
            $student->jenis_kelamin === 'Laki-laki' ? 'L' : 'P',
            $sakit,
            $izin,
            $alfa
        ];
    }
}
