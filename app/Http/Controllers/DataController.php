<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
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
        $data = Data::paginate(5);
        return view('welcome',compact('data'));
    }
    public function ListProductInfo()
    {
        //
        $data = Data::paginate(5);
        return view('User.ListInfoProduct',compact('data'));
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
        $data->dataname = $request->dataname;
        $data->user_id = $request->session()->get('user')['id'];
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
    public function comment($id){
        $data = Data::find($id);
        return view("User.PagePay", compact('data'));
    }
    public function Approve()
    {
        $data = DB::table('data')
                ->join('users', 'data.user_id', '=', 'users.id')
                ->select('data.*', 'users.username', 'users.email')
                ->where('data.is_active', 'inactive')
                ->get();

    return view('Admin.PageApprove', ['data' => $data]);

        return view('Admin.PageApprove', ['data' => $data]);
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
    public function show($id)
    {
        //
        $data = Data::findOrFail($id);
        return view('Admin.Approve', compact('data'));
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
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'is_active' => 'required|in:active,inactive',
        ]);

        // Find the data by ID
        $data = Data::findOrFail($id);

        // Update the is_active field
        $data->is_active = $request->input('is_active');
        $data->save();

        // Redirect back or return a response
        return redirect("/PageApprove");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
