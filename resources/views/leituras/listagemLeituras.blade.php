@extends('app')

@section('customStyles')

<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">

@endsection
@section('title', ' - Lista de Leituras')

@section('content')
<div class="container">
	<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
		<section class="content">
			<div class="panel panel-default">
				<div class="panel-heading margin-bottom"><h2>Lista de Leituras</h2></div>
				<div>
					<div class="col-sm-3">
						<label>Escolha o Tipo</label>
						<select id="tipo_id" name="tipo_id" class="selectpicker form-control" title="Selecione um Tipo"  data-live-search="true" showTick="true" required>
							@foreach($tiposLeituras as $key => $tipo)
							<option value="{{$tipo->id}}">{{$tipo->parametro}}</option>
							@endforeach	
						</select>
					</div>
					<div class="col-sm-3 margin-bottom">	
						<label>Escolha uma Estufa</label>
						<div>
							<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true" >
								@foreach($estufas as $key => $estufa)
								<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
								@endforeach	
							</select>
						</div>
					</div>	

					<div class="btn-group col-sm-3 margin-bottom" id="divAssociacoesSetores">
						<label>Escolha um Setor</label>
						<select id="setor_id" name="setor_id" class="selectpicker form-control " title="Selecione um Setor"  data-live-search="true" showTick="true">
						</select>
					</div>
					<div class="btn-group col-sm-3 margin-bottom">									<label>Data Inicial</label>
						<input type="text" class="form-control" id="dataInicial" name="data_inicial">
					</div>

					<div class="btn-group col-sm-3 margin-bottom">									<label>Data Final</label>
						<input type="text" class="form-control" id="dataFinal" name="data_final">
					</div>
					<div class="md-margin-top pull-right">											
						<a  href="/admin/pesquisar" role="button" name="adicionar" class="btn btn-success center-block" toggle="tooltip" data-placement="top" title="Pesquisar" ><i class="glyphicon glyphicon-search fa-lg"></i> Pesquisar</a>
					</div>


				</div>
				<div class="table-container">
					<table class="table table-filter table-striped table-bordered table-responsive">							 <tr class="success">
						<th>Data</th>
						<th>Valor</th>
						<th>Tipo</th>
						<th>Unidade</th>
						<th>Sensor</th>
						<th>Estufa</th>
						<th>Setor</th>
						<th>Automático?</th>
					</tr>	
					<tbody>		
						@foreach($lista as $key => $leitura)
						<tr>										
							<td>

								{{$leitura->data}}

							</td>
							<td>		
								{{$leitura->valor}}

							</td>

							<td>		
								{{$leitura->parametro}}

							</td>
							<td>		
								{{$leitura->unidade}}

							</td>
							<td>		
								{{$leitura->sensor_nome}}

							</td>	
							<td>		
								{{$leitura->estufa_nome}}

							</td>
							<td>		
								{{$leitura->setor_nome}}

							</td>
							<td>
								@if($leitura->manual == 0)
								Sim
								@else
								Manual
								@endif
							</td>
						</tr>												
						@endforeach
					</tbody>
				</table>									
			</div>

			<div class="input-group-addon" >
				<a  href="/admin/registos/manual" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Registar Leitura Manual" >Registar Leitura Manual</a>

				<div class="pull-right"> {!! $lista->links() !!}</div>
			</div>		
		</div>
	</section>
</div>
</div>
</div>
</div>
@endsection

@section('customScripts')
<!-- Latest compiled and minified JavaScript -->

<script src="{{asset('js/leituras/listagemLeituras.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{asset('js/registoManual/timePicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
>

@endsection