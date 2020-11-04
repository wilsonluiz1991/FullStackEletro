
<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "fseletroo";

$conn = mysqli_connect( $servername, $username, $password, $database);


if (!$conn){
    die("A conexão ao BD falhou: ". mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="UTF-8">
        <title>Produtos - Full Stack Eletro</title>
        <link rel="stylesheet" href="./css/estilo.css">
        <script src="./js/funcoes.js"></script>
        </head>
    <body>
        <!-- começo do menu-->
        <?php
        include('menu.html');
        
        ?>
        <!-- fim do menu-->
        <header>
        <h1> Produtos</h1>
        </header>
        <hr>

                
        <div class="categoria">
                    <h3>Categorias</h3>
                    <ul>
                        <li onclick="exibir_todos()">todos (15)</li>
                        <li onclick="exibir_categoria('geladeira')">Geladeiras (4)</li>
                        <li onclick="exibir_categoria('fogao')">Fogões (4)</li>
                        <li onclick="exibir_categoria('micro')">Microondas (4)</li>
                        <li onclick="exibir_categoria('lavaroupa')">Lava roupas (3)</li>
                        
                    </ul>
                </div>
                </div>
                <div class="produtos">
            <?php
                 $sql = "select * from produtos";
                 $result = $conn->query($sql);
                
                 if($result->num_rows > 0){
                 while ($rows= $result-> fetch_assoc()){
                 
            ?>
                <div class= "produtos">

            <div class="box_produtos" style="display:inline-block" id="<?php echo $rows["Categoria"]; ?>">
            <img src=<?php echo $rows["imagem"];?> width="180px" onclick="destaque(this)">
                    <br>
                    <div class=" descricao"><?php echo $rows["descricao"]; ?></div>
                    <hr>
                    <div class="descricao"><strike><?php echo $rows["preco"]; ?></strike></div>
                    <div class="preco"><?php echo $rows["preco_venda"]; ?></div>
                    </div>
                 </div>
            <?php

                  }
                 } else{
                 echo"Nenhum produto cadastrado!";
                 }

            ?>
                
                 
                    
                </div>
                 
            
        
        
        <footer id="rodape">
            <p id="formasdepagamento"><b>Formas de pagamento</b></p>
        <img width="250px" src="./img/pag.jpeg" alt="Formas de pagamento">
             <p>&copy;Recode Pro</p></footer>
    </body>

</html>