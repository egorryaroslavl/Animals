<form name="form_logout" id="form_logout" method="post" action="/logout">
	{{csrf_field()}}
	<a href="#" onclick="document.getElementById('form_logout').submit()"><i class="fa fa-sign-out"></i> Выйти</a>
</form>