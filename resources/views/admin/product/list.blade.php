@extends('admin.master')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
        @include('admin.partials.message')
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{('/addproduct')}}" class="btn btn-primary">Thêm sản phẩm</a>
								<a href="{{('/trashproduct')}}" class="btn btn-danger">Thùng rác</a>
								<table id="producttable" class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="140px">Ảnh sản phẩm</th>
											<th>Danh mục</th>
											<th width="7%">Thao tác</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($products as $key => $product)
										<tr>
                                        <td>{{++$key}}</td>
										    <td>{{$product->name}}</td>
                                            <td>{{number_format($product->price,0,',','.').'đ'}}</td>
                                            <td><img height="200px" width="150px" src="images/product/{{ $product->image }}" class="thumbnail"></td>
                                            <td>{{$product->category->name}}</td>
											<td>
                                            <a href="{{('/editproduct-'.$product->id)}}"><i class="fa fa-edit"></i></a>
											<a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="{{('/deleteproduct-'.$product->id)}}"><i class="fa fa-trash"></i></a>
                                            <a href="javascript:;" onclick="getDetail({{$product->id}})"><i class="fa fa-info-circle"></i></a>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
    </div>
     <!-- Modal show detail-->
    <div class="modal fade" id="showModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for=""><b><i>Tên sản phẩm :</i></b></label>
                <p id="name"></p>
            </div>
            <label for=""><b><i>Ảnh sản phẩm :</i></b></label>
            <div id="image"></div>
            <label for=""><b><i>Giá sản phẩm :</i></b></label>
            <p id="price"></p>
            <label for=""><b><i>Màu sắc :</i></b></label>
            <p id="color"></p>
            <label for=""><b><i>Ram :</i></b></label>
            <p id="ram"></p>
            <label for=""><b><i>Memory :</i></b></label>
            <p id="memory"></p>
            <label for=""><b><i>Khuyến mãi :</i></b></label>
            <p id="promotion"></p>
            <label for=""><b><i>Nổi bật :</i></b></label>
            <p id="speciality"></p>
            <label for=""><b><i>Mô tả :</i></b></label>
            <p id="description"></p>
            <label for=""><b><i>Bảo hành :</i></b></label>
            <p id="warranty"></p>
            <label for=""><b><i>Danh mục :</i></b></label>
            <p id="category"></p>
            <label for=""><b><i>Ngày thêm :</i></b></label>
            <p id="created_at"></p>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
        </div>
    </div>
@push('datatable')
<script>
    $(document).ready(function() {
    $('#producttable').DataTable();
    } );
    function getDetail(id)
    {
        $('#name').empty();
        $('#price').empty();
        $('#image').empty();
        $('#color').empty();
        $('#ram').empty();
        $('#memory').empty();
        $('#promotion').empty();
        $('#speciality').empty();
        $('#warranty').empty();
        $('#created_at').empty();
        $('#category').empty();
        $('#description').empty();
        $.ajax({
        url: "/detailproduct-" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#name').append(data.name);
            $('#image').append(`<img height="200px" width="150px" src="images/product/${data.image}" class="thumbnail">`);
            $('#price').append(data.price);
            $('#color').append(data.color);
            $('#ram').append(data.ram);
            $('#memory').append(data.memory);
            if(data.promotion === 'phukien'){
                $('#promotion').append('Dán cường lực, ốp lưng');
            }else if(data.promotion == 'giam5'){
                $('#promotion').append('Giảm giá 5%');
            }else{
                $('#promotion').append('Giảm giá 10%');
            }

            if(data.speciality === 'hot'){
                $('#speciality').append('Sản phẩm nổi bật');
            }else if(data.speciality === 'new'){
                $('#speciality').append('Sản phẩm mới');
            }else{
                $('#speciality').append('Sản phẩm thường');
            }
            $('#description').append(data.description);
            if(data.warranty === '6thang'){
                $('#warranty').append(' 6 tháng');
            }else if(data.warranty === '12thang'){
                $('#warranty').append(' 12 tháng');
            }else{
                $('#warranty').append(' 24 tháng');
            }
            $('#category').append(data.category_name);
            $('#created_at').append(data.created_at);
            $('#showModalDetail').modal('show');
        }
    });
    }
</script>
@endpush

    @endsection
