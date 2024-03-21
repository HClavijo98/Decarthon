<?php

namespace App\Http\Controllers;

use App\Models\Sugestion_box;
use Illuminate\Http\Request;

class SugestionBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sugestion = new Sugestion_box();
        $sugestion->title = $request->title;
        $sugestion->body = $request->body;
        $sugestion->product_id = $request->product_id;
        $sugestion->user_id = $request->user_id;

        $sugestion->save();
        return redirect()->back();
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
    public function show(Sugestion_box $sugestion_box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sugestion_box $sugestion_box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sugestion_box $sugestion_box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sugestion_box $sugestion_box)
    {
        //
    }
}
