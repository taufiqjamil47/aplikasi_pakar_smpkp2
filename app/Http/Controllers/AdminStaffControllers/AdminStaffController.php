<?php

namespace App\Http\Controllers\AdminStaffControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStaffController extends Controller
{
    public function index()
    {
        return view('adminStaffPages.pages.home');
    }
}
