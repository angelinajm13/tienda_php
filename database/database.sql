CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
id int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
passw varchar(255) not null,
rol varchar(20),
imagen varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', null);

CREATE TABLE categorias(
id int(255) auto_increment not null,
nombre varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null, 'Guitarras');
INSERT INTO categorias VALUES(null, 'Bajos');
INSERT INTO categorias VALUES(null, 'Teclados');
INSERT INTO categorias VALUES(null, 'Audio');


CREATE TABLE productos(
id int auto_increment not null,
categoria_id int not null,
nombre varchar(100) not null,
descripcion text,
precio float not null,
stock int not null,
oferta varchar(2),
fecha date not null,
imagen varchar(255),
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;


CREATE TABLE pedidos(
id int auto_increment not null,
usuario_id int not null,
provincia varchar(100) not null,
localidad varchar(100) not null,
direccion varchar(255) not null,
coste float not null,
estado varchar(20) not null,
fecha date,
hora time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedido(
id int auto_increment not null,
pedido_id int not null,
producto_id int not null,
unidades int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;
