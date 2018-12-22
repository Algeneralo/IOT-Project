@extends('layouts.backend')
<style>
	{
		box-sizing: border-box;
		margin:0;
		border:0;
		padding:0;
		font-family: Oswald;
	}

	.fullscreen{
		position: fixed;
		top: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
		background: rgba(28, 32, 36);}
	.toppart, .bottompart{
		width: 100%;
		height: 50%;
		padding:15px;
	}
	.toppart{
		position: relative;
		background: rgb(28,32,36);
		color:rgb(39, 170, 225);
	}
	.heating{
		background: rgb(241,90,36);
		color:rgb(28, 32, 36);
	}
	.cooling{
		background: rgb(39,170,225);
		color:rgb(28, 32, 36);
	}
	.temperature-type {
		position: absolute;
		right: 10px;
		top: 10px;
		font-size: 6vmin;
		text-align: right;
		cursor: pointer;
	}
	.temperature-type p {
		display: inline-block;
		position: relative;
		padding-left: 2px;
		font-size: 8vmin;
		line-height: 1;
	}
	.main-temperature {
		position: absolute;
		left: 50%;
		top: 50%;
		font-size: 18vmin;
		transform: translate(-50%,-50%);
		margin-top: -15px;
	}
	.traget {
		position: absolute;
		bottom: 7vmin;
		right: 10px;
		margin-bottom: 10px;
		cursor: pointer;
	}
	.traget > div{
		line-height: 1;
		font-size: 6vmin;
		display: inline-block;
		padding-top: 4px;
	}
	.traget > div::before {
		content: 'TARGET';
		position: absolute;
		bottom: 100%;
		right: 0;
		font-size: 3vmin;
	}
	.toppart .status{
		position: absolute;
		left: 0;
		bottom:15px;
		width: 100%;
	}
	.toppart .status > div{
		position relative;
		width: 100%;
		text-align: center;
	}
	.toppart .status > div::after{
		content: 'IN RANGE';
		position: relative;
		z-index: 2;
		display: inline-block;
		padding:0 10px;
		background:rgb(28,32,36);
		font-size:4vmin;
		line-height: 1;
	}
	.toppart .status > div::before{
		position: absolute;
		top: 50%;
		margin-top: -1px;
		left:0;
		background:rgb(39, 170, 225);
		content: '';
		width: 100%;
		z-index: 1;
		height:2px;
	}
	.toppart.heating .status > div::after{
		content: 'HEATING';
		background: rgb(241,90,36);
	}
	.toppart.heating .status > div::before{
		background:rgb(28, 32, 36);
	}
	.toppart.cooling .status > div::after{
		content: 'COOLING';
		background: rgb(39,170,225);
	}
	.toppart.cooling .status > div::before{
		background:rgb(28, 32, 36);
	}
	.chart{
		width: 100%;
		height: 100%;
	}
	.chart img{
		width: 100%;
		height: 100%;
	}
	.bottompart{
		padding-bottom:55px;
		position: relative;
		background: rgba(28, 32, 36);
	}
	.button-section{
		list-style: none;
		position:absolute;
		left:0;
		bottom:0;
		width: 100%;
	}
	.button-section li{
		padding:10px 15px 15px;
		height: 50px;
		float:left;
		width: 33.33%;
		text-align: center;
	}
	.button-section li a, .btn-default{
		display: block;
		width: 100%;
		color: rgba(39,170,225);
		text-decoration: none;
		border:1px solid rgb(39,170,225);
		transition: .3s all linear;
		cursor: pointer;
	}
	.btn-default{
		display: inline-block;
		width: auto;
		padding:5px;
	}
	.button-section li a:hover{
		display: block;
		width: 100%;
		background: rga(39,170,225);
		color: rgba(255,255,225);
		text-decoration: none;
		background:rgb(39,170,225);
	}
	.modal{
		position:fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: none;
		z-index: 9999999;
		background: rgba(0,0,0,0.5);
	}
	.modal .inner-modal {
		background: #ffffff;
		padding: 15px;
		font-size: 14px;
		width: 250px;
		margin: 50px auto;
	}
	.input{
		border:1px solid rgb(39,170,225);
		padding: 5px;
		vertical-align: top;
	}
</style>
@section('content')
	<!-- Hero -->
	<div class="bg-body-light">
		<div class="content content-full">
			<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
				<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Device Live View</h1>
				<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Device</li>
						<li class="breadcrumb-item active" aria-current="page">Live</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- END Hero -->

	<!-- Page Content -->
	<div class="content">

		<div class="row">
			<div class="col-md-10">
				<div class="toppart" id="toppart">
					<div class="temperature-type" id="temperature-type" onclick="publish(1)">
						<p id="temerature-unit">--</p>
					</div>
					<div class="main-temperature" id="temperature">
						00.0
					</div>
					<div class="traget">
						<div id="target">00.0</div>
					</div>
					<div class="status" id="status">
						<div>
						</div>
					</div>
				</div>
				<div class="bottompart">
					<div class="chart">
						<img src="/images/graph.png" alt="">
					</div>
					<ul class="button-section">
						<li><a id="togglepause" href="javascript:;" onclick="connectionToggle()">STOPPED</a></li>
						<li><a id="settings" href="javascript:;">SETTINGS</a></li>
						<li><a id="crash" href="javascript:;">CRASH</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="target-box" class="modal target-box">
			<div class="inner-modal">
				<input type="text" id="target-value" class="input">
				<button id="target-set" class="btn-default" disabled="">Set</button>
			</div>
		</div>

		<!-- Source Paho MQTT Client-->
		<script src="{{ URL::asset('js/paho-mqtt.js') }}"></script>
		<!--<script src="../src/paho-mqtt.js"></script>-->

		<!-- Utility Javascript -->
		<script src="{{ URL::asset('js/device_utility.js') }}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
            $(function(){
                $('#target').on('click', function(){
                    $('#target-box').show();
                })
                $('#target-set').on('click', function(){
                    var targetValue = Number.parseFloat($('#target-value').val());
                    targetValue = targetValue.toFixed(1);
                    publish(0,targetValue);
                    $('#target').text(targetValue);
                    targetGlobalValue = targetValue;

                    var differenceValue = (+$('#temperature').text()) - targetValue;
                    $('#target-box').hide();
                })

                $('#target-value').on('keyup', function(){
                    if(!$.isNumeric($('#target-value').val())){
                        $('#target-set').attr('disabled','disabled')
                    }
                    else{
                        $('#target-set').removeAttr('disabled')
                    }
                })
            })

            connect();
		</script>

		<div class="block block-rounded block-bordered">
			<div class="block-header block-header-default">
				<h3 class="block-title">Note</h3>
			</div>
			<div class="block-content">
				<p>This is a real device, do not set temp too high!!!</p>
			</div>
		</div>

	</div>
	<!-- END Page Content -->
@endsection
