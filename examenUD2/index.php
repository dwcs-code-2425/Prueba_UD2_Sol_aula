<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proba UD2</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <h1>Proba Eval UD2</h1>

    <form method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <div>
            <label for="files">Adxunte un ou máis arquivos:</label>
            <input type="file" id="files" name="files[]" multiple>
        </div>

        <input type="submit" value="Enviar" name="btnEnviar">
    </form>
    <?php
    ini_set("display_errors", "On");

    const KILOBYTES_FACTOR = 1024;
    include_once 'util.php';

    $num_erros = 0;

    $usuarios = array(
        "user" => array("Ana", "Luz"),

        "admin" => array("root")

    );

    


    if (isset($_FILES["files"]) && ($_FILES["files"]["name"][0]!=="")) {

        amosarTaboa("files");

        echo "<p> O número de arquivos con erros foi: $num_erros</p>";
    }

    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
        if(isInArray($nome)){
            echo "<p> O nome $nome xa existe en \$usuarios </p>";
        }
        else{
            echo "<p> O nome $nome NON existe en \$usuarios </p>";
        }
    }

    ?>
</body>

</html>