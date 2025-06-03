<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use PHPUnit\Framework\MockObject\Builder\Stub;

class SearchStudent extends Component
{

    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = Student::where('nama_siswa', 'like', '%' . $this->search . '%')
            ->orWhere('asal_sekolah', 'like', '%' . $this->search . '%')
            ->orWhere('nik', 'like', '%' . $this->search . '%')
            ->orWhere('nisn', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc');

        $students = $query->paginate(20);

        $maxId = $query->max('id'); // Get the maximum ID from the filtered students

        return view('livewire.search-student', [
            'students' => $students,
            'maxId' => $maxId
        ]);
    }
}
