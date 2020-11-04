<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "fseletroo";

$conn = mysqli_connect( $servername, $username, $password, $database);


if (!$conn){
    die("A conexão ao BD falhou: ". mysqli_connect_error());
}
if(isset($_POST['nome']) && isset($_POST['msg'])){
    $nome = $_POST['nome'];
    $msg = $_POST['msg']; 

    $sql = "insert into comentarios(nome,msg) values('$nome', '$msg')";
    $result = $conn->query($sql);
}

?>


<DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="UTF-8">
        <title>Contato - Full Stack Eletro</title>
        <link rel="stylesheet" href="./css/estilo.css">
        
        </head>
    <body>
        <!-- começo do menu-->
        <?php
        include('menu.html');
        
        ?>
        <!-- fim do menu-->
        <h2> Contato</h2>
         <hr>
         <table border=0 width=100% cellpadding="20">
             <tr>
                 <td width="50%" align="center">
                     <img src="./img/logoemail.png" width="40px">
                     <font face="arial" size="4"> contato@fullstackeletro.com.br</font>

                 </td>
                 <td width="50%" align="center">
                    <img src="./img/logowhats1.jpg" width="40px">   
                    <font face="arial" size="4">(11) 99999-9999</font>

                </td>
             </tr>
         </table>

         <form method="post" action>
             Nome:<br/>
             <input type="text" name="nome" style=width:500px><br/>
             Mensagem: <br/>
             <input type="text" name="msg" style=width:500px><br/>

             <input type="submit" name="submit" value="enviar"><br/>
         </form>

         <<?php
                 $sql = "select * from comentarios";
                 $result = $conn->query($sql);
                
                 if($result->num_rows > 0){
                 while ($rows= $result-> fetch_assoc()){
                    echo "Data: ", $rows['data'],"<br/>";
                    echo "Nome: ", $rows['nome'],"<br/>";
                    echo "Mensagem: ", $rows['msg'],"<br/>";
                    echo"<hr>";
            
                  }
                 } else{
                    echo"Nenhum comentário anda!";
                 }

            ?>
         
         
            <footer id="rodape">
                <p id="formasdepagamento"><b>Formas de pagamento</b></p>
            <img width="25%" src="./img/pag.jpeg" alt="Formas de pagamento">
                 <p>&copy;Recode Pro</p></footer
    </body>

</html>