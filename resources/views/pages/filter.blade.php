@extends('pages.home')
@section('main')
<link rel="stylesheet" href="css/home.css">

<div class="products">
    <div class="product-list row">
        @foreach($data as $item)
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

@endsection
