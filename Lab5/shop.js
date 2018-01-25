function actualizarPrecio1(){
    let prod=Number(document.getElementById("num1").innerHTML.substr(10,document.getElementById("num1").innerHTML.length));
    let cost=Number(document.getElementById("precio1").innerHTML.substr(9,document.getElementById("precio1").innerHTML.length));
    let precio=Number(document.getElementById("total").innerHTML.substr(8,document.getElementById("total").innerHTML.length));
    if(prod<100){
        prod++;
        document.getElementById("num1").innerHTML="Cantidad: "+prod;
        precio=precio+cost;
     document.getElementById("total").innerHTML="Total: $"+precio;
        document.getElementById("iva").innerHTML="IVA: $"+(precio*0.15);
    }
}
document.getElementById("agregar1").onclick=actualizarPrecio1;
function actualizarPrecio2(){
    let prod=Number(document.getElementById("num2").innerHTML.substr(10,document.getElementById("num2").innerHTML.length));
    let cost=Number(document.getElementById("precio2").innerHTML.substr(9,document.getElementById("precio2").innerHTML.length));
    let precio=Number(document.getElementById("total").innerHTML.substr(8,document.getElementById("total").innerHTML.length));
    if(prod<100){
        prod++;
        document.getElementById("num2").innerHTML="Cantidad: "+prod;
        precio=precio+cost;
     document.getElementById("total").innerHTML="Total: $"+precio;
        document.getElementById("iva").innerHTML="IVA: $"+(precio*0.15);
    }
}
document.getElementById("agregar2").onclick=actualizarPrecio2;
function actualizarPrecio3(){
    let prod=Number(document.getElementById("num3").innerHTML.substr(10,document.getElementById("num3").innerHTML.length));
    let cost=Number(document.getElementById("precio3").innerHTML.substr(9,document.getElementById("precio3").innerHTML.length));
    let precio=Number(document.getElementById("total").innerHTML.substr(8,document.getElementById("total").innerHTML.length));
    if(prod<100){
        prod++;
        document.getElementById("num3").innerHTML="Cantidad: "+prod;
        precio=precio+cost;
     document.getElementById("total").innerHTML="Total: $"+precio;
        document.getElementById("iva").innerHTML="IVA: $"+(precio*0.15);
    }
}
document.getElementById("agregar3").onclick=actualizarPrecio3;