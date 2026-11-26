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
        $data = $request->validate([
            'brand' => 'required|string|max:225',
            'model' => 'required|string|max:225',
            'processor' => 'required|string|max:225',
            'ram' => 'required|numeric|min:0',
        ], [
            'brand.required' => 'Please enter the laptop brand.',
            'model.required' => 'Please enter the laptop model.',
            'processor.required' => 'Please enter the processor.',
            'ram.required' => 'Please enter the RAM capacity.',
            'ram.numeric' => 'RAM must be a number.',
            'ram.min' => 'RAM cannot be negative.',
        ]);

        Laptop::create($data);

        return redirect('/');
    }




    public function show(Laptop $laptop)
    {
        return view('list-laptop', compact('laptop'));
    }



    public function edit(Laptop $laptop) {
        return view('edit-laptop', compact('laptop'));
    }




    public function update(Request $request, Laptop $laptop)
    {
        $data = $request->validate([
            'brand' => 'required|string|max:225',
            'model' => 'required|string|max:225',
            'processor' => 'required|string|max:225',
            'ram' => 'required|numeric|min:0',
        ], [
            'brand.required' => 'Please enter the laptop brand.',
            'model.required' => 'Please enter the laptop model.',
            'processor.required' => 'Please enter the processor.',
            'ram.required' => 'Please enter the RAM capacity.',
            'ram.numeric' => 'RAM must be a number.',
            'ram.min' => 'RAM cannot be negative.',
        ]);

        $laptop->update($data);

        return redirect('/');
    }




    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect('/');
    }
}
