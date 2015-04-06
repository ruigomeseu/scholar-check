@extends('app')

@section('additional_scripts')
    <script type="text/javascript">
        var opts = {
            lines: 12, // The number of lines to draw
            angle: 0, // The length of each line
            lineWidth: 0.4, // The line thickness
            pointer: {
                length: 0.75, // The radius of the inner circle
                strokeWidth: 0.042, // The rotation offset
                color: '#1D212A' // Fill color
            },
            limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
            colorStart: '#1ABC9C',   // Colors
            colorStop: '#1ABC9C',    // just experiment with them
            strokeColor: '#F0F3F3',   // to see which ones work best for you
            generateGradient: true
        };
        var target = document.getElementById('gauge'); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = {{ $maxApiCalls }}; // set max gauge value
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set({{ $callsUsed }}); // set actual value
        gauge.setTextField(document.getElementById("gauge-text"));

        var chartJs = function () {
            var lineChartData = {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'API Usage',
                    fillColor: 'rgba(26,188,156,0.5)',
                    strokeColor: 'rgba(26,188,156,1)',
                    pointColor: 'rgba(220,220,220,1)',
                    pointStrokeColor: '#fff',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [{{ $calls }}]
                }]

            };

            var ctx1 = document.getElementById("api-monthly").getContext("2d");
            var myNewChart = new Chart(ctx1).Line(lineChartData, {
                responsive: true
            });
        };

        chartJs();
    </script>
@endsection

@section('content')
    <section class="main-content-wrapper">
        <div class="pageheader">
            <h1>Dashboard</h1>

            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <section id="main-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Monthly Quota</h3>
                        </div>
                        <div class="panel-body widget-gauge">
                            <canvas width="160" height="100" id="gauge" class=""></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="gauge-text" class="gauge-value pull-left">{{ $callsUsed }}</span>
                                <span id="goal-text" class="goal-value pull-right">{{ $maxApiCalls }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-solid-success widget-mini">
                                <div class="panel-body">
                                    <i class="icon-user"></i>
                                    <span class="total text-center">{{ $validEmails }}</span>
                                    <span class="title text-center">Student Emails Validated</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-solid-info widget-mini">
                                <div class="panel-body">
                                    <i class="icon-user"></i>
                                    <span class="total text-center">{{ $allTimeCalls }}</span>
                                    <span class="title text-center">Total API Calls</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest API Calls</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table latest-api-calls">
                                @foreach($latestApiCalls as $call)
                                    <tr>
                                        <td>{{ $call->email }}</td>
                                        <td>{!! $call->present()->status !!}</td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Weekly API Usage</h3>
                        </div>
                        <div class="panel-body server-chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="line-chart">
                                        <canvas id="api-monthly" height="100" width="499"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
