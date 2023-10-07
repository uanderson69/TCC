<?php
    
    require("adm/conexao.php");

    $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "";


    $sql_delete = "DELETE FROM contato WHERE idContato = '$cod'";

    print_r($sql_delete);


    if(mysqli_query($con,$sql_delete)){
        echo "<script>alert('Registro excluído com sucesso!');window.location='contatosfeitos.php'</script>";
    }else{
        echo "<script>alert('Erro ao excluir!');window.location='contatosfeitos.php'</script>";
    }

    mysqli_close($con);
?>