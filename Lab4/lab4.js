let n=prompt("Escribe un número a tabular: ");
document.write("<br><b>Ejercicio 1</b><br>");
document.write("<table>\
                <tr>\
                <th>Numero</th>\
                <th>Cuadrado</th>\
                <th>Cubo</th>\
                </tr>");
for(let i=1;i<=n;i++){
    document.write("<tr>\
                    <td>");
    document.write(i);
    document.write("</td>\
                    <td>");
    document.write(i*i);
    document.write("</td>\
                    <td>");
    document.write(i*i*i);
    document.write("</td>\
                    </tr>");
}
document.write("</table>");