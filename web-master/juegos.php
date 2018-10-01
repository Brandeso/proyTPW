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
						<li><a href="index.php">Inicio</a></li>
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
				<section>
					<article class="blogPost">
                        Ordenar por:
                        <select>
                            <option value="">--Seleccione uno--</option>
                            <option value="l">Precio: Mayor a Menor</option>
                            <option value="m">Precio: Menor a Mayor</option>
                            <option value="mm">Nombre: A-Z</option>
                            <option value="j">Nombre: Z-A</option>
                        </select>
                        <?php
                            $servername = "localhost";
                            $username = "admin";
                            $password = "linux";
                            $dbname = "tienda";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } else {

#                                echo "Connected successfully to " . $dbname;

                                $sql = "SELECT idProd, nombre, descr, precio FROM producto";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table><tr><th>Portada</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>";
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr><td><img src='img/".$row["idProd"].".png' width=76px height=100px</td><td>".$row["nombre"]."</td><td>".$row["descr"]."</td><td>$".$row["precio"]."</td><td><a href='#'>Más detalles</a></td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                            }
                        ?>
					</article>
				</section>
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
