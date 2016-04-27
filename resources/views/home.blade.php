@extends('app')

@section('customStyles')

<link href="{{asset('css/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

@endsection

@section('content')
<section id="estufas">
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row centered-form">
					<div class="col-xs-12 col-sm-9 col-md-12 col-lg-10 col-lg-offset-2 col-sm-offset-3 col-md-offset-1">
						<section class="content">
							<!-- item -->
							<div class="col-md-4 text-center">
								<div class="panel panel-danger panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-leaf"></i>
										<h3><a class="btn btn-md btn-block btn-danger" href="#">Estufa 1</a></h3>
									</div>
									<div id="chart1" style="height: 250px;"></div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura A</a> </li>
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura B</a> </li>
									</ul>
									<div class="panel-footer">
									</div>
								</div>
							</div>
							<!-- /item -->

							<!-- item -->
							<div class="col-md-4 text-center">
								<div class="panel panel-warning panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-leaf"></i>
										<h3><a class="btn btn-md btn-block btn-warning" href="#">Estufa 2</a></h3>
									</div>
										<div id="chart2" style="height: 250px;"></div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura A</a> </li>
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura B</a> </li>
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura C</a> </li>
									</ul>
									<div class="panel-footer">
									</div>
								</div>
							</div>
							<!-- /item -->

							<!-- item -->
							<div class="col-md-4 text-center">
								<div class="panel panel-success panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-leaf"></i>
										<h3><a class="btn btn-md btn-block btn-success" href="#">Estufa 3</a></h3>
									</div>
										<div id="chart3" style="height: 250px;"></div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-leaf"></i> <a href="#">Cultura A</a> </li>
									</ul>
									<div class="panel-footer">
									</div>
								</div>
							</div>
							<!-- /item -->
						</section>
					</div>
				</div>
			@endsection

			@section('customScripts')

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 			<script src="{{asset('js/home.js')}}"></script>
			@endsection
