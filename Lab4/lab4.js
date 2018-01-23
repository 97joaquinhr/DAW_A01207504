let n=prompt("Escribe un número: ");
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

document.write("<br><b>Ejercicio 2</b><br>");
let x1=Math.floor(Math.random()*1000);
let x2=Math.floor(Math.random()*1000);
let start=new Date();
let ejer2="Escribe la suma de los siguientes numeros:"+x1+"+"+x2;
let resp=prompt(ejer2);
let end=new Date();
let tiempo=end-start;

if(resp==x1+x2){
    alert("Respuesta correcta en "+tiempo+" milisegundos");
}
else{
    alert("Respuesta incorrecta en "+tiempo+" milisegundos");
}
document.write("Suma de "+x1+"+"+x2+" en "+tiempo+" milisegundos");

document.write("<br><b>Ejercicio 3</b><br>");
let size= prompt("¿De qué tamaño sera el arreglo?");
let ejer3=[];
for(let i=0;i<size;i++){
    let aux=prompt("Dame el número "+(i+1));
    ejer3.push(aux);
}
document.write("Arreglo: <br>")
let neg=0;
let ceros=0;
let pos=0;
for(i=0;i<size;i++){
    document.write(ejer3[i]+" ");
    if(Number(ejer3[i])<0){
        neg+=1;}
    else if(Number(ejer3[i])==0){
        ceros+=1;}
    else{
        pos+=1;}
}
document.write("<br>"+neg+" negativos "+pos+" positivos "+ceros+" ceros");

document.write("<br><b>Ejercicio 4</b><br>");
function prom(){
    let sizeR= prompt("¿Cuántos renglones tendrá la matriz?");
    let sizeC= prompt("¿Cuántas columnas tendrá la matriz?");
    let suma=0;
    for(let i=0;i<sizeR;i++){
        document.write("Renglón "+(i+1)+": ");
        for(let j=0;j<sizeC;j++){
            let aux=prompt("Dame el número "+(j+1)+" del renglón "+(i+1));
            suma+=Number(aux);
            document.write(aux+" ");
        }
        document.write("<br>Promedio  = "+((suma/sizeC).toFixed(2))+"<br>");
        suma=0;
        aux=0;
    }
}
prom();

document.write("<br><b>Ejercicio 5</b><br>");
function inv(){
    let ejer5=prompt("Escribe un número a invertir: ");
    document.write("<br> Número dado: "+ejer5);
    let resp=0;
    while(ejer5>0){
        resp*=10;
        resp+=(ejer5%10);
        ejer5=Math.floor(ejer5/10);
    }
    document.write("<br> Número invertido: "+resp);
}
inv();


