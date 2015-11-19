		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Inicio</li><li class="active">Usuarios</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">USUARIO</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-heading"><table width="100%"><tr><td>Lista de Usuarios</td><td align="right"></td></tr></table></div>
					<div class="panel-body">
<div id="outer">
   <a href="#rusu" class="btn btn-primary">Registrar Usuario</a>
</div>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead >
						    <tr >
					
						        <th data-field="nrodoc" data-sortable="true">Nro Doc.</th>						       
						        <th >Nombre</th>
						        <th >Apellidos</th>
						        <th >Usuario</th>
						        <th >Clave</th>
						        <th>Rol</th>						        
						        <th >Opción</th>
						    </tr>
						    </thead>
						   
						    <tr>
						    	<td align="center"></td>
						    	<td ></td>
						    	<td id="dd"></td>
						    	<td></td> 
						    	<td></td>
						    	<td></td>						    						    	
						    	<td><center><a   id="editard" href="#modu" onclick="modu(this);" title="Editar" data-idu=""
						    	data-nomu="" data-apeu="" data-alias="" data-clave="" data-idperm=""><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>
						    	<a  data-idu="" onclick="borraru(this);" title="Borrar" href="#borraru"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>
						    	</center></td>
						    </tr>

						    
						</table>
					</div>
				</div>
			</div>
		</div>

		<!--/.row-->	


	</div>	<!--/.main-->

