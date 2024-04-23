<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Comment;
use Hash;
use DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $initialHash = "00000000000000000000000000000000000000000";
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


        $imagePath = $request->file('image')->store('public/photos');
        $videoPath = $request->file('video')->store('public/photos');


        $image = basename($imagePath);
        $video = basename($videoPath);


        $data = new Data;
        $data->name = $request->name;
        $data->video = $video;
        $data->image = $image;
        $data->description = $request->description;
        $data->save();


        $nonce = 0;
        $hashProduct = '';


        do {
            $nonce++;
            $hashProduct = hash('sha256', $data->id . $nonce);
        } while (substr($hashProduct, 0, 4) !== "0000");


        $latestMedia = Media::latest()->first();
        $prevHash = $latestMedia ? $latestMedia->hash_idProduct : $this->initialHash;


        $media = new Media;
        $media->hash_idProduct = $hashProduct;
        $media->prev_idProductHash = $prevHash;
        $media->nonce = $nonce;
        $media->save();


        return redirect('/');
    }
    public function find($id){
        $data = Data::with('comments')->findOrFail($id);
        $product = Data::findOrFail($id);
        $comments = $product->comments;
        return view("comment",compact("product", "comments"));
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
