@extends('admin.master')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục sản phẩm</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-7 col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách tạm xóa</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <a href="{{('/category')}}" class="btn btn-warning">Trở về</a>
                        @include('admin.partials.message')
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                <th>Tên danh mục</th>
                                <th style="width:10%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $cate)
                            <tr>
                            <td>{{$cate->name}}</td>
                                <td>
                                    <a href="{{('/restorecate-'.$cate->id)}}" onclick="return confirm('Khôi phục danh mục này trở lại danh sách ?')"><i class="fa fa-undo"></i></a>
                                    <a href="{{('/destroycate-'.$cate->id)}}" onclick="return confirm('Nếu xóa danh mục này,những sản phẩm của danh mục này sẽ mất,bạn chắc chắn?')" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
