CREATE TABLE clientes_banca(
	noCuenta varchar(5) not null PRIMARY KEY,
	nombre varchar(30),
	saldo numeric(10,2)

)

CREATE TABLE tipo_movimiento(
	claveM varchar(2) not null PRIMARY KEY,
	descripcion varchar(30)
)




CREATE TABLE movimientos(
	
	noCuenta varchar(5) FOREIGN KEY REFERENCES clientes_banca(noCuenta),
	claveM varchar(2) FOREIGN KEY REFERENCES tipo_movimiento(claveM), 
	fecha datetime,
	monto numeric(10,2),
	PRIMARY KEY (noCuenta,claveM,fecha)	
)


sp_helpconstraint movimientos;
DROP TABLE movimientos

BEGIN TRANSACTION PRUEBA1
	INSERT INTO CLIENTES_BANCA VALUES('001', 'Manuel Rios Maldonado', 9000);
	INSERT INTO CLIENTES_BANCA VALUES('002', 'Pablo Perez Ortiz', 5000);
	INSERT INTO CLIENTES_BANCA VALUES('003', 'Luis Flores Alvarado', 8000); 
COMMIT TRANSACTION PRUEBA1
--ROLLBACK TRANSACTION PRUEBA2 

SELECT * FROM clientes_banca where NoCuenta='001'
SELECT * FROM clientes_banca

/*
	
	
¿Qué pasa cuando deseas realizar esta consulta?
	En la primera ventana se queda esperando, no puede terminar de ejecutarse la instruccion porque se esta accediendo desde la otra conexion

¿Qué pasa cuando deseas realizar esta consulta?
	Se queda esperando. Está esperando que termine de realizar los comandos en 

¿Qué ocurrió y por qué??
	Ahora si se realizaron los inserts
**/

BEGIN TRANSACTION PRUEBA3
INSERT INTO TIPO_MOVIMIENTO VALUES('A','Retiro Cajero Automatico');
INSERT INTO TIPO_MOVIMIENTO VALUES('B','Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3 



BEGIN TRANSACTION PRUEBA4
INSERT INTO MOVIMIENTOS VALUES('001','A',GETDATE(),500);
UPDATE CLIENTES_BANCA SET SALDO = SALDO -500
WHERE NoCuenta='001'
COMMIT TRANSACTION PRUEBA4 

SELECT * FROM clientes_banca
SELECT * FROM movimientos

--Si, se modificaron ambas tablas 


BEGIN TRANSACTION PRUEBA5
INSERT INTO CLIENTES_BANCA VALUES('005','Rosa Ruiz Maldonado',9000);
INSERT INTO CLIENTES_BANCA VALUES('006','Luis Camino Ortiz',5000);
INSERT INTO CLIENTES_BANCA VALUES('001','Oscar Perez Alvarado',8000);


IF @@ERROR = 0
COMMIT TRANSACTION PRUEBA5
ELSE
BEGIN
PRINT 'A transaction needs to be rolled back'
ROLLBACK TRANSACTION PRUEBA5
END
	
/*	¿Para qué sirve el comando @@ERROR revisa la ayuda en línea?
		Regresa 0 si la transaccion precia no tuvo errores
	
	¿Qué hace la transacción?
		Inserta nuevos registros a la tabla clientes_banca. Esto lo hace en una transaccion

	¿Hubo alguna modificación en la tabla? Explica qué pasó y por qué.
		No, se muestra el mensaje "A transaction needs to be rolled". No se realiza porque se está intentando hacer nu registro
		con una clave que ya existe 
*/

IF EXISTS (
		SELECT name FROM sysobjects
		WHERE name = 'REGISTRAR_RETIRO_CAJERO' AND type = 'P')
		DROP PROCEDURE REGISTRAR_RETIRO_CAJERO
	GO

	CREATE PROCEDURE REGISTRAR_RETIRO_CAJERO
		@unocuenta  VARCHAR(5),
		@umonto NUMERIC(10,2)
	AS
		BEGIN TRANSACTION RETIRO_CAJERO
			INSERT INTO Realizan VALUES(@unocuenta,'A',GETDATE(),@umonto); 
			UPDATE ClientesBanca SET Saldo = Saldo - @umonto
			WHERE NoCuenta=@unocuenta

		IF @@ERROR = 0 
			COMMIT TRANSACTION RETIRO_CAJERO
		ELSE 
			BEGIN 
			PRINT 'A transaction needs to be rolled back' 
			ROLLBACK TRANSACTION RETIRO_CAJERO
			END 
	GO

	EXECUTE REGISTRAR_RETIRO_CAJERO '001',10
	SELECT * FROM ClientesBanca;
	SELECT * FROM Realizan;

IF EXISTS (SELECT name FROM sysobjects
				WHERE name = 'REGISTRAR_DEPOSITO_VENTANILLA' AND type = 'P')
		DROP PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA
	GO

	CREATE PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA
		@unocuenta  VARCHAR(5),
		@umonto NUMERIC(10,2)
	AS
		BEGIN TRANSACTION REGISTRAR_DEPOSITO_V
			INSERT INTO Realizan VALUES(@unocuenta,'B',GETDATE(),@umonto); 
			UPDATE ClientesBanca SET Saldo = Saldo + @umonto
			WHERE NoCuenta=@unocuenta

		IF @@ERROR = 0 
			COMMIT TRANSACTION REGISTRAR_DEPOSITO_V
		ELSE 
			BEGIN 
			PRINT 'A transaction needs to be rolled back' 
			ROLLBACK TRANSACTION REGISTRAR_DEPOSITO_V
			END 
	GO

	EXECUTE REGISTRAR_DEPOSITO_VENTANILLA '001',10

	SELECT * FROM ClientesBanca;
	SELECT * FROM Realizan;