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
		background-color: #778899;
		//margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		padding-top: 70px; 
	}
         .footer{
              margin-top: 211px;
              padding-top: 20px;
              padding-bottom: 48px;
              color: #99979c;
              text-align: center;
              background-color: #2a2730;
           }


</style>


</head>
<body>
<div class="container">
    <h1 class="lead text-center" style="border-bottom: 2px solid #FFFAFA" >Login </h1>
        <div class="well col-md-5 col-md-offset-3">
<br><br>
         
         <?php echo form_open('Login/valida_usuario',"class='form-horizontal'"); ?>   
 

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Usuário</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usuario" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="senha" required name="senha">
    </div>
  </div>

   <button type="submit" class="btn btn-default center-block"><span class="glyphicon glyphicon-ok"></span>  Entrar</button>
</form>
</div>

<div class="row">
<div class="col-md-5  col-md-offset-3">
  <p> <?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?></p>
  
</div>



</div>
  
  

    


      
    
	
</div>

    <div class="footer">
        
      </div>   
    
         

</script>
    
</body>
</html>