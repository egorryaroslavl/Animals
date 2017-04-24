@extends('layouts.epetcare.index')
@section('content')
	<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="/epetcare/images/bg/bg6.jpg">
		<div class="container pt-60 pb-5">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">
					<div class="col-md-12 text-center">
						@if( session('ok'))
							<div class="alert alert-success"><strong>{{ session('ok')  }}</strong></div>
						@endif
						<h2 class="title">Войдите в ваш аккаунт</h2>
						<ol class="breadcrumb text-center text-black mt-10">
							<li><a href="/">Главная</a></li>

						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-3">
					<div class="border-1px p-5">

						<form role="form" method="POST" action="/login">
							{{ csrf_field() }}
							<div class="form-group">
								<input
									id="email"
									type="email"
									class="form-control"
									name="email"
									placeholder="Ваш Email"
									value="@if( session('email'))
									{{ session('email')  }}
									@endif">
								@if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group form-actions">
								<input
									id="password"
									type="password"
									class="form-control"
									placeholder="Пароль"
									name="password">
								@if ($errors->has('password'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
								<div class="form-group">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Запомнить меня
										</label>
									</div>
								</div>

								<div class="form-actions">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-sign-in"></i> Войти
									</button>
									@if( session('error'))
										<div class="alert alert-danger"><strong>{{session('error')}}</strong></div>
									@endif
								</div>
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
