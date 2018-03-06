BULK INSERT a1207504.a1207504.[Materiales]
   FROM 'e:\wwwroot\a1207504\materiales.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT a1207504.a1207504.[Proveedores]
   FROM 'e:\wwwroot\a1207504\proveedores.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

	  
BULK INSERT a1207504.a1207504.[Proyectos]
   FROM 'e:\wwwroot\a1207504\proyectos.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

	  
SET DATEFORMAT dmy
BULK INSERT a1207504.a1207504.[Entregan]
   FROM 'e:\wwwroot\a1207504\entregan.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
		 
      )