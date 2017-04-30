<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de Cadastro de Membros</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.7-dist/css/bootstrap.css">


    <script src=" <?php echo base_url();?>bootstrap-3.3.7-dist/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script><script src="<?php echo base_url();?>bootstrap-3.3.7-dist/pluguin/jquery.maskedinput.min.js" type="text/javascript"></script>

  <style type="text/css">


	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		//margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		padding-top: 70px; 
	}
       
	
        .footer{
              margin-top: 50px;
              padding-top: 20px;
              padding-bottom: 20px;
              color: #99979c;
              text-align: center;
              background-color: #2a2730;
           }
        
       
       
</style>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url('Welcome');?>" class="navbar-brand">Sistema de Cadastro de Membros</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('Welcome/usuario'); ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            Membros</a></li>
            <li><a href="<?php echo base_url('Welcome/entrada'); ?>">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Entrada</a></li>
            <li><a href="<?php echo base_url('Welcome/Despesas'); ?>">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
               Despesas</a></li>
              <li role="separator" class="divider"></li>
            <li>
              <a href="<?php echo base_url('Welcome/funcionario'); ?>">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  Funcionarios</a>
            </li>
           </ul>
        </li>



<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('Welcome/consulta_membro'); ?>">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Membros</a></li>
            <li><a href="<?php echo base_url('Welcome/consulta_entrada'); ?>"> 
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                 Entrada</a></li>
            <li><a href="<?php echo base_url('Welcome/consulta_despesas'); ?>">
             <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
                Despesas</a></li>
          </ul>
        </li>
         <?php if ($this->session->userdata('perfil')== "administrador" or $this->session->userdata('perfil')== "tesoureiro") {;?>
<li>
<a href="<?php echo base_url('Welcome/relatorio_despesas');?>">
<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Relatórios de Despesas</a>
</li>
<?php };?>
<li>
<a href="<?php echo base_url('Welcome/relatorio_membros');?>">
<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Relatórios de Membros</a>
</li>

 </ul>
   <ul class="nav navbar-nav navbar-right">
   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('Login/Sair/');?>">Sair</a></li> 
              <li role="separator" class="divider"></li>
            <li>
              <a href="<?php echo base_url('Welcome/perfil');?>">Perfil
             </a>
            </li>
           </ul>
        </li>
 
  </ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





<div class="container-fluid">
    <div class="row">
        <div class=" col-md-12">
         <h1 class="lead text-center" style="border-bottom:2px solid #8B8989
 " >CADASTRO DE MEMBROS </h1>
         </div>
        </div>

 
<p> 
<?php //mensagem de erro abaixo
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
      ;?>
          
  </p>
  


      <?php if(!empty($da)){
          echo form_open('Welcome/atualiza_membro');
        }else{
          echo form_open('Welcome/cadastro_menbro');
        } ?>
 
        <input type="hidden" name="id" value="<?php if(!empty($da)){echo $da->id;} ?>">

<div class="col-md-10">
<div class="alert " role="alert">
  <p class="lead">Campo Obrigatório <font color="red"><b>*</b></font></p>  </div>
</div>




   <div class="col-md-10">
   <div class="form-group">
     <label for="exampleInputEmail1">Nome <font color="red"><b>*</b></font></label>
    <input type="text" name="nome" class="form-control" required  value="<?php if(!empty($da)){echo $da->nome;}?>">
  </div>
</div>
        
     
    <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">CPF <font color="red"><b>*</b></font></label>
    <input type="text" name="cpf" class="form-control" id="cpf"  value="<?php if(!empty($da)){echo $da->cpf;}?>"  required>
  </div>
</div> 

   <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">RG <font color="red"><b>*</b></font></label>
    <input type="text" name="rg" class="form-control" id="rg"  value="<?php if(!empty($da)){echo $da->cpf;}?>"  required>
  </div>
</div>   
        
         
        <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Telefone  <font color="red"><b>*</b></font></label>
    <input type="text" name="telefone"  value="<?php if(!empty($da)){echo $da->telefone;}?>" class="form-control" id="tel" required>
  </div>
</div>
    
      <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Nascimento <font color="red"><b>*</b></font></label>
    <input type="text" name="nascimento"  value="<?php if(!empty($da)){echo date("d/m/Y",strtotime($da->nascimento));}?>" class="form-control" id="Nascimento" required>
  </div>   
</div>
       <?php //arrumando ?>   
 <div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">CEP <font color="red"><b>*</b></font></label>
    <input type="text" name="cep"  value="<?php if(!empty($da)){echo $da->cep;}?>" class="form-control" id="cep" required>
  </div>
</div>
     
    <div class="col-md-5">
   <div class="form-group">
     <label for="exampleInputEmail1">Rua <font color="red"><b>*</b></font></label>
    <input type="text" name="rua" data-cep="logradouro" value="<?php if(!empty($da)){echo $da->endereco;}?>" class="form-control"  required>
  </div>
</div>
      
   <div class="col-md-5">
   <div class="form-group">
     <label for="exampleInputEmail1">Bairro <font color="red"><b>*</b></font></label>
    <input type="text" name="bairro" data-cep="bairro"  value="<?php if(!empty($da)){echo $da->bairro;}?>" class="form-control" id="bairro" required>
  </div>
</div>
     

 <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Cidade <font color="red"><b>*</b></font></label>
    <input type="text" name="cidade" data-cep="cidade" value="<?php if(!empty($da)){echo $da->cidade;}?>" class="form-control" id="cidade" required>
  </div>
</div>
     
      <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Estado <font color="red"><b>*</b></font></label>
    <input type="text" name="estado"  data-cep="uf" value="<?php if(!empty($da)){echo $da->estado;}?>" class="form-control" id="estado" required>
  </div>
</div>
     


           <div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Filiação mãe <font color="red"><b>*</b></font></label>
    <input type="text" name="mae"  value="<?php if(!empty($da)){echo $da->mae;}?>" class="form-control"  required>
  </div>
</div>
     

   <div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Filiação Pai <font color="red"><b>*</b></font></label>
    <input type="text" name="pai"  value="<?php if(!empty($da)){echo $da->pai;}?>" class="form-control" required>
  </div>
</div>
     


 <div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Profissão <font color="red"><b>*</b></font></label>
    <input type="text" name="profissao"  value="<?php if(!empty($da)){echo $da->profissao;}?>" class="form-control" required>
  </div>
</div>
     





 <div class="col-md-4">
   <div class="form-group">
 <label for="exampleInputEmail1">Escolariedade  <font color="red"><b>*</b></font></label>
   <select class="form-control" name="escolaridade" required id="esc" onchange="mostra()">
    <option value="">Selecione</option>
 
  <option value="fundamental">Fundamental</option>
  <option value="fundamental_incompleto">Fundamental Incompleto</option>
  <option value="medio">Médio</option>
  <option value="medio_incompleto">Médio Incompleto</option>
  <option value="superior">Superior</option>
  <option value="superior_incompleto">Superior Incompleto</option>
</select>
</div>
</div>


        <div class="col-md-4">
   <div class="form-group">
 <label for="exampleInputEmail1">Cargo  <font color="red"><b>*</b></font></label>
   <select class="form-control" name="cargo" required id="se" onchange="mostra()">
    <option value="">Selecione</option>
 
  <option value="Pastor">Pastor</option>
  <option value="Evangelista">Evangelista</option>
  <option value="Presbitero">Presbitero</option>
  <option value="Missionario">Missionário</option>
  <option value="Diacono">Diácono</option>
  <option value="Obreiro">Obreiro</option>
   <option value="Nenhum">Nenhum</option>
</select>
</div>
</div>

<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de Consagração  </label>
    <input type="text" name="data_de_consagracao"  value="<?php if(!empty($da)){echo date("d/m/Y",strtotime($da->data_de_consagracao));}?>" class="form-control" id="data_de_consagracao">
  </div>
</div>


<div class="col-md-5">
   <div class="form-group">
     <label for="exampleInputEmail1">Igreja origem <font color="red"><b>*</b></font></label>
    <input type="text" name="igreja"  value="<?php if(!empty($da)){echo $da->igreja;}?>" class="form-control" required>
  </div>
</div>
 


  <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de Batismo <font color="red"><b>*</b></font></label>
    <input type="text" name="data_de_batismo"  value="<?php if(!empty($da)){echo date("d/m/Y",strtotime($da->data_de_batismo));}?>" class="form-control"  id ="data_de_batismo" required>
  </div>
</div>
 
 
  <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de Tranfêrencia </label>
    <input type="text" name="data_de_tranferencia"  value="<?php if(!empty($da)){echo date("d/m/Y",strtotime($da->data_de_consagracao));}?>" class="form-control"  id="data_de_tranferencia">
  </div>
</div>
  
</div>




   
<div class="col-md-5 col-lg-offset-5">
   <div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
  </div>
</div>    
        
        
        
    </form>
    
    
	
</div>

    <div class="footer">
        
      </div>   




<script src=" <?php echo base_url();?>bootstrap-3.3.7-dist/pluguin/jquery.cep.min.js" type="text/javascript"></script>

         
<script type="text/javascript"> 
$(document).ready(function() {
  $('#cep').cep();
    $('#tel').mask("99999-9999");
    $('#cpf').mask("999.999.999.99");
     $('#Nascimento').mask("99/99/9999");
	 $('#rg').mask("99.999.999.9");
     $('#cep').mask("99999-999");
	 $('#data_de_consagracao').mask("99/99/9999");
	 $('#data_de_batismo').mask("99/99/9999");
	 $('#data_de_tranferencia').mask("99/99/9999");
    verifica_edit();
    });



function verifica_edit(){
 var carg="<?php  if(!empty($da->cargo)){echo $da->cargo;}?>";
 var esc="<?php if(!empty($da->escolaridade)) {echo $da->escolaridade;}?>" ;
$('#se').val(carg);
$('#esc').val(esc);
}

</script>
    
</body>
</html>