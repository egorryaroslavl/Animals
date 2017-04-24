@extends('layouts.admin.index')
@section('content')

	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="ibox-content m-b-sm border-bottom">
			{{--	<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label" for="product_name">Product Name</label>
							<input type="text" id="product_name" name="product_name" value="" placeholder="Product Name"
								   class="form-control">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label class="control-label" for="price">Price</label>
							<input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label class="control-label" for="quantity">Quantity</label>
							<input type="text" id="quantity" name="quantity" value="" placeholder="Quantity"
								   class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label" for="status">Status</label>
							<select name="status" id="status" class="form-control">
								<option value="1" selected>Enabled</option>
								<option value="0">Disabled</option>
							</select>
						</div>
					</div>
				</div>--}}
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox-content">

						<table class="items-table table table-stripped toggle-arrow-tiny" data-page-size="15">
							<thead>
							<tr>
								<th data-toggle="true">ID</th>
								<th data-hide="name">Имя</th>
								<th data-hide="email">E-mail</th>
								<th data-hide="phone">Статус</th>
								<th class="text-right" data-sort-ignore="true">Action</th>
							</tr>
							</thead>
							<tbody>
							@if(isset($data) && count($data)>0)
								@foreach($data as $item)
									<tr>
										<td>
											<a href="/admin/user/{{$item->id}}">ID - {{$item->id}}</a>
										</td>

										<td>
											<a href="/admin/user/{{$item->id}}">{{$item->name}}</a>
										</td>
										<td>
											{{$item->email}}
										</td>

										<td>

											@foreach(\App\User::getRoles($item->id) as $role)
												{{$role->slug}}
												@endforeach
										</td>
										<td>
											<div class="btn-group">
												<a href="/admin/user/{{$item->id}}">
													<button class="btn-info btn btn-xs"><i
															class="fa fa-pencil-square-o"></i></button>
												</a>
												<a href="/admin/user/delete/{{$item->id}}">
													<button class="btn-danger btn btn-xs"><i
															class="fa fa-trash"></i></button>
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							@endif
							</tbody>
							<tfoot>
							<tr>
								<td colspan="6">
									<ul class="pagination pull-right"></ul>
								</td>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection