<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Http\Requests\StoreLaptopRequest;
use App\Http\Requests\UpdateLaptopRequest;
use Illuminate\Http\Request;

class LaptopController extends Controller
{

    public function index()
    {
        $laptop = Laptop::all();
        return view("list-laptop", compact('laptop'));
    }



    public function create()
    {
        return view("form-laptop");
    }



    public function store(Request $request)
    {
        Laptop::create([
            'brand' => $request ->brand,
            'model' => $request ->model,
            'processor' => $request ->processor,
            'ram' => $request ->ram,
        ]);

        return redirect('/');
    }



    public function show(Laptop $laptop)
    {
        //
    }



    public function edit($id)
    {
        // Cari laptop di database berdasarkan id yang diklik
        $laptop = Laptop::find($id);
        return view("edit-laptop", compact('laptop'));
    }



    public function update(Request $request)
    {
        // Cari data laptop yang mau diupdate berdasarkan id yang dikirim form
        $laptop = Laptop::find($request->id);

        $laptop->update([
            'brand'     => $request->brand,
            'model'     => $request->model,
            'processor' => $request->processor,
            'ram'       => $request->ram,
        ]);
        return redirect('/');
    }



    public function destroy(Request $request)
    {
        Laptop::destroy ($request->id);
        return redirect('/');
    }
}
