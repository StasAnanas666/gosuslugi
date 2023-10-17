<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Service;

class ServiceController extends Controller
{
    function index() {
        $services = Service::all();
        return view('services.services', compact('services'));
    }

    function store(Request $request):RedirectResponse {
        $service = new Service;
        $service->name = $request->name;
        $service->save();
        return redirect('/')->with('success', 'Услуга успешно добавлена.');
    }
}
