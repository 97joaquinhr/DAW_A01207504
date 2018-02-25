IF EXISTS 
(SELECT * 
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_NAME = 'Materiales')
drop table Materiales
CREATE TABLE Materiales
(
  Clave numeric(5) not null,
  Descripcion varchar(50),
  Costo numeric(8,2)
)

IF EXISTS 
(SELECT * 
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_NAME = 'Proveedores')
drop table Proveedores
CREATE TABLE Proveedores
(
  RFC char(13) NOT NULL,
  RazonSocial varchar(50)
)

IF EXISTS 
(SELECT * 
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_NAME = 'Proyectos')
drop table Proyectos
CREATE TABLE Proyectos
(
  Numero numeric(5) not null,
  Denominacion varchar(50)
)

IF EXISTS 
(SELECT * 
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_NAME = 'Entregan')
drop table Entregan
CREATE TABLE Entregan
(
  Clave numeric(5) NOT NULL,
  RFC char(13) NOT NULL,
  Numero numeric(5) NOT NULL,
  Fecha datetime NOT NULL,
  Cantidad numeric(8,2)
)
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

INSERT INTO Materiales values(1000,'xxx',1000)
Select * from Materiales
Delete from Materiales where Clave = 1000 and Costo = 1000 
ALTER TABLE Materiales alter column Clave int NOT NULL --habia error hasta esto
ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave) 
INSERT INTO Materiales values(1000, 'xxx', 1000) 
sp_helpconstraint entregan 

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero) 

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC) 

ALTER TABLE Entregan drop constraint llaveEntregan
ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave,RFC,Numero,Fecha) 

Select * from Materiales
Select * from Proveedores
Select * from Proyectos
Select * from Entregan

INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0) ; 
Delete from Entregan where Clave = 0 

ALTER TABLE entregan add constraint cfentreganclave 
 foreign key (clave) references materiales(clave); 

 ALTER TABLE entregan add constraint cfentreganrfc 
 foreign key (rfc) references proveedores(rfc); 

 ALTER TABLE entregan add constraint cfentregannumero
 foreign key (numero) references proyectos(numero); 

 sp_helpconstraint proyectos 

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0); 

ALTER TABLE entregan add constraint cantidad check (cantidad > 0) ;