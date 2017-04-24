@extends('layouts.epetcare.index')
@section('content')
	<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="/epetcare/images/bg/bg6.jpg">
		<div class="container pt-60 pb-5">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="title">Регистрация</h2>
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
						<h4 class="text-theme-colored text-uppercase m-0">Зарегистрируйте аккаунт</h4>
						<div class="line-bottom mb-10"></div>
						<p>Заполните поля этой формы. На ваш e-mail будет отправлено сообщение для подтверждения
						   регистрации и активации вашего аккаунта</p>
						<p>Вся процедура регистрации займёт несколько минут.</p>
						<p>
							<small>Ваш e-mail публиковаться не будет.</small>
						</p>
						<form id="appointment_form" name="appointment_form" class="mt-10" method="post"
						      action="/register">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group mb-10">
										<input
											id="name"
											type="text"
											class="form-control"
											name="name"
											value="{{ old('name') }}"
											placeholder="Имя*"
										>

									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group mb-10">
										<input
											id="email"
											type="email"
											class="form-control required email"
											name="email"
											value="{{ old('email') }}"
											placeholder="Email*"
										>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group mb-10">
										<input
											id="password"
											type="password"
											class="form-control"
											name="password"
											placeholder="Пароль*"
										>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group mb-10">
										<input
											id="password-confirm"
											type="password"
											class="form-control"
											name="password_confirmation"
											placeholder="Повторите ввод пароля*"
										>
									</div>
								</div>

							</div>

							<div class="form-group mb-0 mt-20">
								@if( session('error'))
									<div class="alert alert-danger"><strong>{{ session('error')  }}</strong></div>
								@endif
								{{ csrf_field() }}
								<input type="hidden" name="status" value="user"/>
								<button type="submit" class="btn btn-dark btn-theme-colored"
								        data-loading-text="Подождите немного...">Готово
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
