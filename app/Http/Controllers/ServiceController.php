<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\AdditionalService;
use App\Models\Order;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        return redirect('/home')->with('success', 'Услуга успешно добавлена.');
    }

    public function orderPage() {
        return view('orders.orders');
    }

    public function order(Service $service) {
        session(['selected-service' => $service]);
        $additionalService = $service->additionalServices;
        session(['additional-service' => $additionalService]);
        
        return redirect(route('order_page'));
    }

    public function save(Request $request):RedirectResponse {
        $userId = Auth::id();

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $request->input('total_price'),
            'order_date' => Carbon::now('Europe/Moscow'),
            'status' => 'Оформлен'
        ]);
        // dd($order);
        session()->forget('selected-service');
        session()->forget('additional-service');
        
        return redirect()->route('home');
    }
}
