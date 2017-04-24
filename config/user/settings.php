<?php

	return [
//poteryashki|naydenyshi|dobryye_ruki|weddings

		'page_titles' => [
			'user'              => 'Личный кабинет',
			'user/profile'      => 'Профиль',
			'user/profile/edit' => 'Редактирование профиля',
			'user/poteryashki'  => 'Ваши сообщения в рзделе "Потеряшки"',
			'user/naydenyshi'   => 'Ваши сообщения в рзделе "Найдёныши"',
			'user/dobryye_ruki' => 'Ваши сообщения в рзделе "В добрые руки"',
			'user/weddings'     => 'Ваши сообщения в рзделе "Свадьбы"',
		],


		'company_name'      => 'Animals',
		'company_site'      => '#',
		'image_max_width'   => 1000,
		'image_max_height'  => 800,
		'avatar_max_width'  => 1000,
		'avatar_max_height' => 800,
		'icon_width'        => 370,
		'icon_height'       => 210,
		'avatar_width'      => 200,
		'avatar_height'     => 200,

		'thumbnail_prefix'    => [
			'small'  => 'thumb_small_',
			'middle' => 'thumb_middle_',
			'large'  => 'thumb_large_',

		],
		'thumbnail_s'         => [ 'w' => 80, 'h' => 50 ],
		'thumbnail_m'         => [ 'w' => 220, 'h' => 140 ],
		'thumbnail_l'         => [ 'w' => 370, 'h' => 230 ],
		'avatar_thumbnail_s'  => [ 'w' => 50, 'h' => 50 ],
		'avatar_thumbnail_l'  => [ 'w' => 200, 'h' => 200 ],
		'avatar_path_to_save' => public_path() . '/icons/',
		'image_path_to_save'  => public_path() . '/uploads/images/',
		'image_tmp_to_save'   => sys_get_temp_dir() . '/',
	];
