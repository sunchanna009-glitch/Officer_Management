<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $officerCount = Officer::count();
        $departmentCount = Department::count();
        $latestOfficers = Officer::with('department')->latest()->take(5)->get();

        return view('dashboard', compact(
            'officerCount', 'departmentCount', 'latestOfficers'
        ));
    }
}
