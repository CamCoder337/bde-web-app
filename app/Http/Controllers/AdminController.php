<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin()){
            return view('dashboard');
       }
       else{
           return redirect(route('home.index'));
       }
        
    }

    public function eventForm()
    {
        if(auth()->user()->isAdmin()){
            return view('admin.add_event');
        }
        redirect(route('home.index'));
       
    }
    public function addEvent(CreateEventRequest $request)
    {
        if(auth()->user()->isAdmin()){
            /** @var UploadedFile|null $image */
            $image = $request->validated('image');
            $imagePath = $image->store('events','public');

            $idea = Event::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'start_date' => $request->input('start_date'),
        ]);
        return redirect(route('dashboard'))->with('success', 'Your event was added !!!');
        
        }
        return redirect(route('home.index'));
    }

    public function productForm()
    {
        if(auth()->user()){
            $categories = Category::All();
            return view('admin.add_product', ['categories'=>$categories]);
        }
        redirect(route('home.index'));
       
    }
    public function addProduct(CreateProductRequest $request)
    {
        if(auth()->user()->isAdmin()){
            /** @var UploadedFile|null $image */
            $image = $request->validated('image');
            $imagePath = $image->store('products','public');

            $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'active' => 1,
        ]);
        return redirect(route('dashboard'))->with('success', 'Your product was added !!!');
        
        }
        return redirect(route('home.index'));
    }

    
}
