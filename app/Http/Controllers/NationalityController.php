<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nationalities = \App\Models\Nationality::all();
        return Inertia::render('Nationality/Index', [
            'nationalities' => $nationalities
        ]);
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
        $validated = $request->validate([
            'name' => 'required|unique:nationalities',
        ]);

        $nationality = \App\Models\Nationality::create($validated);
        // return inertia.js with flash success message
        return back()->with('success', 'تم اضافة الجنسية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nationality = \App\Models\Nationality::find($id);
        $nationality->name = $request->name;
        $nationality->save();
        return redirect()->back()->with('success', 'تم تعديل الجنسية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nationality = \App\Models\Nationality::find($id);
        $nationality->delete();
        return redirect()->back()->with('success', 'تم حذف الجنسية بنجاح');
    }
}
