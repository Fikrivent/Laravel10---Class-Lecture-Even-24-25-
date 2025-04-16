<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // RAW
        $foods = DB::select("select * from foods");

        // Query Builder
        $foods = DB::table("foods as f")->get();
       

        // Model / ORM
        $foods = Food::all();
        $foods = $foods->sortBy("price");

        return view("food.index", compact('foods'));
        // dd($foods);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(Food $food)
    // {
    //     //
    //     dd($food);
    // }

    public function show($id)
    {
        //
        $current_food = Food::find($id);
        return view('food.show', compact('current_food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
