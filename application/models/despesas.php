
<?php 

class  Despesas extends CI_Model {

  public function __construct()
        {
                parent::__construct();
        }      

       

  // função que cadastra dados de entrada  na tabela entrada 
  public function cadastro ()
       {
        // prepara data do vencimento 
        $venc=$this->input->post('vencimento');
        $venc=explode('/', $venc);
        $venc= $venc[2].'-'.$venc[1].'-'.$venc[0];
         // prepara para cadastra
         $valor=str_replace('R$', '',$this->input->post('valor'));
         $valor=str_replace(',','.',str_replace('.','',$valor));
         $this->db->set('valor',$valor);
         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('tipo',$this->input->post('tipo'));
         $this->db->set('vencimento',$venc);
         $this->db->set('funcionario_id',$this->session->userdata('cod'));
         $this->db->insert('despesas');
         }     

       public function consulta()
    {
       $this->db->where('status', '1');
       return $this->db->get('despesas')->result(); 
      
    }

       public function ediatar($cod)
       {
          $this->db->where('id',$cod);
         return $this->db->get('despesas')->row();
       }  



public function atualizar()
{
    $venc=$this->input->post('vencimento');
        $venc=explode('/', $venc);
        $venc= $venc[2].'-'.$venc[1].'-'.$venc[0];
         // prepara para cadastra
         $valor=str_replace('R$', '',$this->input->post('valor'));
         $valor=str_replace(',','.',str_replace('.','',$valor));
         $this->db->set('valor',$valor);
         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('tipo',$this->input->post('tipo'));
         $this->db->set('vencimento',$venc);
         $this->db->where('id',$this->input->post('id'));
         $this->db->update('despesas');
}

// deleta despesas
public function deleta($cod)
{
$this->db->set('status','0');
$this->db->where('id', $cod);
$this->db->update('despesas');
}



// valor total de despesas por mes e ano

public function valor_total()
{
  $this->db->select_sum('valor');
  $this->db->select("Date_format(vencimento,'%m/%Y') as data");
  $this->db->from('despesas');
  $this->db->group_by("Date_format(vencimento,'%m/%Y')");
 return  $this->db->get()->result();
}
// consulta determinado despesas pelo nome dela 
 public function consulta_busca()
    {
       $this->db->where('status', '1');
       $this->db->where('nome', $this->input->post('busca'));
       return $this->db->get('despesas')->result(); 
      }

}



?>