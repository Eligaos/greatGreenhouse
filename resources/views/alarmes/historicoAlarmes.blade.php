@extends('app')

@section('customStyles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading margin-bottom">
			<h3 class="modal-title" >Histórico de Alarmes</h3>
		</div>

		<div class="panel-body">
			@if( Session::get('message'))
			<div class="text-center">
				<span class="alert alert-info"> {{ Session::get('message') }}</span>
			</div>
			@endif
			@if(count($lista)!=0)	
			<div class="table-container">
				<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive">
					<thead>						
						<tr class="success">
							<th>Estufa</th>
							<th>Regra</th>
							<th>Tipo</th>
							<th>Valor</th>
							<th>Descricao</th>
						</tr>
					</thead>		
					<tbody>		
						@foreach($lista as $key => $alarme)
						<tr>									
							<td>		
								<span>{{$alarme->estufa_nome}}</span>
							</td>
							@if($alarme->regra == ">")
							<td>		
								<span>Valores Superiores a {{$alarme->alarme_valor}} {{$alarme->unidade}}</span>
							</td>
							@else
							<td>		
								<span>Valores Inferiores a {{$alarme->alarme_valor}} {{$alarme->unidade}}</span>
							</td>
							@endif
							<td>		
								<span>{{$alarme->parametro}}</span>
							</td>
							<td>		
								<span>{{$alarme->leitura_valor}}</span>
							</td>
							<td>		
								<span>{{$alarme->descricao}}</span>
							</td>		
						</tr>													
						@endforeach
					</tbody>
				</table>	
			</div>
			@else
			<div class="text-center" >
				<h4> Não existem ocorrências de alarmes</h4>
			</div>
			@endif	
		</div>
		<div class="panel-footer"> 
			<div class="col-sm-12 input-group">
				<a href="{{ url()->previous() }}" class="btnL btn btn-default pull-right">Cancelar</a>
			</div>
		</div>
	</div>			
</div>
@endsection

@section('customScripts')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection