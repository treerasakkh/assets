<?php

namespace App\Http\Controllers;

use App\Models\ItemName;
use Illuminate\Http\Request;

class ItemNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemNames = ItemName::all();
        return view('item-names.index',compact('itemNames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('item-names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|min:3'
        ]);

        ItemName::create(['name'=>$request->name]);

        return redirect()->route('item-names.index')->with('success', 'รายการถูกเพิ่มเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemName $itemName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemName $itemName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemName $itemName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemName $itemName)
    {
        //
    }
}
