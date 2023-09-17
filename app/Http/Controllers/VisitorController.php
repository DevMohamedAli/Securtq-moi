<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
// File
use Illuminate\Support\Facades\File;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        // Retrieve visitors with their nationality and gun relationships
        $visitors = Visitor::with('nationality', 'gun')
            ->search(request('search')) // Apply search filter
            ->filter(request('filters')) // Apply additional filters
            ->paginate(10) // Paginate the results with 10 items per page
            ->appends(request()->query()); // Append query parameters to pagination links
        // Return the visitors index page using Inertia.js




        return inertia('Visitor/Index', [
            'visitors' => $visitors,
            'filters' => request('filters'),
            'search' => request('search'),
            'nationalities' => \App\Models\Nationality::all(),
            'guns' => \App\Models\Gun::all(),

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Visitor/Create', [
            'nationalities' => \App\Models\Nationality::all(),
            'guns' => \App\Models\Gun::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_card_number' => 'required',
            'id_card_type' => 'required|in:idcard,passport',
            'work_place' => 'required',
            'picture' => 'required',
            'armed' => 'required|in:yes,no',
            'gun_id' => 'required|exists:guns,id',

        ]);

        $visitor = Visitor::create([
            'name' => $request->name,
            'id_card_number' => $request->id_card_number,
            'id_card_type' => $request->id_card_type,
            'work_place' => $request->work_place,
            'picture' => $request->picture,
            'armed' => $request->armed,
            'gun_id' => $request->gun_id,
        ]);

        return redirect()->back()->with('success', 'Visitor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
