
CREATE TABLE sesiones( 
  id VARCHAR (40) NOT NULL, 
  ip_address VARCHAR (45) NOT NULL, 
  timestamp INT (10) NOT NULL DEFAULT '0', 
  last_access DATETIME DEFAULT CURRENT_TIMESTAMP,
  value varchar(128) NULL,
  data BLOB NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE perfiles(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  cargo VARCHAR(20) NOT NULL,
  decripcion VARCHAR(100),
  acceso_create INTEGER DEFAULT 0,
	acceso_read INTEGER DEFAULT 1,
	acceso_update INTEGER DEFAULT 0,
	acceso_delete INTEGER DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
  updated_at DATETIME DEFAULT NULL);
INSERT INTO perfiles(cargo) VALUES('ADMINISTRADOR');
INSERT INTO perfiles(cargo) VALUES('ANALISTA');
INSERT INTO perfiles(cargo) VALUES('JEFE DE PROYECTO');
INSERT INTO perfiles(cargo) VALUES('METODOLOGO');
INSERT INTO perfiles(cargo) VALUES('SUPERVISOR');
INSERT INTO perfiles(cargo) VALUES('DIGITADOR');
INSERT INTO perfiles(cargo) VALUES('ENCUESTADOR');
INSERT INTO perfiles(cargo) VALUES('VISITANTE');
  
CREATE TABLE usuarios(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  nombres VARCHAR(25) NOT NULL, 
  apellidos VARCHAR(25), 
  cargo INTEGER(1) DEFAULT '7' REFERENCES perfiles(id), 
  usuario VARCHAR(11) NOT NULL, 
  contrasenya VARCHAR(100),
  salt  VARCHAR(100) DEFAULT NULL, 
  activo BOOLEAN NOT NULL DEFAULT 1,
  email varchar(128) NULL,
  expiracion bigint(11) NULL,
  imagen VARCHAR(100),
  avatar BLOB DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
  updated_at DATETIME DEFAULT NULL);
INSERT INTO usuarios(nombres,apellidos,cargo,usuario,contrasenya) VALUES('RONALD','PARIONA',1,'ronald','$2a$08$j1O/re42az.2sezvpCrFGurPXjueQbOlkpfFm2eR9a.DLjP7e6Tvi');

CREATE VIEW personal AS 
SELECT u.id, concat_ws(' ',u.nombres,u.apellidos) as datos, u.usuario as alias, p.cargo FROM usuarios u inner join perfiles p on u.cargo=p.id;

create table if not exists  t_icono(
id integer PRIMARY KEY AUTO_INCREMENT not null,
tema varchar(100),
icono varchar(100),
html varchar(100));

INSERT INTO t_icono VALUES(1,'Dashboard','glyphicon glyphicon-home','<i class="glyphicon glyphicon-home"></i>');
INSERT INTO t_icono VALUES(2,'Icons','glyphicon glyphicon-certificate','<i class="glyphicon glyphicon-certificate"></i>');
INSERT INTO t_icono VALUES(3,'Tables and List','glyphicon glyphicon-th-list','<i class="glyphicon glyphicon-th-list"></i>');
INSERT INTO t_icono VALUES(4,'Forms','glyphicon glyphicon-list-alt','<i class="glyphicon glyphicon-list-alt"></i>');
INSERT INTO t_icono VALUES(5,'Alerts','glyphicon glyphicon-bell','<i class="glyphicon glyphicon-bell"></i>');
INSERT INTO t_icono VALUES(6,'Timeline','glyphicon glyphicon-indent-left','<i class="glyphicon glyphicon-indent-left"></i>');
INSERT INTO t_icono VALUES(7,'Calendars','glyphicon glyphicon-calendar','<i class="glyphicon glyphicon-calendar"></i>');
INSERT INTO t_icono VALUES(8,'Typography','glyphicon glyphicon-font','<i class="glyphicon glyphicon-font"></i>');
INSERT INTO t_icono VALUES(9,'Footers','glyphicon glyphicon-minus','<i class="glyphicon glyphicon-minus"></i>');
INSERT INTO t_icono VALUES(10,'Panels','glyphicon glyphicon-list-alt','<i class="glyphicon glyphicon-list-alt"></i>');
INSERT INTO t_icono VALUES(11,'Navs','glyphicon glyphicon-th-list','<i class="glyphicon glyphicon-th-list"></i>');
INSERT INTO t_icono VALUES(12,'Colors','glyphicon glyphicon-tint','<i class="glyphicon glyphicon-tint"></i>');
INSERT INTO t_icono VALUES(13,'Flex','glyphicon glyphicon-th','<i class="glyphicon glyphicon-th"></i>');
INSERT INTO t_icono VALUES(14,'Login','glyphicon glyphicon-log-in','<i class="glyphicon glyphicon-log-in"></i>');
INSERT INTO t_icono VALUES(15,'Lock','glyphicon glyphicon-lock','<i class="glyphicon glyphicon-lock"></i>');
INSERT INTO t_icono VALUES(16,'Tasks','glyphicon glyphicon-tasks','<i class="glyphicon glyphicon-tasks"></i>');
INSERT INTO t_icono VALUES(17,'Folder close','glyphicon glyphicon-folder-close','<i class="glyphicon glyphicon-folder-close"></i>');
INSERT INTO t_icono VALUES(18,'Folder open','glyphicon glyphicon-folder-open','<i class="glyphicon glyphicon-folder-open"></i>');
INSERT INTO t_icono VALUES(19,'Check','glyphicon glyphicon-check','<i class="glyphicon glyphicon-check"></i>');
INSERT INTO t_icono VALUES(20,'Picture','glyphicon glyphicon-picture','<i class="glyphicon glyphicon-picture"></i>');
INSERT INTO t_icono VALUES(21,'Book','glyphicon glyphicon-book','<i class="glyphicon glyphicon-book"></i>');

drop TABLE if exists menus;
create table if not exists menus(
id integer PRIMARY KEY AUTO_INCREMENT not null,
menu varchar(40),
controlador varchar(40),
accion varchar(40),
url varchar(150),
orden integer,
status integer,
icono varchar(100),
created_at timestamp default current_timestamp,
updated_at datetime,
deleted_at datetime
);

INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(1, 'Inicio', 'home', 'index', '', 0, '<i class="glyphicon glyphicon-home"></i>');
INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(2, 'Menu',  'menu', 'index', '', 1, '<i class="glyphicon glyphicon-th-list"></i>');
INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(3, 'Roles', 'perfil', 'index', '', 2, '<i class="glyphicon glyphicon-th"></i>');
INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(4, 'Accesos', 'menu_perfil', 'index', '', 3, '<i class="glyphicon glyphicon-lock"></i>');
INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(5, 'Usuarios', 'usuario', 'index', '', 4, '<i class="glyphicon glyphicon-tasks"></i>');
INSERT INTO t_menu (id, menu, controller, action, url, orden, icono) VALUES(6, 'Personal', 'personal', 'index', '', 5, '<i class="glyphicon glyphicon-list-alt"></i>');

CREATE TABLE menu_perfil (
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  menu_id int(11) NOT NULL,
  perfil_id int(11) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
  updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX idmenu_perfil ON menu_perfil(menu_id,perfil_id);

INSERT INTO menu_perfil (id, menu_id, perfil_id) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

CREATE TABLE sedes_sunat(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
codigo VARCHAR(25),
n_provincia INTEGER,
ubigeo CHAR(6) default null references t_ubigeo(ubigeo),
provincia VARCHAR(60),
distrito VARCHAR(60),
centro_servicio VARCHAR(120),
direccion VARCHAR(250),
horario_lun_vie VARCHAR(20),
horario_sabado VARCHAR(20),
horario_domingo VARCHAR(20),
serv_tramite INTEGER,
serv_orientacion INTEGER,
serv_cabinas INTEGER,
serv_mesapartes INTEGER,
observaciones VARCHAR(1000),
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-CALLAO-01',1,'070101','CALLAO','CALLAO','Callao','Av. Sáenz Peña N° 286','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-CALLAO-02',2,'070101','CALLAO','CALLAO','MAC Callao','Mall Aventura Plaza: Local N° TI1-B. Av. Oscar R. Benavides N° 3866 Urb. El Águila - Bellavista','8:00 a 8:00','8:00 a 4:00','9:00 a 1:00',1,1,0,0,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-CALLAO-03',3,'070101','CALLAO','CALLAO','MINKA','C. C. MINKA: (Av. Argentina N° 3093) - Av Tres, Local PO7 (Frente a Norky*s)','9:00 a 6:00','9:00 a 1:00','  ',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes. (**) Horario de atención de Lunes a Viernes de 09:00 a 5:00 ');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-CALLAO-04',4,'070106','CALLAO','VENTANILLA','Ventanilla','Urb. Ex Zona Comercial e Industrial Mz. 15 A, Lote 5, Calle 11 (A una cuadra de la Av. Néstor Gambetta)','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-CALLAO-05',5,'070106','CALLAO','VENTANILLA','MAC Ventanilla','Av. La Playa S/N Altura de la Urb. Zona Comercial frente a la Plaza Cívica ','8:00 a 8:00','8:00 a 4:00 ','9:00 a 1:00',1,1,0,0,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-01',1,'150101','LIMA','LIMA','Cercado','Jr. Augusto Wiese N° 498 esquina con Jr. Miró Quesada','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-02',2,'150101','LIMA','LIMA','Nicolás de Piérola','Av. Nicolás de Piérola N° 589 (Ex Hotel Crillón), Cercado de Lima ','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-03',3,'150103','LIMA','ATE','Ate','Av. Separadora Industrial N° 4260 Mz. E, Lote 15, Urb. Los Portales de Javier Prado 1era. Etapa','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-04',4,'150110','LIMA','COMAS','Comas','Av. Túpac Amaru Nº 5745 - Urb. Huaquillay 1era. Etapa','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-05',5,'150112','LIMA','INDEPENDENCIA','Independencia','C. C. Multicenter: Av. Carlos Izaguirre N° 271, 4A','9:00 a 6:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes. (**) Horario de atención de Lunes a Viernes de 09:00 a 5:00 ');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-06',6,'150112','LIMA','INDEPENDENCIA','MAC MYPE','C.C. Lima Plaza Norte: 1er nivel Av. Alfredo Mendiola N° 1400 – Cruce de la Av. Tomas Valle con Panamericana Norte ','8:00 a 8:00','8:00 a 4:00','9:00 a 1:00',1,1,0,0,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-07',7,'150115','LIMA','LA VICTORIA','Gamarra','Av. México N° 1653 -1657, Mz. A Lotes 2 y 3 Urb. La Pólvora','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-08',8,'150115','LIMA','LA VICTORIA','La Victoria','Av. Iquitos Nº 1101 (cruce con Calle Italia)','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-09',9,'150117','LIMA','LOS OLIVOS','Los Olivos','Av. Alfredo Mendiola N° 6163 (Cruce con Av. Central) Los Olivos. ','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-10',10,'150119','LIMA','LURIN','Lurín','Jr. San Pedro N° 173, Manzana V, Lote 4 (al costado del Bco. de la Nación).','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-11',11,'150122','LIMA','MIRAFLORES','Miraflores','Av. Paseo de la República N° 4728 - 4730','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-12',12,'150131','LIMA','SAN ISIDRO','San Isidro','Jr. Juan de Arona N° 887','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-13',13,'150132','LIMA','SAN JUAN DE LURIGANCHO','San Juan de Lurigancho ','Av. Gran Chimú N° 1423 Urb. Zárate (Frente al grifo Repsol) ','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-14',14,'150133','LIMA','SAN JUAN DE MIRAFLORES',' San Juan de Miraflores','Av Guillermo Billinghurst N° 1091 Mz. G2 Lote 32 Urbanización San Juan de Miraflores','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-15',15,'150137','LIMA','SANTA ANITA','Santa Anita ','Carretera Central 111 Urb. Los Ficus - Centro Comercial Mall Aventura Plaza  ','9:00 a 6:00 ','9:00 a 1:00 ','  ',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes. (**) Horario de atención de Lunes a Viernes de 09:00 a 5:00 ');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-16',16,'150140','LIMA','SANTIAGO DE SURCO','Surco','Av. Benavides N° 4055 Urb. Chama.','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-17',17,'150141','LIMA','SURQUILLO','Surquillo','C.C. Open Plaza Angamos: 3er. Nivel - Av. Angamos Este N° 1803','9:00 a 6:00','9:00 a 1:00','  ',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes. (**) Horario de atención de Lunes a Viernes de 09:00 a 5:00 ');
INSERT INTO sedes_sunat(codigo,n_provincia,ubigeo,provincia,distrito,centro_servicio,direccion,horario_lun_vie,horario_sabado,horario_domingo,serv_tramite,serv_orientacion,serv_cabinas,serv_mesapartes,observaciones) VALUES('CSC-LIMA-18',18,'150142','LIMA','VILLA EL SALVADOR','Villa El Salvador','Centro Bancario, Lt. 05 Mz. K2, Parcela II del Parque Industrial del Cono Sur (esquina de las calles Juan Velasco y los Artesanos).','8:30 a 5:00','9:00 a 1:00','-',1,1,1,1,'Cabe precisar que el servicio de atención en MESA DE PARTES solo se realiza de lunes a viernes.');

CREATE TABLE proyectos(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  proyecto VARCHAR(20) NOT NULL, 
  descripcion VARCHAR(100),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
  updated_at DATETIME DEFAULT NULL);
 
INSERT INTO proyectos(proyecto,descripcion) VALUES('ENC-CSC 2016','ENCUESTA A USUARIOS EXTERNOS ACTIVOS DE LOS CSC - SUNAT');
INSERT INTO proyectos(proyecto,descripcion) VALUES('ENC-CCF 2016','ENCUESTA A USUARIOS EXTERNOS ACTIVOS DE LOS CCF - SUNAT');

CREATE TABLE cuestionarios(
  id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  documento VARCHAR(40) NOT NULL, 
  proyecto INTEGER default null references proyectos(id),
  titulo VARCHAR(240),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
  updated_at DATETIME DEFAULT NULL);

INSERT INTO cuestionarios(documento,proyecto,titulo) VALUES('FO03-EST-SUNLBE16-RV01-18/10/2016',1,'ENCUESTA DE PERCEPCIÓN DE SERVICIOS DE CONTRIBUYENTES ATENDIDOS EN LOS CSC\n USUARIOS EXTERNOS ACTIVOS');
INSERT INTO cuestionarios(documento,proyecto,titulo) VALUES('FO04-EST-SUNLBE16-RV01-18/10/2016',2,'ENCUESTA DE PERCEPCIÓN DE SERVICIOS DE CONTRIBUYENTES ATENDIDOS EN LOS 
CCF\n USUARIOS EXTERNOS ACTIVOS');

CREATE TABLE t_csc_pag1(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
CSC_NOMBRE VARCHAR (120),
CSC_CODIGO VARCHAR (25) default null REFERENCES sedes_csc(CODIGO),
ZONA_SUNAT VARCHAR (30),
RESFIN_DIA INTEGER,
RESFIN_MES INTEGER,
RESFIN_FECHA DATETIME,
RESFIN INTEGER,
RESFIN_O VARCHAR (60),
ENC_DNI VARCHAR (8),
ENC_NOMB VARCHAR (80),
SUP_DNI VARCHAR (8),
SUP_NOMB VARCHAR (80),
INF_FILTRO INTEGER,
INF_USUARIO VARCHAR (60),
INF_USU_NOM VARCHAR (30),
INF_USU_APE VARCHAR (30),
INF_DIRECCION VARCHAR (240),
P1 VARCHAR (60),
P1_UBIGEO CHAR (6) DEFAULT NULL REFERENCES t_ubigeo(ubigeo),
P2 INTEGER,
P3 INTEGER,
P3_GRUPOS INTEGER,
P4 VARCHAR (11),
P5 INTEGER,
P6 INTEGER,
P7 VARCHAR (240),
P8 VARCHAR (240),
P8_DISTRITO VARCHAR (60),
P9 INTEGER,
P10 INTEGER,
P10_O VARCHAR (60),
P11 INTEGER,
P11_1_AUX INTEGER DEFAULT NULL,
P11_1_1 INTEGER,
P11_1_2 INTEGER,
P11_1_3 INTEGER,
P11_1_4 INTEGER,
P11_1_5 INTEGER,
P11_1_O VARCHAR (60), 
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_csc_pag1(CUEST,usucre);

CREATE TABLE t_csc_pag2(
ID INTEGER PRIMARY KEY REFERENCES t_csc_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
P12_1 INTEGER,
P12_2 INTEGER,
P12_3 INTEGER,
P12_4 INTEGER,
P12_5 INTEGER,
P12_6 INTEGER,
P12_7 INTEGER,
P12_8 INTEGER,
P12_O VARCHAR (60),
P12_AUX INTEGER DEFAULT NULL,
P13_1 INTEGER,
P13_2 INTEGER,
P13_3 INTEGER,
P13_4 INTEGER,
P13_5 INTEGER,
P13_O VARCHAR (60),
P13_AUX INTEGER DEFAULT NULL,
P14 VARCHAR (10),
P14_HOR INTEGER,
P14_MIN INTEGER,
P15_1 INTEGER,
P15_2 INTEGER,
P15_3 INTEGER,
P15_4 INTEGER,
P16 INTEGER,
P17 INTEGER,
P18 INTEGER,
P18_A_1 INTEGER,
P18_A_2 INTEGER,
P18_A_3 INTEGER,
P18_A_4 INTEGER,
P18_A_5 INTEGER,
P18_A_O VARCHAR (60),
P18_A_AUX INTEGER DEFAULT NULL,
P18_B_1 INTEGER,
P18_B_2 INTEGER,
P18_B_3 INTEGER,
P18_B_4 INTEGER,
P18_B_5 INTEGER,
P18_B_O VARCHAR (60),
P18_B_AUX INTEGER,
P19 INTEGER,
P20_1 INTEGER DEFAULT NULL,
P20_2 INTEGER,
P20_3 INTEGER,
P20_4 INTEGER,
P20_5 INTEGER,
P20_6 INTEGER,
P20_O VARCHAR (60),
P20_AUX INTEGER DEFAULT NULL,
P21 VARCHAR (10),
P21_HOR INTEGER,
P21_MIN INTEGER,
P21_1 VARCHAR (10),
P21_1_ENT INTEGER,
P21_1_DEC VARCHAR (2),
P22 INTEGER,
P22_1_INI_HORAS VARCHAR (10),
P22_1_INI_SUF INTEGER,
P22_1_INI_HOR INTEGER,
P22_1_INI_MIN INTEGER,
P22_1_FIN_HORAS VARCHAR (10),
P22_1_FIN_SUF INTEGER,
P22_1_FIN_HOR INTEGER,
P22_1_FIN_MIN INTEGER,
P23_1 INTEGER,
P23_2 INTEGER,
P23_3 INTEGER,
P23_4 INTEGER,
P23_5 INTEGER,
P23_6 INTEGER,
P23_7 INTEGER,
P23_AUX INTEGER DEFAULT NULL,
P24 INTEGER,
P25_1 INTEGER,
P25_2 INTEGER,
P25_3 INTEGER,
P25_4 INTEGER,
P25_5 INTEGER,
P25_6 INTEGER,
P25_7 INTEGER,
P25_8 INTEGER,
P25_9 INTEGER,
P25_O VARCHAR (60),
P25_AUX INTEGER DEFAULT NULL,
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_csc_pag2(CUEST,usucre);

CREATE TABLE t_csc_pag3(
ID INTEGER PRIMARY KEY REFERENCES t_csc_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
P13_1 INTEGER,
P13_2 INTEGER,
P13_3 INTEGER,
P13_4 INTEGER,
V_01_A_1 INTEGER,
V_01_A_2 INTEGER,
V_01_A_3 INTEGER,
V_01_A_4 INTEGER,
V_01_B_1 INTEGER,
V_01_B_2 INTEGER,
V_01_B_3 INTEGER,
V_01_B_4 INTEGER,
V_02_A_1 INTEGER,
V_02_A_2 INTEGER,
V_02_A_3 INTEGER,
V_02_A_4 INTEGER,
V_02_B_1 INTEGER,
V_02_B_2 INTEGER,
V_02_B_3 INTEGER,
V_02_B_4 INTEGER,
V_03_1 INTEGER,
V_03_2 INTEGER,
V_03_3 INTEGER,
V_03_4 INTEGER,
V_03_5 INTEGER,
V_04_1 INTEGER,
V_04_2 INTEGER,
V_05_1 INTEGER,
V_05_2 INTEGER,
V_05_3 INTEGER,
V_06_1 INTEGER,
V_06_2 INTEGER,
V_06_3 INTEGER,
V_07_1 INTEGER,
V_07_2 INTEGER,
V_07_3 INTEGER,
V_08_1 INTEGER,
V_08_2 INTEGER,
V_08_3 INTEGER,
V_09 INTEGER,
COMM VARCHAR (240),
OBS VARCHAR (500),
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_csc_pag3(CUEST,usucre);

CREATE TABLE t_marco_poblacion(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
ubigeo char(6) NOT NULL,
dpto varchar(60) DEFAULT NULL,
prov varchar(100) DEFAULT NULL,
dist varchar(150) DEFAULT NULL,
ZONA VARCHAR(25),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);
    
    INSERT INTO t_marco_poblacion(ubigeo,dpto,prov,dist,ZONA) VALUES
    ('999999', 'SELECCIONAR', 'SELECCIONAR', 'SELECCIONAR','LIMA NORTE 2'),
    ('999999', 'SELECCIONAR', 'SELECCIONAR', 'SELECCIONAR','LIMA ESTE'),
    ('070106', 'CALLAO', 'CALLAO', 'VENTANILLA','LIMA NORTE 2'),
    ('150102', 'LIMA', 'LIMA', 'ANCON','LIMA NORTE 2'),
    ('150106', 'LIMA', 'LIMA', 'CARABAYLLO','LIMA NORTE 2'),
    ('150110', 'LIMA', 'LIMA', 'COMAS','LIMA NORTE 2'),
    ('150125', 'LIMA', 'LIMA', 'PUENTE PIEDRA','LIMA NORTE 2'),
    ('150132', 'LIMA', 'LIMA', 'SAN JUAN DE LURIGANCHO','LIMA ESTE'),
    ('150139', 'LIMA', 'LIMA', 'SANTA ROSA','LIMA NORTE 2');

CREATE TABLE t_marco(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
USUARIO INTEGER NOT NULL REFERENCES usuarios(id),
SEDE VARCHAR(25) REFERENCES sedes_sunat(codigo),
ZONA VARCHAR(25),
PROYECTO VARCHAR(20) REFERENCES proyectos(proyecto),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

INSERT INTO t_marco(USUARIO,SEDE,ZONA,PROYECTO) VALUES
(8,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(9,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(10,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(11,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(12,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(13,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(14,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016'),
(15,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016');

CREATE VIEW marco_usuarios AS 
SELECT t.id, t.usuario AS usuario_id, u.usuario AS usuario, s.codigo, 
ucase( s.centro_servicio ) AS sede, t.zona, p.proyecto, p.descripcion
FROM t_marco t
INNER JOIN sedes_sunat s ON t.sede = s.codigo
INNER JOIN proyectos p ON t.proyecto = p.proyecto
INNER JOIN usuarios u ON t.usuario = u.id;

CREATE TABLE t_marco_digitacion(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
USUARIO INTEGER NOT NULL REFERENCES usuarios(id),
SEDE VARCHAR(25) REFERENCES sedes_sunat(codigo),
ZONA VARCHAR(25),
PROYECTO VARCHAR(20) REFERENCES proyectos(proyecto),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

INSERT INTO t_marco_digitacion(USUARIO,SEDE,ZONA,PROYECTO) VALUES
(6,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-CALLAO-05','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-01','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-02','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-05','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-06','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-08','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-09','LIMA NORTE 2','ENC-CSC 2016'),
(6,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(6,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016'),
(6,'CSC-LIMA-08','LIMA NORTE 2','ENC-CCF 2016'),
(6,'CSC-LIMA-11','LIMA NORTE 2','ENC-CCF 2016'),
(7,'CSC-LIMA-13','LIMA ESTE','ENC-CSC 2016'),
(7,'CSC-LIMA-08','LIMA ESTE','ENC-CCF 2016'),
(7,'CSC-LIMA-11','LIMA ESTE','ENC-CCF 2016'),
(7,'CSC-LIMA-02','LIMA ESTE','ENC-CCF 2016'),
(7,'CSC-LIMA-09','LIMA ESTE','ENC-CCF 2016');

INSERT INTO t_marco_digitacion(USUARIO,SEDE,ZONA,PROYECTO) VALUES
(1,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-CALLAO-05','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-01','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-02','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-05','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-06','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-08','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-09','LIMA NORTE 2','ENC-CSC 2016'),
(1,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(1,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016'),
(1,'CSC-LIMA-08','LIMA NORTE 2','ENC-CCF 2016'),
(1,'CSC-LIMA-11','LIMA NORTE 2','ENC-CCF 2016'),
(1,'CSC-LIMA-13','LIMA ESTE','ENC-CSC 2016'),
(1,'CSC-LIMA-08','LIMA ESTE','ENC-CCF 2016'),
(1,'CSC-LIMA-11','LIMA ESTE','ENC-CCF 2016'),
(1,'CSC-LIMA-02','LIMA ESTE','ENC-CCF 2016'),
(1,'CSC-LIMA-09','LIMA ESTE','ENC-CCF 2016');

INSERT INTO t_marco_digitacion(USUARIO,SEDE,ZONA,PROYECTO) VALUES
(2,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-CALLAO-05','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-01','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-02','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-05','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-06','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-08','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-09','LIMA NORTE 2','ENC-CSC 2016'),
(2,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(2,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016'),
(2,'CSC-LIMA-08','LIMA NORTE 2','ENC-CCF 2016'),
(2,'CSC-LIMA-11','LIMA NORTE 2','ENC-CCF 2016'),
(2,'CSC-LIMA-13','LIMA ESTE','ENC-CSC 2016'),
(2,'CSC-LIMA-08','LIMA ESTE','ENC-CCF 2016'),
(2,'CSC-LIMA-11','LIMA ESTE','ENC-CCF 2016'),
(2,'CSC-LIMA-02','LIMA ESTE','ENC-CCF 2016'),
(2,'CSC-LIMA-09','LIMA ESTE','ENC-CCF 2016');

INSERT INTO t_marco_digitacion(USUARIO,SEDE,ZONA,PROYECTO) VALUES
(3,'CSC-CALLAO-04','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-CALLAO-05','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-01','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-02','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-04','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-05','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-06','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-08','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-09','LIMA NORTE 2','ENC-CSC 2016'),
(3,'CSC-LIMA-02','LIMA NORTE 2','ENC-CCF 2016'),
(3,'CSC-LIMA-09','LIMA NORTE 2','ENC-CCF 2016'),
(3,'CSC-LIMA-08','LIMA NORTE 2','ENC-CCF 2016'),
(3,'CSC-LIMA-11','LIMA NORTE 2','ENC-CCF 2016'),
(3,'CSC-LIMA-13','LIMA ESTE','ENC-CSC 2016'),
(3,'CSC-LIMA-08','LIMA ESTE','ENC-CCF 2016'),
(3,'CSC-LIMA-11','LIMA ESTE','ENC-CCF 2016'),
(3,'CSC-LIMA-02','LIMA ESTE','ENC-CCF 2016'),
(3,'CSC-LIMA-09','LIMA ESTE','ENC-CCF 2016');


CREATE VIEW marco_digitacion AS 
SELECT t.id, t.usuario AS usuario_id, u.usuario AS usuario, s.codigo, 
concat_ws(' - ', s.distrito, s.centro_servicio, s.direccion) AS sede, t.zona, p.proyecto, p.descripcion
FROM t_marco_digitacion t
INNER JOIN sedes_sunat s ON t.sede = s.codigo
INNER JOIN proyectos p ON t.proyecto = p.proyecto
INNER JOIN usuarios u ON t.usuario = u.id;

CREATE VIEW carga_usuario AS 
SELECT usucre AS usuario_id, max( CUEST ) AS ncuest
FROM t_csc_pag1
GROUP BY usucre;

CREATE VIEW cuest_usuario AS 
select 
t1.ID AS ID,
concat_ws(' - ', s.centro_servicio, s.direccion) AS SEDE,
ZONA_SUNAT AS ZONA,
t1.CUEST AS CUEST,
concat_ws(' ',INF_USU_NOM,INF_USU_APE) AS ENCUESTADO,
P1 AS DISTRITO,
P4 AS RUC,
(case 
When (isnull(t1.P11) OR isnull(t2.P24) OR isnull(t3.V_09)) AND t3.updated_at IS NOT NULL then 'INCOMPLETO'
when isnull(t1.updated_at) OR isnull(t2.updated_at) OR isnull(t3.updated_at) then 'PENDIENTE' else 'PROCESADO' end) AS ESTADO,
convert_tz(t1.created_at,'+00:00','-05:00') AS FECHA, 
t1.usucre AS USUCRE,
t1.usuact AS USUACT 
from t_csc_pag1 t1 INNER JOIN t_csc_pag2 t2 ON t1.id=t2.id 
INNER JOIN t_csc_pag3 t3 ON t1.id=t3.id 
LEFT JOIN sedes_sunat s ON t1.CSC_CODIGO = s.codigo   
 WHERE t1.ACTIVO=1 
ORDER BY CUEST ASC;

CREATE VIEW cuest_todos AS 
select 
t1.ID AS ID,
t4.datos AS USUARIO,
concat_ws(' - ', s.centro_servicio, s.direccion) AS SEDE,
ZONA_SUNAT AS ZONA,
t1.CUEST AS CUEST,
concat_ws(' ',INF_USU_NOM,INF_USU_APE) AS ENCUESTADO,
P1 AS DISTRITO,
P4 AS RUC,
(case 
When t1.ACTIVO>0 AND (isnull(t1.P11) OR isnull(t2.P24) OR isnull(t3.V_09)) AND t3.updated_at IS NOT NULL then 'INCOMPLETO'
when t1.ACTIVO>0 AND (isnull(t1.updated_at) OR isnull(t2.updated_at) OR isnull(t3.updated_at)) then 'PENDIENTE' 
When t1.ACTIVO=0 then 'ELIMINADO' 
 else 'PROCESADO' end) AS ESTADO, 
t1.ACTIVO, 
convert_tz(t1.created_at,'+00:00','-05:00') AS FECHA,  
t1.usucre AS USUCRE,
t1.usuact AS USUACT 
from t_csc_pag1 t1 LEFT JOIN t_csc_pag2 t2 ON t1.id=t2.id 
LEFT JOIN t_csc_pag3 t3 ON t1.id=t3.id 
INNER JOIN personal t4 ON t1.usucre=t4.id 
LEFT JOIN sedes_sunat s ON t1.CSC_CODIGO = s.codigo   
ORDER BY USUARIO ASC, CUEST ASC ;

CREATE VIEW CSC_USU_EXT_LIMA_NORTE2 AS 
SELECT t1.ID,
t4.datos AS USUARIO,
t1.CUEST,
concat_ws(' - ', s.centro_servicio, s.direccion) AS CSC_NOMBRE,
t1.CSC_CODIGO,
t1.ZONA_SUNAT,
t1.RESFIN_DIA,
t1.RESFIN_MES,
t1.RESFIN_FECHA,
t1.RESFIN,
t1.RESFIN_O,
t1.ENC_DNI,
t1.ENC_NOMB,
t1.SUP_DNI,
t1.SUP_NOMB,
t1.INF_FILTRO,
concat_ws(' ',INF_USU_NOM,INF_USU_APE) AS ENCUESTADO,
t1.INF_DIRECCION AS DIRECCION,
t1.P1,
t1.P1_UBIGEO,
t1.P2,
t1.P3,
t1.P4,
t1.P5,
t1.P6,
t1.P7,
t1.P8,
t1.P8_DISTRITO,
t1.P9,
t1.P10,
t1.P10_O,
t1.P11,
t1.P11_1_1,
t1.P11_1_2,
t1.P11_1_3,
t1.P11_1_4,
t1.P11_1_5,
t1.P11_1_O,
t2.P12_1,
t2.P12_2,
t2.P12_3,
t2.P12_4,
t2.P12_5,
t2.P12_6,
t2.P12_7,
t2.P12_8,
t2.P12_O,
t2.P13_1,
t2.P13_2,
t2.P13_3,
t2.P13_4,
t2.P13_5,
t2.P13_O,
t2.P14,
t2.P14_HOR,
t2.P14_MIN,
t2.P15_1,
t2.P15_2,
t2.P15_3,
t2.P15_4,
t2.P16,
t2.P17,
t2.P18,
t2.P18_A_1,
t2.P18_A_2,
t2.P18_A_3,
t2.P18_A_4,
t2.P18_A_5,
t2.P18_A_O,
t2.P18_B_1,
t2.P18_B_2,
t2.P18_B_3,
t2.P18_B_4,
t2.P18_B_5,
t2.P18_B_O,
t2.P19,
t2.P20_1,
t2.P20_2,
t2.P20_3,
t2.P20_4,
t2.P20_5,
t2.P20_6,
t2.P20_O,
t2.P21,
t2.P21_HOR,
t2.P21_MIN,
t2.P21_1,
t2.P21_1_ENT,
t2.P21_1_DEC,
t2.P22,
t2.P22_1_INI_HORAS,
t2.P22_1_FIN_HORAS,
t2.P23_1,
t2.P23_2,
t2.P23_3,
t2.P23_4,
t2.P23_5,
t2.P23_6,
t2.P23_7,
t2.P24,
t2.P25_1,
t2.P25_2,
t2.P25_3,
t2.P25_4,
t2.P25_5,
t2.P25_6,
t2.P25_7,
t2.P25_8,
t2.P25_9,
t2.P25_O,
t3.V_01_A_1,
t3.V_01_A_2,
t3.V_01_A_3,
t3.V_01_B_1,
t3.V_01_B_2,
t3.V_01_B_3,
t3.V_02_A_1,
t3.V_02_A_2,
t3.V_02_A_3,
t3.V_02_A_4,
t3.V_02_B_1,
t3.V_02_B_2,
t3.V_02_B_3,
t3.V_03_1,
t3.V_03_2,
t3.V_03_3,
t3.V_03_4,
t3.V_03_5,
t3.V_04_1,
t3.V_04_2,
t3.V_05_1,
t3.V_05_2,
t3.V_05_3,
t3.V_06_1,
t3.V_06_2,
t3.V_06_3,
t3.V_07_1,
t3.V_07_2,
t3.V_07_3,
t3.V_08_1,
t3.V_08_2,
t3.V_08_3,
t3.V_09,
t3.COMM,
t3.OBS FROM t_csc_pag1 t1
INNER JOIN t_csc_pag2 t2 ON t1.id = t2.id
INNER JOIN t_csc_pag3 t3 ON t1.id = t3.id 
INNER JOIN personal t4 ON t1.usucre=t4.id 
INNER JOIN sedes_sunat s ON t1.CSC_CODIGO = s.codigo  
WHERE t1.ACTIVO=1 AND ZONA_SUNAT LIKE '%NORTE 2%' 
ORDER BY 
t1.ZONA_SUNAT,
t4.datos,
t1.CUEST,
t1.CSC_CODIGO;


CREATE TABLE t_marco_viv (id integer primary key, ZONA_SUNAT varchar (20), ubigeo varchar (6), CCDD varchar (2), Departamento varchar (60), CCPP varchar (2), Provincia varchar (60), CCDI varchar (2), Distrito varchar (60), codccpp varchar (10), nomccpp varchar (60), nconglome1 integer , zonas varchar (5), mzna_ccpp varchar (150), tot_mz_cp integer , totviv integer , totvivocup integer , totpobc integer , TMUJF integer , THOMBF integer , TPERSMAY14F integer , InclusionProbability_1 double , SampleWeightCumulative_1 double , PopulationSize_1 integer , SampleSize_1 integer );
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (1, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21795, '00300', '001,001A,002E,002G,002H,002I,002J,002K,', 8, 141, 138, 507, 250, 257, 325, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (2, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21796, '00300', '002L,002M,002N,002O,002Q,003,003A,003C,003D,004,005,', 11, 149, 146, 618, 304, 314, 423, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (3, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21822, '00600', '040,041,042,043,044,045,', 6, 142, 141, 696, 332, 364, 524, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (4, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21830, '00700', '053C,054B,054C,054D,055,056,057A,057B,057C,058,060,061A,061B,', 13, 155, 148, 585, 299, 286, 383, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (5, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21836, '00800', '044,046,047,048,049,050,051,', 7, 237, 232, 1116, 548, 567, 835, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (6, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21889, '01502', '028,029B,030B,031A,032A,032B,033A,035,036,037A,038,039,040,041,042,043,', 16, 140, 137, 502, 250, 252, 327, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (7, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21897, '01600', '039,041,042,043,044,045,', 6, 151, 150, 737, 375, 357, 537, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (8, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21911, '01800', '011A,', 1, 131, 130, 728, 370, 358, 524, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (9, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21916, '01800', '021,022,025,', 3, 146, 146, 730, 360, 367, 555, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (10, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21974, '02500', '044,045,046C,047,047B,048,049,050A,050B,', 9, 169, 165, 762, 391, 371, 540, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (11, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21993, '02700', '047,048,049,050,051,', 5, 124, 122, 626, 288, 332, 479, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (12, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 21998, '02800', '022,023,024,025,027,', 5, 147, 145, 637, 330, 306, 499, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (13, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22005, '02900', '007,008,009,010,011,012,', 6, 158, 155, 700, 359, 337, 547, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (14, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22026, '03100', '030,031,032,033,034,', 5, 154, 146, 614, 324, 289, 463, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (15, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22035, '03201', '055,056,057,058,059,060,060A,061,062,063,063A,063B,063C,', 13, 157, 156, 518, 236, 282, 350, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (16, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22040, '03202', '048,049,049A,050,051,051A,', 6, 84, 79, 225, 104, 121, 147, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (17, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22063, '03500', '025,026,028,029,030,031,', 6, 144, 143, 829, 414, 414, 623, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (18, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22090, '03900', '004B,004C,005,005A,006,006A,007A,007B,007C,009A,011,011A,011C,015A,015B,', 15, 153, 153, 596, 294, 301, 391, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (19, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22100, '04000', '034,035,036,037,038,039,040,', 7, 153, 153, 745, 366, 378, 555, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (20, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22133, '04500', '018B,019A,019B,020A,020B,020C,020D,023,023A,024,025,026,027,028,028A,029,030,031,032,033A,033B,034A,034B,037H,037I,', 25, 155, 145, 584, 299, 285, 404, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (21, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22151, '04700', '053,054,055,056,058,059,', 6, 201, 201, 1146, 555, 587, 859, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (22, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22165, '04900', '025,026,027,028,029,', 5, 156, 153, 678, 340, 338, 515, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (23, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22170, '05000', '001,002,003,004,', 4, 140, 139, 720, 336, 383, 543, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (24, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22174, '05000', '021A,021B,021C,023A,024A,032B,038A,038B,038C,038E,038F,038G,038H,038I,038K,', 15, 145, 131, 482, 251, 228, 321, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (25, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22185, '05100', '015,016,017,018,019,019A,019B,019E,019F,019H,019I,', 11, 147, 144, 447, 210, 237, 284, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (26, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22196, '05201', '035A,036A,037,038,039,', 5, 93, 92, 448, 233, 215, 306, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (27, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22198, '05202', '022,023,024,025,026,027,028A,', 7, 148, 143, 617, 304, 313, 402, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (28, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22202, '05301', '010,011,012,013,015,', 5, 148, 145, 791, 404, 387, 631, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (29, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22211, '05302', '039B,040A,040B,041A,041B,042A,042B,043A,043B,043C,044A,044B,044C,', 13, 90, 86, 316, 160, 156, 186, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (30, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22236, '05600', '051,052,053,054,055,', 5, 194, 193, 935, 467, 466, 706, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (31, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22245, '05700', '042,044,045,046,', 4, 159, 158, 789, 392, 395, 615, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (32, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22257, '05900', '033A,033B,033E,033F,035,035A,035B,036,037,038,', 10, 140, 133, 540, 276, 264, 328, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (33, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22293, '06300', '054,055,056,057,058,059,', 6, 155, 155, 838, 428, 409, 639, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (34, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22306, '06500', '005,006,007,', 3, 170, 168, 833, 436, 397, 635, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (35, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22316, '06600', '017G,017H,017I,019B,019C,023,024,025,027,028,029,029A,030,031,', 14, 146, 136, 596, 292, 304, 410, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (36, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22341, '06900', '035,036,037,038,038C,038D,039,', 7, 152, 152, 681, 327, 353, 506, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (37, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22388, '07500', '012,013,014,', 3, 142, 142, 649, 310, 338, 497, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (38, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22404, '07700', '002S,002T,002V,002W,002Y,002Z,003B,003E,003F,003G,005C,005D,005E,005F,006,007,', 16, 156, 156, 492, 248, 244, 322, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (39, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22425, '07900', '024,026,027,028,029,', 5, 160, 159, 825, 401, 418, 652, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (40, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22437, '08000', '047D,052,053,055,', 4, 150, 133, 551, 260, 287, 404, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (41, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22440, '08100', '005C,009,009E,012,013,015A,015C,015D,017,019,020A,020B,020C,020D,', 14, 141, 135, 512, 261, 251, 334, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (42, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22456, '08300', '039,039A,039C,039G,039L,039M,039N,039O,039P,039Q,', 10, 144, 142, 595, 298, 293, 404, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (43, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22476, '08600', '008,009,010,012,', 4, 173, 168, 880, 440, 433, 686, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (44, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22496, '08700', '019,020,021,', 3, 155, 151, 761, 391, 370, 590, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (45, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22517, '08900', '015,016A,017,018,019,020C,021C,', 7, 172, 168, 781, 385, 394, 546, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (46, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22518, '08900', '022,024,025,026,028,029,030,031,031A,', 9, 152, 151, 716, 367, 346, 533, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (47, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22523, '09000', '001,002,003A,005,006,007,008,009,', 8, 188, 188, 998, 479, 517, 767, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (48, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22533, '09100', '020,021,022,023,', 4, 216, 215, 1036, 507, 522, 812, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (49, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22540, '09100', '038,039,040,', 3, 152, 151, 609, 277, 329, 455, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (50, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22549, '09200', '015B,016,017,', 3, 141, 138, 591, 306, 280, 447, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (51, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22557, '09200', '044,046,047,', 3, 146, 143, 636, 330, 306, 479, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (52, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22574, '09500', '008,009,010A,012,012A,014A,014B,016A,016B,016C,017,017A,017B,017C,018,', 15, 160, 156, 744, 368, 376, 525, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (53, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22587, '09600', '036,037,038,039,', 4, 153, 153, 793, 392, 400, 606, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (54, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22589, '09600', '044,045A,046,', 3, 149, 146, 766, 383, 382, 587, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (55, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22594, '09700', '008A,009,010,011,', 4, 186, 186, 857, 425, 431, 661, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (56, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22611, '09800', '007,008,', 2, 145, 133, 475, 246, 228, 375, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (57, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22613, '09800', '012,013,014,015,', 4, 183, 180, 772, 419, 343, 624, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (58, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22645, '10100', '007B,008,009,010A,011,012,013,014,016,017,', 10, 142, 141, 643, 309, 334, 459, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (59, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22680, '10400', '044,045,046,', 3, 144, 143, 734, 366, 361, 578, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (60, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22716, '10700', '001,002,', 2, 163, 160, 718, 374, 343, 548, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (61, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22723, '10700', '027,028,029,', 3, 167, 166, 720, 368, 350, 570, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (62, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22738, '10900', '005E,005F,005G,005H,005I,005J,005K,005L,005M,007,', 10, 160, 155, 707, 352, 355, 502, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (63, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22747, '11000', '021,023,', 2, 151, 151, 674, 346, 326, 533, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (64, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22755, '11000', '042,043,044,', 3, 190, 190, 765, 379, 386, 593, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (65, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22763, '11100', '016,017,018,019,020,021,', 6, 205, 195, 822, 431, 387, 656, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (66, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22771, '11200', '001,002,003,005,', 4, 168, 165, 764, 421, 342, 584, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (67, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22799, '11400', '035,037,038,040,041,042,', 6, 141, 141, 687, 368, 317, 555, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (68, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22809, '11500', '021,022,023,', 3, 164, 163, 693, 345, 345, 554, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (69, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22895, '12400', '023,024,', 2, 155, 152, 570, 288, 280, 468, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (70, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22896, '12400', '026,027,028,029,', 4, 203, 201, 719, 367, 351, 595, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (71, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22909, '12500', '007,010,', 2, 155, 134, 574, 294, 277, 437, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (72, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22957, '12800', '013A,013B,014A,014B,014C,015,016B,', 7, 187, 187, 861, 440, 421, 635, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (73, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22971, '12900', '028,028A,029,030,031,032,033,', 7, 142, 141, 739, 378, 358, 546, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (74, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 22988, '13000', '034,035,036,', 3, 143, 130, 591, 301, 288, 431, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (75, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 23010, '13400', '001A,001B,002A,002B,002C,003A,003B,003C,004,004E,004F,005,', 12, 148, 112, 317, 143, 174, 231, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (76, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 23016, '13400', '052N,052\D1,052O,052P,052Q,052R,052S,053,054A,054B,055,056,057,058,059,', 15, 151, 127, 370, 175, 195, 273, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (77, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 23023, '13700', '022H,022J,023H,023I,024,025,025A,026,027,028A,031,031A,032,033,033A,034,', 16, 147, 126, 284, 139, 145, 206, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (78, 'LIMA ESTE', '150132', '15', 'LIMA', '01', 'LIMA', '32', 'SAN JUAN DE LURIGANCHO', '', 'SAN JUAN DE LURIGANCHO', 23032, '13800', '044A,045,047,048,049,050,051,052,053,054,055,056A,', 12, 133, 110, 240, 120, 120, 164, -0.000112592, -5.21483e-33, 1275, 78);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (79, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17260, '00200', '027C,029,029A,029B,031,032,033,034,035,036C,036E,', 11, 145, 133, 442, 220, 222, 289, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (80, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17322, '01200', '056,058,059,060,061,062,063,064,', 8, 182, 169, 635, 308, 326, 435, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (81, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17363, '01900', '031,032,033A,033B,033D,033E,033F,034,035,036,037B,', 11, 142, 122, 543, 281, 261, 362, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (82, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17377, '02100', '045D,046A,046B,047,047A,047B,047E,047G,047H,047J,049,049A,049B,', 13, 121, 121, 522, 279, 243, 336, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (83, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17400, '02400', '048,049,050,', 3, 72, 70, 294, 160, 134, 183, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (84, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17416, '02600', '055,057,058,061,', 4, 99, 98, 495, 260, 233, 372, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (85, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17426, '02800', '013,014,015,016,', 4, 166, 160, 767, 401, 364, 559, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (86, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17490, '03800', '001,001A,001B,001K,001L,001O,001P,001Q,001R,', 9, 168, 165, 694, 328, 363, 443, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (87, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17503, '03902', '001,002,003,004,006,', 5, 141, 138, 542, 268, 274, 353, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (88, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17516, '04000', '030A,031A,032A,033A,034,035,', 6, 200, 199, 875, 440, 433, 634, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (89, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17558, '04500', '050D,052,052A,052B,053A,054A,056,056B,056C,056D,', 10, 145, 138, 556, 285, 271, 394, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (90, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17571, '04800', '003,007,008,009,010,012,013A,', 7, 163, 151, 544, 268, 276, 424, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (91, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17576, '04900', '001,002,003,004,005,007,008,', 7, 144, 137, 525, 268, 255, 403, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (92, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17605, '05600', '027A,027B,030,031,032,033,034,035,035A,', 9, 142, 139, 693, 334, 359, 516, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (93, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17631, '06100', '001,001A,001B,001D,001F,001G,002,002A,003,003A,003B,004,005,', 13, 150, 146, 355, 173, 182, 240, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (94, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17636, '06200', '001A,002,002A,003,004,005A,006B,007C,008,', 9, 144, 142, 429, 211, 218, 281, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (95, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17686, '06900', '041,042,043,044,045,046,047,048,', 8, 143, 124, 381, 192, 189, 254, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (96, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17711, '07300', '022,023,024,025A,026,027,', 6, 156, 149, 422, 227, 195, 288, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (97, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17721, '07301', '029,030,031,032,033,034,', 6, 156, 148, 259, 125, 134, 192, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (98, 'LIMA NORTE 2', '070106', '07', 'CALLAO', '01', 'CALLAO', '06', 'VENTANILLA', '0001', 'VENTANILLA', 17747, '07700', '001A,001B,002A,003,004,005,008,009,010,', 9, 143, 139, 402, 211, 191, 259, -1.12101e-35, -107374184, 536, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (99, 'LIMA NORTE 2', '150102', '15', 'LIMA', '01', 'LIMA', '02', 'ANCON', '0001', 'ANCON', 18650, '01100', '035,036,038A,039,040,041,042,043,', 8, 154, 85, 119, 56, 63, 87, 3.34442e-09, 0, 82, 2);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (100, 'LIMA NORTE 2', '150102', '15', 'LIMA', '01', 'LIMA', '02', 'ANCON', '0001', 'ANCON', 18657, '01200', '051A,051D,052,053,054,055A,055B,055C,056,057,058A,058B,058C,059,060,', 15, 204, 22, 26, 13, 13, 20, 3.34442e-09, 0, 82, 2);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (101, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18699, '00103', '001,001B,002,003,004,005,006,007A,007B,008,009,010,011,012,013,014,015,016,017,018,', 20, 169, 165, 659, 339, 320, 438, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (102, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18706, '00200', '001,002,003,004,005,006,007,007A,007B,007C,007D,', 11, 153, 143, 555, 282, 273, 352, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (103, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18709, '00200', '024,025A,025B,025C,026,027,028,029A,029B,030A,030B,030C,031,', 13, 141, 139, 579, 265, 312, 388, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (104, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18710, '00200', '031A,032,033,034,035,037A,039,041,', 8, 149, 137, 561, 259, 301, 397, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (105, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18730, '00501', '031,032,032A,034,035,036A,037,039,040,041,042,', 11, 146, 127, 287, 142, 145, 195, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (106, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18751, '00800', '001,002,003A,003B,003C,005,006,008,009,011,013,014,014A,', 13, 140, 132, 638, 328, 308, 459, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (107, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18754, '00800', '026B,026C,026D,026E,026G,026I,027A,029A,030,031,031A,032,033A,035,036,036A,037,038,039,040,', 20, 144, 137, 575, 269, 305, 416, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (108, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18759, '00900', '025J,025K,025L,025M,025N,025P,027A,028,029,030B,032,033B,040,040D,040E,041A,041B,041C,041D,041E,041F,041G,041H,041I,041J,', 25, 134, 131, 587, 281, 306, 429, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (109, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18768, '01100', '034B,039A,040C,041,042,043A,045B,046,048A,048B,', 10, 131, 129, 544, 278, 266, 374, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (110, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18769, '01200', '001,002A,002C,003B,004A,004B,004C,006,006A,006B,007,008,009,010,011,012A,013B,014B,017,017A,018,', 21, 148, 141, 608, 311, 297, 443, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (111, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18784, '01400', '031,032,033,035,036,037,', 6, 157, 156, 823, 406, 417, 612, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (112, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18800, '01600', '041,042,043,044,046,048,049,049B,049C,049E,049F,050,050B,', 13, 140, 136, 593, 294, 299, 436, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (113, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18818, '02001', '010,011,012,012A,012C,012D,012F,012G,014,015,016,017,018,019,020,022,023,024,027,028,029,030,031,032,033,034,035,035A,035B,', 29, 171, 168, 760, 403, 357, 503, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (114, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18854, '02400', '020,021,024,025,', 4, 164, 161, 731, 365, 362, 542, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (115, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18900, '03100', '033E,033F,034,035,036,037,038G,038H,039,039A,039D,039E,040A,040C,040D,043,044,044A,044B,044C,', 20, 140, 133, 470, 234, 235, 309, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (116, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18907, '03200', '044,045,047,048,049,050,051,052,', 8, 152, 151, 827, 419, 407, 595, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (117, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18975, '04000', '004,005,006,007,008,', 5, 189, 187, 1081, 547, 532, 829, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (118, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 18999, '04300', '063,064,064A,065A,065B,067,068,069,070,071A,071B,071C,074,074A,075A,076A,078A,078B,079,080A,080B,080D,080E,080F,080G,084,085A,', 27, 167, 167, 681, 346, 335, 455, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (119, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 19003, '04400', '019,020,021,022,023,024,', 6, 164, 161, 665, 343, 322, 527, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (120, 'LIMA NORTE 2', '150106', '15', 'LIMA', '01', 'LIMA', '06', 'CARABAYLLO', '0001', 'CARABAYLLO', 19020, '04800', '009D,009E,009F,009G,', 4, 143, 81, 295, 138, 157, 196, -686341554176, 4.17233e-08, 339, 20);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (121, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20673, '00300', '026,027,028,029,030,031,', 6, 141, 137, 731, 370, 360, 569, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (122, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20687, '00500', '011,012,014,015,016,', 5, 153, 151, 821, 434, 383, 668, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (123, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20724, '01000', '012,013,014,015,016,017,018A,018B,', 8, 141, 141, 881, 436, 445, 673, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (124, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20725, '01000', '018C,018D,018E,019A,019B,020,021,022A,022B,022C,023A,023B,', 12, 147, 146, 718, 375, 341, 504, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (125, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20768, '01600', '039,040B,040C,040E,040F,040G,042,045,046A,047,049B,049D,050D,', 13, 141, 139, 594, 294, 300, 452, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (126, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20835, '02500', '001,002,003,004,', 4, 142, 140, 728, 364, 364, 555, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (127, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20857, '02700', '014,015,016,017,', 4, 233, 233, 1395, 697, 698, 1026, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (128, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20889, '03100', '022,023,024,025A,027,028,029,030,031,032,', 10, 145, 145, 776, 396, 376, 574, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (129, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20891, '03200', '001,002,003A,004,005,006,007,010B,011,012,013,014,015,016,017,', 15, 157, 157, 886, 423, 463, 665, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (130, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20918, '03500', '006,007,009,', 3, 148, 145, 652, 330, 322, 512, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (131, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20922, '03500', '024,025,026,027,028,', 5, 158, 158, 780, 398, 380, 611, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (132, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20923, '03500', '030,031B,034,036,037,039,', 6, 163, 158, 650, 330, 317, 526, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (133, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20975, '04100', '032A,034,035,036,037,038,039,040,', 8, 151, 151, 774, 394, 380, 584, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (134, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20976, '04100', '041,042,043,044,045,046,047,048,049,', 9, 152, 152, 766, 387, 378, 588, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (135, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 20999, '04400', '015B,016,017,020,021,022,023A,024A,026A,028,029A,030,031,032C,032D,', 15, 141, 141, 714, 349, 364, 558, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (136, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21015, '04600', '005,007,008,009,', 4, 167, 166, 981, 512, 468, 739, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (137, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21020, '04600', '029,030,031,', 3, 177, 177, 740, 363, 375, 582, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (138, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21040, '04800', '001,004,005,006,007,', 5, 194, 191, 917, 474, 442, 742, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (139, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21057, '05000', '014,015,016,017,018,', 5, 160, 157, 647, 314, 333, 515, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (140, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21089, '05200', '044,045,048,049,050,', 5, 143, 143, 617, 308, 308, 468, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (141, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21095, '05300', '011,012,013,014,', 4, 183, 182, 966, 471, 492, 776, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (142, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21134, '05700', '042,043,044A,045,046,048,048A,049,051,052,', 10, 173, 171, 827, 421, 406, 597, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (143, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21161, '06100', '001,002,003,004,005,', 5, 168, 168, 837, 442, 395, 656, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (144, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21162, '06100', '006,007,008,009,', 4, 157, 154, 762, 390, 370, 591, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (145, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21164, '06100', '014,015,016,017,', 4, 179, 178, 821, 411, 409, 618, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (146, 'LIMA NORTE 2', '150110', '15', 'LIMA', '01', 'LIMA', '10', 'COMAS', '0001', 'COMAS', 21219, '06500', '025,027,', 2, 152, 152, 562, 298, 262, 432, -1.94002e-30, 25876170788569088, 610, 26);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (147, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19040, '00200', '038,039,040,041,043,044,', 6, 150, 148, 743, 383, 359, 544, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (148, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19077, '00700', '001B,001C,003A,003B,003C,003D,004,005,006A,007B,007C,008,009,010,011,012,', 16, 144, 141, 536, 247, 289, 375, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (149, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19093, '01000', '026,027,028,029,030,031,032,033,035,', 9, 160, 160, 732, 389, 341, 563, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (150, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19098, '01100', '010,011,012,013,014,016,017,', 7, 149, 138, 611, 303, 308, 452, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (151, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19103, '01100', '055H,055I,055J,055K,055L,055M,055N,055O,055P,057A,057B,058A,058B,059A,059B,059C,059D,059E,059H,059I,059J,059K,059L,059M,', 24, 216, 192, 606, 282, 324, 371, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (152, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19106, '01200', '022,023,024C,024D,025B,025C,026,026A,027A,028,030A,030B,030C,030D,030E,030F,030G,030H,030I,030J,031,031A,033,034,034A,', 25, 143, 140, 454, 226, 228, 298, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (153, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19121, '01400', '044,046,047A,048,049,051A,052,057,', 8, 162, 127, 581, 274, 306, 426, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (154, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19126, '01500', '030F,031,032B,033,033A,033B,033C,033D,034,036,037,038,039,040,041,042,043,', 17, 170, 164, 644, 311, 331, 441, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (155, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19149, '01900', '024B,024D,024E,024F,027A,027B,027C,029A,029B,029C,030,033A,033B,033C,', 14, 141, 133, 483, 234, 247, 324, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (156, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19175, '02102', '033,035,036H,', 3, 236, 231, 1059, 510, 545, 779, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (157, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19228, '03000', '024C,024E,024G,024H,024I,025,026,028B,028C,028D,', 10, 186, 184, 809, 397, 412, 572, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (158, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19257, '03500', '023,024,025,026,027,029,', 6, 142, 137, 724, 374, 349, 544, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (159, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19261, '03500', '051,052,053,054,055,056,057,058,059,060,', 10, 197, 192, 955, 489, 459, 743, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (160, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19289, '03800', '075,078,079,081A,', 4, 145, 144, 579, 302, 277, 441, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (161, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19295, '03900', '031,032,037,038,039,040A,041,042A,044A,046A,046B,049A,049B,051,051A,056,057A,057B,058,', 19, 169, 162, 597, 288, 305, 450, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (162, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19296, '03900', '059,060,061,062,063,064,065,066,067C,068F,069,', 11, 140, 140, 629, 324, 305, 443, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (163, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19313, '04200', '011,012,013A,016,017,020,021,', 7, 145, 140, 690, 336, 348, 540, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (164, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19315, '04200', '032,034,035,036,037,038,039,040,', 8, 147, 142, 750, 360, 390, 582, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (165, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19316, '04200', '041,043,044,045,046,047,048,', 7, 171, 168, 876, 434, 440, 675, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (166, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19324, '04300', '056,057,058,059,060,', 5, 144, 142, 675, 340, 335, 491, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (167, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19335, '04500', '042C,043,044A,046A,047,048,', 6, 154, 145, 599, 308, 291, 423, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (168, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19351, '04800', '042,043,044,045,046,', 5, 165, 158, 770, 370, 397, 557, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (169, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19353, '04800', '053,054,055,056,058,059,060,', 7, 207, 206, 859, 440, 415, 614, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (170, 'LIMA NORTE 2', '150125', '15', 'LIMA', '01', 'LIMA', '25', 'PUENTE PIEDRA', '0001', 'PUENTE PIEDRA', 19392, '05500', '025B,026,027,028,029,030,031,032,033,034,035D,036,037A,', 13, 140, 134, 583, 291, 292, 424, 4.64936e-23, -5.32265e-20, 371, 24);
INSERT INTO t_marco_viv (id, ZONA_SUNAT, ubigeo, CCDD, Departamento, CCPP, Provincia, CCDI, Distrito, codccpp, nomccpp, nconglome1, zonas, mzna_ccpp, tot_mz_cp, totviv, totvivocup, totpobc, TMUJF, THOMBF, TPERSMAY14F, InclusionProbability_1, SampleWeightCumulative_1, PopulationSize_1, SampleSize_1) VALUES (171, 'LIMA NORTE 2', '150139', '15', 'LIMA', '01', 'LIMA', '39', 'SANTA ROSA', '0001', 'SANTA ROSA', 18593, '00401', '006,007,008,008C,008D,008E,008F,008G,008H,008I,008J,008K,009,009C,', 14, 144, 132, 313, 163, 150, 196, -2.75782e+36, 0, 28, 1);

CREATE TABLE t_contpotenciales(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
ZONA_SUNAT VARCHAR(20),
CUEST INTEGER NOT NULL,
ACTIVO INTEGER NOT NULL DEFAULT '1',
UBIGEO CHAR(6),
CCDD VARCHAR(2),
DEPARTAMENTO VARCHAR(60),
CCPP VARCHAR(2),
PROVINCIA VARCHAR(60),
CCDI VARCHAR(2),
DISTRITO VARCHAR(60),
ZONNUM VARCHAR(5),
ZONALF VARCHAR(1),
MZNNUM VARCHAR(3),
MZNALF VARCHAR(1),
CONGLOMERADO VARCHAR(5),
VIVIENDA INTEGER,
RESFIN_DIA INTEGER,
RESFIN_MES INTEGER,
RESFIN INTEGER,
RESFIN_O VARCHAR(60),
ENC_DNI VARCHAR(8),
ENC_NOMB VARCHAR(80),
SUP_DNI VARCHAR(8),
SUP_NOMB VARCHAR(80),
TOT_HOGAR INTEGER,
HOGAR INTEGER,
ENTREVISTADO VARCHAR(80),
NOMBRES VARCHAR(40),
APELLIDOS VARCHAR(40),
DIRECCION VARCHAR(240),
P1 INTEGER,
P2 INTEGER,
P3 INTEGER,
P3_A INTEGER,
P3_B INTEGER,
P3_C INTEGER,
P4 INTEGER,
P5 INTEGER,
P5_O VARCHAR(60),
P6_OCUP_PRINCIP INTEGER,
P6_OCUP_PRINCIP_AUX INTEGER,
P7_OCUP_PRINCIP INTEGER,
P7_OCUP_PRINCIP_O VARCHAR(60),
P8_OCUP_PRINCIP INTEGER,
P8_OCUP_PRINCIP_O VARCHAR(60),
P6_OCUP_SECUND INTEGER,
P6_OCUP_SECUND_AUX INTEGER,
P7_OCUP_SECUND INTEGER,
P7_OCUP_SECUND_O VARCHAR(60),
P8_OCUP_SECUND INTEGER,
P8_OCUP_SECUND_O VARCHAR(60),
P8_A_OCUP_PRINCIP VARCHAR(10),
P8_A_OCUP_PRINCIP_ENT INTEGER,
P8_A_OCUP_PRINCIP_DEC CHAR(2),
P8_B_OCUP_PRINCIP INTEGER,
P8_A_OCUP_SECUND VARCHAR(10),
P8_A_OCUP_SECUND_ENT INTEGER,
P8_A_OCUP_SECUND_DEC CHAR(2),
P8_B_OCUP_SECUND INTEGER,
P9 INTEGER,
P9_O VARCHAR(60),
OBS_1 VARCHAR(1000),
P10_AUX INTEGER,
P10_1 INTEGER,
P10_2 INTEGER,
P10_3 INTEGER,
P10_4 INTEGER,
P11_A INTEGER,
P11_B INTEGER,
P11_C INTEGER,
P11_D INTEGER,
P12 INTEGER,
P12_O VARCHAR(100),
P13 INTEGER,
P13_O VARCHAR(100),
P14 INTEGER,
P14_O VARCHAR(100),
P15 INTEGER,
P15_O VARCHAR(100),
P16 INTEGER,
P17_AUX INTEGER,
P17_1 INTEGER,
P17_2 INTEGER,
P17_3 INTEGER,
OBS_2 VARCHAR(1000),
P18_AUX INTEGER,
P18_1 INTEGER,
P18_2 INTEGER,
P18_3 INTEGER,
P18_4 INTEGER,
P18_5 INTEGER,
P18_6 INTEGER,
P18_7 INTEGER,
P18_8 INTEGER,
P18_9 INTEGER,
P18_10 INTEGER,
OBS_3 VARCHAR(1000),
usucre INTEGER DEFAULT NULL REFERENCES usuarios (id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios (id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT NULL );

CREATE VIEW carga_usuario_viv AS 
select usucre AS usuario_id,
max(CUEST) AS ncuest from t_contpotenciales group by usucre;

CREATE VIEW cuest_viv_usuario AS 
select 
ID,
ZONA_SUNAT AS ZONA,
ENC_NOMB AS ENCUESTADOR,
CUEST,
DISTRITO,
CONGLOMERADO,
VIVIENDA,
concat_ws(' ',APELLIDOS,NOMBRES) AS ENTREVISTADO,
(case 
When (isnull(P1) OR isnull(P9) OR isnull(P16)) AND updated_at IS NOT NULL then 'INCOMPLETO'
when isnull(updated_at) then 'PENDIENTE' else 'PROCESADO' end) AS ESTADO,
convert_tz(created_at,'+00:00','-05:00') AS FECHA, 
usucre AS USUCRE,
usuact AS USUACT 
from t_contpotenciales 
 WHERE ACTIVO=1 
ORDER BY CUEST ASC;

CREATE VIEW cuest_viv_todos AS 
select t1.ID,
t4.datos AS USUARIO,
t1.ZONA_SUNAT AS ZONA,
t1.ENC_NOMB AS ENCUESTADOR,
t1.CUEST,
t1.DISTRITO,
t1.CONGLOMERADO,
t1.VIVIENDA,
concat_ws(' ',t1.APELLIDOS,t1.NOMBRES) AS ENTREVISTADO,
(case 
When t1.ACTIVO>0 AND (isnull(t1.P1) OR isnull(t1.P9) OR isnull(t1.P16)) AND updated_at IS NOT NULL then 'INCOMPLETO'
when t1.ACTIVO>0 AND isnull(t1.updated_at) then 'PENDIENTE' 
When t1.ACTIVO=0 then 'ELIMINADO' else 'PROCESADO' end) AS ESTADO, ACTIVO,
convert_tz(t1.created_at,'+00:00','-05:00') AS FECHA, 
t1.usucre AS USUCRE,
t1.usuact AS USUACT 
from t_contpotenciales t1 INNER JOIN personal t4 ON t1.usucre=t4.id 
ORDER BY USUARIO ASC, CUEST ASC ;

CREATE TABLE consis_contpotenciales(
ID INTEGER PRIMARY KEY,
ZONA_SUNAT VARCHAR(20),
CUEST INTEGER NOT NULL,
ACTIVO INTEGER NOT NULL DEFAULT '1',
UBIGEO CHAR(6),
CCDD VARCHAR(2),
DEPARTAMENTO VARCHAR(60),
CCPP VARCHAR(2),
PROVINCIA VARCHAR(60),
CCDI VARCHAR(2),
DISTRITO VARCHAR(60),
ZONNUM VARCHAR(5),
ZONALF VARCHAR(1),
MZNNUM VARCHAR(3),
MZNALF VARCHAR(1),
CONGLOMERADO VARCHAR(5),
VIVIENDA INTEGER,
RESFIN_DIA INTEGER,
RESFIN_MES INTEGER,
RESFIN INTEGER,
RESFIN_O VARCHAR(60),
ENC_DNI VARCHAR(8),
ENC_NOMB VARCHAR(80),
SUP_DNI VARCHAR(8),
SUP_NOMB VARCHAR(80),
TOT_HOGAR INTEGER,
HOGAR INTEGER,
ENTREVISTADO VARCHAR(80),
NOMBRES VARCHAR(40),
APELLIDOS VARCHAR(40),
DIRECCION VARCHAR(240),
P1 INTEGER,
P2 INTEGER,
P3 INTEGER,
P3_A INTEGER,
P3_B INTEGER,
P3_C INTEGER,
P4 INTEGER,
P5 INTEGER,
P5_O VARCHAR(60),
P6_OCUP_PRINCIP INTEGER,
P6_OCUP_PRINCIP_AUX INTEGER,
P7_OCUP_PRINCIP INTEGER,
P7_OCUP_PRINCIP_O VARCHAR(60),
P8_OCUP_PRINCIP INTEGER,
P8_OCUP_PRINCIP_O VARCHAR(60),
P6_OCUP_SECUND INTEGER,
P6_OCUP_SECUND_AUX INTEGER,
P7_OCUP_SECUND INTEGER,
P7_OCUP_SECUND_O VARCHAR(60),
P8_OCUP_SECUND INTEGER,
P8_OCUP_SECUND_O VARCHAR(60),
P8_A_OCUP_PRINCIP VARCHAR(10),
P8_A_OCUP_PRINCIP_ENT INTEGER,
P8_A_OCUP_PRINCIP_DEC CHAR(2),
P8_B_OCUP_PRINCIP INTEGER,
P8_A_OCUP_SECUND VARCHAR(10),
P8_A_OCUP_SECUND_ENT INTEGER,
P8_A_OCUP_SECUND_DEC CHAR(2),
P8_B_OCUP_SECUND INTEGER,
P9 INTEGER,
P9_O VARCHAR(60),
OBS_1 VARCHAR(1000),
P10_AUX INTEGER,
P10_1 INTEGER,
P10_2 INTEGER,
P10_3 INTEGER,
P10_4 INTEGER,
P11_A INTEGER,
P11_B INTEGER,
P11_C INTEGER,
P11_D INTEGER,
P12 INTEGER,
P12_O VARCHAR(100),
P13 INTEGER,
P13_O VARCHAR(100),
P14 INTEGER,
P14_O VARCHAR(100),
P15 INTEGER,
P15_O VARCHAR(100),
P16 INTEGER,
P17_AUX INTEGER,
P17_1 INTEGER,
P17_2 INTEGER,
P17_3 INTEGER,
OBS_2 VARCHAR(1000),
P18_AUX INTEGER,
P18_1 INTEGER,
P18_2 INTEGER,
P18_3 INTEGER,
P18_4 INTEGER,
P18_5 INTEGER,
P18_6 INTEGER,
P18_7 INTEGER,
P18_8 INTEGER,
P18_9 INTEGER,
P18_10 INTEGER,
OBS_3 VARCHAR(1000),
usucre INTEGER DEFAULT NULL,
usuact INTEGER DEFAULT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT NULL );


CREATE TABLE t_ccf_pag1(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
CCF_NOMBRE VARCHAR (120),
CCF_CODIGO VARCHAR (25) default null REFERENCES sedes_csc(CODIGO),
ZONA_SUNAT VARCHAR (30),
ENC_FECHA VARCHAR (10),
ENC_DIA INTEGER, 
ENC_MES INTEGER, 
ENC_ANIO INTEGER, 
RESFIN INTEGER, 
RESFIN_O VARCHAR(60),
ENC_DNI VARCHAR(8),
ENC_NOMB VARCHAR(80),
SUP_DNI VARCHAR(8),
SUP_NOMB VARCHAR(80),
INF_FILTRO INTEGER, 
USUARIO_ENTREVISTADO VARCHAR(60),
USUARIO_NOMBRES VARCHAR(30),
USUARIO_APELLIDOS VARCHAR(30),
USUARIO_DIRECCION VARCHAR(240),
P1 VARCHAR(60),
P1_UBIGEO VARCHAR(6),
P2 INTEGER, 
P3 INTEGER, 
P3_GRUPOS INTEGER, 
P4 VARCHAR(11),
P5 INTEGER, 
P6 INTEGER, 
P7 VARCHAR(240),
P8 VARCHAR(240),
P8_DISTRITO VARCHAR(60),
P9 INTEGER, 
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_ccf_pag1(CUEST,usucre);


CREATE TABLE t_ccf_pag2(
ID INTEGER PRIMARY KEY REFERENCES t_ccf_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
P10 INTEGER, 
P10_AUX INTEGER DEFAULT NULL,
P10_1 VARCHAR(100),
P10_2 VARCHAR(100),
P10_3 VARCHAR(100),
P10_4 VARCHAR(100),
P10_5 VARCHAR(100),
P11 INTEGER, 
P12 INTEGER, 
P13_AUX INTEGER DEFAULT NULL,
P13_1 INTEGER, 
P13_2 INTEGER, 
P13_3 INTEGER, 
P13_4 INTEGER, 
P13_O VARCHAR(60),
P14 INTEGER, 
P15 INTEGER, 
P15_1 INTEGER, 
P15_2 INTEGER, 
P15_3 INTEGER, 
P15_4 INTEGER, 
P15_5 INTEGER, 
P15_O VARCHAR(60),
P16 INTEGER, 
P17 VARCHAR(8),
P17_HOR INTEGER, 
P17_MIN INTEGER, 
P18 VARCHAR(8),
P18_HOR INTEGER, 
P18_MIN INTEGER, 
P19 INTEGER, 
P20 INTEGER, 
P21 INTEGER, 
P21_AUX INTEGER DEFAULT NULL,
P21_1 VARCHAR(100),
P21_2 VARCHAR(100),
P21_3 VARCHAR(100),
P22 INTEGER, 
P22_AUX INTEGER DEFAULT NULL,
P22_1 INTEGER, 
P22_2 INTEGER, 
P22_3 INTEGER, 
P22_4 INTEGER, 
P22_O VARCHAR(60),
P23_AUX INTEGER DEFAULT NULL,
P23_1 INTEGER, 
P23_2 INTEGER, 
P23_3 INTEGER, 
P23_4 INTEGER, 
P23_5 INTEGER, 
P23_6 INTEGER, 
P23_O VARCHAR(60),
P24 VARCHAR(5),
P24_HOR INTEGER, 
P24_MIN INTEGER, 
P25 VARCHAR(6),
P25_ENT INTEGER, 
P25_DEC VARCHAR(2),
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_ccf_pag2(CUEST,usucre);


CREATE TABLE t_ccf_pag3(
ID INTEGER PRIMARY KEY REFERENCES t_ccf_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
V_01_1 INTEGER, 
V_01_2 INTEGER, 
V_02_1 INTEGER, 
V_02_2 INTEGER, 
V_03_1 INTEGER, 
V_03_2 INTEGER, 
V_03_3 INTEGER, 
V_03_4 INTEGER, 
V_03_5 INTEGER, 
V_04_1 INTEGER, 
V_04_2 INTEGER, 
V_05_1 INTEGER, 
V_05_2 INTEGER, 
V_05_3 INTEGER, 
V_06_1 INTEGER, 
V_06_2 INTEGER, 
V_06_3 INTEGER, 
V_06_4 INTEGER, 
V_06_5 INTEGER, 
V_06_6 INTEGER, 
V_07_1 INTEGER, 
V_07_2 INTEGER, 
V_07_3 INTEGER, 
V_08_1 INTEGER, 
V_08_2 INTEGER, 
V_08_3 INTEGER, 
V_09 INTEGER, 
usucre INTEGER DEFAULT NULL REFERENCES usuarios(id),
usuact INTEGER DEFAULT NULL REFERENCES usuarios(id),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON t_ccf_pag3(CUEST,usucre);

CREATE VIEW carga_usuario_ccf AS 
SELECT usucre AS usuario_id, max( CUEST ) AS ncuest
FROM t_ccf_pag1
GROUP BY usucre;

CREATE VIEW cuest_usuario_ccf AS 
select 
t1.ID AS ID,
concat_ws(' - ', s.centro_servicio, s.direccion) AS SEDE,
ZONA_SUNAT AS ZONA,
t1.CUEST AS CUEST,
concat_ws(' ',USUARIO_APELLIDOS,USUARIO_NOMBRES) AS ENCUESTADO,
P1 AS DISTRITO,
P4 AS RUC,
(case 
When (isnull(t1.P6) OR isnull(t2.P16) OR isnull(t3.V_09)) AND t3.updated_at IS NOT NULL then 'INCOMPLETO'
when isnull(t1.updated_at) OR isnull(t2.updated_at) OR isnull(t3.updated_at) then 'PENDIENTE' else 'PROCESADO' end) AS ESTADO,
convert_tz(t1.created_at,'+00:00','-05:00') AS FECHA, 
t1.usucre AS USUCRE,
t1.usuact AS USUACT 
from t_ccf_pag1 t1 INNER JOIN t_ccf_pag2 t2 ON t1.id=t2.id 
INNER JOIN t_ccf_pag3 t3 ON t1.id=t3.id 
LEFT JOIN sedes_sunat s ON t1.CCF_CODIGO = s.codigo   
 WHERE t1.ACTIVO=1 
ORDER BY CUEST ASC;

CREATE VIEW cuest_todos_ccf AS 
select 
t1.ID AS ID,
t4.datos AS USUARIO,
concat_ws(' - ', s.centro_servicio, s.direccion) AS SEDE,
ZONA_SUNAT AS ZONA,
t1.CUEST AS CUEST,
concat_ws(' ',USUARIO_APELLIDOS,USUARIO_NOMBRES) AS ENCUESTADO,
P1 AS DISTRITO,
P4 AS RUC,
(case 
When t1.ACTIVO>0 AND (isnull(t1.P6) OR isnull(t2.P16) OR isnull(t3.V_09)) AND t3.updated_at IS NOT NULL then 'INCOMPLETO'
when t1.ACTIVO>0 AND (isnull(t1.updated_at) OR isnull(t2.updated_at) OR isnull(t3.updated_at)) then 'PENDIENTE' 
When t1.ACTIVO=0 then 'ELIMINADO' 
 else 'PROCESADO' end) AS ESTADO, 
t1.ACTIVO, 
convert_tz(t1.created_at,'+00:00','-05:00') AS FECHA,  
t1.usucre AS USUCRE,
t1.usuact AS USUACT 
from t_ccf_pag1 t1 LEFT JOIN t_ccf_pag2 t2 ON t1.id=t2.id 
LEFT JOIN t_ccf_pag3 t3 ON t1.id=t3.id 
INNER JOIN personal t4 ON t1.usucre=t4.id 
LEFT JOIN sedes_sunat s ON t1.CCF_CODIGO = s.codigo   
ORDER BY USUARIO ASC, CUEST ASC ;


CREATE TABLE consis_ccf_pag1(
ID INTEGER PRIMARY KEY,
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
CCF_NOMBRE VARCHAR (120),
CCF_CODIGO VARCHAR (25) default null,
ZONA_SUNAT VARCHAR (30),
ENC_FECHA VARCHAR (10),
ENC_DIA INTEGER, 
ENC_MES INTEGER, 
ENC_ANIO INTEGER, 
RESFIN INTEGER, 
RESFIN_O VARCHAR(60),
ENC_DNI VARCHAR(8),
ENC_NOMB VARCHAR(80),
SUP_DNI VARCHAR(8),
SUP_NOMB VARCHAR(80),
INF_FILTRO INTEGER, 
USUARIO_ENTREVISTADO VARCHAR(60),
USUARIO_NOMBRES VARCHAR(30),
USUARIO_APELLIDOS VARCHAR(30),
USUARIO_DIRECCION VARCHAR(240),
P1 VARCHAR(60),
P1_UBIGEO VARCHAR(6),
P2 INTEGER, 
P3 INTEGER, 
P3_GRUPOS INTEGER, 
P4 VARCHAR(11),
P5 INTEGER, 
P6 INTEGER, 
P7 VARCHAR(240),
P8 VARCHAR(240),
P8_DISTRITO VARCHAR(60),
P9 INTEGER, 
usucre INTEGER DEFAULT NULL,
usuact INTEGER DEFAULT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON consis_ccf_pag1(CUEST,usucre);


CREATE TABLE consis_ccf_pag2(
ID INTEGER PRIMARY KEY REFERENCES consis_ccf_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
P10 INTEGER, 
P10_AUX INTEGER DEFAULT NULL,
P10_1 VARCHAR(100),
P10_2 VARCHAR(100),
P10_3 VARCHAR(100),
P10_4 VARCHAR(100),
P10_5 VARCHAR(100),
P11 INTEGER, 
P12 INTEGER, 
P13_AUX INTEGER DEFAULT NULL,
P13_1 INTEGER, 
P13_2 INTEGER, 
P13_3 INTEGER, 
P13_4 INTEGER, 
P13_O VARCHAR(60),
P14 INTEGER, 
P15 INTEGER, 
P15_1 INTEGER, 
P15_2 INTEGER, 
P15_3 INTEGER, 
P15_4 INTEGER, 
P15_5 INTEGER, 
P15_O VARCHAR(60),
P16 INTEGER, 
P17 VARCHAR(8),
P17_HOR INTEGER, 
P17_MIN INTEGER, 
P18 VARCHAR(8),
P18_HOR INTEGER, 
P18_MIN INTEGER, 
P19 INTEGER, 
P20 INTEGER, 
P21 INTEGER, 
P21_AUX INTEGER DEFAULT NULL,
P21_1 VARCHAR(100),
P21_2 VARCHAR(100),
P21_3 VARCHAR(100),
P22 INTEGER, 
P22_AUX INTEGER DEFAULT NULL,
P22_1 INTEGER, 
P22_2 INTEGER, 
P22_3 INTEGER, 
P22_4 INTEGER, 
P22_O VARCHAR(60),
P23_AUX INTEGER DEFAULT NULL,
P23_1 INTEGER, 
P23_2 INTEGER, 
P23_3 INTEGER, 
P23_4 INTEGER, 
P23_5 INTEGER, 
P23_6 INTEGER, 
P23_O VARCHAR(60),
P24 VARCHAR(5),
P24_HOR INTEGER, 
P24_MIN INTEGER, 
P25 VARCHAR(6),
P25_ENT INTEGER, 
P25_DEC VARCHAR(2),
usucre INTEGER DEFAULT NULL,
usuact INTEGER DEFAULT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON consis_ccf_pag2(CUEST,usucre);


CREATE TABLE consis_ccf_pag3(
ID INTEGER PRIMARY KEY REFERENCES consis_ccf_pag1(ID),
CUEST INTEGER,
ACTIVO INTEGER NOT NULL DEFAULT '1',
V_01_1 INTEGER, 
V_01_2 INTEGER, 
V_02_1 INTEGER, 
V_02_2 INTEGER, 
V_03_1 INTEGER, 
V_03_2 INTEGER, 
V_03_3 INTEGER, 
V_03_4 INTEGER, 
V_03_5 INTEGER, 
V_04_1 INTEGER, 
V_04_2 INTEGER, 
V_05_1 INTEGER, 
V_05_2 INTEGER, 
V_05_3 INTEGER, 
V_06_1 INTEGER, 
V_06_2 INTEGER, 
V_06_3 INTEGER, 
V_06_4 INTEGER, 
V_06_5 INTEGER, 
V_06_6 INTEGER, 
V_07_1 INTEGER, 
V_07_2 INTEGER, 
V_07_3 INTEGER, 
V_08_1 INTEGER, 
V_08_2 INTEGER, 
V_08_3 INTEGER, 
V_09 INTEGER, 
usucre INTEGER DEFAULT NULL,
usuact INTEGER DEFAULT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
updated_at DATETIME DEFAULT NULL);

CREATE UNIQUE INDEX cuestionario_usuario ON consis_ccf_pag3(CUEST,usucre);


