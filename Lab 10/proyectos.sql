BULK INSERT a1702980.a1702980.[Proyectos]
	FROM  'e:\wwwroot\a1702980\proyectos.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	)

SELECT  * FROM Proyectos