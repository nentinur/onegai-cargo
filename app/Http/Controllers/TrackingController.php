<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Models\Customer;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request('search'));
        // $tracking = Customer::all();
        $tracking = null;
        if (request('search')) {
            $tracking = Customer::where('kode_resi', request('search'))->first();
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
    public function show(Customer $tracking)
    {


        // return view('tracking', [
        //     'tracking' => Tracking::kode_pesanan($tracking)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackingRequest $request, Customer $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $tracking)
    {
        //
    }
}
