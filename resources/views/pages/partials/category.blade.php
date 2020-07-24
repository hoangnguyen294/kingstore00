
<div class="container">
    <div class="row">
        <div id="sidebar" class="col-md-3">
            <nav id="menu-category">
                <ul>
                    <li class="menu-title">Hãng sản xuất</li>
                    @foreach($categories as $cate)
                <li class="menu-item"><a href="{{('getcategory-'.$cate->id)}}" title="">{{$cate->name}}</a></li>
                    @endforeach
                </ul>
                <!-- <a href="#" id="pull">Danh mục</a> -->
            </nav>

            <nav id="menu-price">
                <ul>
                    <li class="menu-title">Mức giá</li>
                    <li class="menu-item"><a href="{{'/getprice-03'}}">Dưới 3 triệu</a></li>
                    <li class="menu-item"><a href="{{'/getprice-36'}}">Từ 3 - 6 triệu</a></li>
                    <li class="menu-item"><a href="{{'/getprice-610'}}">Từ 6 - 10 triệu</a></li>
                    <li class="menu-item"><a href="{{'/getprice-1015'}}">Từ 10 - 15 triệu</a></li>
                    <li class="menu-item"><a href="{{'/getprice-1520'}}">Từ 15 - 20 triệu</a></li>
                    <li class="menu-item"><a href="{{'/getprice-25'}}">Trên 20 triệu</a></li>
                </ul>
            </nav>
            <nav id="menu-color">
               <ul>
                   <li class="menu-title">Màu sắc</li>
                   <li class="menu-item">
                        <a class="color-item" id="white" href="{{'/getcolor-white'}}">White</a>
                        <a class="color-item" id="red" href="{{'/getcolor-red'}}">Red</a>
                        <a class="color-item" id="blue" href="{{'/getcolor-blue'}}">Blue</a>
                        <a class="color-item" id="black" href="{{'/getcolor-black'}}">Black</a>
                        <a class="color-item" id="pink" href="{{'/getcolor-pink'}}">Pink</a>
                        <a class="color-item" id="gold" href="{{'/getcolor-gold'}}">Gold</a>
                        <a class="color-item" id="silver" href="{{'/getcolor-silver'}}">Silver</a>
                        <a class="color-item" id="bronze" href="{{'/getcolor-bronze'}}">Bronze</a>
                   </li>


               </ul>
            </nav>
            <nav id="menu-ram">
                <ul>
                    <li class="menu-title">RAM</li>
                    <li class="menu-item"><a href="{{'/getram-1gb'}}">1 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-2gb'}}">2 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-3gb'}}">3 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-4gb'}}">4 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-6gb'}}">6 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-8gb'}}">8 GB</a></li>
                    <li class="menu-item"><a href="{{'/getram-12gb'}}">12 GB</a></li>
                </ul>
            </nav>
            <nav id="menu-memory">
                <ul>
                    <li class="menu-title">Bộ nhớ trong</li>
                    <li class="menu-item"><a href="{{'/getmemory-8gb'}}">8 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-16gb'}}">16 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-32gb'}}">32 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-64gb'}}">64 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-128gb'}}">128 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-256gb'}}">256 GB</a></li>
                    <li class="menu-item"><a href="{{'/getmemory-512gb'}}">512 GB</a></li>
                </ul>
            </nav>

        </div>
