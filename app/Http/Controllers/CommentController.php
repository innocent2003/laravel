<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\HComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $initialHash = "00000000000000000000000000000000000000000";
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = $request->session()->get('user')['id'];
        $comment->data_id = $request->data_id;
        $comment->save();


        $nonce = 0;
        $combinedHash = '';
        do {
            $nonce++;
            $combinedHash = hash('sha256', $comment->idComment . $nonce);
        } while(substr($combinedHash, 0, 4) !== "0000");

        $hComment = new HComment;
        $combinedHashCheck = hash('sha256', $comment->idComment . $hComment->prev_idProductHash . $hComment->nonce);


        // Kiểm tra xem hash-idProduct trong bảng media có trùng với combinedHashCheck không
        $existingMedia = HComment::where('hash_idProduct', $combinedHashCheck)->first();


        // Tạo một chuỗi hash từ idProduct và prev_idProductHash


        if (!$existingMedia) {
            // Nếu không có bản ghi trong media, tạo mới và hash-idProduct sẽ là idProduct
            $hComment->hash_idProduct = hash('sha256', $comment->idComment . $nonce);
            $hComment->prev_idProductHash = "";
        } else {
            // Nếu có bản ghi trong media, kiểm tra xem hash-idProduct có khớp với combinedHash không
            // Nếu khớp, thêm idProduct mới vào hash-idProduct cũ và cập nhật hash-idProduct
            $hComment->hash_idProduct = hash('sha256', $comment->idComment . $existingMedia->hash_idProduct . $none);
            $hComment->prev_idProductHash = $existingMedia->hash_idProduct;
        }

        $hComment->nonce = $nonce; // Lưu nonce vào bản ghi media
        $hComment->save();

        return redirect("/");


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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
