<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 28/09/2017
 * Time: 10:57 PM
 */

@if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
        <button type='button' class='close' data-dismiss='alert'>×</button>
        {!! session('message.content') !!}
    </div>
@endif