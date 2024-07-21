<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('location', compact('locations'));
    }

    public function store(Request $request) {
        $request->validate([
            'location' => 'required|max:255',
            'address' => 'required|max:500',
            'trash' => 'required|integer',
            'longitude' => 'required|max:100',
            'latitude' => 'required|max:100',
        ]);

        Location::create([
            'location' => $request->location,
            'address' => $request->address,
            'trash' => $request->trash,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return redirect()->route('location.create')->with('success', 'Location added successfully.');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('location_edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|max:255',
            'address' => 'required|max:255',
            'trash' => 'required|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $location = Location::findOrFail($id);
        $location->update([
            'location' => $request->location,
            'address' => $request->address,
            'trash' => $request->trash,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return redirect()->route('location.create')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('location.create')->with('success', 'Location deleted successfully.');
    }
}
