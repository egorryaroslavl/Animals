<?php


    $menuHtml = '<li>Пусто...</li>';
    $items    = config( 'admin.menu' );
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
            <li><a href="' . $items[ $i ] [ 'url' ] . '"><i class="' . $items[ $i ] [ 'icon' ] . '"></i> <span>' . $items[ $i ] [ 'title' ] . '</span></a></li>
            ';


            }


        }

    }


?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				@include('admin.common.current_admin_icon')
{{--
				<div class="logo-element">
					IN+
				</div>--}}
			</li>
			{!! $menuHtml !!}
		</ul>

	</div>
</nav>
