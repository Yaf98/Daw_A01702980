SET DATEFORMAT dmy
BULK INSERT a1702980.a1702980.[Entregan]
	FROM  'e:\wwwroot\a1702980\entregan.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	)

SELECT  * FROM Entregan