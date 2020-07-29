@extends('pages.home')
@section('main')
<link rel="stylesheet" href="css/cart.css">
					<div id="wrap-inner">
						<div id="list-cart">
                            <h3>Giỏ hàng</h3>
                            @if(count(Cart::getContent())>=1)
							<form>
								<table class="table table-bordered .table-responsive text-center">

									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
                                    </tr>
                                    @foreach($items as $item)
									<tr>
									    <td><img class="img-responsive" height="200px" width="150px" src="images/product/{{ $item->attributes->image }}"></td>
                                        <td>{{$item->name}}</td>
										<td>
											<div class="form-group">
                                            <input class="form-control" id="quantity" type="number" value="{{$item->quantity}}" min="1" max="100" onchange="updateCart({{$item->id}})">
											</div>
										</td>
										<td><span class="price">{{number_format($item->price,0,',','.',).'VND'}}</span></td>
										<td><span class="price">{{number_format($item->price*$item->quantity,0,',','.',).'VND'}}</span></td>
										<td><a href="/removecart-{{$item->id}}">Xóa</a></td>
									</tr>
                                    @endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">
											Tổng thanh toán: <span class="total-price">{{ number_format($total) }} VND</span>

									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="/" class="my-btn btn">Mua tiếp</a>
										<a href="" class="my-btn btn">Cập nhật</a>

									</div>
								</div>
							</form>
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form method="post">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                                </div>
                                @csrf
							</form>
                        </div>
                        @else
                        <h2>Giỏ hàng rỗng</h2>
                        @endif
					</div>
<script>
    function updateCart(id)
    {
      let qty= document.getElementById('')
        console.log(qty);
    }
</script>
@endsection
