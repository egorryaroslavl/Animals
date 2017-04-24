<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
             {{Form::label('metatag_title','Title',['for'=>'metatag_title'])}}
            {{  Form::text(
              'metatag_title',
              $data->metatag_title,
               [
                            'type'        => 'text',
                            'class'       => 'form-control',
                            'id'          => 'metatag_title',
                            'placeholder' => 'metatag title'
                             ] )

              }}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {{ Form::label('metatag_description','Description' ,['for'=>'metatag_description']) }}
            {{ Form::text(
            'metatag_description',
            $data->metatag_description,
                  [
                            'type'        => 'text',
                            'class'       => 'form-control',
                            'id'          => 'metatag_description',
                            'placeholder' => 'metatag description'
                            ] )

            }}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {{ Form::label('metatag_keywords','Keywords' ,['for'=>'metatag_keywords']) }}
            {{ Form::textarea(
            'metatag_keywords',
            $data->metatag_description,
                  [
                            'type'        => 'text',
                            'class'       => 'form-control',
                            'rows'        =>'2',
                            'id'          => 'metatag_keywords',
                            'placeholder' => 'metatag keywords'
                            ] )

            }}
        </div>
    </div>
</div>