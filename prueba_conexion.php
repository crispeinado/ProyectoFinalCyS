    <?php
//esto es comentario en php
//esto es una prueba, suele dar problemas incrustar código de etsa forma

echo "hola desde php <br>";
echo "vamos a probar a hacer una conexion a base de datos en el hosting<br>";
$nombre_bd = "if0_37714239_prueba";
$usuario_bd = "if0_37714239";
$pass = "32qhgbWURWtdv";
$url_bd = "sql307.infinityfree.com";

// Create connection
$conn = new mysqli($url_bd, $usuario_bd, $pass, $nombre_bd);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
echo "si se muestra este mensaje es que he podido conectar correctamente<br>";

//vamos a hacer una inserción:
//si al acceder a una pagina de php, se me queda la pantalla en blanco es que tengo un error en el código
//si quiero obtener info de dicho error, puedo acceder a los archivos de log del hosting

//la primera vez que escribo una variable en el código, se define la variable
//las veces siguientes que la escribe, es hacer referencia a la variable
//en php se concatena string con .
$stmt = $conn->prepare("insert into productos(nombre) values(?)");
$nombre = "Juego De Tronos";
//en orden, se indica el valor que va a tomar cada una de las ? en el sql
//con una letra indicamos el tipo de dato que se asignara a la ?
//i - enteros d- double b- blob (archivos, imágenes)
$stmt->bind_param("s", $nombre);

$stmt->execute();
echo("registro de prueba completado");

echo("vamos a obtener info de la bd:<br>");
//vamos a hcer una prueba para sacar info de la bd

$sql = "select * from productos";
$res = $conn->query($sql);
if($res->num_rows > 0){
    echo("<div>");
    while($row = $res->fetch_assoc()){
        echo("<div>");
        echo("id: " . $row["id"] . " nombre: " . $row["nombre"]);
        echo("</div>");
    }
    echo("</div>");
}
$conn->close();
