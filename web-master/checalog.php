<?php
    $name = $_POST['nom'];
    $mail = $_POST['email'];
    $activo =   0;
    $activo =   $_POST['activo'];
    $servername = "localhost";
    $username = "admin";
    $password = "linux";
    $dbname = "tienda";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn){
        if($activo == 1){
            $sql = "SELECT idCliente FROM cliente WHERE nombre = '$name' AND email = '$mail'";
            $res = $conn->query($sql);
            $ax = mysqli_num_rows($res);
            $row = mysqli_fetch_assoc($res);
            if($ax > 0){
                        session_start();
                        $IDCLIENTE	=	$row['idCliente'];
                        $_SESSION['IDCLIENTE']	= $IDCLIENTE;
                        //echo "<h1>Sesion iniciada Exitosamente</h1>";
                        header ("Location: carrito.php");
                        } else
                        {
                        header("Location: sesion.php?forma=1");
                        }
        }
    } else {
        die("Connection failed: " . $conn->connect_error);
    }

?>
