@extends('pages.home')
@section('main')

<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list row">
        @foreach($hot as $item)
        <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"><img src="images/product/{{ $item->image }}" class="thumbnail"></a>
            <p><a href="#">{{$item->name}}</a></p>
            @switch($item->promotion)
                @case('phukien')
                    <p class="price">{{number_format($item->price,0,',','.',).'đ'}}</p>
                    <div class="sale">Trả góp 0%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item->id}}">Mua ngay</a></div>
                    @break
                @case('giam5')
                    <p class="price-old">{{number_format($item->price,0,',','.',).'đ'}}</p>
                    <p class="price">{{number_format(($item->price-($item->price*0.05)),0,',','.',).'đ'}}</p>
                    <div class="sale">Giảm giá - 5%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item->id}}">Mua ngay</a></div>
                    @break
                @case('giam10')
                    <p class="price-old">{{number_format($item->price,0,',','.',).'đ'}}</p>
                    <p class="price">{{number_format(($item->price-($item->price*0.1)),0,',','.',).'đ'}}</p>
                    <div class="sale">Giảm giá - 10%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item->id}}">Mua ngay</a></div>
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
<div class="products">
    <h3>Sản phẩm mới</h3>
    <div class="product-list row">
        @foreach($new as $item1)
        <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"><img src="images/product/{{ $item1->image }}" class="thumbnail"></a>
            <p><a href="#">{{$item1->name}}</a></p>
            @switch($item1->promotion)
                @case('phukien')
                    <p class="price">{{number_format($item1->price,0,',','.',).'đ'}}</p>
                    <div class="sale">Trả góp 0%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item1->id}}">Mua ngay</a></div>
                    @break
                @case('giam5')
                    <p class="price-old">{{number_format($item1->price,0,',','.',).'đ'}}</p>
                    <p class="price">{{number_format(($item1->price-($item1->price*0.05)),0,',','.',).'đ'}}</p>
                    <div class="sale">Giảm giá - 5%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item1->id}}">Mua ngay</a></div>
                    @break
                @case('giam10')
                    <p class="price-old">{{number_format($item1->price,0,',','.',).'đ'}}</p>
                    <p class="price">{{number_format(($item1->price-($item1->price*0.1)),0,',','.',).'đ'}}</p>
                    <div class="sale">Giảm giá - 10%</div>
                    <div class="buynow"><a href="{{'/addcart-'.$item1->id}}">Mua ngay</a></div>
                    @break
                @default

            @endswitch
            <div class="marsk">
                <a href="{{('detail-'.$item1->id)}}">Xem chi tiết</a>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
