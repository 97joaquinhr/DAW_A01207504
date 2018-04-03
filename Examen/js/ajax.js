function getRequestObject() {
    // Asynchronous objec created, handles browser DOM differences

    if(window.XMLHttpRequest) {
        // Mozilla, Opera, Safari, Chrome IE 7+
        return (new XMLHttpRequest());
    }
    else if (window.ActiveXObject) {
        // IE 6-
        return (new ActiveXObject("Microsoft.XMLHTTP"));
    } else {
        // Non AJAX browsers
        return(null);
    }
}

// function display(){
//     $jquery=1;//ya con jquery
//     if (jQuery==1){
//         $.get('ajax.php')
//             .done(function (data) {
//                 var ajaxResponse=document.getElementById('ajaxResponse');
//                 ajaxResponse.innerHTML=request.responseText;
//                 ajaxResponse.style.visibility="visible";

//             });
//     }


// }
function display() {
    var request = new XMLHttpRequest();
    request.open('GET', 'ajax.php',false);
    request.onreadystatechange =
        function () {
            if((request.readyState==4)){
                // Asynchronous response has arrived
                var ajsaxResponse=document.getElementById('ajaxResponse');
                ajaxResponse.innerHTML=request.responseText;
                ajaxResponse.style.visibility="visible";
            }
        };
        request.send(null);
}
