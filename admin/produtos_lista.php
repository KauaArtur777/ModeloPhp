<?php 
include 'acesso_com.php';
//conexao com BD
include '../conn/connect.php';
//conexao com BD
include '../conn/connect.php';
$lista = $conn->query("select * from vw_produtos");
$row = $lista->fetch_assoc();
$row = $lista->num_rows; //obtém o numero total do registro
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class=""> 
    <?php
    //incluir o menu ADM 
    include 'menu_adm.php'; ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Produtos</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning"> 
            <thead>
                <th class="hidden">ID</th>
                <th>TIPO</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a href="produtos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	        <!-- início estrutura repetição -->
                     <?php 
                     //incluir loop para alterar registro de produto
                     do{
                        
                        

                     ?>
               
                    <tr>
                        <td class="hidden">
                            <?php 
                            //exibe rotulo do produto
                            echo $row ['id'];?>
                            
                            
                        </td>
                        <td>
                            <?php 
                            echo $row['rotulo'];
                            ?>
                            
                            <span class="visible-xs"></span>
                            <span class="hidden-xs"></span>
                        </td>
                        <td>
                            <?php 
                            //verifica se o produto esta em destaque
                            if($row['destaque']=='Sim'){
                                echo '<span classe="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>';
                            }
                            else
                            //caso o contrario exibe o icone de ok - success
                            {
                                echo '<span classe="glyphicon glyphicon-star text-succes" aria-hidden="true"></span>';
                            }
                                //adcionar espaço
                                echo '&nbsp;';
                                //exibe descriçao do produto
                                echo $row ['descricao'];
                            ?>
                            
                        </td>
                        <td>
                            <?php 
                            echo $row['resumo']
                            ?>
                          
                        </td>
                        <td>
                           <?php 
                           //exibe o valor do produto 
                           echo number_format($row['valor'],2,',','.');
                           ?>
                        </td>
                        <td>
                            <img src="../imagens/<?php
                            //mostra a imagem da linha
                            echo $row['imagem']?>" width="100px">
                        </td>
                        <td>
                            <a
                                href="produtos_atualiza.php?id=<?php
                                //passa o id do produto para a pagina de atualizaçao
                                echo $row['id'] ?>" 
                                role="button" 
                                class="btn btn-warning btn-block btn-xs"
                            >
                                <span class="glyphicon glyphicon-refresh"></span>
                                <span class="hidden-xs">ALTERAR</span>    
                            </a>
                                <!-- não mostrar o botão excluir se o produto estiver em destaque -->
                                 <?php 
                                 // execulta uma query para verificar o status do destaque do produto atual
                                  $regra = $conn->query("select destaque from vw_produtos where = id = " .$row['id']);

                                  //obtem o resultado da query como array assoc
                                  $regraRow = $regra->fetch_assoc();
                                  ?>
                                

                            <button 
                                data-nome="<?php
                                //define o atributo data-nome com descricao do produto
                                echo $row['descricao']

                                ?>"
                                data-id=""
                                class="delete btn btn-xs btn-block btn-danger
                                
                                "     
                            >
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">EXCLUIR</span>

                            </button>
                        </td>
                    </tr>    
                    <?php 
                    //continua o loop enquanto ouver registros disponivel
                } while ($row = $lista->fetch_assoc());
                    ?>
                
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>
    <!-- inicio do modal para excluir... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Vamos deletar?</h4>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;

                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-success" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','produtos_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>

<?php 

?>
</html>