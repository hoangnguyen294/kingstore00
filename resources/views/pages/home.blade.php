<!DOCTYPE html>
<html>
<head>
	@include('pages.partials.head')
</head>
<body>
	<!-- header -->
	@include('pages.partials.cart')

	<!-- main -->
	<section id="body">
		@include('pages.partials.category')

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					@include('pages.partials.slide')

					{{-- @include('pages.partials.banner') --}}

					<div id="wrap-inner">
						@yield('main')
					</div>

					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	@include('pages.partials.footer')
</body>
</html>
