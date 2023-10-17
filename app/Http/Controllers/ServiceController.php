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
        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes: jpg, jpeg, png, webp',
            'price' => 'numeric',
            'description' => 'string'
        ]);

        $imagePath = null;
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $service = new Service;
        $service->name = $request->name;
        $service->image = $imagePath;
        $service->price = $request->price;
        $service->description = $request->description;

        $service->save();
        
        return redirect('/')->with('success', 'Услуга успешно добавлена.');
    }
}
