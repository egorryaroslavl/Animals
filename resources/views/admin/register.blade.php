<!DOCTYPE html>
<head>
	<title>Административный вход</title>
	<meta charset="utf-8"/>
	<meta name="viewport"
	      content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta content="" name="description"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">
	<style>body.login{color:#7F7F7F;background-image:url(data:image/png;base64,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)}body.login .main-login{margin-top:10%}body.login .logo{padding:20px;text-align:center}body.login .box-login,body.login .box-forgot,body.login .box-register{background:url(data:image/png;base64,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);border-radius:5px;box-shadow:-30px 30px 50px rgba(0,0,0,0.32);overflow:hidden;padding:15px}body.login .box-forgot,body.login .box-register,body.login .box-login{display:none}body.login .form fieldset{border:none;margin:0;padding:10px 0 0}body.login a.forgot{color:#909090;font-size:12px;position:absolute;right:10px;text-shadow:1px 1px 1px #FFF;top:9px}body.login input.password{padding-right:130px}body.login label{color:#7F7F7F;font-size:14px;margin-top:5px}body.login .copyright{font-size:11px;margin:0 auto;padding:10px 10px 0;text-align:center}body.login .form-actions:before,body.login .form-actions:after{content:"";display:table;line-height:0}body.login .form-actions:after{clear:both}body.login .form-actions{margin-top:15px;padding-top:10px;display:block}body.login .new-account{border-top:1px dotted #EEE;margin-top:15px;padding-top:10px;display:block}</style>
</head>
<body class="login">
{{--<div class="animated fadeInUp" style="position: absolute;top:5px;left:5px;opacity: .5">Сайт обслуживается <p
		class="animated slideInUp">ООО "Топ-Поиска" <a href="http://www.top-poiska.ru/" title="Продвижение сайтов">продвижение сайтов</a>,
		<a href="http://www.top-poiska.ru/sozdanie_saytov/" title="создание сайтов">создание сайтов</a>, управление репутацией, аудит<br> г.Ярославль Ленинградский проспект д. 68 &nbsp;тел: +7  (920) 103-28-08</p></div>--}}
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default " style="margin-top: 100px;box-shadow:-30px 30px 50px rgba(0,0,0,0.32);">
				<div class="panel-heading"><h3 style="text-align:center">Регистрация </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="/register">
						{{ csrf_field() }}
						<input type="hidden" name="status" value="{{ $status  }}"/>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Имя</label>

							<div class="col-md-6">
								<input
									id="name"
									type="text"
									class="form-control"
									name="name"
									value="{{ old('name') }}">

								@if ($errors->has('name'))
									<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail адрес</label>

							<div class="col-md-6">
								<input
									id="email"
									type="email"
									class="form-control"
									name="email"
									value="{{ old('email') }}">

								@if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Пароль</label>

							<div class="col-md-6">
								<input
									id="password"
									type="password"
									class="form-control"
									name="password">

								@if ($errors->has('password'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>

							<div class="col-md-6">
								<input
									id="password-confirm"
									type="password"
									class="form-control"
									name="password_confirmation">

								@if ($errors->has('password_confirmation'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
								@endif
							</div>
						</div>
						@if( session('error'))
							<div class="alert alert-danger"><strong>{{ session('error')  }}</strong></div>
						@endif
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i> Готово
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>