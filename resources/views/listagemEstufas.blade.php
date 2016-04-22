@extends('app')

@section('customStyles')

<link href="{{asset('css/listagemestufas.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h1>Lista de Estufas</h1></div>
						@if( Session::get('message'))
						<div style="text-align: center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						@foreach($lista as $key => $estufa)
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered table-responsive">
								<tbody>
									<tr>									
										<td>
											<div class="media">
												<div class="media-body">
													<p class="summary">{{$estufa->nome}}</p>
												</div>
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
							<a href="/admin/estufas/adicionar" role="button" name="adicionar" id="adicionar estufa" class="btn btn-success pull-right">Adicionar Estufa</a>
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


