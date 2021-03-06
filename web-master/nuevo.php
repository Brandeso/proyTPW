<!-- HTML5 y CSS -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tienda</title>
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" />
		<link rel="shortcut icon" href="img/favicon.png">
		<meta charset="utf-8">
	</head>
	<body>

		<section id="intro">
			<header>
				<h2></h2>
			</header>
			<p>Aquí podras comprar los videojuegos que quieras</p>
			<img src="img/fondo.png" alt="Flor" />
		</section>

		<div id="barra-horizontal">
			<ul id="menu">
				<li><a href="juegos.php">Juegos</a>
					<ul class="Categorias">
						<li><a href="juegos.php">Todos</a></li>
						<li><a href="ps4.php">PS4</a></li>
						<li><a href="xbox.php">xBox ONE</a></li>
						<li><a href="nsw.php">Nintendo Switch</a></li>
					</ul>
				</li>
				<li>
                    <a href="">Cuenta</a>
                    <ul class="Categorias">
                        <li><a href="nuevo.php">Registrarse</a></li>
                        <li><a href="sesion.php">Iniciar Sesion</a></li>
                    </ul>
				</li>
				<li><a href="carrito.php">Carrito</a></li>
				<li><a href="contacto.php">Contacto</a>
					<ul class="Categorias">
						<li><a href="">Correo</a></li>
						<li><a href="">Facebook</a></li>
						<li><a href="">Instagram</a></li>
						<li><a href="">Twitter</a></li>
						<li><a href="">Pinterest</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div id="content">
			<div id="mainContent">
                <h1>Registrarse</h1>
                <form method="post">
                    Nombre: <input type="text" name="name"><br>
                    Apellidos: <input type="text" name="lastname"><br>
                    E-mail: <input type="text" name="email"><br>
                    Direccion: <input type="text" name="dir"><br>
                    Telefono: <input type="tel" name="tel"><br>
                    <input type="hidden" name="activo" value="1">
                    <input type="submit">
                </form>
                <?php
                    $activo =   0;
                    $activo =   $_POST['activo'];
                    $servername = "localhost";
                    $username = "admin";
                    $password = "linux";
                    $dbname = "tienda";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else
                        {
                            if ($activo == 1)
                                {
                                $nombre = $_POST["name"];
                                $aps = $_POST["lastname"];
                                $email = $_POST["email"];
                                $dir = $_POST["dir"];
                                $tel = $_POST["tel"];
                                /*
                                $sql2 = "SELECT MAX(idCliente) FROM cliente;";
                                $id = $conn->query($sql2);
                                $id = $id+2;
                                */
                                $sql = "INSERT INTO cliente (nombre, apellido, domicilio, email, tel) VALUES('$nombre','$aps','$dir','$email','$tel');";
                                $res = $conn->query($sql);
                                $error = mysqli_error($sql);
                                if($res){
                                    echo "<center><h1>Usuario Registrado Exitosamente</h1></center>";
                                }
                                }
                        }

                    $conn->close();
                ?>
			</div>
		</div>
		<footer>
			<div>

				<section id="about">
					<header>
						<h3>Acerca</h3>
					</header>
					<p>Somos una pequeña empresa mexicana dedicada a la venta de videojuegos, tenemos poco más de 5 años de
					experiencia y miles de clientes satisfechos al rededor de la republica méxicana</p>
				</section>

				<section id="blogroll">
					<header>
						<h3>Blogroll</h3>
					</header>
					<ul>
						<li><a href="#">NETTUTS+</a></li>
						<li><a href="#">FreelanceSwitch</a></li>
						<li><a href="#">En los Bosques</a></li>
						<li><a href="#">Netsetter</a></li>
						<li><a href="#">PSDTUTS+</a></li>
					</ul>
				</section>
				<section id="popular">
					<header>
						<h3>Popular</h3>
					</header>
					<ul>
						<li><a href="#">Este es el t&iacute;tulo de un blog post</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Consectetur adipisicing elit, sed do eiusmod</a></li>
						<li><a href="#">Duis aute irure dolor</a></li>
						<li><a href="#">Excepteur sint occaecat cupidatat</a></li>
						<li><a href="#">Reprehenderit in voluptate velit</a></li>
						<li><a href="#">Officia deserunt mollit anim id est laborum</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
					</ul>
				</section>
			</div>
		</footer>
	</body>
</html>
