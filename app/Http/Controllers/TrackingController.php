<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request('search'));
        $tracking = null;
        if (request('search')) {
            $tracking = Tracking::where('kode_pesanan', request('search'))->first();
        }
        return view('tracking', [
            'title' => 'Tracking',
            'active' => 'tracking',
            'tracking' => $tracking
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
    public function store(StoreTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracking $tracking)
    {


        // return view('tracking', [
        //     'tracking' => Tracking::kode_pesanan($tracking)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
