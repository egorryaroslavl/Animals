@extends('layouts.epetcare.private.users.index')
@section('content')
	<?php


	$socrbase = 'http://basicdata.ru/api/json/fias/socrbase/';
/*	[5] => Array
	(
		[level] => 1
        [scname] => обл
	[socrname] => Область
	[kod_t_st] => 105
	)	*/

	$operstat = 'http://basicdata.ru/api/json/fias/operstat/';
	$strstat = 'http://basicdata.ru/api/json/fias/strstat/';
/*  [1] => Array
                (
                    [strstatid] => 1
                    [name] => Строение
                    [shortname] => стр
                )*/
	$normdoc = 'http://basicdata.ru/api/json/fias/normdoc/000004aa-0379-4b18-b6b3-14cef3c6bf20/';
	$landmark = 'http://basicdata.ru/api/json/fias/landmark/0097c218-c9de-4bf0-915f-8b84a2bec231/';
/*    [1] => Array
                (
                    [location] => Жемчужная ул
                    [postalcode] => 184209
                    [ifnsfl] => 5118
                    [terrifnsfl] =>
                    [ifnsul] => 5118
                    [terrifnsul] =>
                    [okato] => 47405000000
                    [oktmo] => 47705000
                    [updatedate] => 2013-03-18
                    [landid] => f4fdc0ab-63a6-4666-90d3-590b20f3184e
                    [landguid] => 804f0544-9c51-417c-8f9d-50c4bdb9c7d0
                    [aoguid] => 0097c218-c9de-4bf0-915f-8b84a2bec231
                    [startdate] => 2012-01-01
                    [enddate] => 2079-06-06
                    [normdoc] => 6de0905c-e18e-4343-9a85-20b49aa16bc0
                )*/


	$intvstat = 'http://basicdata.ru/api/json/fias/intvstat/';
/*            [2] => Array
                (
                    [intvstatid] => 2
                    [name] => Четный
                )

            [3] => Array
                (
                    [intvstatid] => 3
                    [name] => Нечетный
                )
*/

	$houseint = 'http://basicdata.ru/api/json/fias/houseint/fe31de9d-122c-44fd-a4d3-6d546fff943d/';

	$house = 'http://basicdata.ru/api/json/fias/house/c13e5ed3-494a-4277-8b42-fb903c006fa7/';

	$eststat = 'http://basicdata.ru/api/json/fias/eststat/';
	$url ='http://basicdata.ru/api/json/fias/actstat/';
	$fias = file_get_contents($url)	;

		\App\Http\Controllers\UtilsController::Pre(json_decode($fias,true) );


	//dd(\App\Kladr::region()  )  ;
//	$regions = \App\Kladr::region();
	 //dd($regions );
/*	echo '<select>'	;
	echo '<option>Выбрать</option>';
	foreach( $regions as $region ){

		echo '<option>' . $region->NAME . '  ' . $region->SOCR . '</option>';
	}
	echo '</select>'	;*/
	?>
	<section class="bg-white-f7 mb-20">

		<div class="row">
			<div class="col-md-12 pl-md-10 ">
				<h4 class="sub-title">Профиль</h4>
			</div>
		</div>
	</section>

	<section>

		<div class="col-md-3">
			<div class="">
				<a href="#" onclick="return false" class="thumbnail">@widget('UserAvatar')</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="line-bottom mb-0 mt-0">{{ $data->name }}</h3>
			<h5 class="text-theme-colored">{{ $data->email }}</h5>
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">...</div>

				<!-- Table -->
				<table class="table">
					<tbody>
					<tr>
						<td>Адрес</td>
						<td>{{$data->profile()->first()->address}}</td>
					</tr>
					<tr>
						<td>Телефон</td>
						<td>{{$data->profile()->first()->phone or 'нет данных'}}</td>
					</tr>
					<tr>
						<td>Skype</td>
						<td>{{$data->profile()->first()->skype or 'нет данных'}}</td>
					</tr>
					</tbody>
				</table>
			</div>
			<a href="/user/profile/edit" class="btn btn-dark btn-theme-colored" data-toggle="tooltip"
			   data-placement="top" title="Изменить"> Изменить</a>
		</div>

	</section>
@endsection
