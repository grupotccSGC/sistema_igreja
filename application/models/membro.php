
<?php 

class  Membro extends CI_Model {

  public function __construct()
        {
            date_default_timezone_set('America/Sao_Paulo');
                parent::__construct();
               
        }      

       

  // função que cadastra dados de menbro na tabela menbro 
  public function cadastro ($data)
       {
// converte no formato do banco a data de batismo
$bat=$this->input->post('data_de_batismo');
$bati=explode('/', $bat);
 $batismo= $bati[2].'-'.$bati[1].'-'.$bati[0];
// converte no formato do banco a data de transferencia 
$t= $this->input->post('data_de_tranferencia');
$tr=explode('/',$t);
$tr= $tr[2].'-'.$tr[1].'-'.$tr[0];
// converte no formato do banco a data de consagração
$c=$this->input->post('data_de_consagracao');
$co=explode('/', $c);
$con=$co[2].'-'.$co[1].'-'.$co[0];
// converte no formato do banco a data de nascimento
$na=$this->input->post('nascimento');
$na=explode('/', $na);
 $na=$na[2].'-'.$na[1].'-'.$na[0];


 // limpar cpf e rg 
 $cpf=str_replace('.', '',$this->input->post('cpf'));
 $rg=str_replace('.', '',$this->input->post('rg'));

         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('cpf',$cpf);
         $this->db->set('rg',$rg);
         $this->db->set('telefone',$this->input->post('telefone'));
         $this->db->set('nascimento',$na);
         $this->db->set('cep',$this->input->post('cep'));
         $this->db->set('endereco',$this->input->post('rua'));
         $this->db->set('bairro',$this->input->post('bairro'));
         $this->db->set('cidade',$this->input->post('cidade'));
         $this->db->set('estado',$this->input->post('estado'));
         $this->db->set('mae',$this->input->post('mae'));
         $this->db->set('pai',$this->input->post('pai'));
         $this->db->set('profissao',$this->input->post('profissao'));
         $this->db->set('escolaridade',$this->input->post('escolaridade'));
         $this->db->set('cargo',$this->input->post('cargo'));
         $this->db->set('data_de_consagracao',$con);
         $this->db->set('igreja',$this->input->post('igreja'));
         $this->db->set('data_de_batismo',$batismo);
         $this->db->set('data_de_transferencia',$tr);
         $this->db->set('data_cadastro',$data);
         $this->db->set('funcionario_id',$this->session->userdata('cod'));
         $this->db->insert('menbro');
         
}     

       
public function consulta()
    {
       $this->db->where('status', '1');
        return $this->db->get('menbro')->result(); 
      
    }

     public function ediatar($cod)
       {
          $this->db->where('id',$cod);
         return $this->db->get('menbro')->row();
       }  


public function atualizar()
{
         
// converte no formato do banco a data de batismo
$bat=$this->input->post('data_de_batismo');
$bati=explode('/', $bat);
 $batismo= $bati[2].'-'.$bati[1].'-'.$bati[0];
// converte no formato do banco a data de transferencia 
$t= $this->input->post('data_de_tranferencia');
$tr=explode('/',$t);
$tr= $tr[2].'-'.$tr[1].'-'.$tr[0];
// converte no formato do banco a data de consagração
$c=$this->input->post('data_de_consagracao');
$co=explode('/', $c);
$con=$co[2].'-'.$co[1].'-'.$co[0];
// converte no formato do banco a data de nascimento
$na=$this->input->post('nascimento');
$na=explode('/', $na);
 $na=$na[2].'-'.$na[1].'-'.$na[0];


 // limpar cpf e rg 
 $cpf=str_replace('.', '',$this->input->post('cpf'));
 $rg=str_replace('.', '',$this->input->post('rg'));

         $this->db->set('nome',$this->input->post('nome'));
         $this->db->set('cpf',$cpf);
         $this->db->set('rg',$rg);
         $this->db->set('telefone',$this->input->post('telefone'));
         $this->db->set('nascimento',$na);
         $this->db->set('cep',$this->input->post('cep'));
         $this->db->set('endereco',$this->input->post('rua'));
         $this->db->set('bairro',$this->input->post('bairro'));
         $this->db->set('cidade',$this->input->post('cidade'));
         $this->db->set('estado',$this->input->post('estado'));
         $this->db->set('mae',$this->input->post('mae'));
         $this->db->set('pai',$this->input->post('pai'));
         $this->db->set('profissao',$this->input->post('profissao'));
         $this->db->set('escolaridade',$this->input->post('escolaridade'));
         $this->db->set('cargo',$this->input->post('cargo'));
         $this->db->set('data_de_consagracao',$con);
         $this->db->set('igreja',$this->input->post('igreja'));
         $this->db->set('data_de_batismo',$batismo);
         $this->db->set('data_de_transferencia',$tr);
         $this->db->where('id', $this->input->post('id'));
         $this->db->update('menbro');
 
}
// deleta membro
public function deleta($cod)
{
$this->db->set('status','0');
$this->db->where('id', $cod);
$this->db->update('menbro');
}
// total de menbro 
public function total_menbro()
{
 
 return $this->db->query("SELECT count(*) as quantidade, Date_format(data_cadastro,'%m-%Y') as data
FROM menbro  GROUP BY Date_format(data_cadastro,'%m-%Y')");
}

// consulta membro pelo nome
public function consulta_busca()
    {
       $this->db->where('status', '1');
       $this->db->where('nome', $this->input->post('busca'));
     return $this->db->get('menbro')->result(); 
    }
}



?>