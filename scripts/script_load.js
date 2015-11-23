$(document).ready(initPage);

var $form_documento=$('#form-documento');
var $tabla_documentos=$('#tabla-documentos').DataTable();
var $btn_modal_documento=$('#btn_modal_documento');
var $subir_archivo=$('#subir_archivo');

function initPage () {

	listar_documentos();
	$form_documento.on('submit',fnc_registrar_documento);	
	$btn_modal_documento.on('click',fnc_modal_documento);
	$(document).on('click','.modal_subir_documento',fnc_modal_subirarch);
	$subir_archivo.on('click',fnc_subir_archivo );
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
	$.getJSON("listar_documentos", function (data) { 
		$tabla_documentos.row().clear().draw( false );
			$.each(data, function (i, item) {				
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
				+'<a  class="modal_subir_documento" title="Subir Archivo" data-id="'+item.documento_id+'" href="#modal2"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-upload"></span></a>'
                +'<a  class="modal_bajar_documento"  title="Bajar Archivo" data-id="'+item.documento_id+'" href="#modal3"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-download"></span></a>']).draw(false);
	
			});
		});
}

function fnc_modal_subirarch () {
	var id = $(this).attr("data-id");
	$subir_archivo.attr('data-id',id);

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
				       
			}
		});
}
