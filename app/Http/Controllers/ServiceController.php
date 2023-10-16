<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    function index() {
        return view('services.services');
    }

    function store(Request $request):RedirectResponse {
        $service = new Service;
        $service->name = $request->name;
        $service->save();
        return redirect('/flights');

        // $request->validate([
        //     'name' => 'required|string'
        // ]);

        // Service::create([
        //     'name' => $request->name
        // ]);
        // return redirect()->route('home')->with('success', 'Услуга успешно добавлена');
    }
}
