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
   
  public function consultadocumento()
    {
                 
                 
                   // $this->db->where('id',$empresa1);                
                    $query = $this->db->get('documento');
                   

                    if ($query->num_rows()>0)
                    {
                     
                       return $query->result();
                    }

                    else
                    {
                      return false;
                    }   


  }
  public function mostrarrol()
    {
                 
                 
                   // $this->db->where('id',$empresa1);                
                    $query = $this->db->get('permisos');
                   

                    if ($query->num_rows()>0)
                    {
                     
                       return $query->result();
                    }

                    else
                    {
                      return false;
                    }   


  }
   public function consultausuario()
    {
                 
                 
                   $this->db->select('*');
                    $this->db->from('usuario u');                   
                     $this->db->join('permisos p', 'p.id_permisos = u.id_permisos');             
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
   public function registrarusuario($nomu,$apeu,$usu,$cla,$idrol)
    {
                         
                $data = array(
                  
                'nombre_usuario' => $nomu,
                'apellido_usuario' => $apeu,
                'alias_usuario' => $usu,
                'password_usuario' => $cla,
                'id_permisos' => $idrol
               
                );        
                $this->db->insert('usuario',$data);

               
  }

   public function modificarusuario($nomu,$apeu,$usu,$cla,$idrol,$idu)
    {
                         
                $data = array(
                  
                'nombre_usuario' => $nomu,
                'apellido_usuario' => $apeu,
                'alias_usuario' => $usu,
                'password_usuario' => $cla,
                'id_permisos' => $idrol
               
                );     
                $this->db->where('id_usuario', $idu);   
                $this->db->update('usuario',$data);

               
  }
    public function consultardocumento1($iddoc1)
    {
                      $this->db->select('*');
                    $this->db->from('documento');                 
                    $this->db->where('id_documento', $iddoc1);
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
     public function editardocumento($iddoc,$fechadoc,$nomdoc,$nroex, $asudoc,$estadoc,$destdoc,$idmes)
    {
                 $data = array(
                     'fecha_documento' => $fechadoc,
                    'nombre_documento' => $nomdoc,
                    'nroexp_documento' => $nroex,
                    'asunto_documento' => $asudoc,
                    'estado_documento' => $estadoc,
                    'destino_documento' => $destdoc,
                    'id_mes' => $idmes
                    );
                    $this->db->where('id_documento', $iddoc);
                    $this->db->update('documento', $data);                 
  }

   public function eliminardoc($iddoc1)
    {
          
           $this->db->delete('documento', array('id_documento' => $iddoc1));
            //$this->db->delete('contabilidad', array('id_contabilidad' => $idvou));
           
  }


   public function borrarusuario($idu)
    {
          
           $this->db->delete('usuario', array('id_usuario' => $idu));
            //$this->db->delete('contabilidad', array('id_contabilidad' => $idvou));
           
  }


  // public function borrarregistro($idvou)
  //   {
          
  //          $this->db->delete('contabilidad_detalle', array('id_contabilidad' => $idvou));
  //           $this->db->delete('contabilidad', array('id_contabilidad' => $idvou));
           
  // }
public function reporteg()
    {
   

    $sql = 'SELECT m.nom_mes,
(SELECT count(*) from documento d WHERE d.id_mes=m.id_mes ) as REGISTRO
from mes m';
                 
                    $query = $this->db->query( $sql);
                    if ($query->num_rows()>0)
                  {
                    return   $query->result_array();
                  }
                    else
                    {
                      return false;
                    }         
    }
  public function mostrarregistro($idvou)
    {
                    $this->db->select('*');
                     $this->db->from('contabilidad_detalle cd');
                    $this->db->join('contabilidad co', 'co.id_contabilidad = cd.id_contabilidad');
                     $this->db->join('cliente_empresacp cp', 'cp.id_ccp = cd.id_ccp');
                     $this->db->join('cliente cl', 'cl.id = cp.id');
                     $this->db->join('empresa_cp ecp', 'ecp.id_empresa_cp = cp.id_empresacp');
                     $this->db->join('cuenta_contable cc', 'cc.id_ctacont = cd.id_ctacont');
                    $this->db->where('co.id_contabilidad',$idvou);                    
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

    public function editarcontabilidad($fechd,$tipodo,$nserie,$nro, $empcp,$glosa,$monto,$ctacont,$bi, $igv,$tipocam,$id_empr,$idcontvou,$tipoco)
    {
                 $data = array(
                    'tipo_compro_cont' => $tipoco,
                    'fecha_docu_cont' => $fechd,
                    'tipo_docu_cont'  => $tipodo,
                    'serie_docu_cont'  => $nserie,
                    'nro_docu_cont'  => $nro, 
                    'glosa'  => $glosa,
                    'b_imponible_cont' => ($bi*$tipocam),
                    'igv_cont' => ($igv*$tipocam),
                    'monto_cont'=> ($monto*$tipocam),
                    'tipocambio'=> $tipocam
                    );
                    $this->db->where('id_contabilidad', $idcontvou);
                    $this->db->update('contabilidad', $data);


                 $this->db->select('id_ccp');
                 $this->db->where('id', $id_empr);
                 $this->db->where('id_empresacp', $empcp);
                 $query2= $this->db->get('cliente_empresacp');

                
                  if ($query2->num_rows()==1)
                    {
                     $res3= $query2->result_array();
                     $idrecp = $res3[0]['id_ccp'];
                      // $idemcp=$query->row();
                    }
                     else{

                       $this->db->select_max('id_ccp');
                       $this->db->where('id', $id_empr);
                       $query2= $this->db->get('cliente_empresacp');

                
                      if ($query2->num_rows()==1)
                        {
                         $res3= $query2->result_array();
                         $idrecp = $res3[0]['id_ccp'];
                      // $idemcp=$query->row();
                        }
                    
                     }

                     $data2 = array( 
                      'id_empresacp'=> $empcp
                      );        
                       $this->db->where('id', $id_empr);
                        $this->db->where('id_ccp', $idrecp);
                      $this->db->update('cliente_empresacp',$data2);

                 $data3 = array( 
                                
                'id_ctacont'  => $ctacont,
                'id_ccp'  => $idrecp
                );        
                $this->db->where('id_contabilidad', $idcontvou);
                $this->db->update('contabilidad_detalle',$data3);
                
                
  }
}

   
