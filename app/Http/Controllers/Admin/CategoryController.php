<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('admin.category.create',compact('data'));
    }


    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success','Thêm danh mục thành công');

    }

    public function edit($id)
    {
        $data = Category::find($id);

        return view('admin.category.edit',compact('data'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('category')->with('success','Sửa danh mục thành công');
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success',"Xóa danh mục $category->name thành công !");
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }

    public function restore($id)
    {

        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('cate.trash')->with('success', "Danh mục $category->name đã được khôi phục !");
    }

    public function destroy($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('cate.trash')->with('success', "Đã xóa hoàn toàn danh mục $category->name !");
    }
}


