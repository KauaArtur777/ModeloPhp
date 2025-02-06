<?php 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>chuleta quente Churrascaria</title>
</head>
<body class="fundofixo">
    <!-- area de menu -->
     <?php include 'menu_publico.php' ?>
     <a name="home">&nbsp;</a>
     <main class="container">
        <!-- area de carrousel -->
         <?php include 'carroussel.php';?>
         <!-- area de destaque -->
          <a class="pt-6" name= "destaques"></a>
          <?php include 'produtos_destaque.php'; ?>
          <!-- area geral de produtos -->
          <a class="pt-6" name= "produtos"></a>
          <?php include 'produtos_geral.php'; ?>
          <!-- rodapé -->
           <footer class="panel_footer" style="background: none;">
            <?php include 'rodapé.php';?>
            <a name="contato"></a>

           </footer>

</body>
</html>