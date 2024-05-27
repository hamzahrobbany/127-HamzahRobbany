<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        $recentTasks = Task::latest()->take(5)->get();

        return view('dashboard.index', compact('totalTasks', 'pendingTasks', 'completedTasks', 'recentTasks'));
    }
}
