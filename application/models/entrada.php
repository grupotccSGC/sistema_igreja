
<?php 

class  Entrada extends CI_Model {

  public function __construct()
        {
                parent::__construct();
        }      

       

  // função que cadastra dados de entrada  na tabela entrada 
  public function cadastro ($data,$id)
       {
         // prepara para cadastra
         $valor=str_replace('R$', '',$this->input->post('valor'));
         $valor=str_replace(',','.',str_replace('.','',$valor));
         $this->db->set('valor',$valor);
         $this->db->set('data',$data);
         $this->db->set('tipo',$this->input->post('tipo'));
         $this->db->set('menbro_id',$id);
         $this->db->insert('entrada');
         }     

       
public function consulta()
    {
     $this->db->select('e.*,m.nome');
     $this->db->from('entrada e');
     $this->db->join('menbro m', 'm.id = e.menbro_id');
     $this->db->where('e.status','1');
     return $this->db->get()->result(); 
      
    }

     public function ediatar($cod)
       {
     
     $this->db->select('e.*,m.nome');
     $this->db->from('entrada e');
     $this->db->join('menbro m', 'm.id = e.menbro_id');
     $this->db->where('e.status','1');
     $this->db->where('e.id',$cod);
     return $this->db->get()->row(); 
       }  

       public function atualizar($id)
       {
         $valor=str_replace('R$', '',$this->input->post('valor'));
         $valor=str_replace(',','.',str_replace('.','',$valor));
         $this->db->set('valor',$valor);
         $this->db->set('tipo',$this->input->post('tipo'));
         $this->db->set('menbro_id',$id);
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('entrada');
       }



// deleta entrada
public function deleta($cod)
{
$this->db->set('status','0');
$this->db->where('id', $cod);
$this->db->update('entrada');
}

// valor total da entrada por mes e ano 
public function valor_total()
{
  $this->db->select_sum('valor');
  $this->db->select("Date_format(data,'%m/%Y') as data");
  $this->db->from('entrada');
  $this->db->group_by("Date_format(data,'%m/%Y')");
 return  $this->db->get()->result();
}

public function consulta_busca()
    {
     $this->db->select('e.*,m.nome');
     $this->db->from('entrada e');
     $this->db->join('menbro m', 'm.id = e.menbro_id');
     $this->db->where('e.status','1');
     $this->db->where('e.tipo',$this->input->post('busca'));
     return $this->db->get()->result(); 
    }
}



?>