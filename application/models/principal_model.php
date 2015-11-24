<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal_model extends CI_Model {

	 public function __construct(){
        parent::__construct();
    }

	
	public function validarlogin($usuario, $password)
    {
    	              $this->db->select('*');
                    $this->db->from('persona');  
                    $this->db->where('persona_login',$usuario);
                    $this->db->where('persona_clave', $password);
                    $query = $this->db->get();
                   

                    if ($query->num_rows()==1)
                    {
                     
                       return $query->row();
                    }

                    else
                    {
                      return false; 
                    }
  
    } 
   
  
  public function listar_documentos()
  {
    $this->db->select('*');
    $this->db->from('documento'); 
    $query = $this->db->get();

    if ($query->num_rows()>0) 
    {
      return $query->result();
    }
    else
    {
      return false;
    }   
  }

   public function listar_usuario()
  {
    $this->db->select('*');
    $this->db->from('persona'); 
    $query = $this->db->get();

    if ($query->num_rows()>0) 
    {
      return $query->result();
    }
    else
    {
      return false;
    }   
  }
   public function grabardocumento($txtsigla,$txtasunto,$txtfolio,$txtinteresado,$txtprioridad)
    {
                         
                $data = array(
                  
                'documento_numero' => 1,
                'documento_fuente' => '--',
                'documento_fecha' => date('Y-m-d'),
                'documento_sigla' => $txtsigla,
                'documento_asunto' => $txtasunto,
                'documento_folio' => $txtfolio,
                'documento_tipoper' => '--',
                'documento_interesado' => $txtinteresado,
                'documento_empresa' => '--',
                'documento_cargo' => '--',                
                'documento_prioridad' => $txtprioridad,             
                );        
                $this->db->insert('documento',$data);
               
  }

   public function grabararchivo($id,$destino)
    {
                         
                $data = array(  
                'documento_archivo' => $destino,             
                );  
                $this->db->where('documento_id', $id);      
                $this->db->update('documento',$data);
                
               
  }
public function archivo_documento($id)
    {
                    $this->db->select('documento_archivo');
                    $this->db->from('documento');  
                    $this->db->where('documento_id',$id);                   
                    $query = $this->db->get();
                   

                    if ($query->num_rows()==1)
                    {
                     
                       return $query->row();
                    }

                    else
                    {
                      return false; 
                    }
    }
  
  
}

   
