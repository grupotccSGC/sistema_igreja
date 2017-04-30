<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Relatorio de Membros</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.7-dist/css/bootstrap.css">
<script src=" <?php echo base_url();?>bootstrap-3.3.7-dist/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>


  </head>
<body>
<div class="container">
  <h4 class="text-center" style="border-bottom: 2px solid #68838B;">Relatorio de Quantidade de Membro</h4>
      
<table class="table table-bordered">
    <thead>
       <tr>
          <th>Quantidade</th>
          <th>data</th>
        </tr>
      </thead>
  <tbody id="tabela">
    <?php foreach($q as $a){;?>
    <tr>
      <td ><?php echo $a->quantidade;?></td>
      <td ><?php echo  $a->data;?></td>
      <?php }; ?>
     </tr>
  </tbody>
</table>
</div>    
</body>
</html>







     



      