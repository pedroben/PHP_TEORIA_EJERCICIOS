<html>
    <head>
        <title>Online PHP Script Execution</title>
    </head>
    <body>

        <h1>APUNTES</h1>

        <h2>MATRICES</h2>

        <h2 id="for">Crear una matriz</h2>
        <p>Una matriz se puede crear definiendo algún valor de la matriz</p>
        <?php
        $matriz[5] = 25;
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>o utilizando la función <a href="http://www.php.net/manual/es/function.array.php"><span class="php-fun">array($indice =&gt; $valor, ...)</span></a>:</p>
        <?php
        $matriz = array(5 => 25);
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Las matrices en PHP son matrices asociativas, es decir, que los índices no
            tienen por qué ser números enteros positivos:</p>
        <?php
        $matriz[5] = 25;
        $matriz[-1] = "negativo";
        $matriz["número 1"] = "cinco";

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Las matrices en PHP pueden ser multidimensionales:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz["letras"][1] = "letra A";

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <?php
        $matriz = array(5 => array(3 => 25), "letras" => array(1 => "letra A"));

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <h2>Imprimir todos los valores de una matriz: la función print_r()</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.print-r.php"><span class="php-fun">print_r($variable [, $devolver])</span></a> escribe la variable
            $variable de forma legible, incluso aunque se trate de una matriz. </p>

        <p>Aunque print_r() genera espacios y saltos de línea que pueden verse en el
            código fuente de la página, print_r() no genera etiquetas html, por lo que el
            navegador no muestra esos espacios y saltos de línea.</p>

        <?php
        $matriz = array("nombre" => "Pepito", "apellidos" => "Conejo");
        print_r($matriz);
        ?>

        <p>Para mejorar la legibilidad una solución es añadir la etiqueta <span class="html-eti">&lt;pre&gt;</span>, que fuerza al navegador a mostrar los
            espacios y saltos de línea.</p>
        <?php
        $matriz = array("nombre" => "Pepito", "apellidos" => "Conejo");
        print '<pre>';
        print_r($matriz);
        print '</pre>\n';
        ?>

        <h2 id="Borrar">Borrar una matriz o elementos de una matriz</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.unset.php"><span class="php-fun">unset()</span></a> permite borrar una matriz o elementos de una
            matriz .</p>
        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";

        unset($matriz[5]);

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>
        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";

        unset($matriz);

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <h2 id="Contar">Contar elementos de una matriz</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.count.php"><span class="php-fun">count($matriz)</span></a> permite contar los elementos de una
            matriz.</p>
        <?php
        $matriz[3] = 25;
        $matriz[4] = 30;
        $matriz[5] = 35;
        $matriz["letra"] = "letra A";

        $elementos = count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>En una matriz multidimensional, la función <span class="php-fun"><span class="php-fun">count($matriz)</span></span> devolvería simplemente el número
            de elementos del primer índice:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Para contar todos los elementos de una matriz multidimensional, habría que
            utilizar la función <span class="php-fun"><span class="php-fun">count($matriz,
                    COUNT_RECURSIVE)</span></span>.</p>

        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz, COUNT_RECURSIVE);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>


        <p>Es importante fijarse en que en este caso la función <span class="php-fun"><span class="php-fun">count()</span></span> está contando
            también las dos matrices fila. Si quisieramos contar únicamente los elementos
            de una matriz bidimensional habría que restar el número de matrices fila:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz, COUNT_RECURSIVE) - count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>


        <h2 id="Encontrar">Máximo y mínimo</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.max.php"><span class="php-fun">max($matriz, ...)</span></a> devuelve el valor máximo de una
            matriz (o varias). La función <a href="http://www.php.net/manual/es/function.min.php"><span class="php-fun">min($matriz, ...)</span></a> devuelve el valor mínimo de una
            matriz (o varias). </p>
        <?php
        $valores = array(10, 40, 15, -1);
        $maximo = max($valores);
        $minimo = min($valores);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        print "<p>El máximo de la matriz es $maximo.</p>\n";
        print "<p>El mínimo de la matriz es $minimo.</p>\n";
        ?>

        <p>Los valores no numéricos se tratan como 0, pero si 0 es el mínimo o el
            máximo, la función devuelve la cadena.</p>
        <?php
        $valores = array(10, 40, 15, 'abc');
        $maximo = max($valores);
        $minimo = min($valores);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        print "<p>El máximo de la matriz es $maximo.</p>\n";
        print "<p>El mínimo de la matriz es $minimo.</p>\n";
        ?>


        <h2 id="Encontrar1">Encontrar un valor en una matriz</h2>
        <p>La función booleana <a href="http://www.php.net/manual/es/function.in-array.php"><span class="php-fun">in_array($elemento, $matriz[, $tipo])</span></a> devuelve <span class="php-con">true</span> si el elemento se encuentra en la matriz. Si el
            argumento booleano <span class="php-var">$tipo</span> es <span class="php-con">true</span>, <span class="php-fun"><span class="php-fun">in_array()</span></span> comprueba además que los tipos
            coincidan.</p>
        <?php
        $valores = array(10, 40, 15, -1);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        if (in_array(15, $valores)) {
        print "<p>15 está en la matriz \$valores.</p>\n";
        }
        if (!in_array(25, $valores)) {
        print "<p>25 no está en la matriz \$valores.</p>\n";
        }
        if (!in_array("15", $valores, true)) {
        print "<p>\"15\" no está en la matriz \$valores.</p>\n";
        }
        ?>

        <?php
//RECORRIDO DE UN ARRAY UNIDIMENSIONAL ESCALAR (INDEXADO). 
//1.- RECORRIDO DE UN ARRAY SIMPLE MEDIANTE USO DE VARIABLES. 
        $productos = array("MESA", "SILLA", "FLEXO", "ESTANTERIA");
        echo "<br\>";
        echo "$productos[0]<br \>";
        echo "$productos[1]<br \>";
        echo "$productos[2]<br \>";
        echo "$productos[3]<br \>";
        echo "<br>";
        echo "<br \>";





//2.-RECORRIDO DE UN ARRAY CON FOR, CONOCIENDO EL NÚMERO DE 
        //      ELEMENTOS A PRIORI Y SIN CONOCER.
        for ($i = 0;
        $i <= 3;
        $i++)
        echo "$productos[$i] <br \>";
        echo "<br>";
        for ($i = 0;
        $i < count($productos);
        $i++)
        echo "$productos[$i] <br \>";
        echo "<br \>";




//3. RECORRIDO DE UN ARRAY CON EL BUCLE WHILE. 
        reset($productos);
        while (list($clave, $valor) = each($productos))
        echo "Clave: $clave; Valor: $valor<br \>\n";




//4.RECORRIDO DE UN ARRAY CON FOREACH 
        foreach ($productos as $clave => $valor)
        echo "Clave: $clave; Valor: $valor<br \>\n";
        echo "<br>";
        ?> 


















        <?php
        //BASES DE DATOS
        //PDO
        //CONEXXION CON LA BASE DE DATOS
        //CONEXION CON MYSQL
        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
        function conectaDb() {
        try {
        $db = new PDO("mysql:host=localhost", "root", "");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//      print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();

        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS SQLITE
        function conectaDb() {
        try {
        $db = new PDO("sqlite:/tmp/mclibre_baseDeDatos.sqlite");
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//      print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();



        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL O CON SQLITE

        define("MYSQL", "MySQL");
        define("SQLITE", "SQLite");
        $dbMotor = SQLITE;                                // Base de datos empleada
        if ($dbMotor == MYSQL) {
        define("MYSQL_HOST", "mysql:host=localhost"); // Nombre de host MYSQL
        define("MYSQL_USUARIO", "root");              // Nombre de usuario de MySQL 
        define("MYSQL_PASSWORD", "");                 // Contraseña de usuario de MySQL
        $dbDb = "mclibre_baseDeDatos";             // Nombre de la base de datos
        $dbTabla = $dbDb . ".tabla";                  // Nombre de la tabla
        } elseif ($dbMotor == SQLITE) {
        $dbDb = "/tmp/mclibre_baseDeDatos.sqlite"; // Nombre de la base de datos
        $dbTabla = "tabla";                           // Nombre de la tabla
        }

        function conectaDb() {
        global $dbMotor, $dbDb;

        try {
        if ($dbMotor == MYSQL) {
        $db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } elseif ($dbMotor == SQLITE) {
        $db = new PDO("sqlite:" . $dbDb);
        }
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//        print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();



//Desconexión con la base de datos
        $db = null;


        //Consultas a la base de datos
        // EJEMPLO DE CONSULTA DE INSERCIÓN DE REGISTRO
        $db = conectaDb();
        $consulta = "INSERT INTO $dbTabla 
    (nombre, apellidos)
    VALUES ("$nombre", "$apellidos")";
        if ($db->query($consulta)) {
        print "<p>Registro creado correctamente.</p>\n";
        } else {
        print "<p>Error al crear el registro.<p>\n";
        }
        $db = null;

// EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTRO$db = conectaDb();

        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        foreach ($result as $valor) {
        print "<p>$valor[nombre] $valor[apellidos]</p>\n";
        }
        }



        // En dos líneas
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);

// En una sola línea
        $result = $db->query("SELECT * FROM $dbTabla");


        //SEGURIDAD EN LAS CONSULTAS: CONSULTAS PREPARADAS
        // En tres líneas
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->prepare($consulta);
        $result->execute();

// En dos líneas
        $result = $db->prepare("SELECT * FROM $dbTabla");
        $result->execute();


        // EJEMPLO DE CONSULTA DE CREACIÓN DE BASE DE DATOS
        $db = conectaDb();
        $consulta = "CREATE DATABASE $dbDb";
        if ($db->query($consulta)) {
        print "<p>Base de datos creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la base de datos.</p>\n";
        }
        $db = null;



// EJEMPLO DE CONSULTA DE BORRADO DE BASE DE DATOS
        $db = conectaDb();
        $consulta = "DROP DATABASE $dbDb";
        if ($db->query($consulta)) {
        print "<p>Base de datos borrada correctamente.</p>\n";
        } else {
        print "<p>Error al borrar la base de datos.</p>\n";
        }
        $db = null;



        // EJEJMPLO DE CONSULTA DE CREACIÓN DE TABLA EN MYSQL
        $db = conectaDb();
        $consulta = "CREATE TABLE $dbTabla (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR($tamNombre),
    apellidos VARCHAR($tamApellidos),
    PRIMARY KEY(id)
    )";
        if ($db->query($consulta)) {
        print "<p>Tabla creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la tabla.</p>\n";
        }
        $db = null;


        // EJEMPLO DE CONSULTA DE CREACIÓN DE TABLA EN SQLite
        $db = conectaDb();
        $consulta = "CREATE TABLE $dbTabla (
    id INTEGER PRIMARY KEY,
    nombre VARCHAR($tamNombre),
    apellidos VARCHAR($tamApellidos)
    )";
        if ($db->query($consulta)) {
        print "<p>Tabla creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la tabla.</p>\n";
        }
        $db = null;





        // EJEMPLO DE CONSULTA DE BORRADO DE TABLA
        $db = conectaDb();
        $consulta = "DROP TABLE $dbTabla";
        if ($db->query($consulta)) {
        print "<p>Tabla borrada correctamente.</p>\n";
        } else {
        print "<p>Error al borrar la tabla.</p>\n";
        }
        $db = null;



        // EJEMPLO DE CONSULTA DE INSERCIÓN DE REGISTRO
        $db = conectaDb();

        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");

        $consulta = "INSERT INTO $dbTabla 
    (nombre, apellidos)
    VALUES (:nombre, :apellidos)";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos))) {
        print "<p>Registro creado correctamente.</p>\n";
        } else {
        print "<p>Error al crear el registro.</p>\n";
        }

        $db = null;



        // EJEMPLO DE CONSULTA DE MODIFICACIÓN DE REGISTRO
        $db = conectaDb();

        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");
        $id = recoge("id");

        $consulta = "UPDATE $dbTabla 
    SET nombre=:nombre, apellidos=:apellidos 
    WHERE id=:id";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id))) {
        print "<p>Registro modificado correctamente.</p>\n";
        } else {
        print "<p>Error al modificar el registro.</p>\n";
        }

        $db = null;


        // EJEMPLO DE CONSULTA DE BORRADO DE REGISTRO
        $db = conectaDb();

        $id = recogeMatriz("id");

        foreach ($id as $indice => $valor) {
        $consulta = "DELETE FROM $dbTabla 
        WHERE id=:indice";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":indice" => $indice))) {
        print "<p>Registro borrado correctamente.</p>\n";
        } else {
        print "<p>Error al borrar el registro.</p>\n";
        }
        }

        $db = null;

        // EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS
        $db = conectaDb();
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        print "<p>Consulta ejecutada.</p>\n";
        }
        $db = null;

        // EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS
        $db = conectaDb();
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        foreach ($result as $valor) {
        print "<p>Nombre: $valor[nombre] - Apellidos: $valor[apellidos]</p>\n";
        }
        }
        $db = null;



//API ORIGINAL (MIRAR BASE DE DATOS WILEY 2)
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//ORIENTADO A OBJETOS
//Declaración de una clase y creación de un objeto.
//EJEMPLO 1: Confeccionar una clase llamada Persona. Definir un atributo donde se almacene su nombre.
//Luego definir dos métodos, uno que cargue el nombre y otro que lo imprima.


        class Persona {
        private $nombre;
        public function inicializar($nom)
        {
        $this->nombre = $nom;
        }
        public function imprimir()
        {
        echo $this->nombre;
        echo '<br>';
        }
        }

        $per1 = new Persona();
        $per1->inicializar('Juan');
        $per1->imprimir();
        $per2 = new Persona();
        $per2->inicializar('Ana');
        $per2->imprimir();

        //EJEMPLO 2
//Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
//Definir un método inicializar que lleguen como dato el nombre y sueldo. 
//Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar 
//impuestos (si el sueldo supera a 3000 paga impuestos)
        class Empleado {
        private $nombre;
        private $sueldo;
        public function inicializar($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function pagaImpuestos()
        {
        echo $this->nombre;
        echo '-';
        if ($this->sueldo>3000)
        echo 'Debe pagar impuestos';
        else
        echo 'No paga impuestos';
        echo '<br>';
        }
        }

        $empleado1 = new Empleado();
        $empleado1->inicializar('Luis', 2500);
        $empleado1->pagaImpuestos();
        $empleado1 = new Empleado();
        $empleado1->inicializar('Carla', 4300);
        $empleado1->pagaImpuestos();


//ATRIBUTOS DE UNA CLASE
//EJEMPLO 1: Implementar una clase que muestre una lista de hipervínculos en
// forma horizontal (básicamente un menú de opciones)
        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        public function mostrar()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.google.com', 'Google');
        $menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu1->cargarOpcion('http://www.msn.com', 'MSN');
        $menu1->mostrar();

//EJEMPLO 2: Confeccionar una clase Menu. Permitir añadir la cantidad de opciones 
//que necesitemos. Mostrar el menú en forma horizontal o vertical (según que método llamemos

        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        public function mostrarHorizontal()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        public function mostrarVertical()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "<br>";
        }
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.google.com', 'Google');
        $menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu1->cargarOpcion('http://www.msn.com', 'MSN');
        $menu1->mostrarVertical();



//METODOS DE UNA CLASE
//EJEMPLO 1: Confeccionar una clase CabeceraPagina que permita mostrar un título,
// indicarle si queremos que aparezca centrado, a derecha o izquierda
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        public function inicializar($tit, $ubi)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina();
        $cabecera->inicializar('El blog del programador', 'center');
        $cabecera->graficar();

//EJEMPLO 2: Confeccionar una clase CabeceraPagina que permita mostrar un título,
// indicarle si queremos que aparezca centrado, a derecha o izquierda, además
//  permitir definir el color de fondo y de la fuente.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function inicializar($tit, $ubi, $colorFuen, $colorFon)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina();
        $cabecera->inicializar('El blog del programador', 'center', '#FF1A00', '#CDEB8B');
        $cabecera->graficar();



//Método constructor de una clase (__construct)
//EJEMPLO 1: Confeccionar una clase CabeceraPagina que permita mostrar un título, 
//indicarle si queremos que aparezca centrada, a derecha o izquierda. Utilizar 
//un constructor para inicializar los dos atributos.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        public function __construct($tit, $ubi)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina('El blog del programador', 'center');
        $cabecera->graficar();

//EJEMPLO 2: Confeccionar una clase CabeceraPagina que permita mostrar un título, 
//indicarle si queremos que aparezca centrado, a derecha o izquierda, además permitir 
//definir el color de fondo y de la fuente. Pasar los valores que cargaran los
// atributos mediante un constructor.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function __construct($tit, $ubi, $colorFuen, $colorFon)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina('El blog del programador', 'center', '#FF1A00', '#CDEB8B');
        $cabecera->graficar();



//Llamada de métodos dentro de la clase.
//EJEMPLO 1: Confeccionar una clase Tabla que permita indicarle en el constructor 
//la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar
// un dato en una determinada fila y columna. Finalmente debe mostrar los datos
//  en una tabla HTML.
        class Tabla {
        private $mat = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor)
        {
        $this->mat[$fila][$columna] = $valor;
        }

        public function inicioTabla()
        {
        echo '<table border="1">';
        }

        public function inicioFila()
        {
        echo '<tr>';
        }

        public function mostrar($fi, $co)
        {
        echo '<td>'.$this->mat[$fi][$co].'</td>';
        }

        public function finFila()
        {
        echo '</tr>';
        }

        public function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(2, 3);
        $tabla1->cargar(1, 1, "1");
        $tabla1->cargar(1, 2, "2");
        $tabla1->cargar(1, 3, "3");
        $tabla1->cargar(2, 1, "4");
        $tabla1->cargar(2, 2, "5");
        $tabla1->cargar(2, 3, "6");
        $tabla1->graficar();

//EJEMPLO 2: Confeccionar una clase Tabla que permita indicarle en el constructor
// la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar
//  un dato en una determinada fila y columna además de definir su color de fuente
//   y fondo. Finalmente debe mostrar los datos en una tabla HTML.
        class Tabla {
        private $mat = array();
        private $colorFuente = array();
        private $colorFondo = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor, $cfue, $cfon)
        {
        $this->mat[$fila][$columna] = $valor;
        $this->colorFuente[$fila][$columna] = $cfue;
        $this->colorFondo[$fila][$columna] = $cfon;
        }

        public function inicioTabla()
        {
        echo '<table border="1">';
        }

        public function inicioFila()
        {
        echo '<tr>';
        }

        public function mostrar($fi, $co)
        {
        echo '<td style="color:'.$this->colorFuente[$fi][$co].';background-color:'.$this->colorFondo[$fi][$co].'">'.$this->mat[$fi][$co].'</td>';
        }

        public function finFila()
        {
        echo '</tr>';
        }

        public function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 3);
        $tabla1->cargar(1, 1, "titulo 1", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 2, "titulo 2", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 3, "titulo 3", "#356AA0", "#FFFF88");
        for($f = 2;
        $f<=10;
        $f++)
        {
        $tabla1->cargar($f, 1, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 2, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 3, "x", "#0000ff", "#EEEEEE");
        }
        $tabla1->graficar();

//Modificadores de acceso a atributos y métodos (public - private)
//EJEMPLO 1: Confeccionar una clase Tabla que permita indicarle en el constructor 
//la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar 
//un dato en una determinada fila y columna. Finalmente debe mostrar los datos en una tabla HTML.
//Definir los modificadores de acceso (private y public) para atributos y métodos.
        private $mat = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor)
        {
        $this->mat[$fila][$columna] = $valor;
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        echo '<td>'.$this->mat[$fi][$co].'</td>';
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(2, 3);
        $tabla1->cargar(1, 1, "1");
        $tabla1->cargar(1, 2, "2");
        $tabla1->cargar(1, 3, "3");
        $tabla1->cargar(2, 1, "4");
        $tabla1->cargar(2, 2, "5");
        $tabla1->cargar(2, 3, "6");
        $tabla1->graficar();

//EJEMPLO 2: Confeccionar una clase Menu. Permitir añadir la cantidad de opciones 
//que necesitemos. Mostrar el menú en forma horizontal o vertical, pasar a este
// método como parámetro el texto "horizontal" o "vertical". El método mostrar 
// debe llamar alguno de los dos métodos privados mostrarHorizontal() o mostrarVertical().
        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        private function mostrarHorizontal()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        private function mostrarVertical()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "<br>";
        }
        }

        public function mostrar($orientacion)
        {
        if (strtolower($orientacion)=="horizontal")
        $this->mostrarHorizontal();
        if (strtolower($orientacion)=="vertical")
        $this->mostrarVertical();
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.lanacion.com.ar', 'La Nación');
        $menu1->cargarOpcion('http://www.clarin.com.ar', 'El Clarín');
        $menu1->cargarOpcion('http://www.lavoz.com.ar', 'La Voz del Interior');
        $menu1->mostrar("horizontal");
        echo '<br>';
        $menu2 = new Menu();
        $menu2->cargarOpcion('http://www.google.com', 'Google');
        $menu2->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu2->cargarOpcion('http://www.msn.com', 'MSN');
        $menu2->mostrar("vertical");


//Colaboración de objetos.
//EJEMPLO 1: Plantear una clase Pagina que contenga como atributos objetos de las 
//clases Cabecera, Cuerpo y Pie. La clase Cabecera y Pie deben tener un atributo
// donde almacenar el texto a mostrar. La clase Cuerpo debe tener un atributo de 
// tipo vector donde se almacenen todos los párrafos.
        class Cabecera {
        private $titulo;
        public function __construct($tit)
        {
        $this->titulo = $tit;
        }
        public function graficar()
        {
        echo '<h1 style="text-align:center">'.$this->titulo.'</h1>';
        }
        }

        class Cuerpo {
        private $lineas = array();
        public function insertarParrafo($li)
        {
        $this->lineas[] = $li;
        }
        public function graficar()
        {
        for($f = 0;
        $f<count($this->lineas);
        $f++)
        {
        echo '<p>'.$this->lineas[$f].'</p>';
        }
        }
        }

        class Pie {
        private $titulo;
        public function __construct($tit)
        {
        $this->titulo = $tit;
        }
        public function graficar()
        {
        echo '<h4 style="text-align:left">'.$this->titulo.'</h4>';
        }
        }

        class Pagina {
        private $cabecera;
        private $cuerpo;
        private $pie;
        public function __construct($texto1, $texto2)
        {
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new Cuerpo();
        $this->pie = new Pie($texto2);
        }
        public function insertarCuerpo($texto)
        {
        $this->cuerpo->insertarParrafo($texto);
        }
        public function graficar()
        {
        $this->cabecera->graficar();
        $this->cuerpo->graficar();
        $this->pie->graficar();
        }
        }

        $pagina1 = new Pagina('Título de la Página', 'Pie de la página');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 1');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 2');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 3');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 4');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 5');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 6');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 7');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 8');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 9');
        $pagina1->graficar();

//EJEMPLO 2: Confeccionar la clase Tabla vista en conceptos anteriores. Plantear
        // una clase Celda que colabore con la clase Tabla. La clase Tabla debe definir 
        // una matriz de objetos de la clase Celda.
// La clase Celda debe definir los atributos: $texto, $colorFuente y $colorFondo.
        class Celda {
        private $texto;
        private $colorFuente;
        private $colorFondo;
        function __construct($tex, $cfue, $cfon)
        {
        $this->texto = $tex;
        $this->colorFuente = $cfue;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<td style="color:'.$this->colorFuente.';background-color:'.$this->colorFondo.'">'.$this->texto.'</td>';
        }
        }

        class Tabla {
        private $celdas = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor, $cfue, $cfon)
        {
        $this->celdas[$fila][$columna] = new Celda($valor, $cfue, $cfon);
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        $this->celdas[$fi][$co]->graficar();
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 3);
        $tabla1->cargar(1, 1, "titulo 1", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 2, "titulo 2", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 3, "titulo 3", "#356AA0", "#FFFF88");
        for($f = 2;
        $f<=10;
        $f++)
        {
        $tabla1->cargar($f, 1, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 2, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 3, "x", "#0000ff", "#EEEEEE");
        }
        $tabla1->graficar();

//Parámetros de tipo objeto.
//EJEMPLO 1:Plantearemos una clase Opcion y otra clase Menu. La clase Opcion
// definirá como atributos el titulo, enlace y color de fondo, los métodos a
//  implementar serán el constructor y el graficar.
//Por otro lado la clase Menú administrará un array de objetos de la clase Opcion 
//e implementará un métodos para insertar objetos de la clase Menu y otro para graficar.
// Al constructor de la clase Menu indicarle si queremos el menú en forma 'horizontal' 
// o 'vertical'.
        class Opcion {
        private $titulo;
        private $enlace;
        private $colorFondo;
        public function __construct($tit, $enl, $cfon)
        {
        $this->titulo = $tit;
        $this->enlace = $enl;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<a style="background-color:'.$this->colorFondo.'" href="'.$this->enlace.'">'.$this->titulo.'</a>';
        }
        }

        class Menu {
        private $opciones = array();
        private $direccion;
        public function __construct($dir)
        {
        $this->direccion = $dir;
        }
        public function insertar($op)
        {
        $this->opciones[] = $op;
        }

        private function graficarHorizontal()
        {
        for($f = 0;
        $f<count($this->opciones);
        $f++)
        {
        $this->opciones[$f]->graficar();
        }
        }
        private function graficarVertical()
        {
        for($f = 0;
        $f<count($this->opciones);
        $f++)
        {
        $this->opciones[$f]->graficar();
        echo '<br>';
        }
        }

        public function graficar()
        {
        if (strtolower($this->direccion)=="horizontal")
        $this->graficarHorizontal();
        else
        if (strtolower($this->direccion)=="vertical")
        $this->graficarVertical();
        }
        }

        $menu1 = new Menu('horizontal');
        $opcion1 = new Opcion('Google', 'http://www.google.com', '#C3D9FF');
        $menu1->insertar($opcion1);
        $opcion2 = new Opcion('Yahoo', 'http://www.yahoo.com', '#CDEB8B');
        $menu1->insertar($opcion2);
        $opcion3 = new Opcion('MSN', 'http://www.msn.com', '#C3D9FF');
        $menu1->insertar($opcion3);
        $menu1->graficar();

//EJEMPLO 2: Confeccionar la clase Tabla vista en conceptos anteriores. Plantear 
//una clase Celda que colabore con la clase Tabla. La clase Tabla debe definir una 
//matriz de objetos de la clase Celda.
//En la clase Tabla definir un método insertar que llegue un objeto de la clase
// Celda y además dos enteros que indiquen que posición debe tomar dicha celda en la tabla.
//La clase Celda debe definir los atributos: $texto, $colorFuente y $colorFondo.
        class Celda {
        private $texto;
        private $colorFuente;
        private $colorFondo;
        function __construct($tex, $cfue, $cfon)
        {
        $this->texto = $tex;
        $this->colorFuente = $cfue;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<td style="color:'.$this->colorFuente.';background-color:'.$this->colorFondo.'">'.$this->texto.'</td>';
        }
        }

        class Tabla {
        private $celdas = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function insertar($cel, $fila, $columna)
        {
        $this->celdas[$fila][$columna] = $cel;
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        $this->celdas[$fi][$co]->graficar();
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 2);
        $celda = new Celda('titulo 1', '#356AA0', '#FFFF88');
        $tabla1->insertar($celda, 1, 1);
        $celda = new Celda('titulo 2', '#356AA0', '#FFFF88');
        $tabla1->insertar($celda, 1, 2);
        for($f = 2;
        $f<=10;
        $f++)
        {
        $celda = new Celda('x', '#0000ff', '#eeeeee');
        $tabla1->insertar($celda, $f, 1);
        $celda = new Celda('y', '#0000ff', '#eeeeee');
        $tabla1->insertar($celda, $f, 2);
        }
        $tabla1->graficar();

//Parámetros opcionales.
//EJEMPLO 1: Codificar la clase CabeceraDePagina que nos muestre un título alineado
// con un determinado color de fuente y fondo. Definir en el constructor parámetros
//  opcionales para los colores de fuente, fondo y el alineado del título.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function __construct($tit, $ubi = 'center', $colorFuen = '#ffffff', $colorFon = '#000000')
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera1 = new CabeceraPagina('El blog del programador');
        $cabecera1->graficar();
        echo '<br>';
        $cabecera2 = new CabeceraPagina('El blog del programador', 'left');
        $cabecera2->graficar();
        echo '<br>';
        $cabecera3 = new CabeceraPagina('El blog del programador', 'right', '#ff0000');
        $cabecera3->graficar();
        echo '<br>';
        $cabecera4 = new CabeceraPagina('El blog del programador', 'right', '#ff0000', '#ffff00');
        $cabecera4->graficar();

//EJEMPLO 2: Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
//El constructor recibe como parámetros el nombre y el sueldo, en caso de no pasar
// el valor del sueldo inicializarlo con el valor 1000.
//Confeccionar otro método que imprima el nombre y el sueldo.
//Crear luego dos objetos del la clase Empleado, a uno de ellos no enviarle el sueldo.
        class Empleado {
        private $nombre;
        private $sueldo;
        public function __construct($nom, $sue = 1000)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.' - Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $empleado1 = new Empleado('Luis', 2500);
        $empleado1->imprimir();
        $empleado2 = new Empleado('Ana');
        $empleado2->imprimir();


//Herencia.
//EJEMPLO 1: Confeccionar una clase llamada Operacion que defina como atributos  
//$valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el atributo
// $valor1), cargar2 (inicializa el atributo $valor2) y por último un método que 
// muestre el contenido de $resultado.
//Luego definir dos subclases de la clase Operacion. La primera llamada Suma que 
//tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado. 
//La segunda llamada Resta que tiene por objetivo la carga de dos valores,
// restarlos y mostrar el resultado de la diferencia
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();

//EJEMPLO 2: Confeccionar una clase Persona que tenga como atributos el nombre y 
//la edad. Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir n 
//atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear 
//un objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();



//Modificadores de acceso a atributos y métodos (protected)
//
//
//Confeccionar una clase llamada Operacion que defina como atributos $valor1, 
//$valor2, $resultado y defina como métodos cargar1 (inicializa el atributo $valor1),
// cargar2 (inicializa el atributo $valor2) y por último un método que muestre el contenido de $resultado
//Luego definir la clase Suma que tiene por objetivo la carga de dos valores, 
//sumarlos y mostrar el resultado.
//Tratar de asignarle el valor 10 al atributo $valor1 en donde definimos un objeto.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->valor1 = 10;
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();


//Confeccionar una clase Persona que tenga como atributos protegidos, el nombre
// y la edad. Definir como responsabilidades un método que cargue los datos personales 
// y otro que los imprima.
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un 
//atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//Definir un objeto de la clase Empleado y tratar de modificar el atributo edad.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $empleado1 = New Empleado();
        $empleado1->edad = 34;



//13 - Sobreescritura de métodos.
//Confeccionar una clase llamada Operacion que defina como atributos $valor1, 
//$valor2, $resultado y defina como métodos cargar1 (inicializa el atributo $valor1), 
//cargar2 (inicializa el atributo $valor2) y por último un método que muestre el 
//contenido de $resultado.
//Luego definir dos subclases de la clase Operacion. La primera llamada Suma que 
//tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado
// (mostrar un título que indique que dicho resultado se trata de una suma). 
// La segunda llamada Resta que tiene por objetivo la carga de dos valores, 
// restarlos y mostrar el resultado de la diferencia (mostrar un título que 
// indique que dicho resultado se trata de una diferencia).

        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        public function imprimirResultado()
        {
        echo "La suma de $this->valor1 y $this->valor2 es:";
        parent::imprimirResultado();
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        public function imprimirResultado()
        {
        echo "La diferencia de $this->valor1 y $this->valor2 es:";
        parent::imprimirResultado();
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        $resta->imprimirResultado();

//EJEMPLO 2: Confeccionar una clase Persona que tenga como atributos el nombre y 
//la edad. Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un 
//atributo sueldo y los métodos de cargar el sueldo e imprimir todos los datos del
// empleado (sobreescribir el método imprimir de la clase Persona).
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear un 
//objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimir()
        {
        parent::imprimir();
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimir();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimir();


//14 - Sobreescritura del constructor.
//
//Implementar la clase Operacion. El constructor recibe e inicializa los atributos 
//$valor1 y $valor2. La subclase Suma añade un atributo $titulo. El constructor de 
//la clase Suma recibe los dos valores a sumar y el título.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function __construct($v1, $v2)
        {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        protected $titulo;
        public function __construct($v1, $v2, $tit)
        {
        Operacion::__construct($v1, $v2);
        $this->titulo = $tit;
        }
        public function operar()
        {
        echo $this->titulo;
        echo $this->valor1.'+'.$this->valor2.' es ';
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma(10, 10, 'Suma de valores:');
        $suma->operar();
        $suma->imprimirResultado();


//ejemplo 2: Confeccionar una clase Persona que tenga como atributos el nombre y
// la edad. El constructor recibe los datos para inicializar dichos atributos.
//  Otro método imprime los datos.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir
// un atributo sueldo. El constructor recibe los tres atributos de la clase 
// Empleado. Llamar al constructor de la clase padre para inicializar los atributos
//  nombre y edad del Empleado.
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear
// un objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function __construct($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function __construct($nom, $ed, $su)
        {
        parent::__construct($nom, $ed);
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado('Gonzalez Ana', 32, 2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();

//15 - Clases abstractas y concretas.
//Confeccionar una clase abstracta llamada Operacion que defina como atributos
// $valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el
//  atributo $valor1), cargar2 (inicializa el atributo $valor2) y por último
//   un método que muestre el contenido de $resultado.
//Luego definir dos subclases concretas de la clase Operacion. La primera 
//llamada Suma que tiene por objetivo la carga de dos valores, sumarlos y
// mostrar el resultado. La segunda llamada Resta que tiene por objetivo la 
// carga de dos valores, restarlos y mostrar el resultado de la diferencia.

        abstract class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();

//      15 - Clases abstractas y concretas.
//Confeccionar una clase abstracta Persona que tenga como atributos el nombre y
// la edad. Definir como responsabilidades un método que cargue los datos personales
//  y otro que los imprima.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un
// atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//
//Definir un objeto de la clase Persona y ver que error produce. También crear
// un objeto de la clase Empleado y llamar a sus métodos.  
        abstract class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

//Desmarcar para ver el error producido por la definición de un 
//objeto de una clase abstracta.
//$persona1=new Persona();
//$persona1->cargarDatosPersonales('Rodriguez Pablo',24);
//echo 'Datos personales de la persona:<br>';
//$persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();

// 16 - Métodos abstractos.
//Confeccionar una clase abstracta llamada Operacion que defina como atributos
// $valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el 
// atributo $valor1), cargar2 (inicializa el atributo $valor2), un método que 
// muestre el contenido de $resultado y por último definir un método abstracto 
// llamado operar.
//Luego definir dos subclases concretas de la clase Operacion. La primera llamada 
//Suma que tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado. 
//La segunda llamada Resta que tiene por objetivo la carga de dos valores, restarlos
// y mostrar el resultado de la diferencia.
        abstract class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        public abstract function operar();
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();


// Plantear una clase abstracta Trabajador. Definir como atributo su nombre y sueldo.  
// Declarar un método abstracto: calcularSueldo. Definir otro método para imprimir el numbre y su sueldo.
//Plantear una subclase Empleado. Definir el atributo $horasTrabajadas, $valorHora.
// Para calcular el sueldo tener en cuenta que se le paga 3.50 la hora.
//Plantear una clase Gerente que herede de la clase Trabajador. Para calcular el 
//sueldo tener en cuenta que se le abona un 10% de las utilidades de la empresa.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom)
        {
        $this->nombre = $nom;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        public abstract function calcularSueldo();
        }

        class Empleado extends Trabajador {
        protected $horasTrabajadas;
        protected $valorHora;
        public function __construct($nom, $horas, $valor)
        {
        parent::__construct($nom);
        $this->horasTrabajadas = $horas;
        $this->valorHora = $valor;
        }
        public function calcularSueldo()
        {
        $this->sueldo = $this->horasTrabajadas*$this->valorHora;
        }
        }

        class Gerente extends Trabajador {
        protected $utilidades;
        public function __construct($nom, $uti)
        {
        parent::__construct($nom);
        $this->utilidades = $uti;
        }
        public function calcularSueldo()
        {
        $this->sueldo = $this->utilidades*0.10;
        }
        }

        $empleado1 = new Empleado('Pablo Rodriguez', 150, 3.50);
        $empleado1->calcularSueldo();
        echo 'El sueldo del empleado<br>';
        $empleado1->imprimir();

        $gerente1 = new Gerente('Marcos Herning', 1000000);
        $gerente1->calcularSueldo();
        echo 'El sueldo del gerente<br>';
        $gerente1->imprimir();


//17 - Métodos y clases final.
//Confeccionaremos las clases Operacion y la clase Suma. Definir un método final 
//en la clase Operacion y la subclase definirla de tipo final.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function __construct($v1, $v2)
        {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
        }
        public final function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        final class Suma extends Operacion{
        private $titulo;
        public function __construct($v1, $v2, $tit)
        {
        Operacion::__construct($v1, $v2);
        $this->titulo = $tit;
        }
        public function operar()
        {
        echo $this->titulo;
        echo $this->valor1.'+'.$this->valor2.' es ';
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma(10, 10, 'Suma de valores:');
        $suma->operar();
        $suma->imprimirResultado();

//Confeccionar una clase Persona que tenga como atributos el nombre y la edad.
// Definir como responsabilidades un método final que cargue los datos personales. 
// Otro método debe imprimir dichos datos personales.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Definir la
// clase Persona con el modificador Final. Añadir un atributo sueldo y los métodos
//  de cargar el sueldo e imprimir su sueldo.
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear un 
//objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public final function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        final class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();


//        18 - Referencia y clonación de objetos.
//Confeccionar una clase Persona, definir los atributos nombre y edad. Definir 3
// métodos, uno que inicialice los dos atributos y otros dos que retornen el 
// nombre y la edad.
////Crear un objeto de la clase Persona y otra variable que almacene la referencia 
//al mismo objeto. Crear un segundo objeto clonandolo a partir del primer objeto.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        $x = $persona1;
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($x):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $x->fijarNombreEdad('Ana', 25);
        echo 'Después de modificar los datos<br>';
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($x):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        $persona1->fijarNombreEdad('Luis', 50);
        echo 'Después de modificar los datos de persona1<br>';
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($persona2):';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';



//Confeccionar una clase Cuadrado. Definir como atributo su lado. Implementar un 
//método que lo cargue el lado, otro que retorne su perímetro y otro que retorne su superficie.
//
//Crear un objeto de la clase Cuadrado e inicializar el lado. Definir una segunda 
//variable y asignarle la referencia del objeto de la clase Cuadrado. Imprimir la 
//superficie y perímetro mediante esta segunda variable.
        class Cuadrado {
        private $lado;
        public function cargarLado($la)
        {
        $this->lado = $la;
        }
        public function retornarPerimetro()
        {
        $p = $this->lado*4;
        return $p;
        }
        public function retornarSuperficie()
        {
        $s = $this->lado*$this->lado;
        return $s;
        }
        }

        $cuadrado1 = new Cuadrado();
        $cuadrado1->cargarLado(5);
        $x = $cuadrado1;
        echo 'La superficie del cuadrado de lado 5 es:'.$x->retornarSuperficie().'<br>';
        echo 'El perímetro del cuadrado de lado 5 es:'.$x->retornarPerimetro().'<br>';


//19 - función __clone()
//Crear una clase Persona que tenga como atributos su nombre y edad, definir los
// métodos para cargar y retornar los valores de sus atributos. Hacer que cuando 
// clonemos un objeto de dicha clase la edad de la persona se fije con cero.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        public function __clone()
        {
        $this->edad = 0;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        echo 'Datos de $persona1:';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        echo 'Datos de $persona2:';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';

//Crear la clase Persona y cuando se clone un objeto de dicha clase almacenar 
//en el atributo edad la edad actual más uno.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        public function __clone()
        {
        $this->edad++;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        echo 'Datos de $persona1:';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        echo 'Datos de $persona2:';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';


//20 - Operador instanceof
//Plantear una clase Trabajador. Definir como atributos su nombre y sueldo.
// Declarar un método que retorne el sueldo.
//Plantear una subclase Empleado y otra subclase Gerente.
//Crear un vector con 3 empleados y 2 gerentes. Calcular cuanto ganan en total 
//os empleados y cuanto los gerentes (emplear el operador instanceof para identificar 
//de que clase se trata cada objeto del vector.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function retornarSueldo()
        {
        return $this->sueldo;
        }
        }

        class Empleado extends Trabajador {
        }

        class Gerente extends Trabajador {
        }

        $vec[] = new Empleado('juan', 1200);
        $vec[] = new Empleado('ana', 1000);
        $vec[] = new Empleado('carlos', 1000);

        $vec[] = new Gerente('jorge', 25000);
        $vec[] = new Gerente('marcos', 8000);

        $suma1 = 0;
        $suma2 = 0;
        for($f = 0;
        $f<count($vec);
        $f++)
        {
        if ($vec[$f] instanceof Empleado)
        $suma1 = $suma1+$vec[$f]->retornarSueldo();
        else
        if ($vec[$f] instanceof Gerente)
        $suma2 = $suma2+$vec[$f]->retornarSueldo();
        }
        echo 'Gastos en sueldos de Empleados:'.$suma1.'<br>';
        echo 'Gastos en sueldos de Gerentes:'.$suma2.'<br>';

//Plantear una clase Trabajador. Definir como atributos su nombre y sueldo. 
//Declarar un método que retorne el sueldo y otro el nombre.
//Plantear una subclase Empleado y otra subclase Gerente.
//Crear un vector con 3 empleados y 2 gerentes. Mostrar el nombre y sueldo del 
//gerente que gana más en la empresa.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function retornarSueldo()
        {
        return $this->sueldo;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        }

        class Empleado extends Trabajador {
        }

        class Gerente extends Trabajador {
        }

        $vec[] = new Empleado('juan', 1200);
        $vec[] = new Empleado('ana', 1000);
        $vec[] = new Empleado('carlos', 1000);

        $vec[] = new Gerente('jorge', 25000);
        $vec[] = new Gerente('marcos', 8000);

        $may = -1;
        $nom = '';
        for($f = 0;
        $f<count($vec);
        $f++)
        {
        if ($vec[$f] instanceof Gerente)
        {
        if ($vec[$f]->retornarSueldo()>$may)
        {
        $may = $vec[$f]->retornarSueldo();
        $nom = $vec[$f]->retornarNombre();
        }
        }
        }
        echo 'El nombre del gerente con mayor sueldo es:'.$nom.'<br>';
        echo 'Y tiene un sueldo de :'.$may.'<br>';




//21 - Método destructor de una clase (__destruct)
//Confeccionar una clase Banner que muestre un texto generando un gráfico en 
//forma dinámica. Liberar los recursos en el destructor. En el constructor
// recibir el texto publicitario.
        class Banner {
        private $ancho;
        private $alto;
        private $mensaje;
        private $imagen;
        private $colorTexto;
        private $colorFondo;
        public function __construct($an, $al, $men)
        {
        $this->ancho = $an;
        $this->alto = $al;
        $this->mensaje = $men;
        $this->imagen = imageCreate($this->ancho, $this->alto);
        $this->colorTexto = imageColorAllocate($this->imagen, 255, 255, 0);
        $this->colorFondo = imageColorAllocate($this->imagen, 255, 0, 0);
        imageFill($this->imagen, 0, 0, $this->colorFondo);
        }
        public function graficar()
        {
        imageString ($this->imagen, 5, 50, 10, $this->mensaje, $this->colorFuente);
        header ("Content-type: image/png");
        imagePNG ($this->imagen);
        }
        public function __destruct()
        {
        imageDestroy($this->imagen);
        }
        }

        $baner1 = new Banner(428, 45, 'Sistema de Ventas por Mayor y Menor');
        $baner1->graficar();

//Confeccionar una clase que contenga un constructor y un destructor.
// Hacer que cada método imprima un mensaje en la página indicando que se 
// ha ejecutado dicho método.
        class Prueba {
        public function __construct()
        {
        echo 'Se ejecutó el constructor<br>';
        }
        public function __destruct()
        {
        echo 'Se ejecutó el destructor<br>';
        }
        }
        $p = new Prueba();



//22 - Métodos estáticos de una clase (static)
//Confeccionar una clase Cadena que contenga un conjunto de métodos estáticos 
//para calcular la cantidad de caracteres, convertir a mayúsculas, convertir a 
//minúsculas etc.
        class Cadena {
        public static function largo($cad)
        {
        return strlen($cad);
        }
        public static function mayusculas($cad)
        {
        return strtoupper($cad);
        }
        public static function minusculas($cad)
        {
        return strtolower($cad);
        }
        }

        $c = 'Hola';
        echo 'Cadena original:'.$c;
        echo '<br>';
        echo 'Largo:'.Cadena::largo($c);
        echo '<br>';
        echo 'Toda en mayúsculas:'.Cadena::mayusculas($c);
        echo '<br>';
        echo 'Toda en minúsculas:'.Cadena::minusculas($c);



//Plantear una clase Calculadora que contenga cuatro métodos estáticos 
//(sumar, restar, multiplicar y dividir) estos métodos reciben dos valores.
        class Calculadora {
        public static function sumar($v1, $v2)
        {
        return $v1+$v2;
        }
        public static function restar($v1, $v2)
        {
        return $v1-$v2;
        }
        public static function multiplicar($v1, $v2)
        {
        return $v1*$v2;
        }
        public static function dividir($v1, $v2)
        {
        return $v1/$v2;
        }
        }

        $x1 = 10;
        $x2 = 5;
        echo "La suma de $x1 y $x2 es:".Calculadora::sumar($x1, $x2);
        echo '<br>';
        echo "La diferencia de $x1 y $x2 es:".Calculadora::restar($x1, $x2);
        echo '<br>';
        echo "La multiplicacion de $x1 y $x2 es:".Calculadora::multiplicar($x1, $x2);
        echo '<br>';
        echo "La division de $x1 y $x2 es:".Calculadora::dividir($x1, $x2);
        ?>



<html>
    <head>
        <title>Online PHP Script Execution</title>
    </head>
    <body>

        <h1>APUNTES</h1>

        <h2>MATRICES</h2>

        <h2 id="for">Crear una matriz</h2>
        <p>Una matriz se puede crear definiendo algún valor de la matriz</p>
        <?php
        $matriz[5] = 25;
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>o utilizando la función <a href="http://www.php.net/manual/es/function.array.php"><span class="php-fun">array($indice =&gt; $valor, ...)</span></a>:</p>
        <?php
        $matriz = array(5 => 25);
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Las matrices en PHP son matrices asociativas, es decir, que los índices no
            tienen por qué ser números enteros positivos:</p>
        <?php
        $matriz[5] = 25;
        $matriz[-1] = "negativo";
        $matriz["número 1"] = "cinco";

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Las matrices en PHP pueden ser multidimensionales:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz["letras"][1] = "letra A";

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <?php
        $matriz = array(5 => array(3 => 25), "letras" => array(1 => "letra A"));

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <h2>Imprimir todos los valores de una matriz: la función print_r()</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.print-r.php"><span class="php-fun">print_r($variable [, $devolver])</span></a> escribe la variable
            $variable de forma legible, incluso aunque se trate de una matriz. </p>

        <p>Aunque print_r() genera espacios y saltos de línea que pueden verse en el
            código fuente de la página, print_r() no genera etiquetas html, por lo que el
            navegador no muestra esos espacios y saltos de línea.</p>

        <?php
        $matriz = array("nombre" => "Pepito", "apellidos" => "Conejo");
        print_r($matriz);
        ?>

        <p>Para mejorar la legibilidad una solución es añadir la etiqueta <span class="html-eti">&lt;pre&gt;</span>, que fuerza al navegador a mostrar los
            espacios y saltos de línea.</p>
        <?php
        $matriz = array("nombre" => "Pepito", "apellidos" => "Conejo");
        print '<pre>';
        print_r($matriz);
        print '</pre>\n';
        ?>

        <h2 id="Borrar">Borrar una matriz o elementos de una matriz</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.unset.php"><span class="php-fun">unset()</span></a> permite borrar una matriz o elementos de una
            matriz .</p>
        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";

        unset($matriz[5]);

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>
        <?php
        $matriz = array(5 => 25, -1 => "negativo", "número 1" => "cinco");

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";

        unset($matriz);

        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <h2 id="Contar">Contar elementos de una matriz</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.count.php"><span class="php-fun">count($matriz)</span></a> permite contar los elementos de una
            matriz.</p>
        <?php
        $matriz[3] = 25;
        $matriz[4] = 30;
        $matriz[5] = 35;
        $matriz["letra"] = "letra A";

        $elementos = count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>En una matriz multidimensional, la función <span class="php-fun"><span class="php-fun">count($matriz)</span></span> devolvería simplemente el número
            de elementos del primer índice:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>

        <p>Para contar todos los elementos de una matriz multidimensional, habría que
            utilizar la función <span class="php-fun"><span class="php-fun">count($matriz,
                    COUNT_RECURSIVE)</span></span>.</p>

        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz, COUNT_RECURSIVE);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>


        <p>Es importante fijarse en que en este caso la función <span class="php-fun"><span class="php-fun">count()</span></span> está contando
            también las dos matrices fila. Si quisieramos contar únicamente los elementos
            de una matriz bidimensional habría que restar el número de matrices fila:</p>
        <?php
        $matriz[5][3] = 25;
        $matriz[5][4] = 30;
        $matriz[5][5] = 35;
        $matriz["letra"][1] = "letra A";

        $elementos = count($matriz, COUNT_RECURSIVE) - count($matriz);

        print "<p>La matriz tiene $elementos elementos.</p>\n";
        print "<pre>";
        print_r($matriz);
        print "</pre>\n";
        ?>


        <h2 id="Encontrar">Máximo y mínimo</h2>

        <p>La función <a href="http://www.php.net/manual/es/function.max.php"><span class="php-fun">max($matriz, ...)</span></a> devuelve el valor máximo de una
            matriz (o varias). La función <a href="http://www.php.net/manual/es/function.min.php"><span class="php-fun">min($matriz, ...)</span></a> devuelve el valor mínimo de una
            matriz (o varias). </p>
        <?php
        $valores = array(10, 40, 15, -1);
        $maximo = max($valores);
        $minimo = min($valores);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        print "<p>El máximo de la matriz es $maximo.</p>\n";
        print "<p>El mínimo de la matriz es $minimo.</p>\n";
        ?>

        <p>Los valores no numéricos se tratan como 0, pero si 0 es el mínimo o el
            máximo, la función devuelve la cadena.</p>
        <?php
        $valores = array(10, 40, 15, 'abc');
        $maximo = max($valores);
        $minimo = min($valores);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        print "<p>El máximo de la matriz es $maximo.</p>\n";
        print "<p>El mínimo de la matriz es $minimo.</p>\n";
        ?>


        <h2 id="Encontrar1">Encontrar un valor en una matriz</h2>
        <p>La función booleana <a href="http://www.php.net/manual/es/function.in-array.php"><span class="php-fun">in_array($elemento, $matriz[, $tipo])</span></a> devuelve <span class="php-con">true</span> si el elemento se encuentra en la matriz. Si el
            argumento booleano <span class="php-var">$tipo</span> es <span class="php-con">true</span>, <span class="php-fun"><span class="php-fun">in_array()</span></span> comprueba además que los tipos
            coincidan.</p>
        <?php
        $valores = array(10, 40, 15, -1);

        print "<pre>";
        print_r($valores);
        print "</pre>\n";
        if (in_array(15, $valores)) {
        print "<p>15 está en la matriz \$valores.</p>\n";
        }
        if (!in_array(25, $valores)) {
        print "<p>25 no está en la matriz \$valores.</p>\n";
        }
        if (!in_array("15", $valores, true)) {
        print "<p>\"15\" no está en la matriz \$valores.</p>\n";
        }
        ?>

        <?php
//RECORRIDO DE UN ARRAY UNIDIMENSIONAL ESCALAR (INDEXADO). 
//1.- RECORRIDO DE UN ARRAY SIMPLE MEDIANTE USO DE VARIABLES. 
        $productos = array("MESA", "SILLA", "FLEXO", "ESTANTERIA");
        echo "<br\>";
        echo "$productos[0]<br \>";
        echo "$productos[1]<br \>";
        echo "$productos[2]<br \>";
        echo "$productos[3]<br \>";
        echo "<br>";
        echo "<br \>";





//2.-RECORRIDO DE UN ARRAY CON FOR, CONOCIENDO EL NÚMERO DE 
        //      ELEMENTOS A PRIORI Y SIN CONOCER.
        for ($i = 0;
        $i <= 3;
        $i++)
        echo "$productos[$i] <br \>";
        echo "<br>";
        for ($i = 0;
        $i < count($productos);
        $i++)
        echo "$productos[$i] <br \>";
        echo "<br \>";




//3. RECORRIDO DE UN ARRAY CON EL BUCLE WHILE. 
        reset($productos);
        while (list($clave, $valor) = each($productos))
        echo "Clave: $clave; Valor: $valor<br \>\n";




//4.RECORRIDO DE UN ARRAY CON FOREACH 
        foreach ($productos as $clave => $valor)
        echo "Clave: $clave; Valor: $valor<br \>\n";
        echo "<br>";
        ?> 


















        <?php
        //BASES DE DATOS
        //PDO
        //CONEXXION CON LA BASE DE DATOS
        //CONEXION CON MYSQL
        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
        function conectaDb() {
        try {
        $db = new PDO("mysql:host=localhost", "root", "");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//      print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();

        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS SQLITE
        function conectaDb() {
        try {
        $db = new PDO("sqlite:/tmp/mclibre_baseDeDatos.sqlite");
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//      print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();



        // FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL O CON SQLITE

        define("MYSQL", "MySQL");
        define("SQLITE", "SQLite");
        $dbMotor = SQLITE;                                // Base de datos empleada
        if ($dbMotor == MYSQL) {
        define("MYSQL_HOST", "mysql:host=localhost"); // Nombre de host MYSQL
        define("MYSQL_USUARIO", "root");              // Nombre de usuario de MySQL 
        define("MYSQL_PASSWORD", "");                 // Contraseña de usuario de MySQL
        $dbDb = "mclibre_baseDeDatos";             // Nombre de la base de datos
        $dbTabla = $dbDb . ".tabla";                  // Nombre de la tabla
        } elseif ($dbMotor == SQLITE) {
        $dbDb = "/tmp/mclibre_baseDeDatos.sqlite"; // Nombre de la base de datos
        $dbTabla = "tabla";                           // Nombre de la tabla
        }

        function conectaDb() {
        global $dbMotor, $dbDb;

        try {
        if ($dbMotor == MYSQL) {
        $db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } elseif ($dbMotor == SQLITE) {
        $db = new PDO("sqlite:" . $dbDb);
        }
        return($db);
        } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
//        print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
        }
        }

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
// La conexión se debe realizar en cada página que acceda a la base de datos
        $db = conectaDB();



//Desconexión con la base de datos
        $db = null;


        //Consultas a la base de datos
        // EJEMPLO DE CONSULTA DE INSERCIÓN DE REGISTRO
        $db = conectaDb();
        $consulta = "INSERT INTO $dbTabla 
    (nombre, apellidos)
    VALUES ("$nombre", "$apellidos")";
        if ($db->query($consulta)) {
        print "<p>Registro creado correctamente.</p>\n";
        } else {
        print "<p>Error al crear el registro.<p>\n";
        }
        $db = null;

// EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTRO$db = conectaDb();

        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        foreach ($result as $valor) {
        print "<p>$valor[nombre] $valor[apellidos]</p>\n";
        }
        }



        // En dos líneas
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);

// En una sola línea
        $result = $db->query("SELECT * FROM $dbTabla");


        //SEGURIDAD EN LAS CONSULTAS: CONSULTAS PREPARADAS
        // En tres líneas
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->prepare($consulta);
        $result->execute();

// En dos líneas
        $result = $db->prepare("SELECT * FROM $dbTabla");
        $result->execute();


        // EJEMPLO DE CONSULTA DE CREACIÓN DE BASE DE DATOS
        $db = conectaDb();
        $consulta = "CREATE DATABASE $dbDb";
        if ($db->query($consulta)) {
        print "<p>Base de datos creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la base de datos.</p>\n";
        }
        $db = null;



// EJEMPLO DE CONSULTA DE BORRADO DE BASE DE DATOS
        $db = conectaDb();
        $consulta = "DROP DATABASE $dbDb";
        if ($db->query($consulta)) {
        print "<p>Base de datos borrada correctamente.</p>\n";
        } else {
        print "<p>Error al borrar la base de datos.</p>\n";
        }
        $db = null;



        // EJEJMPLO DE CONSULTA DE CREACIÓN DE TABLA EN MYSQL
        $db = conectaDb();
        $consulta = "CREATE TABLE $dbTabla (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR($tamNombre),
    apellidos VARCHAR($tamApellidos),
    PRIMARY KEY(id)
    )";
        if ($db->query($consulta)) {
        print "<p>Tabla creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la tabla.</p>\n";
        }
        $db = null;


        // EJEMPLO DE CONSULTA DE CREACIÓN DE TABLA EN SQLite
        $db = conectaDb();
        $consulta = "CREATE TABLE $dbTabla (
    id INTEGER PRIMARY KEY,
    nombre VARCHAR($tamNombre),
    apellidos VARCHAR($tamApellidos)
    )";
        if ($db->query($consulta)) {
        print "<p>Tabla creada correctamente.</p>\n";
        } else {
        print "<p>Error al crear la tabla.</p>\n";
        }
        $db = null;





        // EJEMPLO DE CONSULTA DE BORRADO DE TABLA
        $db = conectaDb();
        $consulta = "DROP TABLE $dbTabla";
        if ($db->query($consulta)) {
        print "<p>Tabla borrada correctamente.</p>\n";
        } else {
        print "<p>Error al borrar la tabla.</p>\n";
        }
        $db = null;



        // EJEMPLO DE CONSULTA DE INSERCIÓN DE REGISTRO
        $db = conectaDb();

        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");

        $consulta = "INSERT INTO $dbTabla 
    (nombre, apellidos)
    VALUES (:nombre, :apellidos)";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos))) {
        print "<p>Registro creado correctamente.</p>\n";
        } else {
        print "<p>Error al crear el registro.</p>\n";
        }

        $db = null;



        // EJEMPLO DE CONSULTA DE MODIFICACIÓN DE REGISTRO
        $db = conectaDb();

        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");
        $id = recoge("id");

        $consulta = "UPDATE $dbTabla 
    SET nombre=:nombre, apellidos=:apellidos 
    WHERE id=:id";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos, ":id" => $id))) {
        print "<p>Registro modificado correctamente.</p>\n";
        } else {
        print "<p>Error al modificar el registro.</p>\n";
        }

        $db = null;


        // EJEMPLO DE CONSULTA DE BORRADO DE REGISTRO
        $db = conectaDb();

        $id = recogeMatriz("id");

        foreach ($id as $indice => $valor) {
        $consulta = "DELETE FROM $dbTabla 
        WHERE id=:indice";
        $result = $db->prepare($consulta);
        if ($result->execute(array(":indice" => $indice))) {
        print "<p>Registro borrado correctamente.</p>\n";
        } else {
        print "<p>Error al borrar el registro.</p>\n";
        }
        }

        $db = null;

        // EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS
        $db = conectaDb();
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        print "<p>Consulta ejecutada.</p>\n";
        }
        $db = null;

        // EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS
        $db = conectaDb();
        $consulta = "SELECT * FROM $dbTabla";
        $result = $db->query($consulta);
        if (!$result) {
        print "<p>Error en la consulta.</p>\n";
        } else {
        foreach ($result as $valor) {
        print "<p>Nombre: $valor[nombre] - Apellidos: $valor[apellidos]</p>\n";
        }
        }
        $db = null;



//API ORIGINAL (MIRAR BASE DE DATOS WILEY 2)
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//ORIENTADO A OBJETOS
//Declaración de una clase y creación de un objeto.
//EJEMPLO 1: Confeccionar una clase llamada Persona. Definir un atributo donde se almacene su nombre.
//Luego definir dos métodos, uno que cargue el nombre y otro que lo imprima.


        class Persona {
        private $nombre;
        public function inicializar($nom)
        {
        $this->nombre = $nom;
        }
        public function imprimir()
        {
        echo $this->nombre;
        echo '<br>';
        }
        }

        $per1 = new Persona();
        $per1->inicializar('Juan');
        $per1->imprimir();
        $per2 = new Persona();
        $per2->inicializar('Ana');
        $per2->imprimir();

        //EJEMPLO 2
//Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
//Definir un método inicializar que lleguen como dato el nombre y sueldo. 
//Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar 
//impuestos (si el sueldo supera a 3000 paga impuestos)
        class Empleado {
        private $nombre;
        private $sueldo;
        public function inicializar($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function pagaImpuestos()
        {
        echo $this->nombre;
        echo '-';
        if ($this->sueldo>3000)
        echo 'Debe pagar impuestos';
        else
        echo 'No paga impuestos';
        echo '<br>';
        }
        }

        $empleado1 = new Empleado();
        $empleado1->inicializar('Luis', 2500);
        $empleado1->pagaImpuestos();
        $empleado1 = new Empleado();
        $empleado1->inicializar('Carla', 4300);
        $empleado1->pagaImpuestos();


//ATRIBUTOS DE UNA CLASE
//EJEMPLO 1: Implementar una clase que muestre una lista de hipervínculos en
// forma horizontal (básicamente un menú de opciones)
        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        public function mostrar()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.google.com', 'Google');
        $menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu1->cargarOpcion('http://www.msn.com', 'MSN');
        $menu1->mostrar();

//EJEMPLO 2: Confeccionar una clase Menu. Permitir añadir la cantidad de opciones 
//que necesitemos. Mostrar el menú en forma horizontal o vertical (según que método llamemos

        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        public function mostrarHorizontal()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        public function mostrarVertical()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "<br>";
        }
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.google.com', 'Google');
        $menu1->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu1->cargarOpcion('http://www.msn.com', 'MSN');
        $menu1->mostrarVertical();



//METODOS DE UNA CLASE
//EJEMPLO 1: Confeccionar una clase CabeceraPagina que permita mostrar un título,
// indicarle si queremos que aparezca centrado, a derecha o izquierda
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        public function inicializar($tit, $ubi)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina();
        $cabecera->inicializar('El blog del programador', 'center');
        $cabecera->graficar();

//EJEMPLO 2: Confeccionar una clase CabeceraPagina que permita mostrar un título,
// indicarle si queremos que aparezca centrado, a derecha o izquierda, además
//  permitir definir el color de fondo y de la fuente.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function inicializar($tit, $ubi, $colorFuen, $colorFon)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina();
        $cabecera->inicializar('El blog del programador', 'center', '#FF1A00', '#CDEB8B');
        $cabecera->graficar();



//Método constructor de una clase (__construct)
//EJEMPLO 1: Confeccionar una clase CabeceraPagina que permita mostrar un título, 
//indicarle si queremos que aparezca centrada, a derecha o izquierda. Utilizar 
//un constructor para inicializar los dos atributos.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        public function __construct($tit, $ubi)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina('El blog del programador', 'center');
        $cabecera->graficar();

//EJEMPLO 2: Confeccionar una clase CabeceraPagina que permita mostrar un título, 
//indicarle si queremos que aparezca centrado, a derecha o izquierda, además permitir 
//definir el color de fondo y de la fuente. Pasar los valores que cargaran los
// atributos mediante un constructor.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function __construct($tit, $ubi, $colorFuen, $colorFon)
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera = new CabeceraPagina('El blog del programador', 'center', '#FF1A00', '#CDEB8B');
        $cabecera->graficar();



//Llamada de métodos dentro de la clase.
//EJEMPLO 1: Confeccionar una clase Tabla que permita indicarle en el constructor 
//la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar
// un dato en una determinada fila y columna. Finalmente debe mostrar los datos
//  en una tabla HTML.
        class Tabla {
        private $mat = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor)
        {
        $this->mat[$fila][$columna] = $valor;
        }

        public function inicioTabla()
        {
        echo '<table border="1">';
        }

        public function inicioFila()
        {
        echo '<tr>';
        }

        public function mostrar($fi, $co)
        {
        echo '<td>'.$this->mat[$fi][$co].'</td>';
        }

        public function finFila()
        {
        echo '</tr>';
        }

        public function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(2, 3);
        $tabla1->cargar(1, 1, "1");
        $tabla1->cargar(1, 2, "2");
        $tabla1->cargar(1, 3, "3");
        $tabla1->cargar(2, 1, "4");
        $tabla1->cargar(2, 2, "5");
        $tabla1->cargar(2, 3, "6");
        $tabla1->graficar();

//EJEMPLO 2: Confeccionar una clase Tabla que permita indicarle en el constructor
// la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar
//  un dato en una determinada fila y columna además de definir su color de fuente
//   y fondo. Finalmente debe mostrar los datos en una tabla HTML.
        class Tabla {
        private $mat = array();
        private $colorFuente = array();
        private $colorFondo = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor, $cfue, $cfon)
        {
        $this->mat[$fila][$columna] = $valor;
        $this->colorFuente[$fila][$columna] = $cfue;
        $this->colorFondo[$fila][$columna] = $cfon;
        }

        public function inicioTabla()
        {
        echo '<table border="1">';
        }

        public function inicioFila()
        {
        echo '<tr>';
        }

        public function mostrar($fi, $co)
        {
        echo '<td style="color:'.$this->colorFuente[$fi][$co].';background-color:'.$this->colorFondo[$fi][$co].'">'.$this->mat[$fi][$co].'</td>';
        }

        public function finFila()
        {
        echo '</tr>';
        }

        public function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 3);
        $tabla1->cargar(1, 1, "titulo 1", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 2, "titulo 2", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 3, "titulo 3", "#356AA0", "#FFFF88");
        for($f = 2;
        $f<=10;
        $f++)
        {
        $tabla1->cargar($f, 1, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 2, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 3, "x", "#0000ff", "#EEEEEE");
        }
        $tabla1->graficar();

//Modificadores de acceso a atributos y métodos (public - private)
//EJEMPLO 1: Confeccionar una clase Tabla que permita indicarle en el constructor 
//la cantidad de filas y columnas. Definir otra responsabilidad que podamos cargar 
//un dato en una determinada fila y columna. Finalmente debe mostrar los datos en una tabla HTML.
//Definir los modificadores de acceso (private y public) para atributos y métodos.
        private $mat = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor)
        {
        $this->mat[$fila][$columna] = $valor;
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        echo '<td>'.$this->mat[$fi][$co].'</td>';
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(2, 3);
        $tabla1->cargar(1, 1, "1");
        $tabla1->cargar(1, 2, "2");
        $tabla1->cargar(1, 3, "3");
        $tabla1->cargar(2, 1, "4");
        $tabla1->cargar(2, 2, "5");
        $tabla1->cargar(2, 3, "6");
        $tabla1->graficar();

//EJEMPLO 2: Confeccionar una clase Menu. Permitir añadir la cantidad de opciones 
//que necesitemos. Mostrar el menú en forma horizontal o vertical, pasar a este
// método como parámetro el texto "horizontal" o "vertical". El método mostrar 
// debe llamar alguno de los dos métodos privados mostrarHorizontal() o mostrarVertical().
        class Menu {
        private $enlaces = array();
        private $titulos = array();
        public function cargarOpcion($en, $tit)
        {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        }
        private function mostrarHorizontal()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "-";
        }
        }
        private function mostrarVertical()
        {
        for($f = 0;
        $f<count($this->enlaces);
        $f++)
        {
        echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
        echo "<br>";
        }
        }

        public function mostrar($orientacion)
        {
        if (strtolower($orientacion)=="horizontal")
        $this->mostrarHorizontal();
        if (strtolower($orientacion)=="vertical")
        $this->mostrarVertical();
        }
        }

        $menu1 = new Menu();
        $menu1->cargarOpcion('http://www.lanacion.com.ar', 'La Nación');
        $menu1->cargarOpcion('http://www.clarin.com.ar', 'El Clarín');
        $menu1->cargarOpcion('http://www.lavoz.com.ar', 'La Voz del Interior');
        $menu1->mostrar("horizontal");
        echo '<br>';
        $menu2 = new Menu();
        $menu2->cargarOpcion('http://www.google.com', 'Google');
        $menu2->cargarOpcion('http://www.yahoo.com', 'Yhahoo');
        $menu2->cargarOpcion('http://www.msn.com', 'MSN');
        $menu2->mostrar("vertical");


//Colaboración de objetos.
//EJEMPLO 1: Plantear una clase Pagina que contenga como atributos objetos de las 
//clases Cabecera, Cuerpo y Pie. La clase Cabecera y Pie deben tener un atributo
// donde almacenar el texto a mostrar. La clase Cuerpo debe tener un atributo de 
// tipo vector donde se almacenen todos los párrafos.
        class Cabecera {
        private $titulo;
        public function __construct($tit)
        {
        $this->titulo = $tit;
        }
        public function graficar()
        {
        echo '<h1 style="text-align:center">'.$this->titulo.'</h1>';
        }
        }

        class Cuerpo {
        private $lineas = array();
        public function insertarParrafo($li)
        {
        $this->lineas[] = $li;
        }
        public function graficar()
        {
        for($f = 0;
        $f<count($this->lineas);
        $f++)
        {
        echo '<p>'.$this->lineas[$f].'</p>';
        }
        }
        }

        class Pie {
        private $titulo;
        public function __construct($tit)
        {
        $this->titulo = $tit;
        }
        public function graficar()
        {
        echo '<h4 style="text-align:left">'.$this->titulo.'</h4>';
        }
        }

        class Pagina {
        private $cabecera;
        private $cuerpo;
        private $pie;
        public function __construct($texto1, $texto2)
        {
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new Cuerpo();
        $this->pie = new Pie($texto2);
        }
        public function insertarCuerpo($texto)
        {
        $this->cuerpo->insertarParrafo($texto);
        }
        public function graficar()
        {
        $this->cabecera->graficar();
        $this->cuerpo->graficar();
        $this->pie->graficar();
        }
        }

        $pagina1 = new Pagina('Título de la Página', 'Pie de la página');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 1');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 2');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 3');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 4');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 5');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 6');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 7');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 8');
        $pagina1->insertarCuerpo('Esto es una prueba que debe aparecer dentro del cuerpo de la página 9');
        $pagina1->graficar();

//EJEMPLO 2: Confeccionar la clase Tabla vista en conceptos anteriores. Plantear
        // una clase Celda que colabore con la clase Tabla. La clase Tabla debe definir 
        // una matriz de objetos de la clase Celda.
// La clase Celda debe definir los atributos: $texto, $colorFuente y $colorFondo.
        class Celda {
        private $texto;
        private $colorFuente;
        private $colorFondo;
        function __construct($tex, $cfue, $cfon)
        {
        $this->texto = $tex;
        $this->colorFuente = $cfue;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<td style="color:'.$this->colorFuente.';background-color:'.$this->colorFondo.'">'.$this->texto.'</td>';
        }
        }

        class Tabla {
        private $celdas = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function cargar($fila, $columna, $valor, $cfue, $cfon)
        {
        $this->celdas[$fila][$columna] = new Celda($valor, $cfue, $cfon);
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        $this->celdas[$fi][$co]->graficar();
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 3);
        $tabla1->cargar(1, 1, "titulo 1", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 2, "titulo 2", "#356AA0", "#FFFF88");
        $tabla1->cargar(1, 3, "titulo 3", "#356AA0", "#FFFF88");
        for($f = 2;
        $f<=10;
        $f++)
        {
        $tabla1->cargar($f, 1, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 2, "x", "#0000ff", "#EEEEEE");
        $tabla1->cargar($f, 3, "x", "#0000ff", "#EEEEEE");
        }
        $tabla1->graficar();

//Parámetros de tipo objeto.
//EJEMPLO 1:Plantearemos una clase Opcion y otra clase Menu. La clase Opcion
// definirá como atributos el titulo, enlace y color de fondo, los métodos a
//  implementar serán el constructor y el graficar.
//Por otro lado la clase Menú administrará un array de objetos de la clase Opcion 
//e implementará un métodos para insertar objetos de la clase Menu y otro para graficar.
// Al constructor de la clase Menu indicarle si queremos el menú en forma 'horizontal' 
// o 'vertical'.
        class Opcion {
        private $titulo;
        private $enlace;
        private $colorFondo;
        public function __construct($tit, $enl, $cfon)
        {
        $this->titulo = $tit;
        $this->enlace = $enl;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<a style="background-color:'.$this->colorFondo.'" href="'.$this->enlace.'">'.$this->titulo.'</a>';
        }
        }

        class Menu {
        private $opciones = array();
        private $direccion;
        public function __construct($dir)
        {
        $this->direccion = $dir;
        }
        public function insertar($op)
        {
        $this->opciones[] = $op;
        }

        private function graficarHorizontal()
        {
        for($f = 0;
        $f<count($this->opciones);
        $f++)
        {
        $this->opciones[$f]->graficar();
        }
        }
        private function graficarVertical()
        {
        for($f = 0;
        $f<count($this->opciones);
        $f++)
        {
        $this->opciones[$f]->graficar();
        echo '<br>';
        }
        }

        public function graficar()
        {
        if (strtolower($this->direccion)=="horizontal")
        $this->graficarHorizontal();
        else
        if (strtolower($this->direccion)=="vertical")
        $this->graficarVertical();
        }
        }

        $menu1 = new Menu('horizontal');
        $opcion1 = new Opcion('Google', 'http://www.google.com', '#C3D9FF');
        $menu1->insertar($opcion1);
        $opcion2 = new Opcion('Yahoo', 'http://www.yahoo.com', '#CDEB8B');
        $menu1->insertar($opcion2);
        $opcion3 = new Opcion('MSN', 'http://www.msn.com', '#C3D9FF');
        $menu1->insertar($opcion3);
        $menu1->graficar();

//EJEMPLO 2: Confeccionar la clase Tabla vista en conceptos anteriores. Plantear 
//una clase Celda que colabore con la clase Tabla. La clase Tabla debe definir una 
//matriz de objetos de la clase Celda.
//En la clase Tabla definir un método insertar que llegue un objeto de la clase
// Celda y además dos enteros que indiquen que posición debe tomar dicha celda en la tabla.
//La clase Celda debe definir los atributos: $texto, $colorFuente y $colorFondo.
        class Celda {
        private $texto;
        private $colorFuente;
        private $colorFondo;
        function __construct($tex, $cfue, $cfon)
        {
        $this->texto = $tex;
        $this->colorFuente = $cfue;
        $this->colorFondo = $cfon;
        }
        public function graficar()
        {
        echo '<td style="color:'.$this->colorFuente.';background-color:'.$this->colorFondo.'">'.$this->texto.'</td>';
        }
        }

        class Tabla {
        private $celdas = array();
        private $cantFilas;
        private $cantColumnas;

        public function __construct($fi, $co)
        {
        $this->cantFilas = $fi;
        $this->cantColumnas = $co;
        }

        public function insertar($cel, $fila, $columna)
        {
        $this->celdas[$fila][$columna] = $cel;
        }

        private function inicioTabla()
        {
        echo '<table border="1">';
        }

        private function inicioFila()
        {
        echo '<tr>';
        }

        private function mostrar($fi, $co)
        {
        $this->celdas[$fi][$co]->graficar();
        }

        private function finFila()
        {
        echo '</tr>';
        }

        private function finTabla()
        {
        echo '</table>';
        }

        public function graficar()
        {
        $this->inicioTabla();
        for($f = 1;
        $f<=$this->cantFilas;
        $f++)
        {
        $this->inicioFila();
        for($c = 1;
        $c<=$this->cantColumnas;
        $c++)
        {
        $this->mostrar($f, $c);
        }
        $this->finFila();
        }
        $this->finTabla();
        }
        }

        $tabla1 = new Tabla(10, 2);
        $celda = new Celda('titulo 1', '#356AA0', '#FFFF88');
        $tabla1->insertar($celda, 1, 1);
        $celda = new Celda('titulo 2', '#356AA0', '#FFFF88');
        $tabla1->insertar($celda, 1, 2);
        for($f = 2;
        $f<=10;
        $f++)
        {
        $celda = new Celda('x', '#0000ff', '#eeeeee');
        $tabla1->insertar($celda, $f, 1);
        $celda = new Celda('y', '#0000ff', '#eeeeee');
        $tabla1->insertar($celda, $f, 2);
        }
        $tabla1->graficar();

//Parámetros opcionales.
//EJEMPLO 1: Codificar la clase CabeceraDePagina que nos muestre un título alineado
// con un determinado color de fuente y fondo. Definir en el constructor parámetros
//  opcionales para los colores de fuente, fondo y el alineado del título.
        class CabeceraPagina {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;
        public function __construct($tit, $ubi = 'center', $colorFuen = '#ffffff', $colorFon = '#000000')
        {
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        $this->colorFuente = $colorFuen;
        $this->colorFondo = $colorFon;
        }
        public function graficar()
        {
        echo '<div style="font-size:40px;text-align:'.$this->ubicacion.';color:';
        echo $this->colorFuente.';background-color:'.$this->colorFondo.'">';
        echo $this->titulo;
        echo '</div>';
        }
        }

        $cabecera1 = new CabeceraPagina('El blog del programador');
        $cabecera1->graficar();
        echo '<br>';
        $cabecera2 = new CabeceraPagina('El blog del programador', 'left');
        $cabecera2->graficar();
        echo '<br>';
        $cabecera3 = new CabeceraPagina('El blog del programador', 'right', '#ff0000');
        $cabecera3->graficar();
        echo '<br>';
        $cabecera4 = new CabeceraPagina('El blog del programador', 'right', '#ff0000', '#ffff00');
        $cabecera4->graficar();

//EJEMPLO 2: Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
//El constructor recibe como parámetros el nombre y el sueldo, en caso de no pasar
// el valor del sueldo inicializarlo con el valor 1000.
//Confeccionar otro método que imprima el nombre y el sueldo.
//Crear luego dos objetos del la clase Empleado, a uno de ellos no enviarle el sueldo.
        class Empleado {
        private $nombre;
        private $sueldo;
        public function __construct($nom, $sue = 1000)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.' - Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $empleado1 = new Empleado('Luis', 2500);
        $empleado1->imprimir();
        $empleado2 = new Empleado('Ana');
        $empleado2->imprimir();


//Herencia.
//EJEMPLO 1: Confeccionar una clase llamada Operacion que defina como atributos  
//$valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el atributo
// $valor1), cargar2 (inicializa el atributo $valor2) y por último un método que 
// muestre el contenido de $resultado.
//Luego definir dos subclases de la clase Operacion. La primera llamada Suma que 
//tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado. 
//La segunda llamada Resta que tiene por objetivo la carga de dos valores,
// restarlos y mostrar el resultado de la diferencia
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();

//EJEMPLO 2: Confeccionar una clase Persona que tenga como atributos el nombre y 
//la edad. Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir n 
//atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear 
//un objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();



//Modificadores de acceso a atributos y métodos (protected)
//
//
//Confeccionar una clase llamada Operacion que defina como atributos $valor1, 
//$valor2, $resultado y defina como métodos cargar1 (inicializa el atributo $valor1),
// cargar2 (inicializa el atributo $valor2) y por último un método que muestre el contenido de $resultado
//Luego definir la clase Suma que tiene por objetivo la carga de dos valores, 
//sumarlos y mostrar el resultado.
//Tratar de asignarle el valor 10 al atributo $valor1 en donde definimos un objeto.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->valor1 = 10;
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();


//Confeccionar una clase Persona que tenga como atributos protegidos, el nombre
// y la edad. Definir como responsabilidades un método que cargue los datos personales 
// y otro que los imprima.
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un 
//atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//Definir un objeto de la clase Empleado y tratar de modificar el atributo edad.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $empleado1 = New Empleado();
        $empleado1->edad = 34;



//13 - Sobreescritura de métodos.
//Confeccionar una clase llamada Operacion que defina como atributos $valor1, 
//$valor2, $resultado y defina como métodos cargar1 (inicializa el atributo $valor1), 
//cargar2 (inicializa el atributo $valor2) y por último un método que muestre el 
//contenido de $resultado.
//Luego definir dos subclases de la clase Operacion. La primera llamada Suma que 
//tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado
// (mostrar un título que indique que dicho resultado se trata de una suma). 
// La segunda llamada Resta que tiene por objetivo la carga de dos valores, 
// restarlos y mostrar el resultado de la diferencia (mostrar un título que 
// indique que dicho resultado se trata de una diferencia).

        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        public function imprimirResultado()
        {
        echo "La suma de $this->valor1 y $this->valor2 es:";
        parent::imprimirResultado();
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        public function imprimirResultado()
        {
        echo "La diferencia de $this->valor1 y $this->valor2 es:";
        parent::imprimirResultado();
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        $resta->imprimirResultado();

//EJEMPLO 2: Confeccionar una clase Persona que tenga como atributos el nombre y 
//la edad. Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un 
//atributo sueldo y los métodos de cargar el sueldo e imprimir todos los datos del
// empleado (sobreescribir el método imprimir de la clase Persona).
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear un 
//objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimir()
        {
        parent::imprimir();
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimir();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimir();


//14 - Sobreescritura del constructor.
//
//Implementar la clase Operacion. El constructor recibe e inicializa los atributos 
//$valor1 y $valor2. La subclase Suma añade un atributo $titulo. El constructor de 
//la clase Suma recibe los dos valores a sumar y el título.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function __construct($v1, $v2)
        {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        protected $titulo;
        public function __construct($v1, $v2, $tit)
        {
        Operacion::__construct($v1, $v2);
        $this->titulo = $tit;
        }
        public function operar()
        {
        echo $this->titulo;
        echo $this->valor1.'+'.$this->valor2.' es ';
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma(10, 10, 'Suma de valores:');
        $suma->operar();
        $suma->imprimirResultado();


//ejemplo 2: Confeccionar una clase Persona que tenga como atributos el nombre y
// la edad. El constructor recibe los datos para inicializar dichos atributos.
//  Otro método imprime los datos.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir
// un atributo sueldo. El constructor recibe los tres atributos de la clase 
// Empleado. Llamar al constructor de la clase padre para inicializar los atributos
//  nombre y edad del Empleado.
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear
// un objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public function __construct($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function __construct($nom, $ed, $su)
        {
        parent::__construct($nom, $ed);
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado('Gonzalez Ana', 32, 2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();

//15 - Clases abstractas y concretas.
//Confeccionar una clase abstracta llamada Operacion que defina como atributos
// $valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el
//  atributo $valor1), cargar2 (inicializa el atributo $valor2) y por último
//   un método que muestre el contenido de $resultado.
//Luego definir dos subclases concretas de la clase Operacion. La primera 
//llamada Suma que tiene por objetivo la carga de dos valores, sumarlos y
// mostrar el resultado. La segunda llamada Resta que tiene por objetivo la 
// carga de dos valores, restarlos y mostrar el resultado de la diferencia.

        abstract class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();

//      15 - Clases abstractas y concretas.
//Confeccionar una clase abstracta Persona que tenga como atributos el nombre y
// la edad. Definir como responsabilidades un método que cargue los datos personales
//  y otro que los imprima.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un
// atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
//
//Definir un objeto de la clase Persona y ver que error produce. También crear
// un objeto de la clase Empleado y llamar a sus métodos.  
        abstract class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

//Desmarcar para ver el error producido por la definición de un 
//objeto de una clase abstracta.
//$persona1=new Persona();
//$persona1->cargarDatosPersonales('Rodriguez Pablo',24);
//echo 'Datos personales de la persona:<br>';
//$persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();

// 16 - Métodos abstractos.
//Confeccionar una clase abstracta llamada Operacion que defina como atributos
// $valor1, $valor2, $resultado y defina como métodos cargar1 (inicializa el 
// atributo $valor1), cargar2 (inicializa el atributo $valor2), un método que 
// muestre el contenido de $resultado y por último definir un método abstracto 
// llamado operar.
//Luego definir dos subclases concretas de la clase Operacion. La primera llamada 
//Suma que tiene por objetivo la carga de dos valores, sumarlos y mostrar el resultado. 
//La segunda llamada Resta que tiene por objetivo la carga de dos valores, restarlos
// y mostrar el resultado de la diferencia.
        abstract class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v)
        {
        $this->valor1 = $v;
        }
        public function cargar2($v)
        {
        $this->valor2 = $v;
        }
        public function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        public abstract function operar();
        }

        class Suma extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        class Resta extends Operacion{
        public function operar()
        {
        $this->resultado = $this->valor1-$this->valor2;
        }
        }

        $suma = new Suma();
        $suma->cargar1(10);
        $suma->cargar2(10);
        $suma->operar();
        echo 'El resultado de la suma de 10+10 es:';
        $suma->imprimirResultado();
        $resta = new Resta();
        $resta->cargar1(10);
        $resta->cargar2(5);
        $resta->operar();
        echo 'El resultado de la diferencia de 10-5 es:';
        $resta->imprimirResultado();


// Plantear una clase abstracta Trabajador. Definir como atributo su nombre y sueldo.  
// Declarar un método abstracto: calcularSueldo. Definir otro método para imprimir el numbre y su sueldo.
//Plantear una subclase Empleado. Definir el atributo $horasTrabajadas, $valorHora.
// Para calcular el sueldo tener en cuenta que se le paga 3.50 la hora.
//Plantear una clase Gerente que herede de la clase Trabajador. Para calcular el 
//sueldo tener en cuenta que se le abona un 10% de las utilidades de la empresa.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom)
        {
        $this->nombre = $nom;
        }
        public function imprimir()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        public abstract function calcularSueldo();
        }

        class Empleado extends Trabajador {
        protected $horasTrabajadas;
        protected $valorHora;
        public function __construct($nom, $horas, $valor)
        {
        parent::__construct($nom);
        $this->horasTrabajadas = $horas;
        $this->valorHora = $valor;
        }
        public function calcularSueldo()
        {
        $this->sueldo = $this->horasTrabajadas*$this->valorHora;
        }
        }

        class Gerente extends Trabajador {
        protected $utilidades;
        public function __construct($nom, $uti)
        {
        parent::__construct($nom);
        $this->utilidades = $uti;
        }
        public function calcularSueldo()
        {
        $this->sueldo = $this->utilidades*0.10;
        }
        }

        $empleado1 = new Empleado('Pablo Rodriguez', 150, 3.50);
        $empleado1->calcularSueldo();
        echo 'El sueldo del empleado<br>';
        $empleado1->imprimir();

        $gerente1 = new Gerente('Marcos Herning', 1000000);
        $gerente1->calcularSueldo();
        echo 'El sueldo del gerente<br>';
        $gerente1->imprimir();


//17 - Métodos y clases final.
//Confeccionaremos las clases Operacion y la clase Suma. Definir un método final 
//en la clase Operacion y la subclase definirla de tipo final.
        class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function __construct($v1, $v2)
        {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
        }
        public final function imprimirResultado()
        {
        echo $this->resultado.'<br>';
        }
        }

        final class Suma extends Operacion{
        private $titulo;
        public function __construct($v1, $v2, $tit)
        {
        Operacion::__construct($v1, $v2);
        $this->titulo = $tit;
        }
        public function operar()
        {
        echo $this->titulo;
        echo $this->valor1.'+'.$this->valor2.' es ';
        $this->resultado = $this->valor1+$this->valor2;
        }
        }

        $suma = new Suma(10, 10, 'Suma de valores:');
        $suma->operar();
        $suma->imprimirResultado();

//Confeccionar una clase Persona que tenga como atributos el nombre y la edad.
// Definir como responsabilidades un método final que cargue los datos personales. 
// Otro método debe imprimir dichos datos personales.
//
//Plantear una segunda clase Empleado que herede de la clase Persona. Definir la
// clase Persona con el modificador Final. Añadir un atributo sueldo y los métodos
//  de cargar el sueldo e imprimir su sueldo.
//
//Definir un objeto de la clase Persona y llamar a sus métodos. También crear un 
//objeto de la clase Empleado y llamar a sus métodos.
        class Persona {
        protected $nombre;
        protected $edad;
        public final function cargarDatosPersonales($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function imprimirDatosPersonales()
        {
        echo 'Nombre:'.$this->nombre.'<br>';
        echo 'Edad:'.$this->edad.'<br>';
        }
        }

        final class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su)
        {
        $this->sueldo = $su;
        }
        public function imprimirSueldo()
        {
        echo 'Sueldo:'.$this->sueldo.'<br>';
        }
        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();


//        18 - Referencia y clonación de objetos.
//Confeccionar una clase Persona, definir los atributos nombre y edad. Definir 3
// métodos, uno que inicialice los dos atributos y otros dos que retornen el 
// nombre y la edad.
////Crear un objeto de la clase Persona y otra variable que almacene la referencia 
//al mismo objeto. Crear un segundo objeto clonandolo a partir del primer objeto.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        $x = $persona1;
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($x):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $x->fijarNombreEdad('Ana', 25);
        echo 'Después de modificar los datos<br>';
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($x):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        $persona1->fijarNombreEdad('Luis', 50);
        echo 'Después de modificar los datos de persona1<br>';
        echo 'Datos de la persona ($persona1):';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        echo 'Datos de la persona ($persona2):';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';



//Confeccionar una clase Cuadrado. Definir como atributo su lado. Implementar un 
//método que lo cargue el lado, otro que retorne su perímetro y otro que retorne su superficie.
//
//Crear un objeto de la clase Cuadrado e inicializar el lado. Definir una segunda 
//variable y asignarle la referencia del objeto de la clase Cuadrado. Imprimir la 
//superficie y perímetro mediante esta segunda variable.
        class Cuadrado {
        private $lado;
        public function cargarLado($la)
        {
        $this->lado = $la;
        }
        public function retornarPerimetro()
        {
        $p = $this->lado*4;
        return $p;
        }
        public function retornarSuperficie()
        {
        $s = $this->lado*$this->lado;
        return $s;
        }
        }

        $cuadrado1 = new Cuadrado();
        $cuadrado1->cargarLado(5);
        $x = $cuadrado1;
        echo 'La superficie del cuadrado de lado 5 es:'.$x->retornarSuperficie().'<br>';
        echo 'El perímetro del cuadrado de lado 5 es:'.$x->retornarPerimetro().'<br>';


//19 - función __clone()
//Crear una clase Persona que tenga como atributos su nombre y edad, definir los
// métodos para cargar y retornar los valores de sus atributos. Hacer que cuando 
// clonemos un objeto de dicha clase la edad de la persona se fije con cero.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        public function __clone()
        {
        $this->edad = 0;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        echo 'Datos de $persona1:';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        echo 'Datos de $persona2:';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';

//Crear la clase Persona y cuando se clone un objeto de dicha clase almacenar 
//en el atributo edad la edad actual más uno.
        class Persona {
        private $nombre;
        private $edad;
        public function fijarNombreEdad($nom, $ed)
        {
        $this->nombre = $nom;
        $this->edad = $ed;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        public function retornarEdad()
        {
        return $this->edad;
        }
        public function __clone()
        {
        $this->edad++;
        }
        }

        $persona1 = new Persona();
        $persona1->fijarNombreEdad('Juan', 20);
        echo 'Datos de $persona1:';
        echo $persona1->retornarNombre().' - '.$persona1->retornarEdad().'<br>';
        $persona2 = clone($persona1);
        echo 'Datos de $persona2:';
        echo $persona2->retornarNombre().' - '.$persona2->retornarEdad().'<br>';


//20 - Operador instanceof
//Plantear una clase Trabajador. Definir como atributos su nombre y sueldo.
// Declarar un método que retorne el sueldo.
//Plantear una subclase Empleado y otra subclase Gerente.
//Crear un vector con 3 empleados y 2 gerentes. Calcular cuanto ganan en total 
//os empleados y cuanto los gerentes (emplear el operador instanceof para identificar 
//de que clase se trata cada objeto del vector.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function retornarSueldo()
        {
        return $this->sueldo;
        }
        }

        class Empleado extends Trabajador {
        }

        class Gerente extends Trabajador {
        }

        $vec[] = new Empleado('juan', 1200);
        $vec[] = new Empleado('ana', 1000);
        $vec[] = new Empleado('carlos', 1000);

        $vec[] = new Gerente('jorge', 25000);
        $vec[] = new Gerente('marcos', 8000);

        $suma1 = 0;
        $suma2 = 0;
        for($f = 0;
        $f<count($vec);
        $f++)
        {
        if ($vec[$f] instanceof Empleado)
        $suma1 = $suma1+$vec[$f]->retornarSueldo();
        else
        if ($vec[$f] instanceof Gerente)
        $suma2 = $suma2+$vec[$f]->retornarSueldo();
        }
        echo 'Gastos en sueldos de Empleados:'.$suma1.'<br>';
        echo 'Gastos en sueldos de Gerentes:'.$suma2.'<br>';

//Plantear una clase Trabajador. Definir como atributos su nombre y sueldo. 
//Declarar un método que retorne el sueldo y otro el nombre.
//Plantear una subclase Empleado y otra subclase Gerente.
//Crear un vector con 3 empleados y 2 gerentes. Mostrar el nombre y sueldo del 
//gerente que gana más en la empresa.
        abstract class Trabajador {
        protected $nombre;
        protected $sueldo;
        public function __construct($nom, $sue)
        {
        $this->nombre = $nom;
        $this->sueldo = $sue;
        }
        public function retornarSueldo()
        {
        return $this->sueldo;
        }
        public function retornarNombre()
        {
        return $this->nombre;
        }
        }

        class Empleado extends Trabajador {
        }

        class Gerente extends Trabajador {
        }

        $vec[] = new Empleado('juan', 1200);
        $vec[] = new Empleado('ana', 1000);
        $vec[] = new Empleado('carlos', 1000);

        $vec[] = new Gerente('jorge', 25000);
        $vec[] = new Gerente('marcos', 8000);

        $may = -1;
        $nom = '';
        for($f = 0;
        $f<count($vec);
        $f++)
        {
        if ($vec[$f] instanceof Gerente)
        {
        if ($vec[$f]->retornarSueldo()>$may)
        {
        $may = $vec[$f]->retornarSueldo();
        $nom = $vec[$f]->retornarNombre();
        }
        }
        }
        echo 'El nombre del gerente con mayor sueldo es:'.$nom.'<br>';
        echo 'Y tiene un sueldo de :'.$may.'<br>';




//21 - Método destructor de una clase (__destruct)
//Confeccionar una clase Banner que muestre un texto generando un gráfico en 
//forma dinámica. Liberar los recursos en el destructor. En el constructor
// recibir el texto publicitario.
        class Banner {
        private $ancho;
        private $alto;
        private $mensaje;
        private $imagen;
        private $colorTexto;
        private $colorFondo;
        public function __construct($an, $al, $men)
        {
        $this->ancho = $an;
        $this->alto = $al;
        $this->mensaje = $men;
        $this->imagen = imageCreate($this->ancho, $this->alto);
        $this->colorTexto = imageColorAllocate($this->imagen, 255, 255, 0);
        $this->colorFondo = imageColorAllocate($this->imagen, 255, 0, 0);
        imageFill($this->imagen, 0, 0, $this->colorFondo);
        }
        public function graficar()
        {
        imageString ($this->imagen, 5, 50, 10, $this->mensaje, $this->colorFuente);
        header ("Content-type: image/png");
        imagePNG ($this->imagen);
        }
        public function __destruct()
        {
        imageDestroy($this->imagen);
        }
        }

        $baner1 = new Banner(428, 45, 'Sistema de Ventas por Mayor y Menor');
        $baner1->graficar();

//Confeccionar una clase que contenga un constructor y un destructor.
// Hacer que cada método imprima un mensaje en la página indicando que se 
// ha ejecutado dicho método.
        class Prueba {
        public function __construct()
        {
        echo 'Se ejecutó el constructor<br>';
        }
        public function __destruct()
        {
        echo 'Se ejecutó el destructor<br>';
        }
        }
        $p = new Prueba();



//22 - Métodos estáticos de una clase (static)
//Confeccionar una clase Cadena que contenga un conjunto de métodos estáticos 
//para calcular la cantidad de caracteres, convertir a mayúsculas, convertir a 
//minúsculas etc.
        class Cadena {
        public static function largo($cad)
        {
        return strlen($cad);
        }
        public static function mayusculas($cad)
        {
        return strtoupper($cad);
        }
        public static function minusculas($cad)
        {
        return strtolower($cad);
        }
        }

        $c = 'Hola';
        echo 'Cadena original:'.$c;
        echo '<br>';
        echo 'Largo:'.Cadena::largo($c);
        echo '<br>';
        echo 'Toda en mayúsculas:'.Cadena::mayusculas($c);
        echo '<br>';
        echo 'Toda en minúsculas:'.Cadena::minusculas($c);



//Plantear una clase Calculadora que contenga cuatro métodos estáticos 
//(sumar, restar, multiplicar y dividir) estos métodos reciben dos valores.
        class Calculadora {
        public static function sumar($v1, $v2)
        {
        return $v1+$v2;
        }
        public static function restar($v1, $v2)
        {
        return $v1-$v2;
        }
        public static function multiplicar($v1, $v2)
        {
        return $v1*$v2;
        }
        public static function dividir($v1, $v2)
        {
        return $v1/$v2;
        }
        }

        $x1 = 10;
        $x2 = 5;
        echo "La suma de $x1 y $x2 es:".Calculadora::sumar($x1, $x2);
        echo '<br>';
        echo "La diferencia de $x1 y $x2 es:".Calculadora::restar($x1, $x2);
        echo '<br>';
        echo "La multiplicacion de $x1 y $x2 es:".Calculadora::multiplicar($x1, $x2);
        echo '<br>';
        echo "La division de $x1 y $x2 es:".Calculadora::dividir($x1, $x2);







        //COOKIES Y SESIONES
        // Las cookies deben crearse o destruirse antes de enviar ningún carácter al navegador.
// Para crear una cookie, se utiliza la función setcookie

        setcookie("nombreCookie", valorCookie, momentoDestruccion);

// nombreCookie es el nombre con que identificará a la cookie.
//    Los nombres de cookie no deben coincidir con los nombres de los controles de los formularios
// valorCookie es el valor que se guarda en la cookie
// momentoDestruccion es el momento en que se borrará automáticamente la cookie, 
//    expresado como tiempo Unix. Para calcularlo se suele utilizar la expresion 
//    time()+$duracion donde $duracion es el número de segudos que debe 
//    permancer la cookie en el ordenador del cliente
//    Si se omite, la cookie se borrará al cerrar el navegador
// Los valores de las cookies se pueden consultar en cualquier página 
// del mismo dominio y se almacenan en la matriz $_COOKIE y en $_REQUEST
// (por eso no deben coincidir los nombres de las cookies con los de los controles de los formularios)

        $dato = $_COOKIE["nombreCookie"];
        $dato = $_REQUEST["nombreCookie"];

// Para borrar una cookie, basta con volver a crear la cookie con un tiempo anterior al actual

        setcookie(nombreCookie, valorCookie, time() - 3600);

//SESIONES
// Para utilizar variables de sesión, cada página debe abrir la sesión:

        ini_set("session.save_handler", "files"); // Sólo si session.save_handler = user en php.ini
        session_start();


// Una vez abierta la sesión, se pueden almacenar valores en la matriz $_SESSION:

        $_SESSION["dato"] = $dato;


// Los valores almacenados se pueden recuperar en cualquier página
// en la que se haya abierto sesión desde el mismo navegador:

        $dato = $_SESSION["dato"];


// Las sesiones se pierden si el usuario cierra el navegador o si se
// destruye la sesión desde el servidor:

        session_destroy();

//EJEMPLOS COOKIES Y SESIONES
//Ejemplo: Contador del número de accesos a una página
//contador del número de accesos a una página por sesión.
        session_start();
        if (!isset($_SESSION["count"])) {
        $_SESSION["count"] = 0;
        } else {
        $_SESSION["count"] ++;
        }
        ?>
    <html>
        <head>
            <title>Contador de accesos</title>
        </head>
        <body>
            <p>
<?php
print("Hola, has accedido a esta página ");
print($_SESSION["count"]);
print(" veces.");

//Ejemplo: Configuración personalizada de los colores de una página.
session_start();

if (!isset($_SESSION["bgcol"])) {
$_SESSION["bgcol"] = 0;
}

if (!isset($_SESSION["textCol"])) {
$_SESSION["textCol"] = 0;
}

if(isset($_REQUEST["enviar"])) {
$bgCol = traduce($_REQUEST["nbgCol"]);
$textCol = traduce($_REQUEST["ntextCol"]);
$_SESSION["bgCol"] = $bgCol;
$_SESSION["textCol"] = $textCol;
print "<html>\n<head>\n<title>Elección de colores</title>\n</head>\n";
print("<body bgcolor=\"$bgCol\" text=\"$textCol\">");
} else {
print "<html>\n<head>\n<title>Elección de colores</title>\n</head>\n<body>";
}

function traduce($color)
{
switch ($color) {
case "rojo" : return "red";
case "verde" : return "green";
case "azul" : return "blue";
case "cian" : return "cyan";
case "amarillo" : return "yellow";
}
}
////PARTE HTML DEL EJEMPLO
//<h2>Elige los tus colores favoritos</h2>
//<form action="<?php echo($_SERVER["PHP_SELF"]) 
?>" method="post">
                //  <p>Color de fondo:
                //    <select name="nbgCol">
                    //      <option>rojo</option>
                    //      <option>verde</option>
                    //      <option>azul</option>
                    //      <option>cian</option>
                    //      <option>amarillo</option>
                    //    </select></p>
            //  <hr />
            //
            //  <p>Color del texto:
                //    <select name="ntextCol">
                    //      <option>rojo</option>
                    //      <option>verde</option>
                    //      <option>azul</option>
                    //      <option>cian</option>
                    //      <option>amarillo</option>
                    //    </select></p>
            //  <p><input type="submit" name="enviar" /></p>
            //</form>





        ?>





    </body>
</html>



    </body>
</html>