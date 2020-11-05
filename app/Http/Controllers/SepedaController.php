<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\sepeda;
use App\Models\User;
use Illuminate\Http\Request;

class SepedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sepedas = sepeda::all();
        return view('sepeda.index', compact('sepedas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('sepeda.addSepeda', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        sepeda::create($request->all());
        return redirect()->route('sepeda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sepeda  $sepeda
     * @return \Illuminate\Http\Response
     */
    public function show(sepeda $sepeda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sepeda  $sepeda
     * @return \Illuminate\Http\Response
     */
    public function edit(sepeda $sepeda)
    {
        //
        $users = User::all();
        return view('sepeda.editSepeda',compact('sepeda' , 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sepeda  $sepeda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sepeda $sepeda)
    {
        //

        $sepeda->update($request->all());
        return redirect()->route('sepeda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sepeda  $sepeda
     * @return \Illuminate\Http\Response
     */
    public function destroy(sepeda $sepeda)
    {
        //
        $sepeda->delete();
        return redirect()->route('sepeda.index');

    }
}
