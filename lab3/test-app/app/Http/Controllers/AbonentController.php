<?php

namespace App\Http\Controllers;

use App\Models\Abonent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AbonentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $abonent = Abonent::all();
        return view('abonent.index', ['abonent' => $abonent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('abonent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $data = $request->only(['phone_number', 'address', 'owner', 'sum', 'account']);
        Abonent::create($data);
        return redirect(route('abonent.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $abonent = Abonent::findOrFail($id);
        return view('abonent.show', ['abonent' => $abonent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $abonent = Abonent::findOrFail($id);
        return view('abonent.edit', ['abonent' => $abonent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required|max:255',
        ]);
        $abonent = Abonent::findOrFail($id);
        $abonent->update($request->all());
        return redirect('/abonent/' . $abonent->id)->with('success', 'Abonent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $abonent = Abonent::findOrFail($id);
        $abonent->delete();
        return redirect('/abonent')->with('success', 'Abonent deleted successfully!');
    }
}
