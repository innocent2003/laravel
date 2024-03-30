<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Hash;
use DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Data::all();
        return view('welcome',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createView(){
        return view('AddData');
    }
    public function create(Request $request)
    {
        //
        // $image = $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/photos',$image);
        $data = Data::all();

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/photos',$image);
        $video = $request->file('video')->getClientOriginalName();
        $request->file('video')->storeAs('public/photos',$video);

        $data = new Data;
        $data->name = $request->name;
        $data->video = $video ;
        $data->image =$image;
        $data->description =  $request->description;
        $data->save();
        DB::table('media')->insert([
            'data_id'=> Hash::make($data->id),
        ]);
        return redirect('/');

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
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
