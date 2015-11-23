<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>EMPRESA</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<?=$nombre?>&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Mi Perfil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configuración</a></li>
							<li><a href="cerrarsesion"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Cerrar Sesión<a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">		
		<ul class="nav menu">
			<li class="active"><a href="<?=base_url();?>principal/admin"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
		<!-- 	<li><a href="#"><span class="glyphicon glyphicon-th"></span> Ejemplo</a></li> -->
			
			<li class=""><a  href="<?=base_url();?>principal/admin?documentos"><span class="glyphicon glyphicon-list"></span> DOCUMENTOS</a></li>
			<li class=""><a href="<?=base_url();?>principal/reporte"><span class="glyphicon glyphicon-print"></span> REPORTES</a></li>
			<li class=""><a href="<?=base_url();?>principal/usuario"><span class="glyphicon glyphicon-user"></span> USUARIO</a></li>
			
			
		</ul>
		<div class="attribution">Empresa Coperyght Nvo Chimbote-2015 <a href="">Medialoot</a></div>
	</div><!--/.sidebar-->

<div class="remodal" data-remodal-id="modal">
  <h1>Registrar Documento</h1><br><br>
  <div id="resultado"></div>

   <form method="POST" id="form-documento" class="p-t-15" role="form"  action="return false" onsubmit="return false">
                    
                    <div class="row">                      
                      <div class="col-sm-12" align="center">                        
                        <div class="form-group form-group-default">
                        
					  		<!-- <input type="date"  class="form-control" placeholder="Fecha" id="txtfecha" name="txtfecha" required > 					  	 -->
					  		<input  size="45" name="txtsigla" placeholder="Sigla" type="text" class="form-control" required>					  		
					  		<input name="txtasunto" placeholder="Asunto" type="text" class="form-control" required>					  		
                <input   name="txtfolio" placeholder="Folio" type="text" class="form-control" required>  
                <input   name="txtinteresado" placeholder="Interesado" type="text" class="form-control" required> 
                <input   name="txtempresa" placeholder="Empresa" type="text" class="form-control" required>  
					  	

					  			<select   name="txtprioridad"  class="form-control" required>
					                           <option value=""disabled selected style='display:none;'>Prioridad</option>
					                            <option value="Alto">Alto</option>   
                                      <option value="Medio">Medio</option>         
					                            <option value="Bajo">Bajo</option>         
					                        </select>					  	
					  		<!-- 	<input id="txtdestino" name="txtdestino" placeholder="Destino de Área" type="text" class="form-control" required> -->					  		
                  </div>                        
                     
                
                  <button type="submit" class="btn btn-primary btn-block m-t-5">Aceptar</button>
                  <button  id="cerrar" class="remodal-cancel btn-block" data-dismiss="modal">Cancelar</button>
                  </form>
                   </div> 
                  </div>
</div>
<div class="remodal" data-remodal-id="rusu">
  <h1>Registrar usuario</h1><br><br>
  <div id="resultadou"></div>

   <form method="POST" id="form-login7" class="p-t-15" role="form"  action="return false" onsubmit="return false">
                    
                    <div class="row">                      
                      <div class="col-sm-12" align="center">                        
                        <div class="form-group form-group-default">
                        
                <!-- <input type="date"  class="form-control" placeholder="Fecha" id="txtfecha" name="txtfecha" required >  -->
              
                <input  id="txtnombreu" size="45"  placeholder="Nombre" type="text" class="form-control" required>
                
                  <input  id="txtapeu"  placeholder="Apellido" type="text" class="form-control" required>
                
                  <input  id="txtusu"  placeholder="Usuario" type="text" class="form-control" required>
              
                
                
                        </div>                        
                     
                
                  <button onclick="registrarusuario(document.getElementById('txtnombreu').value,
                  document.getElementById('txtapeu').value,
                  document.getElementById('txtusu').value,
                  document.getElementById('txtcla').value,
                  document.getElementById('txtrol').value);" class="btn btn-primary btn-block m-t-5">Aceptar</button>
                  <button  id="cerrar" class="remodal-cancel btn-block" data-dismiss="modal">Cancelar</button>
                  </form>
                   </div> 
                  </div>
</div>
<div class="remodal" data-remodal-id="modal2">
 <br><br><br>
   
     <div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                   <p style="font-size:33px;"><b>Subir Archivo</b><p>
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body no-scroll no-padding">
                     <form action="#" class="dropzone no-margin">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form> 
                  </div>
                </div>
                                
                    </div> 
  
  <br>
  <a class="remodal-confirm" href="#">OK</a>
  <a class="remodal-cancel" href="#">Cancel</a>  
</div>


<div class="remodal" data-remodal-id="modal5">
 <br><br><br>
   
     <div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                   <p style="font-size:33px;"><b>¿Desea eliminar este documento?</b><p>
                    </div>
                   
                  </div>
                 
                </div>
                                
                    </div> 
  
  <br>
   <div id="resultado2"></div> 
</div>
<div class="remodal" data-remodal-id="borraru">
<br><br>
 <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                   <p style="font-size:33px;"><b>¿Desea Eliminar este usuario? </b><p>
                    </div>
                     <input type="text" id="txtidu2" style="display:none;"> 
                  </div>
                 
                </div>

                  <button onclick="borrarusuario(document.getElementById('txtidu2').value);" class="btn btn-primary btn-block">SI</button>
                  <button  id="cerrar" class="remodal-cancel btn-block" data-dismiss="modal">NO</button>     
                
</div>

<div class="remodal" data-remodal-id="modal3">
 <br><br>
 <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                   <p style="font-size:33px;"><b>Descargar </b><p>
                    </div>
                    
                  </div>
                 
                </div>

                    <table cellpadding="0" cellspacing="0" border="1" width="100%" style="  border: 1px solid rgba(0,0,0,0.03);border-width: 0.5px;background-color: cc3366;font-family: verdana, arial;font-size: 10pt;" >
                       
                        <tr align="center" style="font-weight:bold;background-color:#30a5ff; color:white;" >
                                     <td >Nº</td>
                                     <td >FECHA</td>                  
                                     <td>NOMBRE DE ARCHIVO</td>  
                                     <td >OPCIÓN</td>                                   
                        </tr>
                        <tr align="center" style="font-weight:bold;color:#777;background-color:#f4f4f4;">
                        		     <td >1</td>
                                     <td >12/04/2015</td>                   
                                     <td>Nombre de Archivo</td>  
                                     <td ><a><img src="<?=base_url();?>css/dropzone/images/download.png" width="30px"></a><a><img src="<?=base_url();?>css/dropzone/images/x.png" width="30px"></a></td></tr>
                      </table><br><br><br>
                
</div>

