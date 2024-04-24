<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Data;
use App\Models\HCart;
use Session;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $initialHash = "00000000000000000000000000000000000000000";
    public function index($id)
    {
        //
        $data = Data::find($id);
        return view("cart", compact('data'));
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
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->data_id = $request->data_id;
            $cart->save();

            $hashCart = '';
            $nonce = 0;

            do {
                $nonce++;
                $hashCart = hash('sha256', $cart->id . $nonce);
            } while (substr($hashCart, 0, 4) !== "0000");


            $latestHCart = HCart::latest()->first();
            $prevHash = $latestHCart ? $latestHCart->hash_idCart : $this->initialHash;


            $HCart = new HCart;
            $HCart->hash_idCart = $hashCart;
            $HCart->prev_idCartHash = $prevHash;
            $HCart->nonce = $nonce;
            $HCart->save();

            return redirect('/');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $userId = Session::get('user')['id'];
        $data =DB::table('carts')
        ->join('data', 'carts.data_id', '=', 'data.id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->where('users.id', $userId)
        ->select('carts.*', 'data.*', 'users.*')
        ->get();
        return view('cartList',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
