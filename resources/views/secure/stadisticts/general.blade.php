<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 01/11/2017
 * Time: 09:11 PM
 */
?>
@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <h1 class="tittle">Stadisticts</h1>
                <hr>
            </div>
            <div class="well" style="overflow: auto">
                <div class="col-md-6">
                    Select a date range

                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                        <input type="text" style="width: 200px" name="date" id="reservation" class="form-control" value="" />
                                    </div>
                                    <button type="button" class="btn swButton" id="stadisticts-by-date">Search</button>
                                </div>
                            </div>
                        </fieldset>

                </div>
            </div>
            <div id="resultado"></div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#stadisticts-by-date").click(function(){

                var date_array = $('#reservation').val();
                $.ajax({
                    url: '/secure/stadisticts/all/by/date',
                    type: 'GET',
                    data: 'date='+date_array,
                    beforeSend: function ( ) {
                        $("#resultado").html('');
                        $('#gif').show();
                    },
                    success : function( data ) {
                        data = JSON.parse(data);
                        console.log(data);
                        $('#gif').hide();
                        $.each(data, function(index, element) {
                            $('#resultado').append('<div class="col-md-4 col-sm-12 col-xs-12 widget widget_tally_box">\n' +
                                '                    <div class="x_panel ui-ribbon-container fixed_height_390">\n' +
                                '                        <div class="x_title">\n' +
                                '                            <h2>'+index+'</h2>\n' +
                                '                            <div class="clearfix"></div>\n' +
                                '                        </div>\n' +
                                '                        <div class="x_content">\n' +
                                '                            <div style="text-align: center; margin-bottom: 17px">\n' +
                                '                              <span class="chart" data-percent="86"><h1>'+element+'</h1>\n' +
                                '                              </span>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>');
                        });

                    },
                    error   : function( xhr, err ) {
                        console.log(err);
                    }
                });
                return false;
            });
        });
    </script>
@endsection