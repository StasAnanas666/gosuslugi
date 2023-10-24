<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard() {
        $user = auth()->user();
        $orders = $user->orders;

        return view('users.dashboard', compact('orders'));
    }
}
