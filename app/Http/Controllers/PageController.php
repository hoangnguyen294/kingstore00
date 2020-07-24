<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Comment;
class PageController extends Controller
{
    public function getHome(){
        $hot = Product::where('speciality','=','hot')->orderBy('id','desc')->paginate(8);
        $new = Product::where('speciality','=','new')->orderBy('id','desc')->paginate(8);
        $categories = Category::all();
        return view('pages.hotproduct',compact('hot','new','categories'));
    }

    public function getCategory($category)
    {
        $data = Product::where('category_id','=',$category)->orderBy('price', 'asc')->get();
        $categories = Category::all();
        return view('pages.filter',compact('data','categories'));
    }

    public function getPrice($price)
    {
        switch ($price) {
            case "03":
                $data = Product::where('price','<=','3000000')->orderBy('price', 'asc')->get();
              break;
            case "36":
                $data = Product::where('price','>','3000000')->where('price','<=','6000000')->orderBy('price', 'asc')->get();
              break;
            case "610":
                $data = Product::where('price','>','6000000')->where('price','<=','10000000')->orderBy('price', 'asc')->get();
              break;
            case "1015":
                $data = Product::where('price','>','10000000')->where('price','<=','15000000')->orderBy('price', 'asc')->get();
              break;
            case "1520":
                $data = Product::where('price','>','15000000')->where('price','<=','20000000')->orderBy('price', 'asc')->get();
              break;
            default:
                $data = Product::where('price','>','20000000')->orderBy('price', 'asc')->get();
        }
        $categories = Category::all();
        return view('pages.filter',compact('data','categories'));
    }

    public function getColor($color)
    {
        switch ($color) {
            case "white":
                $data = Product::where('color','=','white')->orderBy('price', 'asc')->get();
              break;
            case "red":
                $data = Product::where('color','=','red')->orderBy('price', 'asc')->get();
              break;
            case "blue":
                $data = Product::where('color','=','blue')->orderBy('price', 'asc')->get();
              break;
            case "black":
                $data = Product::where('color','=','black')->orderBy('price', 'asc')->get();
              break;
            case "pink":
                $data = Product::where('color','=','pink')->orderBy('price', 'asc')->get();
              break;
            case "gold":
                $data = Product::where('color','=','gold')->orderBy('price', 'asc')->get();
              break;
            case "silver":
                $data = Product::where('color','=','silver')->orderBy('price', 'asc')->get();
              break;
            default:
                $data = Product::where('color','=','bronze')->orderBy('price', 'asc')->get();
        }
        $categories = Category::all();
        return view('pages.filter',compact('data','categories'));
    }

    public function getRam($ram)
    {
        switch ($ram) {
            case "1gb":
                $data = Product::where('ram','=','1gb')->orderBy('price', 'asc')->get();
              break;
            case "2gb":
                $data = Product::where('ram','=','2gb')->orderBy('price', 'asc')->get();
              break;
            case "3gb":
                $data = Product::where('ram','=','3gb')->orderBy('price', 'asc')->get();
              break;
            default:
                $data = Product::where('ram','=','4gb')->orderBy('price', 'asc')->get();
        }
        $categories = Category::all();
        return view('pages.filter',compact('data','categories'));
    }

    public function getMemory($memory)
    {
        switch ($memory) {
            case "8gb":
                $data = Product::where('memory','=','8gb')->orderBy('price', 'asc')->get();
              break;
            case "16gb":
                $data = Product::where('memory','=','16gb')->orderBy('price', 'asc')->get();
              break;
            case "32gb":
                $data = Product::where('memory','=','32gb')->orderBy('price', 'asc')->get();
              break;
            case "64gb":
                $data = Product::where('memory','=','64gb')->orderBy('price', 'asc')->get();
              break;
            case "128gb":
                $data = Product::where('memory','=','128gb')->orderBy('price', 'asc')->get();
              break;
            case "256gb":
                $data = Product::where('memory','=','256')->orderBy('price', 'asc')->get();
              break;
            default:
                $data = Product::where('memory','=','512gb')->orderBy('price', 'asc')->get();
        }
        $categories = Category::all();
        return view('pages.filter',compact('data','categories'));
    }

    public function getDetail($id){
        $item = Product::find($id);
        $comments = Comment::where('product_id',$id)->get();
        $categories = Category::all();
        return view('pages.details',compact('item','comments','categories'));
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $keyword = $result;
        $result = str_replace(' ','%',$result);
        $items = Product::where('name','like','%'.$result.'%')->get();
        $categories = Category::all();
        return view('pages.search',compact('keyword','items','categories'));
    }

    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email= $request->email;
        $comment->content= $request->content;
        $comment->product_id = $id;
        $comment->save();
        return back();
    }
}
