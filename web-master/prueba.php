<?php
    $servername = "localhost";
    $username = "admin";
    $password = "linux";
    $dbname = "tienda";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn) {
        //echo "funciona";

        $sql = "SELECT * FROM cliente WHERE nombre = 'Bruno' AND email = 'amezcua_bruno@hotmail.com'";
        $res = $conn->query($sql);
        $ax = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        echo $row["idCliente"];
    }
    else
    {
            die("Connection failed: " . $conn->connect_error);
    }
?>
