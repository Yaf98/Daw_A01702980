BULK INSERT a1702980.a1702980.[Materiales]
	FROM  'e:\wwwroot\a1702980\materiales.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	)

SELECT  * FROM Materiales