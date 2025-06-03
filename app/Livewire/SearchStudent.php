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
        $students = Student::where('nama_siswa', 'like', '%' . $this->search . '%')
            ->orWhere('asal_sekolah', 'like', '%' . $this->search . '%')
            ->orWhere->orWhere('nik', 'like', '%' . $this->search . '%')
            ->orWhere->orWhere('nisn', 'like', '%' . $this->search . '%')
            ->paginate(20);
        return view(
            'livewire.search-student',
            [
                'students' => $students
            ]
        );
    }
}
