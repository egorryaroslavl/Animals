@extends('layouts.epetcare.index')
@section('content')
	<!-- Section: inner-header -->
	<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="/epetcare/images/bg/bg6.jpg">
		<div class="container pt-30 pb-30">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">
					<div class="col-sm-8 text-left flip xs-text-center">
						<h2 class="title">Page Title</h2>
					</div>
					<div class="col-sm-4">
						<ol class="breadcrumb text-right sm-text-center text-black mt-10">
							<li><a href="#">Home</a></li>
							<li><a href="#">Pages</a></li>
							<li class="active text-theme-colored">Page Title</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-lighter">
		<div class="container">
			<div class="row">
				<div class="col-sm-12" style="background: #fff">
					<!-- Section: Titles Ten -->
					<section class="bg-lighter">
						<div class="container pb-30">
							<div class="section-title">
								<div class="row">
									<div class="col-md-7">
										<div class="col-md-5">
											<div class="text-right">
												<p class="right-bordered mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere quidem.
												</p>
											</div>
										</div>
										<div class="col-md-7">
											<h2 class="title mb-5">Title Style Ten</h2>
											<h5 class="sub-title">Sub Title Here</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="row">
						<div class="col-xs-3 col-sm-4" style="background: lavender">
							<ul class="list-icon theme-colored rounded">
								<li><i class="fa fa-clock-o"></i><a href="#">Потеряшки</a> </li>
								<li><i class="fa fa-hand-o-right"></i><a href="#">Найдёныши</a></li>


							</ul>
						</div>
						<div class="col-xs-9 col-sm-8">
					@include('admin.common.avatar')
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	@include('admin.logout_button')
@endsection