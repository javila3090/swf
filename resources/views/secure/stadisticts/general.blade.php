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
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                        <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                    <div class="x_panel ui-ribbon-container fixed_height_390">
                        <div class="x_title">
                            <h2>Orders</h2>
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
                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                    <div class="x_panel ui-ribbon-container fixed_height_390">
                        <div class="x_title">
                            <h2>Profict</h2>
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
                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                    <div class="x_panel ui-ribbon-container fixed_height_390">
                        <div class="x_title">
                            <h2>Facts Sent</h2>
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
                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                    <div class="x_panel ui-ribbon-container fixed_height_390">
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