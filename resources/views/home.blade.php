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
                            <h3 class="panel-title">Monthly Usage</h3>
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
            </div>
        </section>
    </section>
@endsection
