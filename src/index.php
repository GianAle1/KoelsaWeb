<?php
// Iniciar sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir el modelo de Usuario
require_once 'models/Usuario.php';

// Verificar si el formulario de login ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Instanciar el modelo de Usuario
    $usuario = new Usuario();

    // Verificar las credenciales
    if ($usuario->verificarUsuario($correo, $contraseña)) {
        // Si las credenciales son correctas, redirigir al menú
        header("Location: views/menu.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, mostrar un mensaje
        $error = "Credenciales incorrectas.";
    }
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        height: 100%;
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        text-align: center;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      .text-danger {
        color: red;
      }

      .form-signin img {
        width: 72px;
        height: 57px;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <main class="form-signin">
      <!-- Imagen y Título al principio -->
      <img src="./views/image/koelsa.png" alt="Logo de Bootstrap">
      <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>

      <!-- Mostrar el mensaje de error si es necesario -->
      <?php if (isset($error)): ?>
          <p class="text-danger"><?php echo $error; ?></p>
      <?php endif; ?>

      <!-- Formulario de Login -->
      <form method="POST" action="index.php">
        <div class="form-floating">
          <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com" required>
          <label for="correo">Correo</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña" required>
          <label for="contraseña">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
