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
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">

						<form method="post" action="/addproduct" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
                                        <label>Tên sản phẩm</label>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @enderror
										<input type="text" name="name" class="form-control" placeholder="Nhập tên...">
									</div>

									<div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                        @enderror
										<input id="img" type="file" name="image" class="form-control" placeholder="Chọn ảnh..." onchange="readURL(event)">
                                        <img id="image" src="#" alt="" srcset="" width="200" height="200">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        @error('price')
                                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                        @enderror
										<input type="number" name="price" class="form-control" placeholder="Nhập giá...">
                                    </div>
                                    <div class="form-group" >
                                        <label>Màu sắc</label>
										<select name="color">
                                            <option value="white" selected>White</option>
                                            <option value="red">Red</option>
                                            <option value="blue">Blue</option>
                                            <option value="black">Black</option>
                                            <option value="pink">Pink</option>
                                            <option value="gold">Gold</option>
                                            <option value="silver">Silver</option>
                                            <option value="bronze">Bronze</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Ram</label>
										<select name="ram">
                                            <option value="1gb">1GB</option>
                                            <option value="2gb" selected>2GB</option>
                                            <option value="3gb">3GB</option>
                                            <option value="4gb">4GB</option>
                                            <option value="6gb">6GB</option>
                                            <option value="8gb">8GB</option>
                                            <option value="12gb">12GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Memory</label>
										<select name="memory">
                                            <option value="8gb">8GB</option>
                                            <option value="16gb" selected>16GB</option>
                                            <option value="32gb">32GB</option>
                                            <option value="64gb">64GB</option>
                                            <option value="128gb">128GB</option>
                                            <option value="256gb">256GB</option>
                                            <option value="512gb">512GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Khuyến mãi</label>
										<select name="promotion">
                                            <option value="phukien" selected>Dán cường lực,ốp lưng</option>
                                            <option value="giam5">Giảm 5%</option>
                                            <option value="giam10">Giảm 10%</option>
                                        </select>
                                    </div>
									<div class="form-group" >
                                        <label>Nổi bật</label>
                                        <select name="speciality">
                                            <option value="hot">Sản phẩm nổi bật</option>
                                            <option value="new" selected>Sản phẩm mới</option>
                                            <option value="no">Không</option>
                                        </select>
									</div>
                                    <div class="form-group" >
                                        <label>Mô tả</label>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                        @enderror
                                        <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<select name="warranty">
                                            <option value="6thang">6 Tháng</option>
                                            <option value="12thang" selected>12 Tháng</option>
                                            <option value="24thang">24 Tháng</option>
                                        </select>
									</div>

									<div class="form-group" >
										<label>Danh mục</label>
										<select name="category_id" class="form-control">
                                            @foreach ($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
					                    </select>
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
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
