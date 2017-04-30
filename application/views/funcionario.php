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
              margin-top: 192px;
              padding-top: 50px;
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


<div class="container">
    <div class="row">
        <div class=" col-md-12">
         <h1 class="lead text-center" style="border-bottom: 2px solid #8B8989
">Cadastro De Funcionarios</h1>
        </div>
    </div>

 <?php echo validation_errors(); ?>

<p> 
<?php //mensagem de erro abaixo
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
      ;?>
          
  </p>
  


      <?php echo form_open('Welcome/cadastro_funcionario');?>
<div class="col-md-10">
<div class="alert " role="alert">
  <p class="lead">Campo Obrigatório <font color="red"><b>*</b></font></p>  </div>
</div>


<div class="col-md-10">
   <div class="form-group">
     <label for="exampleInputEmail1">Nome <font color="red"><b>*</b></font></label>
    <input type="text" name="nome" class="form-control" required>
  </div>
</div>

<div class="col-md-4">
   <div class="form-group">
 <label for="exampleInputEmail1">Cargo<font color="red"><b>*</b></font></label>
   <select class="form-control" name="cargo" required id="se">
    <option value="">Selecione</option>
    <option value="secrétaria">Secrétaria</option>
    <option value="tesoureiro">Tesoureiro</option>
    <option value="administrador">administrador</option>
</select>
</div>
</div>

   <div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Usuário <font color="red"><b>*</b></font></label>
    <input type="text" name="usuario" class="form-control" required>
  </div>
</div>
        
     <div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Senha <font color="red"><b>*</b></font></label>
    <input type="password" name="senha" class="form-control" required>
  </div>
</div>
        




</div>
<br>
<div class="col-md-5 col-lg-offset-5">
   <div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
  </div>
</div>    
         </form>
    </div>

    <div class="footer">
    </div>   


    
</body>
</html>