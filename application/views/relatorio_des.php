<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Relatorio de Despesas</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.7-dist/css/bootstrap.css">
<script src=" <?php echo base_url();?>bootstrap-3.3.7-dist/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>


  </head>
<body>
<div class="container">
  <h4 class="text-center" style="border-bottom: 2px solid #68838B;">Relatorio de Despesas</h4>
      
<table class="table table-bordered">
    <thead>
       <tr>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Valor R$</th>
          <th>data de Vencimento</th>
        </tr>
      </thead>
  <tbody id="tabela">
    <?php foreach($da as $a){;?>
    <tr>
      <td ><?php echo $a->nome;?></td>
      <td ><?php echo  $a->tipo;?></td>
      <td><?php echo "R$ ".''. number_format($a->valor,2,',','.');?></td>
      <td ><?php echo date("d/m/Y",strtotime($a->vencimento));?></td>
     <?php }; ?>
     </tr>
  </tbody>
</table>
<h4 class="text-center" style="border-bottom: 2px solid #68838B;">Valor total da despesas por mês e ano </h4>

<table class="table table-bordered">
    <thead>
       <tr>
          <th>Valor RS</th>
          <th>mês e ano </th>
        </tr>
      </thead>
  <tbody id="tabela">
    <?php foreach($va as $va){;?>
    <tr>
      <td><?php echo "R$ ".''. number_format($va->valor,2,',','.');?></td>
      <td ><?php echo $va->data;?></td>
     <?php }; ?>
     </tr>
  </tbody>
</table>


<h4 class="text-center" style="border-bottom: 2px solid #68838B;">Entrada</h4>


<table class="table table-bordered">
    <thead>
       <tr>
          <th>Valor R$</th>
          <th>Data</th>
          <th>Tipo</th>
          <th>Membro</th>
        </tr>
      </thead>
  <tbody id="tabela">
    <?php foreach($en as $en){;?>
    <tr>
    <td><?php echo "R$ ".''. number_format($en->valor,2,',','.');?></td>
    <td ><?php echo date("d/m/Y",strtotime($en->data));?></td>
    <td ><?php echo $en->tipo;?></td>
    <td ><?php echo $en->nome;?></td>
      
     <?php }; ?>
     </tr>
  </tbody>
</table>

<h4 class="text-center" style="border-bottom: 2px solid #68838B;">Valor total da Entrada por mês e ano </h4>

<table class="table table-bordered">
    <thead>
       <tr>
          <th>Valor RS</th>
          <th>mês e ano </th>
        </tr>
      </thead>
  <tbody id="tabela">
    <?php foreach($ent as $ent){;?>
    <tr>
      <td><?php echo "R$ ".''. number_format($ent->valor,2,',','.');?></td>
      <td ><?php echo $ent->data;?></td>
     <?php }; ?>
     </tr>
  </tbody>
</table>


</div>    
</body>
</html>







     



      