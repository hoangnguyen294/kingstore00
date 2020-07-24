@extends('admin.master')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Cập nhật sản phẩm</div>
					<div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
                                        <label>Tên sản phẩm</label>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @enderror
										<input type="text" name="name" class="form-control" placeholder="Nhập tên..." value="{{$product->name}}">
									</div>

									<div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                        @enderror
										<input id="img" type="file" name="image" class="form-control" onchange="readURL(event)">
                                        <img id="image" height="200px" width="150px" src="images/product/{{ $product->image }}" class="thumbnail">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        @error('price')
                                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                        @enderror
										<input type="number" name="price" class="form-control" placeholder="Nhập giá..." value="{{$product->price}}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Màu sắc</label>
										<select name="color">
                                            <option value="white"
                                            @if ($product->color == 'white') selected

                                            @endif>White</option>
                                            <option value="red"
                                            @if ($product->color == 'red') selected

                                            @endif>Red</option>
                                            <option value="blue"
                                            @if ($product->color == 'blue') selected

                                            @endif>Blue</option>
                                            <option value="black"
                                            @if ($product->color == 'black') selected

                                            @endif>Black</option>
                                            <option value="pink"
                                            @if ($product->color == 'pink') selected

                                            @endif>Pink</option>
                                            <option value="gold"
                                            @if ($product->color == 'gold') selected

                                            @endif>Gold</option>
                                            <option value="silver"
                                            @if ($product->color == 'silver') selected

                                            @endif>Silver</option>
                                            <option value="bronze"
                                            @if ($product->color == 'bronze') selected

                                            @endif>Bronze</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Ram</label>
										<select name="ram">
                                            <option value="1gb"
                                            @if ($product->ram == '1gb') selected

                                            @endif>1GB</option>
                                            <option value="2gb"
                                            @if ($product->ram == '2gb') selected

                                            @endif>2GB</option>
                                            <option value="3gb"
                                            @if ($product->ram == '3gb') selected

                                            @endif>3GB</option>
                                            <option value="4gb"
                                            @if ($product->ram == '4gb') selected

                                            @endif>4GB</option>
                                            <option value="6gb"
                                            @if ($product->ram == '6gb') selected

                                            @endif>6GB</option>
                                            <option value="8gb"
                                            @if ($product->ram == '8gb') selected

                                            @endif>8GB</option>
                                            <option value="12gb"
                                            @if ($product->ram == '12gb') selected

                                            @endif>12GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Memory</label>
										<select name="memory">
                                            <option value="8gb"
                                            @if ($product->memory == '8gb') selected

                                            @endif>8GB</option>
                                            <option value="16gb"
                                            @if ($product->memory == '16gb') selected

                                            @endif>16GB</option>
                                            <option value="32gb"
                                            @if ($product->memory == '32gb') selected

                                            @endif>32GB</option>
                                            <option value="64gb"
                                            @if ($product->memory == '64gb') selected

                                            @endif>64GB</option>
                                            <option value="128gb"
                                            @if ($product->memory == '128gb') selected

                                            @endif>128GB</option>
                                            <option value="256gb"
                                            @if ($product->memory == '256gb') selected

                                            @endif>256GB</option>
                                            <option value="512gb"
                                            @if ($product->memory == '512gb') selected

                                            @endif>512GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Khuyến mãi</label>
										<select name="promotion">
                                            <option value="phukien"
                                            @if ($product->promotion == 'phukien') selected

                                            @endif>Dán cường lực,ốp lưng</option>
                                            <option value="giam5"
                                            @if ($product->promotion == 'giam5') selected

                                            @endif>Giảm 5%</option>
                                            <option value="giam10"
                                            @if ($product->promotion == 'giam10') selected

                                            @endif>Giảm 10%</option>
                                        </select>
                                    </div>
									<div class="form-group" >
                                        <label>Nổi bật</label>
                                        <select name="speciality">
                                            <option value="hot"
                                            @if ($product->speciality == 'hot') selected

                                            @endif>Sản phẩm nổi bật</option>
                                            <option value="new"
                                            @if ($product->speciality == 'new') selected

                                            @endif>Sản phẩm mới</option>
                                            <option value="no"
                                            @if ($product->speciality == 'no') selected

                                            @endif>Không</option>
                                        </select>
									</div>
                                    <div class="form-group" >
                                        <label>Mô tả</label>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                        @enderror
                                        <textarea class="form-control" name="description" id="description">{!!$product->name!!}</textarea>
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<select name="warranty">
                                            <option value="6thang"
                                            @if ($product->warranty == '6thang') selected

                                            @endif>6 Tháng</option>
                                            <option value="12thang"
                                            @if ($product->warranty == '12thang') selected

                                            @endif>12 Tháng</option>
                                            <option value="24thang"
                                            @if ($product->warranty == '24thang') selected

                                            @endif>24 Tháng</option>
                                        </select>
									</div>

									<div class="form-group" >
										<label>Danh mục</label>
										<select name="category_id" class="form-control" value="{{$product->category_id}}">
                                            @foreach ($categories as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
					                    </select>
									</div>
									<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary" confirm="Bạn muốn cập nhật sản phẩm này ?">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
                            </div>
                            @csrf;
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
    </div>	<!--/.main-->
    @push('ckeditor-js')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
        function readURL(event) {
        if (event.target.files && event.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    $("#img").change(function() {
        readURL(this);
    });
    </script>
    @endpush
@endsection
