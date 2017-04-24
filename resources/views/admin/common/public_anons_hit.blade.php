<div class="row">
    <div class="col-xs-4">
        <label for="public" class="checkbox-inline i-checks">
            {{Form::checkbox('public',1, $data->public ==  0 ?  false  : true ,['class'=>'public','id'=>'public' ])}}
            <i></i>
            Публикуется </label>
    </div>
    <div class="col-xs-4">
        <label for="anons" class="checkbox-inline i-checks">
            {{Form::checkbox('anons',1,$data->anons ==  0 ? false  : true ,['class'=>'anons','id'=>'anons' ])}}
            <i></i>
            Анонс </label>

    </div>
    <div class="col-xs-4">
        <label for="hit" class="checkbox-inline i-checks">
            {{Form::checkbox('hit',1,$data->hit ==  0  ? false  : true,['class'=>'hit','id'=>'hit' ])}} <i></i>
            Хит </label>
    </div>
</div>