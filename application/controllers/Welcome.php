<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
public function __construct(){
		parent::__construct();
        $this->load->model('membro');
        $this->load->model('entrada');
        $this->load->model('despesas');
	    $this->load->helper('form');
	    $this->load->helper('url_helper');
	    $this->load->library('form_validation');
	    date_default_timezone_set('America/Sao_Paulo');
	  if(!$this->session->userdata('nome') and !$this->session->userdata('perfil')){
redirect('Login/');
}
   }
  
public function relatorio_membros()
{
	$query =$this->membro->total_menbro();
	$dados['q']=$query->result();
	$this->load->library('PDF');
    $pdf=$this->pdf->objeto(); 
    $html=$this->load->view('relatorio_membro',$dados,true);
    $pdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
    $pdf->WriteHTML($html);
    $pdf->output();
//$pdf->output("Relatorio.pdf","D");
exit();

}

public function relatorio_despesas()
{
 $dados['da']=$this->despesas->consulta();
 $dados['en']=$this->entrada->consulta();
 $dados['va']=$this->despesas->valor_total();
 $dados['ent']=$this->entrada->valor_total();
 $this->load->library('PDF');
 $pdf=$this->pdf->objeto(); 
 $html=$this->load->view('relatorio_des',$dados,true);
 $pdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
 $pdf->WriteHTML($html);
 $pdf->output();
//$pdf->output("Relatorio.pdf","D");
exit();
}

public function cadastro_funcionario()
{

$this->form_validation->set_rules('usuario', 'usuario', 'required|min_length[5]|is_unique[funcionario.usuario]');
$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
$this->form_validation->set_message('is_unique', 'usuário já existente');
 if ($this->form_validation->run() == true)
  {
    $this->load->model('funcionario');
	$this->funcionario->cadastro();
	$this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
	redirect('Welcome/funcionario');    
  }else{

  $this->load->view('funcionario');
  }


	

}


public function funcionario()
{
	$this->load->view('funcionario');
}


  public function index()
	{
	$this->load->view('welcome_message');
	//$this->load->view('login');
	}
        

  



// carrega a pagina membro 
    public function usuario() {
     $this->load->view('membro');
             }
        

//carrega a pagina entrada
public function entrada()
{
	$this->load->view('entrada');
}


//carrega a pagina despesas
public function Despesas()
{
	$this->load->view('despesas');
}

        
       


// cadastra menbro
public function cadastro_menbro()
{
	
	$this->membro->cadastro(date('Y-m-d'));
	$this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
	redirect('Welcome/usuario');
}

// cadastra entrada 
public function cadastro_entrada()
{    
// verifica se o membro esta cadastrado
 //$cpf=str_replace('.', '',$this->input->post('cpf'));
 $this->db->where('nome',$this->input->post('cpf'));
 $row= $this->db->get('menbro')->row();
//verifica row for null
if (!isset($row)){
$this->session->set_flashdata('mensagem', 'Membro não cadastrado!');
redirect('Welcome/entrada');
}else{
    $this->entrada->cadastro(date('Y-m-d'),$row->id);
    $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
redirect('Welcome/entrada');
}
}

// cadastra a despesas 
public function cadastro_despesas()
{
	
	 $this->despesas->cadastro();
	 $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
	 redirect('Welcome/despesas');
}


// consulta membro
public function consulta_membro()
{
	
	$dados['da'] =$this->membro->consulta();
	$this->load->view('consulta_membro',$dados);
}




// ediatar membro
public function editar_membro($cod)
{
	
	$dados['da']=$this->membro->ediatar($cod);
    $this->load->view('membro',$dados);
}



//atualiza membro 
 public function atualiza_membro(){
 $this->membro->atualizar();
$this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
redirect('Welcome/consulta_membro');
}


// deleta menbro
public function deleta_membro($cod)
{
$this->membro->deleta($cod);
redirect('Welcome/consulta_membro');
}


public function consulta_entrada()
{
	$dados['da'] =$this->entrada->consulta();
	$this->load->view('consulta_entrada',$dados);
}

// editar entrada
public function editar_entrada($cod)
{
	$dados['da']=$this->entrada->ediatar($cod);
    $this->load->view('entrada',$dados);
}


//atualiza entrada 
 public function atualiza_entrada(){
$this->db->where('nome',$this->input->post('cpf'));
 $row= $this->db->get('menbro')->row();
 if (!isset($row)){
$this->session->set_flashdata('mensagem', 'Membro não cadastrado!');
redirect('Welcome/entrada');
}else{
 $this->entrada->atualizar($row->id);
 $this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
 redirect('Welcome/consulta_entrada');}
} 

public function deleta_entrada($cod)
{
$this->entrada->deleta($cod);
redirect('Welcome/consulta_entrada');
}


public function consulta_despesas()
{
	
	$dados['da'] =$this->despesas->consulta();
	$this->load->view('consulta_despesas',$dados);
}


// editar despesas
public function editar_despesas($cod)
{
	
	$dados['da']=$this->despesas->ediatar($cod);
    $this->load->view('despesas',$dados);
}

public function atualiza_despesas(){
 $this->despesas->atualizar();
$this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
redirect('Welcome/consulta_despesas');
}

 public function deleta_despesas($cod)
{
$this->despesas->deleta($cod);
redirect('Welcome/consulta_despesas');
}


// busca determinado menbro
public function busca_membro()
{
	$dados['da'] =$this->membro->consulta_busca();
	$this->load->view('consulta_membro',$dados);
}
// busca determinado despesas 
public function busca_despesas()
{
	$dados['da'] =$this->despesas->consulta_busca();
	$this->load->view('consulta_despesas',$dados);
}


// busca determinado entrada pelo tipo
public function busca_entrada()
{
	$dados['da'] =$this->entrada->consulta_busca();
	$this->load->view('consulta_entrada',$dados);
}

//atualiza dados do perfil
public function atualiza_funcionario()
{

$this->form_validation->set_rules('usuario', 'usuario', 'required|min_length[5]');
$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
$this->form_validation->set_message('is_unique', 'usuário já existente');
if ($this->form_validation->run() == true){
$this->load->model('funcionario');
$this->funcionario->atualiza();
$this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
redirect('Welcome/funcionario');}
else{
 $this->load->view('funcionario');
}
}

// carreda o perfil
public function perfil()
{
$this->load->view('perfil_funcionario');
}


}