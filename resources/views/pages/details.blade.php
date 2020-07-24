@extends('pages.home')
@section('main')
<link rel="stylesheet" href="css/details.css">


					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img height="350px" width="350px" src="images/product/{{ $item->image }}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                                    @switch($item->promotion)
                                        @case('phukien')
                                            <p>Giá: <span class="price">{{number_format($item->price,0,',','.').'đ'}}</span></p>
                                            @break
                                        @case('giam5')
                                            <p><span class="price-old">{{number_format($item->price,0,',','.').'đ'}}</span></p>
                                            <p>Giá: <span class="price">{{number_format(($item->price-($item->price * 0.05)),0,',','.').'đ'}}</span></p>

                                            @break
                                        @default
                                            <p><span class="price-old">{{number_format($item->price,0,',','.').'đ'}}</span></p>
                                            <p>Giá: <span class="price">{{number_format(($item->price-($item->price * 0.1)),0,',','.').'đ'}}</span></p>
                                    @endswitch

                                    @switch($item->color)
                                        @case('white')
                                            <p>Màu: Trắng</p>
                                            @break
                                        @case('red')
                                            <p>Màu: Đỏ</p>
                                            @break
                                        @case('blue')
                                            <p>Màu: Xanh dương</p>
                                            @break
                                        @case('black')
                                            <p>Màu: Đen</p>
                                            @break
                                        @case('pink')
                                            <p>Màu: Hồng</p>
                                            @break
                                        @case('gold')
                                            <p>Màu: Vàng</p>
                                            @break
                                        @case('silver')
                                            <p>Màu: Bạc</p>
                                            @break
                                        @default
                                            <p>Màu: Đồng</p>
                                    @endswitch
                                    <p>Ram: {{$item->ram}}</p>
                                    <p>Bộ nhớ trong: {{$item->memory}}</p>
									@switch($item->warranty)
                                        @case('6thang')
                                            <p>Bảo hành: 6 Tháng</p>
                                            @break
                                        @case('12thang')
                                            <p>Bảo hành: 12 Tháng</p>
                                            @break
                                        @default
                                            <p>Bảo hành: 24 Tháng</p>
                                    @endswitch
									@switch($item->promotion)
                                        @case('phukien')
                                            <p>Khuyến mãi: Dán cường lực,ốp lưng</p>
                                            @break
                                        @case('giam5')
                                            <p>Khuyến mãi: Giảm 5%</p>

                                            @break
                                        @default
                                            <p>Khuyến mãi: Giảm 10%</p>

                                    @endswitch

                                <p class="add-cart text-center"><a href="{{'showcart-'.$item->id}}">Đặt hàng online</a></p>
								</div>
							</div>
						</div>
						<div id="product-detail">
							<h3>Mô tả sản phẩm</h3>
							<p class="text-justify">{!!$item->description!!}</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
                                    </div>

                                @csrf;
								</form>
							</div>
						</div>
						<div id="comment-list">
                            @foreach($comments as $cmt)
							<ul>
								<li class="com-title">
									{{$cmt->name}}
									<br>
                                <span>{{date('d/m/Y H:i',strtotime($cmt->created_at))}}</span>
								</li>
								<li class="com-details">
									{{$cmt->content}}
								</li>
							</ul>
                            @endforeach
						</div>
					</div>
					<!-- end main -->
@endsection
