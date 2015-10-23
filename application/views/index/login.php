<body style="background-image: url(assets/img/oficina.jpg); background-size: 100%;" background-image="url(assets/img/logo2.jpg)">
<br><br><br><br><br>
	<div class="row">
<img src=>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Inicio de Sesión</div>
				<div class="panel-body">
						<form method="POST" id="form-login" class="p-t-15" role="form"  action="return false" onsubmit="return false">
					<div id="resultado"></div>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Usuario" name="usuario" id="usuario" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" id="password" type="password" value="">
							</div>							
							<button type="submit" class="btn btn-primary btn-cons m-t-10">ENTRAR</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
			<script type="text/javascript">

				function Validar(usuario, password)
		        {            
		            $.ajax({
		                url: "principal/validarlogin",
		                type: "POST",
		                data: "usuario="+usuario+"&password="+password,
		                success: function(resp){
		                    $('#resultado').html(resp)
		                }        
		            });
		        }
		    </script>