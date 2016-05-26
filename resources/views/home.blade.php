@extends('app')

@section('customStyles')
<link href="{{asset('css/home/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('title', ' - Home')
@section('content')
<section id="estufas" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
		<!-- item -->
		@foreach($estufas as $key => $estufa)
		<div class="col-xs-12 col-sm-11 col-md-6 col-lg-6 text-center col-sm-offset-1 col-lg-offset-0">
			<div class="panel panel-success panel-pricing">
				<div class="panel-heading">
					<i class="fa fa-leaf"></i>
					<h3><a class="btn btn-md btn-block btn-success" href="/admin/estufas/detalhes/{{$estufa->id}}">{{$estufa->nome}}</a></h3>
				</div>
				<div id="monitor{{$estufa->id}}" style="height: 250px;" class="margin-bottom"></div>
				@foreach($culturas as $key => $cultura)
				<ul class="list-group text-center">
					@if($cultura->estufa_id == $estufa->id)
					<li class="list-group-item"><i class="glyphicon glyphicon-tree-deciduous"></i> <a href="/admin/culturas/detalhes/{{$cultura->cultura_id}}">{{$cultura->cultura_nome}}</a> </li>
					@endif
				</ul>
				@endforeach
			</div>
		</div>
		@endforeach
		<!-- /item -->
</section>
@endsection

@section('customScripts')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{asset('js/home/home.js')}}"></script>
@endsection
