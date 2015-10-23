		
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
						    <?php
						    $consulta = $this->principal_model->consultausuario();
               
            if($consulta==TRUE){
            foreach($consulta as $fila)
                
            {
              $idu=$fila->id_usuario;
              $nomu=$fila->nombre_usuario;
              $apeu=$fila->apellido_usuario;
              $alias=$fila->alias_usuario;
              $clave=$fila->password_usuario;
              $idperm=$fila->id_permisos;
              $permi=$fila->nombre_permisos;                    
           
             
              ?>
						    <tr>
						    	<td align="center"><?=$idu?></td>
						    	<td ><?=$nomu?></td>
						    	<td id="dd"><?=$apeu?></td>
						    	<td><?=$alias?></td> 
						    	<td><?=$clave?></td>
						    	<td><?=$permi?></td>						    						    	
						    	<td><center><a   id="editard" href="#modu" onclick="modu(this);" title="Editar" data-idu="<?=$idu?>"
						    	data-nomu="<?=$nomu?>" data-apeu="<?=$apeu?>" data-alias="<?=$alias?>" data-clave="<?=$clave?>" data-idperm="<?=$idperm?>"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>
						    	<a  data-idu="<?=$idu?>" onclick="borraru(this);" title="Borrar" href="#borraru"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>
						    	</center></td>
						    </tr>

						    <?php } }?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!--/.row-->	


	</div>	<!--/.main-->

