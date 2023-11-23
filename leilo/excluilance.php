<?php
    
    require("adm/conexao.php");

    $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "";


    $sql_delete = "DELETE FROM desapego WHERE idDesapego = '$cod'";

    print_r($sql_delete);


    if(mysqli_query($con,$sql_delete)){
        echo "<script>alert('Registro excluído com sucesso!');window.location='lancesdados.php'</script>";
    }else{
        echo "<script>alert('Erro ao excluir!');window.location='lancesdados.php'</script>";
    }

    mysqli_close($con);
?>