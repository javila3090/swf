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
                <h1 class="tittle">Orders by month</h1>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                    <div class="x_panel ui-ribbon-container fixed_height_390">
                        <div class="ui-ribbon-wrapper">
                            <div class="ui-ribbon">
                                30% Off
                            </div>
                        </div>
                        <div class="x_title">
                            <h2>User Mail</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                  <span class="percent"></span>
                              </span>
                            </div>
                            <h3 class="name_title">Finance</h3>
                            <p>Short Description</p>
                            <div class="divider"></div>
                            <p>If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection