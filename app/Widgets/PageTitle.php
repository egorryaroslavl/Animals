<?php

	namespace App\Widgets;

	use Arrilot\Widgets\AbstractWidget;
	use Illuminate\Http\Request;
	use Route;

	class PageTitle extends AbstractWidget
	{

		//  protected $config = [];


		public function run( Request $request )
		{

			$pageTitles = config( 'user.settings.page_titles' );
			$page = $request->path();

			return view( "widgets.page_title", [
				'title'    => $pageTitles[ $page ],
				'subtitle' => 'subtile'
			] );
		}
	}