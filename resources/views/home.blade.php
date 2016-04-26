@extends('app')

@section('customStyles')

<link href="../../css/home.css" rel="stylesheet">
@endsection

@section('content')
<section id="estufas">
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row centered-form">
					<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
						<section class="content">
							<!-- item -->
							<div class="col-md-4 text-center">
								<div class="panel panel-danger panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-leaf"></i>
										<h3><a class="btn btn-md btn-block btn-danger" href="#">Estufa 1</a></h3>
									</div>
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

			@endsection
