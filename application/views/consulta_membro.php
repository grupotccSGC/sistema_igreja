<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de Movimento de Som</title>
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
	  font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		padding-top: 81px; 
	}
       
          .footer{
              margin-top: 301px;
              padding-top: 20px;
              padding-bottom: 48px;
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
        <div class="col-md-12"> 
           <h1 class="lead text-center" style="border-bottom: 2px solid #68838B">Consulta de Membros</h1>
        </div>
    </div>

<br>
<div class="row">
   <div class="col-md-4 col-md-offset-8">
    <?php echo form_open('Welcome/busca_membro',"class='form-inline'");?>
       <div class="form-group">
            <input type="text" class="form-control"  placeholder="Insira o nome do membro" size="28" name="busca" required>
       </div>
            <button type="submit" class="btn btn-primary">Busca</button>
    </form>
</div>
</div>

 

   <?php //mensagem de erro abaixo
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
      ;?>
          
  </p>
  
<?php //echo form_open('Welcome/cadastro'); ?>
<br>
    <div class="table-responsive">
<table class="table table-hover table-striped well">
  <thead>
    <tr>
      <th>Nome</th>
      <th>CPF</th>
      <th>RG</th>
      <th>Telefone</th>
      <th>Cargo</th>
      <th>Igreja</th>
     <th>Data de transferencia </th>
     </tr>

  </thead>
  <tbody id="tabela">
    <?php foreach($da as $a){;?>
    <tr>
      <td><?php echo $a->nome;?></td>
      <td id="cpf"><?php echo mask($a->cpf,'###.###.###-##') ;?></td>
      <td id="rg"><?php echo  mask($a->rg,'##.###.###.#');?></td>
      <td id="tel"><?php echo $a->telefone;?></td>
      <td><?php echo $a->cargo;?></td>
      <td><?php echo $a->igreja;?></td>
      <td><?php echo date("d/m/Y",strtotime($a->data_de_transferencia));?></td>
    

<?php //if($this->session->userdata('perfil')=== 'administrador'){;?>
<td><a href="<?php echo base_url('Welcome/editar_membro/'.$a->id);?>" class="btn btn-warning" data-toggle="modal">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo base_url('Welcome/deleta_membro/'.$a->id);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a></td>
      <?php // }
       }; ?>
    </tr>
  </tbody>
</table>
       
</div>

    
  </div>    
    
    
    
 <div class="footer">
<div class="container">
  </div>

 </div>
     
<?php 
function mask($val, $mask)
{
$maskared = '';
$k = 0;
for($i = 0; $i<=strlen($mask)-1; $i++)
{
if($mask[$i] == '#')
{
if(isset($val[$k]))
$maskared .= $val[$k++];}
else
{
if(isset($mask[$i]))
$maskared .= $mask[$i];
}
}
return $maskared;}
?>  

    
</body>
</html>







     



      