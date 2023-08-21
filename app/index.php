<?php
session_start();
include("bd.php");

if (!$_SESSION["user_id"]) {
    header("LOCATION: ../login.php");
}
// Borrar registro si se proporciona txtID en la URL
if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $sentencia = $conexion->prepare("DELETE FROM tb_symptom_record WHERE record_id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}

// Consultar registros de síntomas
$sentencia = $conexion->prepare("SELECT * FROM tb_symptom_record WHERE user_id = :user_id");
$sentencia->bindParam(":user_id", $_SESSION['user_id']);
$sentencia->execute();
$lista_síntomas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Malaria App</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./../css/bootstrap.css">
    <link href="./../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="page-top">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" id="loginNav">
            <div class="container">
                <a class="navbar-brand-login" href="/malariaapp">Malaria App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#app">App</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#portfolio">Malaria</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link" href="./../mapa.php">Mapa</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#team">Equipo</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link nav-login" href="./../login.php">
                                    <?= $_SESSION ? $_SESSION['user_name'] : 'Iniciar Sesión' ?>
                                </a></li>
                        </b>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <section id="chat-section">
            <div class="chat-container">
                <div class="chat-header">Chatbot Malaria App</div>
                <div class="chat-messages">
                    <?php
                    //Mensaje de inicio
                    $sentencia = $conexion->prepare("SELECT count(*) as n_messages FROM tb_chat_messages WHERE message_user = :user");
                    $sentencia->bindParam(":user", $user_id);
                    $sentencia->execute();
                    $messages = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    if ($messages){
                        echo '<div class="message bot">Hola, me llamo Mara. ¿En qué puedo ayudarte?</div><br>';
                    }

                    $bot_responses = [
                        "Hola" => "¡Hola! ¿En qué puedo ayudarte?",
                        "Me gustaría agregar un síntoma" => "Claro, estoy para ayudarte. Porfavor ingresa la información solicitada y lo registraré en mis datos.",
                        "Adiós" => "¡Hasta luego! Si tienes más preguntas, no dudes en regresar.",
                        // Agrega más respuestas aquí
                    ];

                    $user_id = $_SESSION['user_id'] ?? 0;

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $user_message = $_POST["user_message"];
                        $content = htmlspecialchars($user_message) ?? "";
                        $date = date("Y-m-d");

                        // Almacenar mensaje en la base de datos del usuario
                        $sentencia = $conexion->prepare("INSERT INTO tb_chat_messages VALUES (NULL, :content, :user, :date, 0);");
                        $sentencia->bindParam(":content", $content);
                        $sentencia->bindParam(":user", $user_id);
                        $sentencia->bindParam(":date", $date);
                        $sentencia->execute();

                        $bot_response = "Lo siento, no entiendo ese mensaje.";

                        // Buscar respuesta del bot
                        foreach ($bot_responses as $key => $response) {
                            if (stripos($user_message, $key) !== false) {
                                $bot_response = $response;
                                break;
                            }
                        }

                        // Almacenar mensaje en la base de datos del chat
                        $sentencia = $conexion->prepare("INSERT INTO tb_chat_messages VALUES (NULL, :content, :user, :date, 1);");
                        $sentencia->bindParam(":content", $bot_response);
                        $sentencia->bindParam(":user", $user_id);
                        $sentencia->bindParam(":date", $date);
                        $sentencia->execute();
                        if ($user_message == 'Me gustaría agregar un síntoma') {
                            header("LOCATION: sections/symptoms/crear.php");
                        }
                    }
                    // Publicar mensajes
                    $sentencia = $conexion->prepare("SELECT * FROM tb_chat_messages WHERE message_user = :user");
                    $sentencia->bindParam(":user", $user_id);
                    $sentencia->execute();
                    $chat_history = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($chat_history as $message) {
                        $class = $message->is_chatter == 0 ? "user" : "bot";
                        echo "<div class='message $class'>", $message->message_content, '</div><br>';
                    }
                    ?>
                </div>
                <form id="chat-form" action="index.php" method="post">
                    <div class="chat-input">
                        <select class="user-select" name="user_message">
                            <option value="Hola">Hola</option>
                            <option value="Me gustaría agregar un síntoma">Me gustaría agregar un síntoma</option>
                            <option value="Adiós">Adiós</option>
                            <!-- Agrega más opciones aquí -->
                        </select>
                        <button type="submit" class="send-button">Enviar</button>
                        <a name="" id="" class="dark-gray-button" href="./sections/chatbot/newchat.php"
                            role="button">Limpiar Chat</a>
                    </div>
                </form>
            </div>
            <script>
                // Función para desplazar la caja de mensajes hacia abajo
                function scrollChatToBottom() {
                    var chatMessages = document.querySelector(".chat-messages");
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            </script>
        </section>
        <section id="symptoms-section">
            <h1><a class="navbar-brand" href="./login.php">Síntomas</a></h1>
            <div class="card">
                <div class="card-header">
                    <a name="" id="" class="btn btn-primary" href="sections/symptoms/crear.php" role="button">Registrar
                        síntoma</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Intensidad</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lista_síntomas as $registro) { ?>
                                    <tr>
                                        <td>
                                            <?= $registro['record_id'] ?>
                                        </td>
                                        <td>
                                            <?= $registro['symptom_name'] ?>
                                        </td>
                                        <td>
                                            <?= $registro['symptom_description'] ?>
                                        </td>
                                        <td>
                                            <?= $registro['symptom_intensity'] ?>
                                        </td>
                                        <td>
                                            <?= $registro['symptom_date'] ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="sections/symptoms/editar.php?txtID=<?= $registro['record_id'] ?>"
                                                role="button">Editar</a>
                                            <a class="btn btn-primary" href="index.php?txtID=<?= $registro['record_id'] ?>"
                                                role="button">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-success" href="sections/symptoms/analisis.php" role="button">Analizar</a>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
</body>

</html>