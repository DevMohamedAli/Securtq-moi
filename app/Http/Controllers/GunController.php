<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guns = \App\Models\Gun::all();
        return Inertia('Gun/Index', [
            'guns' => $guns
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
            'name' => 'required|unique:guns',
        ]);

        $gun = \App\Models\Gun::create($validated);
        return redirect()->back()->with('success', 'تم إضافة السلاح بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gun = \App\Models\Gun::find($id);
        return Inertia('Gun/Edit', [
            'gun' => $gun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:guns,name,' . $id,
        ]);

        $gun = \App\Models\Gun::find($id);
        $gun->update($validated);
        return redirect()->back()->with('success', 'تم تعديل السلاح بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gun = \App\Models\Gun::find($id);
        $gun->delete();
        return redirect()->back()->with('success', 'تم حذف السلاح بنجاح');
    }
}
