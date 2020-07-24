<link rel="stylesheet" href="css/search.css">
<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="/"><img src="img/home/large.png" height="120px" width="255px"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                        <i class="fa fa-bars"></i>
                    </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
            <form class="navbar-form" role="search" method="get" action="{{'/search'}}">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <input type="text" name="result" class="form-control" placeholder="Nhập từ khóa..."">
                            <input type="submit" value="Tìm kiếm">
                        </div>
                    </div>
                </form>

            </div>
            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a class="display" href="#">Giỏ hàng</a>
                <a href="#"></a>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- endheader -->
