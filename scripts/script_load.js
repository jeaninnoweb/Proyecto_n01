$(document).ready(initPage);

var $form_documento=$('#form-documento');
var $tabla_documentos=$('#tabla-documentos').DataTable();
var $tabla_usuario=$('#tabla-usuario').DataTable();
var $btn_modal_documento=$('#btn_modal_documento');
var $subir_archivo=$('#subir_archivo');

function initPage () {

	listar_documentos();
	listar_usuario();
	$form_documento.on('submit',fnc_registrar_documento);	
	$btn_modal_documento.on('click',fnc_modal_documento);
	$(document).on('click','.modal_subir_documento',fnc_modal_subirarch);
	$(document).on('click','.modal_bajar_documento',fnc_modal_bajaarch);
	$subir_archivo.on('click',fnc_subir_archivo );

	
		$('#btn-login').click(function(){
				
				var usuario=$('#usuario').val(),
				 password=$('#password').val();

				 $.ajax({
		                url: "validarlogin",
		                type: "POST",
		                data: "usuario="+usuario+"&password="+password,
		                success: function(resp){
		                    $('#resultado').html(resp)
		                }        
		            });
			});
}

function fnc_registrar_documento () {
	var data=$(this).serialize();
	$.ajax({
		url: "grabardocumento",
		type: "POST",
		data:data,         
		complete: function()
		{ 
			$("#cerrar").click();
			listar_documentos();
		}        
	});
}

function fnc_modal_documento () {
	document.getElementById("form-documento").reset();
}

function listar_documentos () {	
	var nro=1;
	var subir,bajar;
	$.getJSON("listar_documentos", function (data) { 
		$tabla_documentos.row().clear().draw( false );
			$.each(data, function (i, item) {

			if(item.documento_archivo==null)
			{
			subir='<a  class="modal_subir_documento" title="Subir Archivo" data-id="'+item.documento_id+'" href="#modal2"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-upload"></span></a>';
			bajar='<a disabled><span style="font-size:20px; color:#999;" class="glyphicon glyphicon-download"></span></a>';
			}else
			{
			subir='<a disabled><span style="font-size:20px; color:#999;" class="glyphicon glyphicon-upload"></span></a>';
			bajar='<a  class="modal_bajar_documento"  title="Bajar Archivo" data-id="'+item.documento_id+'" href="#modal3"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-download"></span></a>';
			}		
				$tabla_documentos.row.add([item.documento_id,
				item.documento_fecha,
				item.documento_sigla,
				item.documento_asunto,
				item.documento_fuente,
				item.documento_folio,
				item.documento_interesado,
				item.documento_empresa,
				item.documento_prioridad,
				'<a   class="modal_editar_documento" href="#modal4" data-id="'+item.documento_id+'" title="Editar" ><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>'
				+'<a  class="modal_eliminar_documento"  title="Borrar" data-id="'+item.documento_id+'" href="#modal5"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>'
				+subir
                +bajar]).draw(false);
	
			});
		});
}

function listar_usuario () {	
	var nro=1;
	var subir,bajar;
	$.getJSON("listar_usuario", function (data) { 
		$tabla_usuario.row().clear().draw( false );
			$.each(data, function (i, item) {
	
				$tabla_usuario.row.add([item.persona_id,
				item.persona_nombre,
				item.persona_apellido,
				item.persona_login,
				item.persona_clave,
				item.persona_dni,
				'<a   class="modal_editar_documento" href="#modal4" data-id="'+item.persona_id+'" title="Editar" ><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>'
				+'<a  class="modal_eliminar_documento"  title="Borrar" data-id="'+item.persona_id+'" href="#modal5"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>'
				]).draw(false);
	
			});
		});
}

function fnc_modal_subirarch () {
	var id = $(this).attr("data-id");
	$subir_archivo.attr('data-id',id);

}
function fnc_modal_bajaarch () {
	var id = $(this).attr("data-id");
	
	$.ajax({
		url: "archivo_documento",
		type: "POST",
		data:"id="+id,         
		success: function(resp)
		{ 
			$('#archivo_docu').html('<a href="'+resp+'">'+resp+'</a>');
		}        
	});
}
function fnc_subir_archivo () {

	var id = $(this).attr("data-id");
	var nomfile=$("#archivo").val();
	var nomfile2 = nomfile.replace("C:\\fakepath\\", "");
	var inputFileImage =$("#archivo")[0];
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('archivoc',file);
	data.append('id',id);	
	
		$.ajax({
			url: "enviararchivo",
			type:'POST',
			contentType:false,
			data: data,
			processData:false,
			cache:false,
			beforeSend: function()
			{
				// $("#jean"+id+"").html("<p align='center'><img src='assets/images/loader/loader.gif' alt=''/></p>");
			},
			success: function(resp)
			{ 
				$("#cerrar").click();
				listar_documentos();				       
			}
		});
}
