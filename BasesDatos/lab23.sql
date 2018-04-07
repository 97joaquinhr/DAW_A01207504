drop table Clientes_Banca
drop table Tipos_Movimiento
drop table Movimientos

CREATE TABLE Clientes_Banca
(
	NoCuenta varchar(5) Not null,
	Nombre varchar(30),
	Saldo numeric(10,2)
)