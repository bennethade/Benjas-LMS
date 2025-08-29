<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\Models\InfoBox;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $first_info = InfoBox::find(1);
        // $second_info = InfoBox::find(2);
        $first_info = InfoBox::where('id', 1)->first();
        $second_info = InfoBox::where('id', 2)->first();
        $third_info = InfoBox::where('id', 3)->first();
        return view('backend.admin.info.index', compact('first_info', 'second_info', 'third_info'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InfoRequest $request, string $id)
    {
        InfoBox::updateOrCreate(
            ['id' => $id],
            $request->validated()
        );

        return redirect()->back()->with('success', 'Info Box updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
