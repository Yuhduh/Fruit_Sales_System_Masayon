<?php

namespace App\Http\Controllers;

use App\Models\fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruit = fruit::all();
        return view('fruit', compact('fruit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        fruit::create([
            'fruit_name'=>request('fruit_name'),
            'category'=>request('category'),
            'price'=>request('price'),
            'stock_quantity'=>request('stock_quantity'),
            'description'=>request('description'),
            'is_available'=>request('is_available')
        ]);

        return redirect('/fruit');
    }

    /**
     * Display the specified resource.
     */
    public function show(fruit $fruit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fruit $fruit)
    {
        $fruit = fruit::findorFail($fruit->id);
        return view('fruit-edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fruit $fruit)
    {
        $fruit = fruit::findorFail($fruit->id)->update([
            'fruit_name'=>request('fruit_name'),
            'category'=>request('category'),
            'price'=>request('price'),
            'stock_quantity'=>request('stock_quantity'),
            'description'=>request('description'),
            'is_available'=>request('is_available')
        ]);
        return redirect('/fruit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fruit $fruit)
    {
        $fruit = fruit::findorFail($fruit->id)->delete();
        return redirect('/fruit');
    }
}
