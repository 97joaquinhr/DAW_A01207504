set dateformat dmy
select sum(cantidad)  as 'Cantidad total', sum((m.Costo+m.Costo*m.PorcentajeImpuesto/100)*cantidad) as 'Importe total'
from materiales m, entregan e
where e.clave=m.clave and e.fecha between '01/01/1997' and '31/12/1997'
---no hay group by porque solo es un resultado
---el costo total es el costo mas el el porcentaje de impuesto

select p.razonsocial, count(e.rfc) as 'numero de entregas', 
sum((m.Costo+m.Costo*m.PorcentajeImpuesto/100)*cantidad) as 'Importe total'
from materiales m, entregan e, proveedores p
where e.clave=m.clave and p.rfc =e.rfc
group by p.razonsocial
---no creo que este bien

select m.clave, m.descripcion, sum(cantidad) as 'cantidad total', min(cantidad) as 'minimo',
max(cantidad) as 'max', (m.Costo+m.Costo*m.PorcentajeImpuesto/100)*sum(cantidad) as 'importe total'
from materiales m, entregan e
where m.Clave=e.Clave
group by m.clave, m.Descripcion,m.Costo,m.PorcentajeImpuesto
having avg(cantidad)>400

select p.razonsocial,m.Clave,m.descripcion, AVG(cantidad) as 'cantidad promedio'
from Proveedores p, Entregan e,Materiales m
where e.RFC=p.RFC and m.Clave=e.Clave
group by p.RazonSocial,m.Clave,m.descripcion
having AVG(cantidad)<500

select p.razonsocial,m.Clave,m.descripcion, AVG(cantidad) as 'cantidad promedio'
from Proveedores p, Entregan e,Materiales m
where e.RFC=p.RFC and m.Clave=e.Clave
group by p.RazonSocial,m.Clave,m.descripcion
having AVG(cantidad)<370 or AVG(cantidad)>450
order by 'cantidad promedio'

select * from Materiales

insert into Materiales values('1440','Tornillo 1','20','1')
insert into Materiales values('1450','Tornillo 2','21','1.1')
insert into Materiales values('1460','Tornillo 3','22','1.2')
insert into Materiales values('1470','Tornillo 4','23','1.3')
insert into Materiales values('1480','Tornillo 5','24','1.4')

select clave, descripcion
from materiales
where clave not in(select clave from entregan)

select distinct p.razonsocial
from Proveedores p, entregan e, Proyectos pr
where e.RFC=p.RFC  and pr.Numero=e.Numero and pr.Denominacion='Vamos Mexico'
and p.RazonSocial in (select p.razonsocial
from Proveedores p, entregan e, Proyectos pr
where e.RFC=p.RFC and pr.Numero=e.Numero and pr.Denominacion='Queretaro Limpio')

select descripcion
from materiales
where clave not in (select clave from entregan e, Proyectos p
					where p.Numero=e.Numero and p.Denominacion='CIT Yucatan')

select razonsocial, AVG(cantidad) as 'cantidad promedio'
from Proveedores p, Entregan e
where e.RFC=p.RFC
group by RazonSocial
having AVG(cantidad) > (select AVG(cantidad) from entregan
						where RFC='VAGO780901')
--- no existe ese rfc

set dateformat dmy
select p.rfc, razonsocial
from Proveedores p, entregan e, Proyectos pr
where e.RFC= p.RFC and pr.Numero=e.Numero
and pr.Denominacion='Infonavit Durango' and fecha between
'01/01/2000' and '31/12/2000'
group by p.RFC, razonsocial
having sum(cantidad)>(select sum(cantidad) from Proveedores p, entregan e, Proyectos pr
						where e.RFC= p.RFC and pr.Numero=e.Numero
						and pr.Denominacion='Infonavit Durango' and fecha between
						'01/01/2001' and '31/12/2001')
---solo hay un proveedor en cada año y el proveedor del 2001 entregó más