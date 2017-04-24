@extends('layouts.epetcare.private.users.index')
@section('content')

	<div class="files">
		<div id="template">
			<button data-dz-remove class="btn btn-danger btn-xs delete" style="position: absolute;top: 5px;right: 5px">
				<i class="glyphicon glyphicon-trash"></i></button>

			<span class="preview">
				<img data-dz-thumbnail/>
			</span>
			<div>
				{{--<p class="name" data-dz-name></p>--}}
				<strong class="error text-danger" data-dz-errormessage></strong>
			</div>
			<div>
			</div>
		</div>
	</div>
	<div class="wrapper wrapper-content animated fadeIn">
		<form name="data-form" id="data-form" action="/user/update" method="post">
			<div class="row">
				<div class="col-lg-12">
					<div class="tabs-container">
						{{-- TABS HEADER --}}
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab-1">
									Основные данные
								</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#tab-2">This is second tab</a>
							</li>
						</ul>
						{{--\ TABS HEADER --}}
						<div class="tab-content">
							<div id="tab-1" class="tab-pane active">
								<div class="ibox-content">
									<div class="row">
										<div id="icon-place" class="col-sm-3 b-r"
										     style="height:200px;text-align: center;padding: 0">
											@include('admin.common.avatar')
										</div>
										<div class="col-sm-9">
											<div class="form-group">
												<label>Имя</label>
												<input
													type="text"
													name="name"
													id="name"
													value="{{$data->name or ''}}"
													placeholder="Имя"
													class="form-control">
											</div>

											<div class="form-group">
												<label>Email</label>
												<input
													type="email"
													name="email"
													value="{{$data->email or ''}}"
													placeholder="Email"
													class="form-control">
											</div>

											<div class="form-group">
												<label>Телефон</label>
												<input
													type="phone"
													name="phone"
													value="{{$data->profile()->first()->phone or ''}}"
													placeholder="Телефон"
													class="form-control">
											</div>

											<div class="form-group">
												<label>Адрес</label>
												<input
													type="text"
													name="address"
													value="{{$data->profile()->first()->address or ''}}"
													placeholder="Адрес"
													class="form-control">
											</div>

											<div class="form-group">
												<label>Skype</label>
												<input
													type="text"
													name="skype"
													value="{{$data->profile()->first()->skype or ''}}"
													placeholder="Skype"
													class="form-control">
											</div>


											@if(isset($data->id))
												<input type="hidden" name="id" value="{{$data->id}}"/>
											@endif
											{{csrf_field()}}
											<input class="btn btn-info" type="submit" form="data-form" name="ready" value="Готово"/>
										</div>
									</div>
								</div>
							</div>
							<div id="tab-2" class="tab-pane">
								<div class="panel-body">
									<strong>Donec quam felis</strong>

									<p>Thousand unknown plants are noticed by me: when I hear the buzz of the little
									   world
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection