<div class="row">
    <div class="col-xs-3">
        @include('admin.common.icon')
    </div>
    <div class="col-xs-9">
        <div class="form-group">
            {{Form::label('description','Описание')}}
            {{Form::textarea('description',$data->description,['class'=>'form-control','id'=>'description' ])}}

            {{Form::label('short_description','Краткое Описание')}}
            {{Form::textarea('short_description',$data->short_description,['class'=>'form-control','id'=>'short_description','rows'=>'3'])}}
        </div>
    </div>
</div>