set dateformat dmy
select sum(cantidad)  as 'Cantidad total', sum((m.Costo+m.Costo*m.PorcentajeImpuesto/100)*cantidad) as 'Importe total'
from materiales m, entregan e
where e.clave=m.clave and e.fecha between '01/01/1997' and '31/12/1997'
---no hay group by porque solo es un resultado


select p.razonsocial, count(e.rfc) as 'numero de entregas', sum((m.Costo+m.Costo*m.PorcentajeImpuesto/100)*cantidad) as 'Importe total'
from materiales m, entregan e, proveedores p
where e.clave=m.clave and p.rfc =e.rfc
group by p.razonsocial
---no creo que este bien

