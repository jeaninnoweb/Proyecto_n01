 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
    $this->load->helper('form'); 
    $this->load->model('principal_model');
    $this->load->library(array('session','form_validation'));
    $this->load->helper(array('url','date','cookie'));   
    date_default_timezone_set('America/Lima');
    }
	public function index()
    {  
       
            $this->load->view('index/header');            
            $this->load->view('index/login');
            $this->load->view('index/footer');

             
    }
  public function validarlogin()
    {          
 
   if ($this->input->post('usuario')) {

      //Asignar variables a lo obtenido desde el formulario
      $usuario = $this->input->post('usuario');
      $password = ($this->input->post('password'));

      $ingreso = $this->principal_model->validarlogin($usuario, $password);
      
      //$this->session->userdata('usuariof',$usuario);
        if($ingreso==TRUE)
        {     //Sesion del usuario
             $usuario_data = array(      
               'nombre'=>$ingreso->persona_nombre,
               'persona_id'=>$ingreso->persona_id,
               'logueado' => TRUE                        
            );       
           
            $this->session->set_userdata($usuario_data);

            
            //Mostrar el ingreso al sistema   
           echo '<script>window.location.href="principal/admin"</script>';
        
        }

        else
        {
           echo '<span style="color:red;">El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
        }

               
      }
       
      
   }

  public function admin() 
   {
    if($this->session->userdata('logueado'))
    {
      
      $nombree = $this->session->userdata('nombre');

      $data = array(
      'nombre'=>$nombree
      ); 

      $this->load->view('index/header',$data);
      $this->load->view('admin/header-menu');
      if(isset($_GET['documentos'])){

         $this->load->view('admin/documentos');

      }else{
        $this->load->view('admin/index');
      }           
      
      $this->load->view('index/footer');    
   } 
 }
   
 //_______________________________________________________________________________________________________________________________________________________________  
    public function listar_documentos()
    {
      $listar_documentos=$this->principal_model->listar_documentos();
      echo json_encode($listar_documentos);
    }
     public function grabardocumento()
    {


        if ($this->input->post('txtsigla')) {

      //Asignar variables a lo obtenido desde el formulario      
      $txtsigla= $this->input->post('txtsigla');
      $txtasunto= $this->input->post('txtasunto');
      $txtfolio= $this->input->post('txtfolio');
      $txtinteresado= $this->input->post('txtinteresado');
      $txtprioridad= $this->input->post('txtprioridad');
 
      
     $this->principal_model->grabardocumento($txtsigla,$txtasunto,$txtfolio,$txtinteresado,$txtprioridad);      
    
      }
    }

      public function enviararchivo()
  {
    if(isset($_FILES['archivoc']['tmp_name']))
    {     
      $archivo=$_FILES['archivoc']['tmp_name'];
      $nomarchivo=$_FILES['archivoc']['name'];
      $ext=pathinfo($nomarchivo);
      $exte = strtolower($ext['extension']); 
      $hoy = date("Ymd_His");  
      $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
      $numerodeletras=10;
      $cadena = "";

      for($i=0;$i<$numerodeletras;$i++)
      {
        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
      }

      if($exte!='png' ||$exte!='jpg'||$exte!='gif')
      {

        $nvonomarch=$hoy."_".$cadena.".".$exte;
        $id= $this->input->post('id');
       
        mkdir("assets/archivos/".$id, 0700);
        $destino="assets/archivos/".$id."/".$nvonomarch;        
        move_uploaded_file($archivo,$destino);

        switch ($exte) {
          case 'doc':
             echo "<div  class='images word'></div><div class='nomarchivo'><a  href='".$destino."''>".$nomarchivo."</a></div>";
            break;
          
           case 'docx':
             echo "<div  class='images word'></div><div class='nomarchivo'><a  href='".$destino."''>".$nomarchivo."</a></div>";
            break;

          case 'xlsx':
             echo "<img src='assets/images/iconos_archivos/excel.png' style='width:15%;margin:0px 5px;'><a  href='".$destino."''>".$nomarchivo."</a>";
            break;

          case 'pptx':
             echo "<img src='assets/images/iconos_archivos/power_point.png' style='width:15%;margin:0px 5px;'><a  href='".$destino."''>".$nomarchivo."</a>";
            break;

          case 'pdf':
             echo "<img src='assets/images/iconos_archivos/pdf.png' style='width:15%;margin:0px 5px;'><a  href='".$destino."'' target='_blank'>".$nomarchivo."</a>";
            break;

          case 'rar':
             echo "<img src='assets/images/iconos_archivos/winrar.ico' style='width:15%;margin:0px 5px;'><a  href='".$destino."''>".$nomarchivo."</a>";
            break;

          case 'zip':
             echo "<img src='assets/images/iconos_archivos/winrar.ico' style='width:15%;margin:0px 5px;'><a  href='".$destino."''>".$nomarchivo."</a>";
            break;


        }
        // echo "<a  href='".$destino."''>".$nomarchivo."</a>";
      }  
    }
  }

 //_______________________________________________________________________________________________________________________________________________________________   
     public function registrarusuario()
    {
        if ($this->input->post('a')) {

      //Asignar variables a lo obtenido desde el formulario      
      $nomu= $this->input->post('a');
      $apeu= $this->input->post('b');
      $usu= $this->input->post('c');
      $cla= $this->input->post('d');
      $idrol= $this->input->post('e');   

      
     $this->principal_model->registrarusuario($nomu,$apeu,$usu,$cla,$idrol);      
        echo '<span>Exito!</span>
       <script> $(".remodal-close").click();
        location.reload();    </script>'; 


      }
    }

    public function modificarusuario()
    {
        if ($this->input->post('a')) {

      //Asignar variables a lo obtenido desde el formulario      
      $nomu= $this->input->post('a');
      $apeu= $this->input->post('b');
      $usu= $this->input->post('c');
      $cla= $this->input->post('d');
      $idrol= $this->input->post('e');  

      $idu= $this->input->post('f');  

      
     $this->principal_model->modificarusuario($nomu,$apeu,$usu,$cla,$idrol,$idu);      
        echo '<span>Exito!</span>
       <script> $(".remodal-close").click();
        location.reload();    </script>'; 


      }
    }
    public function borrarusuario()
    {
        if ($this->input->post('idu')) {

      //Asignar variables a lo obtenido desde el formulario      
      $idu= $this->input->post('idu'); 
     $this->principal_model->borrarusuario($idu);      
       echo '<span>Exito!</span>'; 


      }
    }
     public function consultardocumento1()
      {  
        if ($this->input->post('iddoc')) {
          $iddoc1=$this->input->post('iddoc');
           $consulta1=$this->principal_model->consultardocumento1($iddoc1);         
           foreach($consulta1 as $fila)
            {
              $id_doc=$fila->id_documento;
              $fecha_doc=$fila->fecha_documento;
              $nombre_doc=$fila->nombre_documento;
              $nroexp_doc=$fila->nroexp_documento;
              $asunto_doc=$fila->asunto_documento;
              $estado_doc=$fila->estado_documento;
              $destino_doc=$fila->destino_documento;
            }
       ?> 
       <script>
        document.getElementById('txtfecha1').value='<?=$fecha_doc?>';
        document.getElementById('txtnombre1').value='<?=$nombre_doc?>';
        document.getElementById('txtnroex').value='<?=$nroexp_doc?>';
        document.getElementById('txtasunto1').value='<?=$asunto_doc?>';
        $("#txtestado1 option[value='<?=$estado_doc?>']").attr('selected','selected');
        $("#txtestado1").change();       
        document.getElementById('txtdestino1').value='<?=$destino_doc?>';
       </script>
        <button onclick="editardocumento(<?=$iddoc1?>,document.getElementById('txtfecha1').value,
                  document.getElementById('txtnombre1').value,
                  document.getElementById('txtnroex').value,
                  document.getElementById('txtasunto1').value,
                  document.getElementById('txtestado1').value,
                  document.getElementById('txtdestino1').value);" class="btn btn-primary btn-block m-t-5">Aceptar</button>
                  <button  id="cerrar1" class="remodal-cancel btn-block" data-dismiss="modal">Cancelar</button>
       <?php
        }
    } 
    public function editardocumento()
    {
        if ($this->input->post('id')) {

      //Asignar variables a lo obtenido desde el formulario
      $iddoc= $this->input->post('id');
      $fechadoc= $this->input->post('txtfecha');
      $nomdoc= $this->input->post('txtnombre');
      $nroex= $this->input->post('txtnroexp');
      $asudoc= $this->input->post('txtasunto');
      $estadoc= $this->input->post('txtestado');
      $destdoc= $this->input->post('txtdestino');

      $fec=strtotime($fechadoc);                               
      $idmes=date('m',  $fec);

      $this->principal_model->editardocumento($iddoc,$fechadoc,$nomdoc,$nroex, $asudoc,$estadoc,$destdoc,$idmes);      
      echo '<span>Exito!</span>
       <script> $(".remodal-close").click();
        location.reload();    </script>'; 
       


      }
    }
    public function eliminardoc()
      {  
        if ($this->input->post('iddoc')) {
          $iddoc1=$this->input->post('iddoc');
           $consulta1=$this->principal_model->consultardocumento1($iddoc1);         
           foreach($consulta1 as $fila)
            {
              $id_doc=$fila->id_documento;
           
            }
       ?> 
     
        <button onclick="eliminardoc2(<?=$id_doc?>);"
         class="btn btn-primary btn-block m-t-5">SI</button>
         <button  id="cerrar1" class="remodal-cancel btn-block" data-dismiss="modal">NO</button>
       <?php
        }
    } 
    public function eliminardoc2()
      {  
        if ($this->input->post('iddoc')) {
          $iddoc1=$this->input->post('iddoc');
           $consulta1=$this->principal_model->eliminardoc($iddoc1);  
            echo '<span>Exito!</span>
       <script> $(".remodal-close").click();
        location.reload();    </script>';        
         
        }
    } 
    public function reporte()
    {
        $nombree = $this->session->userdata('nombre');

              $data = array(
              'nombre'=>$nombree,
              'consulta'=>$this->principal_model->reporteg()
              ); 

              $this->load->view('index/header',$data);
              $this->load->view('admin/header-menu');          
              $this->load->view('admin/reporte');
              $this->load->view('index/footer');
    }

     public function usuario()
    {
        $nombree = $this->session->userdata('nombre');

              $data = array(
              'nombre'=>$nombree
              // 'consulta'=>$this->principal_model->reporteg()
              ); 

              $this->load->view('index/header',$data);
              $this->load->view('admin/header-menu');          
              $this->load->view('admin/usuario');
              $this->load->view('index/footer');
    }

    public function borrarregistro()
    {    $idvou=$this->input->post('idvou');
         $this->ebenezer_model->borrarregistro($idvou);       

    }
 
  public function cerrarsesion()
    {
        $this->session->sess_destroy();
        echo '<script>window.location.href="'.base_url().'"</script>';
    }   


    public function reportes()
    {       
      //Load the library
      $this->load->library('html2pdf');
      
      //Set folder to save PDF to
      $this->html2pdf->folder('./assets/pdfs/');
      
      //Set the filename to save/download as
      $this->html2pdf->filename('test.pdf');
      
      //Set the paper defaults
      $this->html2pdf->paper('a4', 'landscape');     
      
      $data = array(
        'title' => 'PDF Created',
        'message' => '$tipodoci'
        
      );
      //Load html view
      $this->html2pdf->html($this->load->view('admin/pdf', $data, true));
      
      if($this->html2pdf->create('save')) {       
       echo '<html><body marginwidth="0" marginheight="0" style="background-color: rgb(38,38,38)">
       <embed width="100%" height="100%" name="plugin" src="'.base_url().'assets/pdfs/test.pdf" type="application/pdf">
        </body></html>';
      
      }
    }
    public function modalborrar()
      {  $idvou=$this->input->post('idvou');?> 
      <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>             
              </div>
              <div class="modal-body" align="center">
               <h5>¿Desea borrar este voucher?</h5>
               Nº Voucher:&nbsp;<?=$idvou?>                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal" onclick="borrarregistro(<?=$idvou?>);">Aceptar</button>
                <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Cancelar</button>
       </div>
      
      <?php
      
    } 

    public function modaleditar()
      {  $idvou=$this->input->post('idvou');
         $tipoco=$this->input->post('tipoco');
         
          $cons1 = $this->ebenezer_model->mostrarregistro($idvou);
            foreach($cons1 as $fila)
            {
              $bimpo=$fila->b_imponible_cont;
              $igvc=$fila->igv_cont;
              $mont=$fila->monto_cont;
              $tipocont=$fila->tipo_compro_cont;
              $tipodoc=$fila->tipo_docu_cont;
              $seriedoc=$fila->serie_docu_cont;
              $nrodoc=$fila->nro_docu_cont;
              $tipodoci=$fila->tipo_docui_cp;
              $nrodoci=$fila->nro_docui_cp;
              $idvou=$fila->id_contabilidad;
              $tipocambio=$fila->tipocambio;
              $glosa=$fila->glosa;
              $idempresacp=$fila->id_empresa_cp;  
              $ctacont=$fila->id_ctacont;

              $fechad=$fila->fecha_docu_cont;
              $fechay=strtotime($fechad);                               
              $fechax=date('d/m/Y',  $fechay); 

             $bimpo2=number_format($bimpo, 2);
             $igvc2=number_format($igvc, 2);
             $mont2=number_format($mont, 2);        
            }

           
           // echo '<input type="text" class="form-control" value="222" placeholder="Ingrese Fecha: Año-Mes-Día" id="datepicker-component2">';
       //   echo $editar['idvoued'];
        // $this->load->view('modaleditar',$editar);
        if($tipocambio>=1){
        $tm=1;
        }
                       
     

      ?>   

         <script type="text/javascript">
         document.getElementById('datepicker-component2').value='<?=$fechad?>';
       $("#txttm option[value='<?=$tm?>']").attr('selected','selected');
       $("#txttm").change();
       $("#txtempresac option[value='<?=$idempresacp?>']").attr('selected','selected');
       $("#txtempresac").change();
       $("#ct option[value='<?=$ctacont?>']").attr('selected','selected');
       $("#ct").change();
       $("#txttipod option[value='<?=$tipodoc?>']").attr('selected','selected');
       $("#txttipod").change();

        $("#titulomodal").text('EDITAR VOUCHER');
        document.getElementById('txtserie').value='<?=$seriedoc?>';
        document.getElementById('txtn').value='<?=$nrodoc?>';
        document.getElementById('txtglosa').value='<?=$glosa?>';
        document.getElementById('txtmont').value='<?=$mont?>';
        document.getElementById('txtbi').value='<?=$bimpo2?>';
        document.getElementById('txtigv').value='<?=$igvc2?>';
         </script> 

         <br><br>
                  <button onclick="editarcontabilidad(document.getElementById('datepicker-component2').value, 
                  document.getElementById('txttipod').value, 
                  document.getElementById('txtserie').value, 
                  document.getElementById('txtn').value, 
                  document.getElementById('txtempresac').value,
                  document.getElementById('txtglosa').value,  
                  document.getElementById('txtmont').value, 
                  document.getElementById('ct').value,
                  document.getElementById('txtbi').value,                  
                  document.getElementById('txtigv').value,                  
                  document.getElementById('txttic').value,
                  <?=$idvou?>,<?=$tipoco?>);" class="btn btn-primary  btn-cons">Aceptar</button>
                  <button data-dismiss="modal" aria-hidden="true" type="button" class="btn btn-cons">Cancelar</button>
      <?php
       
    } 

     public function modalgrabar()
      {
        $tipoco=$this->input->post('tipoco');

      ?>   

         <script type="text/javascript">
           $("#txttm option[value='1']").attr('selected','selected');
       $("#txttm").change();
          $("#ct option[value=0]").attr('selected','selected');
       $("#ct").change();
        $("#txtempresac option[value=0]").attr('selected','selected');
       $("#txtempresac").change();
         document.getElementById('datepicker-component2').value='';
          document.getElementById('txtserie').value='';
        document.getElementById('txtn').value='';
        document.getElementById('txtglosa').value='';
        document.getElementById('txtmont').value='';
        document.getElementById('txtbi').value='';
        document.getElementById('txtigv').value='';  
        

         $("#titulomodal").text('INGRESO DE VOUCHER');
         </script> 
         <br><br>
                  <button onclick="registrarcontabilidad(document.getElementById('datepicker-component2').value, 
                  document.getElementById('txttipod').value, 
                  document.getElementById('txtserie').value, 
                  document.getElementById('txtn').value, 
                  document.getElementById('txtempresac').value,
                  document.getElementById('txtglosa').value,  
                  document.getElementById('txtmont').value, 
                  document.getElementById('ct').value,
                  document.getElementById('txtbi').value,                  
                  document.getElementById('txtigv').value,                  
                  document.getElementById('txttic').value,<?=$tipoco?>);" class="btn btn-primary  btn-cons">Aceptar</button>
                  <button data-dismiss="modal" aria-hidden="true" type="button" class="btn btn-cons">Cancelar</button>
      <?php
      }
      public function opcionventa()
      {$tipo?>
       <button onclick="mostrarcontabilidad(document.getElementById('empresa').value, document.getElementById('mes').value, document.getElementById('ano').value,1);" class="btn btn-primary btn-block m-t-5">Aceptar1</button>
      <?php }

       public function opcioncompra()
      {?>
       <button onclick="mostrarcontabilidad(document.getElementById('empresa').value, document.getElementById('mes').value, document.getElementById('ano').value, 2);" class="btn btn-primary btn-block m-t-5">Aceptar2</button>
      <?php }
}