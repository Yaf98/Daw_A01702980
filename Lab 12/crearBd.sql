IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Materiales') 
DROP TABLE Materiales

CREATE TABLE Materiales
(	
	Clave numeric(5) not null,
	Decripcion varchar(50),
	Costo numeric(8,2)
)

IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proveedores')
DROP TABLE Proveedores

CREATE TABLE Proveedores
(
	RFC char(13) not null,
	RazonSocial varchar(50)
)


IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proyectos')
DROP TABLE Proyectos

CREATE TABLE Proyectos
(
  Numero numeric(5) not null,
  Denominacion varchar(50)
) 

IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Entregan')
DROP TABLE Entregan

CREATE TABLE Entregan
(
  Clave numeric(5) not null,
  RFC char(13) not null,
  Numero numeric(5) not null,
  Fecha DateTime not null,
  Cantidad numeric (8,2)
) 

--Parametros de bulk insert, nombre de la base de datos, nombre del propietario y nombre de la tabla

BULK INSERT a1702980.a1702980.[Materiales] 
	FROM 'e:\wwwroot\a1702980\materiales.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	
	)
SELECT * FROM Materiales


BULK INSERT a1702980.a1702980.[Proyectos] 
	FROM 'e:\wwwroot\a1702980\proyectos.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	
	)
SELECT * FROM Proyectos


BULK INSERT a1702980.a1702980.[Proveedores] 
	FROM 'e:\wwwroot\a1702980\proveedores.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	
	)
SELECT * FROM Proveedores


SET DATEFORMAT dmy
BULK INSERT a1702980.a1702980.[Entregan] 
	FROM 'e:\wwwroot\a1702980\entregan.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	
	)

SELECT * FROM Entregan

--Ejercicio 2
INSERT INTO Materiales values(1000, 'xxx', 1000) 
DELETE FROM Materiales where Clave=1000 and Costo=1000


--Creacion de un constrain 
ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)
INSERT INTO Materiales values(1000, 'xxx', 1000)
sp_helpconstraint Materiales  --para ver información de las constraints definidas

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)
sp_helpconstraint Proveedores

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)
sp_helpconstraint Proyectos


ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave, RFC, Numero, Fecha)
sp_helpconstraint Entregan






-- Para eleminar constraints: ALTER TABLE tableName drop constraint ConstraintName 
		--clave, rfc,numero, fecha

--ejercicio 3
SELECT * FROM Materiales
SELECT * FROM Proveedores
SELECT * FROM Proyectos
SELECT * FROM Entregan
	


INSERT INTO Entregan values (0, 'xxx', 0, '1-jan-02', 0);
Delete from Entregan where Clave = 0 

ALTER TABLE Entregan add constraint cfentreganclave foreign key (Clave) references materiales(Clave)
ALTER TABLE entregan add constraint cfentreganrfc foreign key (rfc) references proveedores(rfc)
ALTER TABLE entregan add constraint cfentregannumero foreign key (numero) references proyectos(numero);


sp_helpconstraint Materiales
sp_helpconstraint Proyectos
sp_helpconstraint Proveedores
sp_helpconstraint Entregan

--ejercicio 4


INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0)
Delete FROM Entregan WHERE Cantidad=0

ALTER TABLE Entregan add constraint cantidad check (cantidad > 0)  
INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0)