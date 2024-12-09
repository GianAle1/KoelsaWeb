<!-- src/views/login.php -->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace al archivo CSS externo -->
    <link href="../style.css" rel="stylesheet">

  </head>
  <body class="text-center">

    <main class="form-signin">
        <form method="POST" action="index.php?controller=Usuario&action=login">
        <img class="mb-4" src="views/image/koelsa.png" alt="" width="200" height="200">

            <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>

            <!-- Muestra el error si las credenciales no son correctas -->
            <?php if (isset($error)): ?>
                <p class="text-danger"><?= $error ?></p>
            <?php endif; ?>

            <!-- Campo de email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="nombre@dominio.com" required>
                <label for="floatingInput">Correo electrónico</label>
            </div>

            <!-- Campo de contraseña -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Contraseña" required>
                <label for="floatingPassword">Contraseña</label>
            </div>

            <!-- Recordarme checkbox -->
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordarme
                </label>
            </div>

            <!-- Botón de enviar -->
            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </form>
    </main>

  </body>
</html>
