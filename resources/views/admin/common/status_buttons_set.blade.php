<div data-toggle="buttons-checkbox" class="btn-group">
    <button
            type="button"
            name="public"
            title="<?php if( !$data->public ){
                echo 'Не ';
            } ?>Публикуется"
            class="btn btn-xs btn-primary public"
            id="public_{{$data->id}}"
            value="{{$data->public}}"
            data-id="{{$data->id}}"
            data-table="<?php
            if( isset( $data->table ) && !empty( $data->table ) ) echo $data->table ?>"
            data-field="public"
            data-value="{{$data->public}}"
    ><i id="i_public_{{$data->id}}" class="fa fa-eye<?php if( !$data->public ){
            echo ' shadow';
        } ?>"></i></button>
    <button
            type="button"
            name="anons"
            title="<?php if( !$data->anons ){
                echo 'Не ';
            } ?>Анонсируется"
            class="btn btn-xs btn-info anons"
            id="anons_{{$data->id}}"
            value="{{$data->anons}}"
            data-id="{{$data->id}}"
            data-table="<?php
            if( isset( $data->table ) && !empty( $data->table ) ) echo $data->table ?>"
            data-field="anons"
            data-value="{{$data->anons}}"
    ><i id="i_anons_{{$data->id}}" class="fa fa-bullhorn<?php if( !$data->anons ){
            echo ' shadow';
        } ?>"></i></button>
    <button
            type="button"
            name="hit"
            title="<?php if( !$data->hit ){
                echo 'Не ';
            } ?>Хит"
            class="btn btn-xs btn-success hit"
            id="hit_{{$data->id}}"
            value="{{$data->hit}}"
            data-id="{{$data->id}}"
            data-table="<?php
            if( isset( $data->table ) && !empty( $data->table ) ) echo $data->table ?>"
            data-field="hit"
            data-value="{{$data->hit}}"
    ><i id="i_hit_{{$data->id}}" class="fa fa-fire<?php if( !$data->hit ){
            echo ' shadow';
        } ?>"></i></button>
</div>