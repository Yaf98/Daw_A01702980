BULK INSERT a1702980.a1702980.[Proveedores]
	FROM  'e:\wwwroot\a1702980\proveedores.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	)

SELECT  * FROM Proveedores