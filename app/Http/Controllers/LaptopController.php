<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Http\Requests\StoreLaptopRequest;
use App\Http\Requests\UpdateLaptopRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LaptopController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $search = $request->query('search', '');
        $laptop = Laptop::where('brand', 'like', '%' . $search . "%")
                    ->orderBy('id')->paginate(3)->withQueryString();
        return view("list-laptop", compact('laptop', 'user', 'id'));
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
            'image' => 'required|image|max:2048'
        ], [
            'brand.required' => 'Please enter the laptop brand.',
            'model.required' => 'Please enter the laptop model.',
            'processor.required' => 'Please enter the processor.',
            'ram.required' => 'Please enter the RAM capacity.',
            'ram.numeric' => 'RAM must be a number.',
            'ram.min' => 'RAM cannot be negative.',
            'image.max' => 'Image size must be below 2mb.',
        ]);

        $data['image'] = $request->file('image')->store('products','public');

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
            'image' => 'required|image|max:2048'
        ], [
            'brand.required' => 'Please enter the laptop brand.',
            'model.required' => 'Please enter the laptop model.',
            'processor.required' => 'Please enter the processor.',
            'ram.required' => 'Please enter the RAM capacity.',
            'ram.numeric' => 'RAM must be a number.',
            'ram.min' => 'RAM cannot be negative.',
        ]);

        if ($request->hasFile('image')){
            $old = $laptop->image;
            $data['image'] = $request->file('image')->store('products', 'public');
            if($old) Storage::disk('public')->delete("$old");
        }

        $laptop->update($data);
        return redirect('/');
    }




    public function destroy(Laptop $laptop)
    {
        if ($laptop->image){
            Storage::disk('public')->delete($laptop->image);
        }
        $laptop->delete();
        return redirect('/');
    }
}
