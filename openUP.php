<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>PopUp Transfere Variável</title>
</head>
<body>

    <a href="http://google.com">Aquí pode entrar no google</a><br>

    <?php

      $valor_enviado = "14288007";

      echo"<a href='receptor.php?valor_enviado=$valor_enviado' target='popup' 
            onclick=\"window.open('receptor.php?valor_enviado=$valor_enviado','popup','width=600,height=600'); return false;\">";
      
      print"Abrir a tela flutuante e Passar o valor para o parâmetro";
      print"</a>";
    ?>

</body>
</html>