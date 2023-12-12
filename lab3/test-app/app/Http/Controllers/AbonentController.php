<?php

namespace App\Http\Controllers;

use App\Models\Abonent;
use Illuminate\Auth\Access\AuthorizationException;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class AbonentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index() : View
    {
        $this->authorize('viewAny-resource');
        $abonent = Abonent::all();
        return view('abonent.index', ['abonent' => $abonent]);
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create() : View
    {
        $this->authorize('create-resource');
        return view('abonent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $user = Auth::user();
        $data = array_merge($request->only(['phone_number', 'address', 'owner', 'sum', 'account']), ['creator_user_id' => $user->id]);
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
        $user = Auth::user();
        $abonent = Abonent::findOrFail($id);
        if(Gate::forUser($user)->allows('edit-abonent', $abonent)){
            return view('abonent.edit', ['abonent' => $abonent]);
        }
        else{
            abort(403);
        }
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
        $user = Auth::user();
        $abonent = Abonent::findOrFail($id);
        if(Gate::forUser($user)->allows('delete-abonent', $abonent)){
            $abonent->delete();
            return redirect('/abonent')->with('success', 'Abonent deleted successfully!');
        }else{
            abort(403);
        }
    }
}
