<?php include("partials/_header.html"); ?>
        
        <section class="hero">
            <div class="wrapper">
                <header><h1>Laboratorio 9 Problemas</h1></header>
                </div>
        </section>
        <section class="main">
            <form action= "arreglo.php" method="get" class="wrapper">
                <header><h3>Arreglo</h3></header>
                <label for="n1">Número 1</label>
                <input type="number" name="n1" id="n1" value=0>
                <br>
                <label for="n2">Número 2</label>
                <input type="number" name="n2" id="n2" value=0>
                <br>
                <label for="n3">Número 3</label>
                <input type="number" name="n3" id="n3" value=0>
                <br>
                <label for="n4">Número 4</label>
                <input type="number" name="n4" id="n4" value=0>
                <br>
                <label for="n5">Número 5</label>
                <input type="number" name="n5" id="n5" value=0>
                <br>
                <label for="n6">Número 6</label>
                <input type="number" name="n6" id="n6" value=0>
                <br>
                <label for="n7">Número 7</label>
                <input type="number" name="n7" id="n7" value=0>
                <br>
                <label for="n8">Número 8</label>
                <input type="number" name="n8" id="n8" value=0>
                <br>
                <label for="n9">Número 9</label>
                <input type="number" name="n9" id="n9" value=0>
                <br>
                <label for="n10">Número 10</label>
                <input type="number" name="n10" id="n10" value=0>
                <br>
                <label for="probl">Problema a resolver</label>
                <select name="probl">
                    <option value="probl1">Problema 1</option>
                    <option value="probl2">Problema 2</option>
                    <option value="probl3">Problema 3</option>
                </select>
                <input type="submit">
            </form>
            <form action="potencias.php" method="get" class="wrapper">
                <header><h3>Cuadrados y cubos</h3></header>
                <label for="pot">Números a tabular</label>
                <input type="number" value=0 name="pot" id="pot">
                <br>
                <input type="submit">
            </form>
            <article class="wrapper">
                <header><h3>Preguntas a responder</h3></header>
                <p><strong>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.</strong> Outputs a large amount of information about the current state of PHP. This includes information about PHP compilation options and extensions, the PHP version, server information and environment (if compiled as a module), the PHP environment, OS version information, paths, master and local values of configuration options, HTTP headers, and the PHP License.[1]</p>
            
                <p><strong>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?</strong> Cambiar el archivo php.ini-development por php.ini-production, para que inicie con la configuración de ambiente producción.[4]</p>
                
                <p><strong>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.</strong> Se ejecuta un archivo php que devuelve un archivo html para que lo visualice el cliente. </p>
            </article>
             <article class="wrapper">
                <header><h3>Referencias</h3></header>
                <ol>
                    <li> http://php.net/manual/en/function.phpinfo.php</li>
                    <li> http://php.net/manual/en/function.ini-get.php</li>
                    <li> http://php.net/manual/en/function.get-loaded-extensions.php</li>
                    <li> http://php.net/manual/en/migration53.ini.php</li>
                </ol>
            </article>
        </section>
<?php include("partials/_footer.html"); ?> 