let ejer1=prompt("Ejercicio 1\nEscribe un número: ");
document.write("<br><b>Ejercicio 1</b><br>");
document.write("<table>\
                <tr>\
                <th>Numero</th>\
                <th>Cuadrado</th>\
                <th>Cubo</th>\
                </tr>");
for(let i=1;i<=ejer1;i++){
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
let x1=Math.floor(Math.random()*500);
let x2=Math.floor(Math.random()*500);
let start=new Date();
let ejer2="Ejercicio 2\nEscribe la suma de los siguientes numeros:"+x1+"+"+x2;
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
let size= prompt("Ejercicio 3\n¿De qué tamaño sera el arreglo?");
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
    let sizeR= prompt("Ejercicio 4\n¿Cuántos renglones tendrá la matriz?");
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
    let ejer5=prompt("Ejercicio 5\nEscribe un número a invertir: ");
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

document.write("<br><b>Ejercicio 6</b><br>\
                <p>Problema tipo ACM: <a href=\&quothttps://uva.onlinejudge.org/external/6/679.pdf\&quot>https://uva.onlinejudge.org/external/6/679.pdf</a></p>");
let t,n,x,cont=0;
t=prompt("Ejercicio 6\n¿Cuántos casos habrán?");
while(t>0){
    alert("Caso "+(cont+1));
    n=prompt("¿Cuál es la profundidad máxima del caso?");
    x=prompt("¿Cuál número es la pelota?");
    document.write("Caso "+(cont+1)+"<br>");
    let c=Math.pow(2,n-1);
    if(x==1){
        alert(c);
        document.write(c);
    }
    else if(x==c){
        let res=Math.pow(2,n)-1;
        alert(res);
        document.write("profundidad: "+n+" pelota numero: "+x+" stop position: "+res+"<br>");
    }
    else{
        let res=1,i;
        for(i=0;i<n-1;i++){
            if(x%2==0){
                res=res*2+1;
                x/=2;
            }
            else{
                res=res*2;
                x=(x+1)/2;
            }
        }
        alert(res);
        document.write("profundidad: "+n+" pelota numero: "+x+" stop position: "+res+"<br>");
    }
    t--;
    cont++;
}


