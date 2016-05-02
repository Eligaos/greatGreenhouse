@extends('app')

@section('customStyles')
	<link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-1">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h1>Lista de Explorações Agrícolas</h1></div>
						@if( Session::get('message'))
						<div style="text-align: center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						@foreach($lista as $key => $exploracao)
						<form class="form-signin" method="POST" action="/admin/home">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="table-container">
								<table class="table table-filter table-striped table-bordered table-responsive">
									<tbody>
										<tr>									
											<td>											
												<div class="media">
													<div class="media-body">
														@if($exploracao->numero>0)
														<span class="media-meta pull-right">nr:{{$exploracao->numero}}</span>
														@else
														<span class="media-meta pull-right">---</span>
														@endif
														<p class="summary">{{$exploracao->nome}}</p>
													</div>
												</div>
											</td>
											<td>
												<div class="">
													<button type="submit" class="btn btn-sm  btn-default glyphicon glyphicon-triangle-right" toggle="tooltip" name="id" value="{{$exploracao->id}}" role="button" data-placement="top" title="Entrar nesta Exploração"></button>
												</div>
											</td>
										</tr>													
									</tbody>
								</table>									
							</div>
						</form> 
						@endforeach
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/exploracoes/adicionar" role="button" name="adicionar" id="adicionar exploracao" class="btn btn-success pull-right">Adicionar Exploracao</a>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</body>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/errors.js')}}"></script>
</html>

