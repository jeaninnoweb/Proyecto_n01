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
           echo '<script>window.location.href="inicio"</script>';        
        }
        else
        {
           echo '<span style="color:red;">El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
        }              
      }      
      
   }

  public function inicio() 
   {
    if($this->session->userdata('logueado'))
    {
      
      $nombree = $this->session->userdata('nombre');

      $data = array(
      'nombre'=>$nombree
      ); 

      $this->load->view('index/header',$data);
      $this->load->view('admin/header-menu');     
      $this->load->view('admin/index');   
      $this->load->view('index/footer');    
   } 
 }

  public function documento() 
   {
    if($this->session->userdata('logueado'))
    {
      
      $nombree = $this->session->userdata('nombre');

      $data = array(
      'nombre'=>$nombree
      ); 

      $this->load->view('index/header',$data);
      $this->load->view('admin/header-menu');
      $this->load->view('admin/documentos');
      $this->load->view('index/footer');    
   } 
 }

 public function usuario() 
   {
    if($this->session->userdata('logueado'))
    {
      
      $nombree = $this->session->userdata('nombre');

      $data = array(
      'nombre'=>$nombree
      ); 

      $this->load->view('index/header',$data);
      $this->load->view('admin/header-menu');
      $this->load->view('admin/usuario');
      $this->load->view('index/footer');    
   } 
 }
   
 //_______________________________________________________________________________________________________________________________________________________________  
     public function listar_usuario()
    {
      $listar_usuario=$this->principal_model->listar_usuario();
      echo json_encode($listar_usuario);
    }

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

          $this->principal_model->grabararchivo($id,$destino);      

        }  
      }
    }
     public function archivo_documento()
    {
      $id= $this->input->post('id');
      $destino=$this->principal_model->archivo_documento($id);
      $texto=$destino->documento_archivo;
      echo $texto; 
    }

 //_______________________________________________________________________________________________________________________________________________________________   
  
}