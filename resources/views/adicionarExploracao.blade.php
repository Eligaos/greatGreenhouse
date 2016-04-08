@extends('app')

@section('customStyles')
<link href="css/addExploracao.css" rel="stylesheet">

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div id="login-overlay" >
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Exploração Agrícola</h3>
						</div>
						<div class="modal-body">
							<form id="registerForm" method="POST" >
									<div class="form-group">
	<fieldset> 
										<legend>Dados do Terreno</legend>
									<div class="col-xs-12 col-md-12">
									
										<label for="InputName">Nome do Terreno</label>
										<div class="input-group">
											<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
										<br>
										<label for="InputName">Número do Terreno</label>
										<div class="input-group">
											<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
											<span class="input-group-addon"></span>
										</div>
																
										</fieldset>
									</div>
									<div class="form-group">
									<fieldset> 
											<legend>Localização</legend>
											<div class="col-xs-12 col-md-6">
											
												<label for="InputName">Distrito</label>
												<div class="input-group">
													<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
													<span class="input-group-addon"></span>
												</div>
												<br>
												<label for="InputPassword">Concelho</label>
												<div class="input-group">
													<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
													<span class="input-group-addon"></span>
												</div><br>
											</div> 

											<div class="col-xs-12 col-md-6"> 
												<label for="InputPassword">Freguesia</label>
												<div class="input-group">
													<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
													<span class="input-group-addon"></span>
												</div>
												<br>
												<label for="InputPassword">Área</label>
												<div class="input-group">
													<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
													<span class="input-group-addon"></span>

												</div><br>
											</div>  
										</fieldset>
									</div>    




									<div class="form-group">
										<div class="input-group-addon">
											<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success pull-right">

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection


		@section('customScripts')

		@endsection
