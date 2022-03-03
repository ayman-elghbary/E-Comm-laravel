<!DOCTYPE html>
<html lang="en">
<head>
	@include('front.home.head')
</head>
<body class="animsition">
	<!-- Header -->
	@include ('parts.navbar')
	<!-- Cart -->
	@include('parts.cartsbar')
	<!-- Slider -->
	@include('front.home.slider')
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
		<div class="container">
			<div class="row">
				@foreach (\App\Models\Category::all() as $category)
					
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('storage/'.$category->logo)}}" alt="IMG-BANNER">

						<a href="{{route('front.category.show',$category)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{$category->title}}
								</span>

							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
	<!-- Product -->
	@include('front.home.products')
	<!-- Footer -->
	@include('parts.footer')
	<!-- Modal1 -->
<!--===============================================================================================-->	
@include('front.home.scripts')


</body>
</html>