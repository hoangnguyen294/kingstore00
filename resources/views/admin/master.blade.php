<!DOCTYPE html>
<html>
<head>
@include('admin.partials.head')
</head>
<body>
	@include('admin.partials.logout')

	@include('admin.partials.navbar')

	@yield('main')

	@include('admin.partials.js')
</body>

</html>
