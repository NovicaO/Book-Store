<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends BaseController
{
// STAVLJANJE JEDNE KNJIGE U KORPU
    public function putInCart(Book $book)
    {
        Cart::add($book->id, $book->title, 1, $book->price);
        flash()->success('You have added ' . $book->title . ' to your cart. Click <a href="/cart/">here</a> to go to cart')->important();
        return back();
    }

    public function updateCartItems(){
        $this->validate(request(), [
            'qty' => 'required||min:1|Numeric',
        ]);
        $rowId= request()->row_id;
        $qty = request()->qty;
        $cart = Cart::get($rowId);
        Cart::update($rowId, $qty);
        flash()->success('You have successfully updated books by '.$qty.' items <a href="/books/'.$cart->id.'">'.$cart->name.'</a> in your cart')->important();
        return back();
    }

    public function putInCartAndShowCart(Book $book)
    {
        Cart::add($book->id, $book->title, 1, $book->price);
        flash()->success('You have added ' . $book->title . ' to your cart')->important();
        return redirect('/cart');
    }

    //UKLANJANJE KNJIGE IZ KORPE
    public function removeFromCart($rowId)
    {
        $cart = Cart::get($rowId);
        Cart::update($rowId, ($cart->qty) - 1);
        flash()->success('You have successfully remove one book item <a href="/books/'.$cart->id.'">'.$cart->name.'</a> from your cart')->important();
        return back();

    }

    public function removeAllSelectedBook($rowId)
    {
        $cart = Cart::get($rowId);
        Cart::remove($rowId);
        flash()->success('You have successfully remove all <a href="/books/'.$cart->id.'">'.$cart->name.'</a> from your cart!')->important();
        return back();

    }

// BRISANJE SVIH KNJIGA IZ KORPE
    public function cartEmpty()
    {
        Cart::destroy();
        flash()->success('You have successfully emptied your cart! Go to <a href="/books/">main page</a> to add new books')->important();
        return back();
    }

    // PRIKAZIVANJE KORPE
    public function showCart()
    {
//        $cartItems = \Cart::content();
        return view('frontend.books.cart');
    }

// NARUCIVANJE
    public function placeOrder(Request $request)
    {

        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email_address' => 'required|email',
            'home_address' => 'required',
            'postal_number' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'city_name' => 'required',
        ]);

        $status = DB::table('order_statuses')->where(['is_default' => 1])->first()->id;

        $request->request->add(['status_id' => $status]);

        $order = Order::create($request->all());

        $books = Cart::content()->flatten()->toArray();
        $array = array();

        foreach ($books as $book) {
            array_push($array, array('book_id' => $book['id'], 'order_id' => $order->id, 'order_total' => intval($book['price']) * $book['qty'], 'order_items' => $book['qty']));
        }

        $order->book()->attach($array);
        Cart::destroy();

        //mogao bi poslati ovde email svima ali to ako bude vremena.
        flash('You order has been successful');
        return redirect('/books');


    }
}
