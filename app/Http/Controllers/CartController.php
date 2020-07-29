<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Mail;
class CartController extends Controller
{
    public function index()
    {
        $items = Cart::getContent();
        // dd($items);
        $categories = Category::all();
        $total = Cart::getSubTotal();
        return view('pages.cart',compact('items','categories','total'));
    }
    public function getAddCart($id)
    {
        $product = Product::find($id);
        switch ($product->promotion) {
            case 'phukien':
                $price = $product->price;
                break;
            case 'giam5':
                $price = $product->price - ($product->price * 0.05);
                break;
            default:
                $price = $product->price - ($product->price * 0.1);
                break;
        }

        Cart::add($product->id, $product->name,$price,1, array('image'=>$product->image));
        return back()->with('success',"Thêm thành công $product->name vào giỏ hàng !!!");
    }


    public function remove($id)
    {
        Cart::remove($id);
        return back();
    }

    public function update(Request $request)
    {
        Cart::update($request->id,['quantity'=>$request->quantity]);
    }

    // public function postComplete(Request $request)
    // {
    //     $data['info'] = $request->all();
    //     // dd($data);
    //     $name = $request->name;
    //     $email = $request->email;
    //     $data['cart'] = Cart::getContent();
    //     $data['total'] = Cart::getSubTotal();
    //     $data['categories'] = Category::all();
    //     Mail::send('pages.email', $data, function ($message) use ($email,$name) {
    //         $message->from('www.hoangnguyen2947.qa@gmail.com', 'KingStore');

    //         $message->to($email, $name);

    //         $message->cc('hoangnguyen294.qa@gmail.com', 'Nguyen Hoang');

    //         $message->subject('Xác nhận hóa đơn mua hàng tại KingStore');
    //     });
    //     return redirect('complete');
    // }
    public function postComplete(Request $request)
    {
        $info = $request->all();
        $cart = Cart::getContent();
        $total = Cart::getSubTotal();
        $categories = Category::all();
        Cart::clear();
        return view('pages.email',compact('info','cart','total','categories'));
    }


}
