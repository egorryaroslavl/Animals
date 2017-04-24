<?php


	$menuHtml = '<li>Пусто...</li>';
	$items    = config( 'user.menu' )['blade'];
	// dd($items ['blade']);
	// \App\Http\Controllers\UtilsController::Pre($items ['blade'] );
	$Count    = count( $items );



	if( $Count > 0 ){

		$menuHtml = '';

		for( $i = 0; $i < $Count; $i++ ){


			/* формируем список */

			$subItems = $items[ $i ][ 'pages' ];

			$subCount = count( $subItems );

			/* Если есть вложенное меню */

			if( $subCount > 0 ){

				/* формируем вложенное меню */

				$subMenu = '<ul class="nav nav-second-level collapse">';
				for( $ii = 0; $ii < $subCount; $ii++ ){

					$subMenu .= '
<li>
<a href="' . $subItems[ $ii ][ 'url' ] . '">' . $subItems[ $ii ][ 'title' ] . '</a>
</li>
';

				}


				$subMenu .= '</ul>';


				/* и основное */


				$menuHtml .= '
<li class="treeview">
        <a href="' . $items[ $i ] [ 'url' ] . '">
        <i class="' . $items[ $i ] [ 'icon' ] . '"></i> <span>' . $items[ $i ] [ 'title' ] . '</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        ' . $subMenu . '
    </li>
    ';


				/* иначе формируем простое меню */
			} else{
				$menuHtml .= '
            <li><a href="' . $items[ $i ] [ 'url' ] . '"><i class="' . $items[ $i ] [ 'icon' ] . '"></i> ' . $items[ $i ] [ 'title' ] . '</a></li>
            ';


			}


		}

	}


?>
<div class="categories">
	<ul class="list list-border angle-double-right">
		{!! $menuHtml !!}
	</ul>
</div>
