<?php defined('BASEPATH') || exit('Direct access is not allowed'); ?>

<?php include "app/views/partial/header.html.php"; ?>

<section class="container login-container">

  <div class="container-title dark">Login</div>

  <div class="container-content">

    <form class="form" id="login" method="POST" action="<?= '/login/sign-in' ?>">

      <!-- Alert message -->
      <?php include "app/views/partial/alert.html.php"; ?>

      <div class="form-field">
        <label class="input-fa-label" for="login-mail"><i class="fas fa-user"></i></label>
        <input id="login-mail" type="text" class="form-input input-left-label" name="email" placeholder="Mail" required autofocus>
      </div>

      <div class="form-field">
        <label class="input-fa-label" for="login-password"><i class="fas fa-lock"></i></label>
        <input id="login-password" type="password" name="password" class="form-input input-left-label" placeholder="Contraseña" required>
      </div>

      <!-- Hidden submit input -->
      <?php include "app/views/partial/fake-input.html.php"; ?>

    </form>

  </div>

  <div class="text-center dark">
    <button class="button primary" type="submit">Iniciar sesión</button>
  </div>

</section>

<?php include "app/views/partial/footer.html.php"; ?>
