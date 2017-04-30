<?php
defined('BASEPATH')  OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
   parent::__construct();
	 $this->load->helper('form');
  }






public function index()
  {
  $this->load->view('login');
  }
  


public function valida_usuario()
{

 $this->db->where('usuario',$this->input->post('usuario'));
 $query= $this->db->get('funcionario');
if ($query->num_rows() > 0) {
$da= $query->row();
if(password_verify($this->input->post('senha'),$da->senha)){
  $this->session->set_userdata(array(
            'logged' => true,
            'nome'  => $da->nome,
            'cod'=>$da->id,
            'perfil'=> $da->cargo,
            'usuario'=>$da->usuario));
             redirect('Welcome');
}else{
$this->session->set_flashdata('mensagem', ' senha inválida ou usuario inválido!');
redirect('Login');
}
}else{
redirect('Login');
}
}





// executa quando o usuario aperta pra sair
public function Sair()
{ 
$this->session->sess_destroy();
redirect('Login');
}


/*
public function painel()
{
//verifica a sessao;
if(!$this->session->userdata('user') and !$this->session->userdata('perfil')){
redirect('Login/');
}
  
$this->load->view('header');
$this->load->view('menu/admin');	
$this->load->view('painel');
$this->load->view('rodape');

}

*/

/*
// essa função redefinir a senha do usuario do sistema
public function redefinir_senha()
{
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
$this->form_validation->set_rules('senha1', 'senha', 'required');

$this->form_validation->set_rules('repita', '"Repita"', 'required|matches[senha1]');

if ($this->form_validation->run() == FALSE)
{
$this->load->view('header');
$this->load->view('login');
}
else
{
  $this->load->model('Funcionario');
  $va= $this->Funcionario->redefinir_senha();
  if($va){
$this->session->set_flashdata('mensagem', 'Senha atualizada com sucesso');
redirect('Login/login');
  }else{
$this->session->set_flashdata('mensagem', 'E-mail não cadastrado');
redirect('Login/login');
  }

}



}

*/
}
?>