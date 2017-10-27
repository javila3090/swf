<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 27/10/2017
 * Time: 01:23 AM
 */


@if($facts_sent)
    @foreach($facts_sent as $fact_sent)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">Enviado el</div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">{{$fact_sent->text}}</div>
        </div>
    @endforeach
@endif
