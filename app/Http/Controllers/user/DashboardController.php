<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view("user.dashboard.index");
    }

    public function about() {
        return view('user.dashboard.about');
    }

    public function service() {
        return view('user.dashboard.service');
    }

    public function contact() {
        return view('user.dashboard.contact');
    }
}
