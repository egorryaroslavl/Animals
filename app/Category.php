<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Category extends Model
	{
		protected $fillable = [
			'name', 'alias', 'icon', 'description', 'short_description',
			'related', 'public', 'anons', 'hit', 'pos', 'metatag_title', 'metatag_description', 'metatag_keywords'
		];
	}
