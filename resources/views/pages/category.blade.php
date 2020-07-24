@extends('pages.home')
@section('main')
<link rel="stylesheet" href="css/category.css">

					<div id="wrap-inner">
						<div class="products">
                        <h3>{{$catename->name}}</h3>
                            @foreach($items as $item)
							<div class="product-list row">
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img height="150px" width="150px" src="<?= 'data:image;base64,' . $item->prod_img ?>"></a>
                                <p><a href="#">{{$item->prod_name}}</a></p>
									<p class="price">{{number_format($item->prod_price,0,',','.').'đ'}}</p>
									<div class="marsk">
										<a href="{{('detail-'.$item->prod_id)}}">Xem chi tiết</a>
									</div>
								</div>
                            </div>
                            @endforeach
						</div>

                        <div id="pagination">
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
						</div>
                </div>


@endsection
