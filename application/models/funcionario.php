
<?php 

class  Funcionario extends CI_Model {

  public function __construct()
        {   
                parent::__construct();
                
        }      

      public function cadastro ()
       {
         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('cargo',$this->input->post('cargo'));
         $this->db->set('usuario',$this->input->post('usuario'));
         $senha=password_hash($this->input->post('senha'),PASSWORD_DEFAULT);
         $this->db->set('senha',$senha);
         $this->db->insert('funcionario');
         }     
         
      
      



public function atualiza()
{
         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('cargo',$this->input->post('cargo'));
         $this->db->set('usuario',$this->input->post('usuario'));
         $senha=password_hash($this->input->post('senha'),PASSWORD_DEFAULT);
         $this->db->set('senha',$senha);
         $this->db->where('id',$this->session->userdata('cod'));
         $this->db->update('funcionario');
}









}



?>