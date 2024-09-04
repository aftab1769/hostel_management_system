<?php

namespace App\Http\Controllers\user;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index() {
        return view('user.student.index', [
            'rooms' => Room::with('students')->get()
        ]);
    }
}
