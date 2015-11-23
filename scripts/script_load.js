$(document).ready(initPage);

var $form_documento=$('#form-documento');
var $tabla_documentos=$('#tabla-documentos').DataTable();
var $btn_modal_documento=$('#btn_modal_documento');

function initPage () {
	$form_documento.on('submit',fnc_registrar_documento);
	listar_documentos();
	$btn_modal_documento.on('click',fnc_modal_documento);
}

function fnc_registrar_documento () {
	var data=$(this).serialize();
	//alert(data);

	$.ajax({
		url: "grabardocumento",
		type: "POST",
		data:data,         
		complete: function(){ 
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
				'<a  onclick="consultardocumento1(<?=$id_doc?>);" id="editard" href="#modal4" title="Editar" ><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-edit"></span></a>'
				+'<a  onclick="eliminardoc(<?=$id_doc?>);" title="Borrar" href="#modal5"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-remove"></span></a>'
				+'<a  title="Subir Archivo" href="#modal2"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-upload"></span></a>'
                +'<a   title="Bajar Archivo" href="#modal3"><span style="font-size:20px; color:#30a5ff;" class="glyphicon glyphicon-download"></span></a>']).draw(false);
	
			});
		});
}