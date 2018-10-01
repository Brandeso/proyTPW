<!-- HTML5 y CSS -->
<!DOCTYPE html>
<html lang="en">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<head>
		<title>Tienda</title>
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" />
		<link rel="shortcut icon" href="img/favicon.png">
		<meta charset="utf-8">
		<?php
			session_start();
			$IDCLIENTE	=	$_SESSION['IDCLIENTE'];
		?>
		<script type="text/javascript">
			window.onload = function () {
            // Variables
            let baseDeDatos = [
                {
                    id: 1,
                    nombre: 'FIFA 19-XBOXONE',
                    precio: 1399.99
                },
                {
                    id: 2,
                    nombre: 'FIFA 19-PS4',
                    precio: 1399.99
                },
                {
                    id: 3,
                    nombre: 'FIFA 18-SWITCH',
                    precio: 899.99
                },
                {
                    id: 4,
                    nombre: 'Spiderman-PS4',
                    precio: 1399.99
                },
                {
                    id: 5,
                    nombre: 'Grand Theft Auto: V-XBOXONE',
                    precio: 799.99
                },
                {
                    id: 6,
                    nombre: 'Mario Kart Deluxe 8-SWITCH',
                    precio: 1399.99
                },
                {
                    id: 7,
                    nombre: 'Uncharted: Collection-PS4',
                    precio: 599.99
                },
                {
                    id: 8,
                    nombre: 'Formula 1:2018-XBOXONE',
                    precio: 1299.99
                },
                {
                    id: 9,
                    nombre: 'Super Mario Odyssey-SWITCH',
                    precio: 1399.99
                },
                {
                    id: 10,
                    nombre: 'Grand Theft Auto: V-PS4',
                    precio: 799.99
                },
                {
                    id: 11,
                    nombre: 'Star Wars: Battlefront',
                    precio: 999.99
                },
                {
                    id: 12,
                    nombre: 'Minecraft-SWITCH',
                    precio: 799.99
                },
                {
                    id: 13,
                    nombre: 'Star Wars: Battlefront-PS4',
                    precio: 499.99
                },
                {
                    id: 14,
                    nombre: 'Mortal Combat XL-XBOXONE',
                    precio: 499.99
                },
                {
                    id: 15,
                    nombre: 'The Legent of Zelda-SWITCH',
                    precio: 1399.99
                },
                {
                    id: 16,
                    nombre: 'Prey-PS4',
                    precio: 549.99
                },
                {
                    id: 17,
                    nombre: 'Dragon Ball Fighters Z-XBOXONE',
                    precio: 1009.99
                },
                {
                    id: 18,
                    nombre: 'Crash Bandicot-SWITCH',
                    precio: 1099.99
                },
                {
                    id: 19,
                    nombre: 'Kingdom Hearts III: DE-PS4',
                    precio: 1679.99
                },
                {
                    id: 20,
                    nombre: 'Injustice 2-XBOXONE',
                    precio: 499.99
                },
                {
                    id: 21,
                    nombre: 'LEGO: The Incredibles-SWITCH',
                    precio: 999.99
                },
                {
                    id: 22,
                    nombre: 'Resident Evil 2-PS4',
                    precio: 1179.99
                },
                {
                    id: 23,
                    nombre: 'Marvel VS CAPCOM: Infinity-XBOXONE',
                    precio: 1299.99
                },
                {
                    id: 24,
                    nombre: 'Adventure Time: Pirates-SWITCH',
                    precio: 899.99
                },
                {
                    id: 25,
                    nombre: 'HALO 5-XBOX ONE',
                    precio: 499.99
                },
                {
                    id: 26,
                    nombre: 'Pokken Tournament The X-SWITCH',
                    precio: 1399.99
                },
                {
                    id: 27,
                    nombre: 'Call of Duty WWII',
                    precio: 1499.99
                },
                {
                    id: 28,
                    nombre: 'Just Dance 2018',
                    precio: 999.99
                }
            ];
            let $items = document.querySelector('#items');
            let carrito = [];
            let total = 0;
            let $carrito = document.querySelector('#carrito');
            let $total = document.querySelector('#total');
            // Funciones
            function renderItems () {
                for (let info of baseDeDatos) {
                    // Estructura
                    let miNodo = document.createElement('div');
                    miNodo.classList.add('card', 'col-sm-4');
                    // Body
                    let miNodoCardBody = document.createElement('div');
                    miNodoCardBody.classList.add('card-body');
                    // Titulo
                    let miNodoTitle = document.createElement('h5');
                    miNodoTitle.classList.add('card-title');
                    miNodoTitle.textContent = info['nombre'];
                    // Precio
                    let miNodoPrecio = document.createElement('p');
                    miNodoPrecio.classList.add('card-text');
                    miNodoPrecio.textContent = "$"+info['precio'];
                    // Boton
                    let miNodoBoton = document.createElement('button');
                    miNodoBoton.classList.add('btn', 'btn-primary');
                    miNodoBoton.textContent = '+';
                    miNodoBoton.setAttribute('marcador', info['id']);
                    miNodoBoton.addEventListener('click', anyadirCarrito);
                    // Insertamos
                    miNodoCardBody.appendChild(miNodoTitle);
                    miNodoCardBody.appendChild(miNodoPrecio);
                    miNodoCardBody.appendChild(miNodoBoton);
                    miNodo.appendChild(miNodoCardBody);
                    $items.appendChild(miNodo);
                }
            }
            function anyadirCarrito () {
                // Anyadimos el Nodo a nuestro carrito
                carrito.push(this.getAttribute('marcador'))
                // Calculo el total
                calcularTotal();
                // Renderizamos el carrito
                renderizarCarrito();

            }

            function renderizarCarrito () {
                // Vaciamos todo el html
                $carrito.textContent = '';
                // Generamos los Nodos a partir de carrito
                carrito.forEach(function (item, indice) {
                    // Obtenemos el item que necesitamos de la variable base de datos
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    // Creamos el nodo del item del carrito
                    let miNodo = document.createElement('li');
                    miNodo.classList.add('list-group-item', 'text-right');
                    miNodo.textContent = `${miItem[0]['nombre']} - ${miItem[0]['precio']}$`;
                    // Boton de borrar
                    let miBoton = document.createElement('button');
                    miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                    miBoton.textContent = 'X';
                    miBoton.setAttribute('posicion', indice);
                    miBoton.addEventListener('click', borrarItemCarrito);
                    // Mezclamos nodos
                    miNodo.appendChild(miBoton);
                    $carrito.appendChild(miNodo);
                })
            }

            function borrarItemCarrito () {
                // Obtenemos la posicion que hay en el boton pulsado
                let posicion = this.getAttribute('posicion');
                // Borramos la posicion que nos interesa
                carrito.splice(posicion, 1);
                // volvemos a renderizar
                renderizarCarrito();
                // Calculamos de nuevo el precio
                calcularTotal();
            }

            function calcularTotal () {
                // Limpiamos precio anterior
                total = 0;
                // Recorremos el array del carrito
                for (let item of carrito) {
                    // De cada elemento obtenemos su precio
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    total = total + miItem[0]['precio'];
                }
                // Formateamos el total para que solo tenga dos decimales
                let totalDosDecimales = total.toFixed(2);
                // Renderizamos el precio en el HTML
                $total.textContent = totalDosDecimales;
            }
            // Eventos

            // Inicio
            renderItems();
        }
		</script>
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
				<li><a href="cuenta.php">Cuenta</a></li>
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
				<?php
					$servername = "localhost";
					$username = "admin";
					$password = "linux";
					$dbname = "tienda";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					$sql = "SELECT nombre FROM cliente WHERE idCliente = $IDCLIENTE";
					$res = $conn->query(sql);
		            $ax = mysqli_num_rows($res);
		            $row = mysqli_fetch_assoc($res);
					if($ax > 0){
						echo "<li>Bienvenido <a>".$row['nombre']."</a></li>";
					} else {
                        header("Location: sesion.php?forma=1");
					}
				?>
			</ul>
		</div>
		<div id="content">
			<div id="mainContent">
				<section>
					<div class="container">
        			<div class="row">
		            <!-- Elementos generados a partir del JSON -->
		            <main id="items" class="col-sm-8 row"></main>
		            <!-- Carrito -->
		            <aside class="col-sm-4">
	                <h2>Carrito</h2>
	                <!-- Elementos del carrito -->
	                <ul id="carrito" class="list-group"></ul>
	                <hr>
	                <!-- Precio total -->
	                <p class="text-right">Total: $<span id="total"></span></p>
	                <!--Vamos a agregar el boton de Paypal jiji-->
					<button onclick="JavaScript: botonsito();">
						Comprar
					</button>
            </aside>
        </div>
    </div>
					</script>
					<script type="text/javascript">
						//botonsito
            				function botonsito(){
			            	//Pues a la base de datos jeje
			            	//Aqui es la redirección a PayPal jiji
			            	window.open("http://www.paypal.com");
            				}
					</script>
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
					experiencia y miles de clientes satisfechos alrededor de la republica méxicana</p>
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
