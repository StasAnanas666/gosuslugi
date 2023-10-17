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

        $imagePath = null;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        // $imagePath = $request->file('image');
        // $imagePath->move(base_path('images'), $imagePath->getClientOriginalName());

        $service = new Service;
        $service->name = $request->name;
        $service->image = $imagePath;
        $service->price = $request->price;
        $service->description = $request->description;

        $service->save();

        return redirect('/')->with('success', 'Услуга успешно добавлена.');
    }
}
