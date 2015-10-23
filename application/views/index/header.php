<!DOCTYPE html>
<html>

<!-- Mirrored from medialoot.com/preview/lumino/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2015 20:16:52 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISTEMA DE TRÁMITE</title>

<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/bootstrap-table.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/styles.css" rel="stylesheet">

<link href="<?=base_url();?>assets/css/dropzone/assets/css/dropzone.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.remodal.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>
<script type="text/javascript">

 function modu(editar)
        {

         

var idu = editar.getAttribute("data-idu");
var nomu = editar.getAttribute("data-nomu");
var apeu = editar.getAttribute("data-apeu");
var alias = editar.getAttribute("data-alias");
var clave = editar.getAttribute("data-clave");
var idperm = editar.getAttribute("data-idperm");


document.getElementById('txtidu1').value=idu;

document.getElementById('txtnombreu1').value=nomu;
document.getElementById('txtapeu1').value=apeu;
document.getElementById('txtusu1').value=alias;
document.getElementById('txtcla1').value=clave;
document.getElementById('txtrol1').value=idperm;

 }
 function borraru(borrar)
        {
var iddoc = borrar.getAttribute("data-idu");
document.getElementById('txtidu2').value=iddoc;

 }
 function borrarusuario(idu)
        {

            $.ajax({
                url: "<?=base_url();?>principal/borrarusuario",
                type: "POST",
                data: "idu="+idu,
                success: function(resp){
                  $('#resultado').html(resp)
                 
                  $(".remodal-close").click();
                    location.reload(); 
                }         
            });
        }
function modificarusuario(a,b,c,d,e,f)
        {
            $.ajax({
                url: "<?=base_url();?>principal/modificarusuario",
                type: "POST",
                data: "a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f,
                success: function(resp){
                  $('#resultadou').html(resp)
                 
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
	 function grabardocumento(txtfecha,txtnombre,txtnroexp,txtasunto,txtestado,txtdestino)
        {
            $.ajax({
                url: "<?=base_url();?>principal/grabardocumento",
                type: "POST",
                data: "txtfecha="+txtfecha+"&txtnombre="+txtnombre+"&txtnroexp="+txtnroexp+"&txtasunto="+txtasunto+"&txtestado="+txtestado+"&txtdestino="+txtdestino,
                success: function(resp){
                  $('#resultado').html(resp)
                 
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
   function registrarusuario(a,b,c,d,e)
        {
            $.ajax({
                url: "<?=base_url();?>principal/registrarusuario",
                type: "POST",
                data: "a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,
                success: function(resp){
                  $('#resultadou').html(resp)
                 
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
 function consultardocumento1(iddoc)
        {
      $.ajax({
                url: "<?=base_url();?>principal/consultardocumento1",
                type: "POST",
                data: "iddoc="+iddoc,
                success: function(resp){
                  $('#resultado1').html(resp)      
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
         function editardocumento(id,txtfecha,txtnombre,txtnroexp,txtasunto,txtestado,txtdestino)
        {
            $.ajax({
                url: "<?=base_url();?>principal/editardocumento",
                type: "POST",
                data: "id="+id+"&txtfecha="+txtfecha+"&txtnombre="+txtnombre+"&txtnroexp="+txtnroexp+"&txtasunto="+txtasunto+"&txtestado="+txtestado+"&txtdestino="+txtdestino,
                success: function(resp){
                  $('#resultado1').html(resp)
                 
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
         function eliminardoc(iddoc)
        {
      $.ajax({
                url: "<?=base_url();?>principal/eliminardoc",
                type: "POST",
                data: "iddoc="+iddoc,
                success: function(resp){
                  $('#resultado2').html(resp)      
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }
         function eliminardoc2(iddoc)
        {
      $.ajax({
                url: "<?=base_url();?>principal/eliminardoc2",
                type: "POST",
                data: "iddoc="+iddoc,
                success: function(resp){
                  $('#resultado2').html(resp)      
                   // $("#cerrar").click();
                   //  location.reload();    
                }         
            });
        }

</script>

</head> 
<body>