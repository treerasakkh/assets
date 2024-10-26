<?php

namespace App\Http\Controllers;

use App\Models\ResponsiblePerson;
use Illuminate\Http\Request;

class ResponsiblePersonController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = ResponsiblePerson::all();
        return view('responsible-people.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->is_admin) {
            return view('responsible-people.create');
        }

        return redirect()->route('responsible-people.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string'
        ]);

        ResponsiblePerson::create(['name'=>$request->name]);

        return redirect()->route('responsible-people.index')->with('success','ชื่อผู้รับผิดชอบถูกบันทึกแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResponsiblePerson $responsiblePerson)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponsiblePerson $responsiblePerson)
    {
        return abort(404);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResponsiblePerson $responsiblePerson)
    {
        return abort(404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponsiblePerson $responsiblePerson)
    {
        return abort(404);

    }
}
