<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Str;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list',compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create',compact('category'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/product/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/product/", $image);
            $product->image = $image;
        }
        $product->price = $request->price;
        $product->color = $request->color;
        $product->ram = $request->ram;
        $product->memory = $request->memory;
        $product->promotion = $request->promotion;
        $product->speciality = $request->speciality;
        $product->description = $request->description;
        $product->warranty = $request->warranty;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.index')->with('success', "Thêm sản phẩm thành công");
    }

    public function show($id)
    {
        $product = Product::find($id);
        $category_name = $product->category_id;
        $name = Category::find($category_name)->name;

        $product['category_name'] =$name;
        return response()->json($product,200);
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('categories','product'));
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/product/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/product/", $image);
            $product->image = $image;
        }
        $product->price = $request->price;
        $product->color = $request->color;
        $product->ram = $request->ram;
        $product->memory = $request->memory;
        $product->promotion = $request->promotion;
        $product->speciality = $request->speciality;
        $product->description = $request->description;
        $product->warranty = $request->warranty;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success',"Xóa $product->name thành công !");
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash', compact('products'));
    }

    public function restore($id)
    {

        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.trash')->with('success', " $product->name đã được khôi phục !");
    }

    public function destroy($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if (!empty($product->image)) {
            unlink("images/product/" . $product->image);
        }
        $product->forceDelete();
        return redirect()->route('product.trash')->with('success', "Đã xóa hoàn toàn $product->name !");
    }
}
