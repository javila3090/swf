<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 28/09/2017
 * Time: 10:58 PM
 */

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>