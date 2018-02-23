<?php include("../Lab9/partials/_header.html"); ?>
        
        <section class="hero">
            <div class="wrapper">
                <header><h1>Laboratorio 11</h1></header>
                </div>
        </section>
        <section class="main">
            <article class="wrapper">
                



                <header><h3>Preguntas a responder</h3></header>
                <p><strong>¿Por qué es una buena práctica separar el controlador de la vista?</strong> Debido a que es un patrón de diseño de software verdaderamente probado que convierte una aplicación en un paquete modular fácil de mantener y mejora la rapidez del desarrollo. La separación de las tareas de tu aplicación en modelos, vistas y controladores hace que su aplicación sea además muy ligeras de entender. Las nuevas características se añaden fácilmente y agregar cosas nuevas a código viejo se hace muy sencillo. El diseño modular también permite a los desarrolladores y los diseñadores trabajar simultáneamente, incluyendo la capacidad de hacer prototipos rápidos.[1]</p>
            
                <p><strong>Aparte de los arreglos $_POST y $_GET, ¿qué otros arreglos están predefinidos en php y cuál es su función?</strong></p>
                <ul>
                    <li>$_REQUEST — HTTP Request variables</li>
                    <li>$_SESSION — Session variables</li>
                    <li>$_COOKIE — HTTP Cookies[2]</li>
                </ul>
                
                <p><strong>Explora las funciones de php, y describe 2 que no hayas visto en otro lenguaje y que llamen tu atención.</strong></p>
                <ul>
                    <li>The password hashing API provides an easy to use wrapper around crypt() to make it easy to create and manage passwords in a secure manner.[3]</li>
                    <li>ZipArchive::addFile — Adds a file to a ZIP archive from the given path[4]</li>
                </ul>
                <p><strong>¿Qué es XSS y cómo se puede prevenir?</strong> XSS stands for cross-site scripting and it refers to a type of attack where a hacker injects malicious client-side code into the output of your page. Applications that don’t escape their output are vulnerable to this type of attack. You prevent XSS attacks by escaping your output using htmlspecialchars() or htmlentities(). Both PHP functions convert problematic characters into HTML entities causing the injected code to be output harmlessly and not rendered.[5]</p>
            </article>
             <article class="wrapper">
                <header><h3>Referencias</h3></header>
                <ol>
                    <li> https://book.cakephp.org/2.0/es/cakephp-overview/understanding-model-view-controller.html</li>
                    <li>http://php.net/manual/en/reserved.variables.php</li>
                    <li>http://php.net/manual/en/intro.password.php</li>
                    <li>http://php.net/manual/en/ziparchive.addfile.php</li>
                    <li> https://medium.com/@jpmorris/how-to-prevent-xss-attacks-by-escaping-output-in-php-942204bf184</li>
                </ol>
            </article>
        </section>
<?php include("../Lab9/partials/_footer.html"); ?> 