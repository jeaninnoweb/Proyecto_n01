		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Inicio</li><li class="active">Documentos</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">DOCUMENTOS</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-heading"><table width="100%"><tr><td>Lista de Documentos</td><td align="right"></td></tr></table></div>
					<div class="panel-body">
<div id="outer">
   <a href="#modal" class="btn btn-primary">Registrar Documento</a>
</div>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead >
						    <tr >
					
						        <th data-field="nrodoc" data-sortable="true">Nro Doc.</th>
						        <th >Fecha</th>
						        <th >Nombre documento</th>
						        <th >Nro Expediente</th>
						        <th >Asunto</th>
						        <th >Estado</th>
						        <th>Destino de Área</th>						        
						        <th >Opción</th>
						    </tr>
						    </thead>
						    <?php
						    $consulta = $this->principal_model->consultadocumento();
               
            if($consulta==TRUE){
            foreach($consulta as $fila)
                
            {
              $id_doc=$fila->id_documento;
              $fecha_doc=$fila->fecha_documento;
              $nombre_doc=$fila->nombre_documento;
              $nroexp_doc=$fila->nroexp_documento;
              $asunto_doc=$fila->asunto_documento;
              $estado_doc=$fila->estado_documento;
              $destino_doc=$fila->destino_documento;
              if($estado_doc=='1'){
              	$estadosimb='<span class="label label-sm label-success">Activo</span>';
              }else{
              	$estadosimb='<span class="label label-sm label-danger">Inactivo</span>';
              }
$j='hola';
              
              $fechay=strtotime($fecha_doc);                               
              $fechax=date('d/m/Y',  $fechay); 
             
              ?>
						    <tr>
						    	<td align="center"><?=$id_doc?></td>
						    	<td ><?=$fechax?></td>
						    	<td id="dd"><?=$nombre_doc?></td>
						    	<td><?=$nroexp_doc?></td> 
						    	<td><?=$asunto_doc?></td>
						    	<td><?=$estadosimb?></td>
						    	<td><?=$destino_doc?></td>						    	
						    	<td><center><a  onclick="consultardocumento1(<?=$id_doc?>);" id="editard" href="#modal4" title="Editar" ><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>
						    	<a  onclick="eliminardoc(<?=$id_doc?>);" title="Borrar" href="#modal5"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>
						    	<a  title="Subir Archivo" href="#modal2"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-upload"></span></a>
						    	<a   title="Bajar Archivo" href="#modal3"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-download"></span></a></center></td>
						    </tr>

						    <?php } }?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!--/.row-->	


	</div>	<!--/.main-->

