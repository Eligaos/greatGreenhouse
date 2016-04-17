
@extends('app')

@section('customStyles')
    <link href="{{asset('css/listagemEstufas.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
	<div class="row centered-form">
	<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
		<section class="content">
			
			<div >
				<div class="panel panel-default">
				<div class="panel-heading"><h1>Lista de Estufas</h1></div>
					<div class="panel-body">
						<!--<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
								<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
							</div>-->
						</div>
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered table-responsive">
								<tbody>
									<tr data-status="pagado">
										<!--<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>-->
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="#">Ver Detalhes</a>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<!--<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox3">
												<label for="checkbox3"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>-->
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>	
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="#">Ver Detalhes</a>
											</div>
										</td>
									</tr>
									<tr data-status="cancelado">
											<!--<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox2">
												<label for="checkbox2"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>-->
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right cancelado">(Cancelado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>	
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="#">Ver Detalhes</a>
											</div>
										</td>
									</tr>
									<tr data-status="pagado" class="">
											<!--<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox4" checked>
												<label for="checkbox4"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>-->
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>	
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="#">Ver Detalhes</a>
											</div>
										</td>
									
									</tr>
									<tr data-status="pendiente">
											<!--<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox5">
												<label for="checkbox5"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>-->
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>	<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="#">Ver Detalhes</a>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</section>
</div>
</div>
</div>
@endsection

@section('customScripts')
<script src="../js/listagemEstufas.js"></script>
@endsection

