<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(3);

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle($request->all());

        $vehicle->user_id = Auth::id();

        $vehicle->save();

        return redirect('vehicles')->with('sucess', 'Vehicle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        if ($vehicle->user_id === Auth::id()) {
            return view('vehicles.edit', compact('vehicle'));
        } else {
            redirect()->route('vehicles.index')
                ->with('error', "You can't edit this post because are not author")->withInput();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        if ($vehicle->user_id === Auth::id()) {
            $vehicle->update($request->all());
            return redirect()->route('vehicles.index')->with('sucess', 'Vehicle successfully updated');
        } else {
            redirect()->route('vehicles.index')
                ->with('error', "You can't edit this post because are not author")->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->user_id === Auth::id()) {
            $vehicle->delete();
            return redirect()->route('vehicles.index')->with('sucess', 'Vehicle successfully deleted');
        } else {
            redirect()->route('vehicles.index')->with('error', "You can't delete this post because are not author")->withInput();
        }
    }
}
