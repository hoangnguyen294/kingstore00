@extends('admin.master')
@section('main')


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div><!--/.row-->
        <a href="{{('/trashcate')}}" class="btn btn-danger">Thùng rác</a>
        @include('admin.partials.message')
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm danh mục
						</div>
						<div class="panel-body">
                            {{-- @include('errors.note') --}}
                        <form method="post" action="/category">
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <div class="form-group">
    							<input type="submit" name="submit" class="form-control btn btn-primary" value="Thêm mới" onclick="return confirm('Bạn chắc chắn muốn thêm danh mục này ?')">
                            </div>
                            @csrf
                            </form>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th style="width:10%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
                                @foreach($data as $cate)
								<tr>
                                <td>{{$cate->name}}</td>
									<td>
			                    		<a href="{{('category-'.$cate->id)}}"><i class="fa fa-edit"></i></a>
			                    		<a href="{{('deletecate-'.$cate->id)}}" onclick="return confirm('Bạn muốn đưa danh mục này vào thùng rác ?')" ><i class="fa fa-trash"></i></a>
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
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
