drop database tienda;
create database tienda;
  use tienda;
  create table producto(
    idProd int(3) not null,
    nombre varchar(25) not null,
    precio decimal(8,2) not null,
    descr varchar(500) not null,
    consola varchar(10) not null
  );

  create table compra(
    idProd int(3) not null,
    idCarr int(3) not null,
    cant int(3) not null
  );

  create table carrito(
    idCarrito int(3) not null,
    idCliente int(3) not null
  );

  create table cliente(
    idCliente int(3) not null AUTO_INCREMENT,
    nombre varchar(20) not null,
    apellido varchar(25) not null,
    domicilio varchar(100) not null,
    email varchar(50) not null,
    tel varchar(15) not null,
    PRIMARY KEY (idCliente)
  );

  alter table producto
    add constraint pkProd primary key (idProd);

  alter table carrito
    add constraint fkCarr foreign key (idCliente) references cliente(idCliente),
    add constraint pkCarr primary key (idCarrito);

  alter table compra
    add constraint fkComp foreign key (idCarr) references carrito(idCarrito),
    add constraint pkComp primary key (idCarr, idProd);
