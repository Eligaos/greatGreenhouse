@extends('app')

@section('customStyles')

<link href="{{asset('css/listagemestufas.css')}}" rel="stylesheet">
@endsection

@section('content')

</head>
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h1>Lista de Estufas</h1></div>
						@foreach($lista as $key => $estufa)
						<div class="panel-body">
						</div>
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered table-responsive">
								<tbody>
									<tr>									
										<td>
											<div class="media">
												<div class="media-body">
													@if($estufa->numero>0)
													<span class="media-meta pull-right">nr:{{$estufa->numero}}</span>
													@else
													<span class="media-meta pull-right">---</span>
													@endif
													<p class="summary">{{$estufa->nome}}</p>
												</div>
											</div>
										</td>
										<td>											
										</td>
									</tr>													
								</tbody>
							</table>									
						</div>
					</form> 
					@endforeach
					<div class="form-group">
						<div class="input-group-addon">
							<a href="/admin/adicionarEstufa" role="button" name="adicionar" id="adicionar estufa" class="btn btn-success pull-right">Adicionar Estufa</a>
						</div>
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

@endsection


