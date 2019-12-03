@extends('layouts.index')
@section('title','Home')
@section('content')
<div class="row">
    <!-- statustic-card  start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="feather icon-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Use Space</span>
                <h4>49/50GB</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 feather icon-alert-triangle m-r-10"></i>Get more space
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="feather icon-home bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Revenue</span>
                <h4>$23,589</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 feather icon-calendar m-r-10"></i>Last 24 hours
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="feather icon-alert-triangle bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Fixed Issue</span>
                <h4>45</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 feather icon-tag m-r-10"></i>Tracked at microsoft
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="feather icon-twitter bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Followers</span>
                <h4>+562</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 feather icon-watch m-r-10"></i>Just update
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- statustic-card  end -->


    <div class="col-xl-8 col-md-8">
            <div class="card">
                <div class="card-block bg-c-green">
                    <div id="data-kamar" style="height: 230px"></div>
                </div>
                <div class="card-footer">
                    <h6 class="text-muted m-b-30 m-t-15">Total completed project and earning</h6>
                    <div class="row text-center">
                        <div class="col-6 b-r-default">
                            <h6 class="text-muted m-b-10">Completed Projects</h6>
                            <h4 class="m-b-0 f-w-600 ">175</h4>
                        </div>
                        <div class="col-6">
                            <h6 class="text-muted m-b-10">Total Earnings</h6>
                            <h4 class="m-b-0 f-w-600 ">76.6M</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
    AmCharts.makeChart("data-kamar",
    {
        type:"serial",
        hideCredits:!0,
        theme:"light",
        dataProvider:[{
            type:"Type A",
            visits:10
        },
    {
        type:"Type B",
        visits:15},
    {
        type:"Type C",
        visits:12
    },
    {
        type:"Type D",
        visits:16
    },
    {
        type:"Type E",
        visits:8
    }],
    valueAxes:[
        {
            gridAlpha:.3,
            gridColor:"#fff",
            axisColor:"transparent",
            color:"#fff",
            dashLength:0
        }],
    gridAboveGraphs:!0,
    startDuration:1,
    graphs:[
        {
            balloonText:"Active User: <b>[[value]]</b>",
            fillAlphas:1,
            lineAlpha:1,
            lineColor:"#fff",
            type:"column",
            valueField:"visits",
            columnWidth:.5
        }],
    chartCursor: {
        categoryBalloonEnabled:!1,
        cursorAlpha:0,zoomable:!1},
        categoryField:"type",
    categoryAxis:{
        gridPosition:"start",
        gridAlpha:0,
        axesAlpha:0,
        lineAlpha:0,
        fontSize:12,
        color:"#fff",
        tickLength:0
    },
    export:{
        enabled:
        !1
    }})
    </script>
@endsection