set dateformat dmy
SELECT *
FROM Materiales M, Entregan E
WHERE M.Clave=E.Clave
ORDER BY M.Clave

/*
Razon social y denominacion de proyecto en donde
se hayan entregado materiales con un costo mayor a 500 y 
se hayan entregado mas de 20 unidades
*/
SELECT razonsocial, denominacion, sum(cantidad) as 'Total unidades'
FROM Materiales M, Entregan E,proyectos p, proveedores pr
WHERE M.Clave=E.Clave and pr.rfc=e.rfc and p.numero=e.numero and m.costo>500
group by razonsocial,Denominacion
having sum(e.cantidad)>20

/*
El RFC de los proveedores que entregaron alguna pintura a proyectos relizados
el presente año
*/
Select rfc
from entregan e, materiales m
where e.clave=m.clave
and descripcion like '%pintura%'
and fecha between '01/01/2018' and getdate()