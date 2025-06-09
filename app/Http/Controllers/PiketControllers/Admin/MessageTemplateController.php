<?php

namespace App\Http\Controllers\PiketControllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\MessageTemplate;
use App\Http\Controllers\Controller;

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalSiswa = Student::count();
        $templates = MessageTemplate::all();
        return view('absencePages.admin.pages.view-template', compact('templates', 'totalSiswa'));
    }

    public function edit(MessageTemplate $messageTemplate)
    {
        $totalSiswa = Student::count();
        return view('absencePages.admin.pages.edit-template', compact('messageTemplate', 'totalSiswa'));
    }

    public function update(Request $request, MessageTemplate $messageTemplate)
    {
        $request->validate([
            'template' => 'required|string',
        ]);

        $messageTemplate->update([
            'template' => $request->template,
            'description' => $request->description,
        ]);

        return redirect()->route('message-templates.index')
            ->with('success', 'Template berhasil diperbarui');
    }
}
