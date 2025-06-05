<?php

namespace App\Http\Controllers\PiketControllers;

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
        $templates = MessageTemplate::all();
        return view('absencePages.pages.view-template', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageTemplate $messageTemplate)
    {
        return view('absencePages.pages.edit-template', compact('messageTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
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
