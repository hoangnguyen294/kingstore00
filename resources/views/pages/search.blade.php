@extends('pages.home')
@section('main')
<link rel="stylesheet" href="css/search.css">


					<div id="wrap-inner">
						<div class="products">
                        <h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
                        <div class="product-list row">
                            @foreach($items as $item)
                            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                <a href="#"><img src="images/product/{{ $item->image }}" class="thumbnail"></a>
                                <p><a href="#">{{$item->name}}</a></p>
                                @switch($item->promotion)
                                    @case('phukien')
                                        <p class="price">{{number_format($item->price,0,',','.',).'đ'}}</p>
                                        <div class="sale">Trả góp 0%</div>
                                        <div class="buynow"><a href="">Mua ngay</a></div>
                                        @break
                                    @case('giam5')
                                        <p class="price-old">{{number_format($item->price,0,',','.',).'đ'}}</p>
                                        <p class="price">{{number_format(($item->price-($item->price*0.05)),0,',','.',).'đ'}}</p>
                                        <div class="sale">Giảm giá - 5%</div>
                                        <div class="buynow"><a href="">Mua ngay</a></div>
                                        @break
                                    @case('giam10')
                                        <p class="price-old">{{number_format($item->price,0,',','.',).'đ'}}</p>
                                        <p class="price">{{number_format(($item->price-($item->price*0.1)),0,',','.',).'đ'}}</p>
                                        <div class="sale">Giảm giá - 10%</div>
                                        <div class="buynow"><a href="">Mua ngay</a></div>
                                        @break
                                    @default

                                @endswitch
                                <div class="marsk">
                                    <a href="{{('detail-'.$item->id)}}">Xem chi tiết</a>
                                </div>

                            </div>
                            @endforeach
                        </div>
						</div>

						{{-- <div id="pagination">
							<ul class="pagination pagination-lg justify-content-center">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item disabled"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</div> --}}
					</div>
@endsection
					<!-- end main -->
