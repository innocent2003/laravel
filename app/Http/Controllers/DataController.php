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
        // Lưu tệp ảnh và video vào thư mục 'public/photos'
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/photos', $image);
        $video = $request->file('video')->getClientOriginalName();
        $request->file('video')->storeAs('public/photos', $video);

        // Tạo một bản ghi mới trong bảng Data
        $data = new Data;
        $data->name = $request->name;
        $data->video = $video;
        $data->image = $image;
        $data->description = $request->description;
        $data->save();

        // Tính toán nonce bằng cách thử các giá trị để tạo ra một hash đầu tiên hợp lệ
        $nonce = 0;
        $combinedHash = '';
        do {
            $nonce++;
            $combinedHash = hash('sha256', $data->idProduct . $nonce);
        } while(substr($combinedHash, 0, 4) !== "0000");

        $media = new Media;

        // Tạo một chuỗi hash từ idProduct và prev_idProductHash
        $combinedHashCheck = hash('sha256', $data->idProduct . $media->prev_idProductHash . $media->nonce);

        // Kiểm tra xem hash-idProduct trong bảng media có trùng với combinedHashCheck không
        $existingMedia = Media::where('hash_idProduct', $combinedHashCheck)->first();

        if (!$existingMedia) {
            // Nếu không có bản ghi trong media, tạo mới và hash-idProduct sẽ là idProduct
            $media->hash_idProduct = hash('sha256', $data->idProduct . $nonce);
            $media->prev_idProductHash = "";
        } else {
            // Nếu có bản ghi trong media, kiểm tra xem hash-idProduct có khớp với combinedHash không
            // Nếu khớp, thêm idProduct mới vào hash-idProduct cũ và cập nhật hash-idProduct
            $media->hash_idProduct = hash('sha256', $data->idProduct . $existingMedia->hash_idProduct . $none);
            $media->prev_idProductHash = $existingMedia->hash_idProduct;
        }

        $media->nonce = $nonce; // Lưu nonce vào bản ghi media
        $media->save();

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
