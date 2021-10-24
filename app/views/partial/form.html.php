<?php include "app/views/partial/aux/form.php"; ?>

<form class="form" id="create" method="POST" action="<?= $instancePath ?>">

  <!-- Alert message -->
  <?php include "app/views/partial/alert.html.php"; ?>

  <div class="form-field">
    <label class="input-fa-label" for="inputName"><i class="far fa-id-badge"></i></label>
    <input id="inputName" type="text" class="form-input input-left-label" name="name" value="<?= $userData['name'] ?>" placeholder="Nombre" required autofocus>
  </div>

  <div class="form-field">
    <label class="input-fa-label" for="inputLastName"><i class="fas fa-dna"></i></label>
    <input id="inputLastName" type="text" class="form-input input-left-label" name="surname" value="<?= $userData['surname'] ?>" placeholder="Apellido" required>
  </div>

  <div class="form-field">
    <label class="input-fa-label" for="inputCountry"><i class="far fa-flag"></i></label>
    <select id="inputCountry" type="text" class="form-input input-left-label" name="country_code" required data-code="<?php echo $userData['country_code']; ?>">
      <option value="">Seleccione país</option>
    </select>
  </div>

  <div class="form-field">
    <label class="input-fa-label" for="inputDni"><i class="far fa-id-card"></i></label>
    <input id="inputDni" type="number" class="form-input input-left-label" name="dni" value="<?= $userData['dni'] ?>" placeholder="DNI" required>
  </div>

  <div class="form-field">
    <label class="input-fa-label" for="inputEmail"><i class="fas fa-envelope-square"></i></label>
    <input id="inputEmail" type="email" class="form-input input-left-label" name="email" value="<?= $userData['email'] ?>" placeholder="Mail" required>
  </div>

  <div class="form-field <?php echo isset($user) ? 'd-none' : ''; ?>">
    <label class="input-fa-label" for="inputPassword"><i class="fas fa-key"></i></label>
    <input id="inputPassword" type="<?php echo isset($user) ? 'hidden' : 'password'; ?>" <?php echo isset($user) ? 'hidden' : 'required'; ?> class="form-input input-left-label" name="password" value="<?= $userData['password'] ?>" placeholder="Contraseña">
  </div>

  <?php if (isset($user)) : ?>

    <div class="alert info">
      <div class="alert-icon">
        <i class="fas fa-info-circle"></i>
      </div>
      <div class="alert-message">
        Al mantener vacío el campo de nueva contraseña se mantiene la acutal
      </div>
    </div>

    <input class="d-none" type="hidden" hidden id="id" name="id" value="<?= $userData['id'] ?>">

    <div class="form-field">
      <label class="input-fa-label" for="inputModPassword"><i class="fas fa-key"></i></label>
      <input class="form-input input-left-label" type="password" id="inputModPassword" name="modpassword" value="" placeholder="Contraseña" autocomplete="new-password">
    </div>

    <div class="form-field">
      <label class="input-fa-label" for="inputConfirmModPassword"><i class="fas fa-key"></i></label>
      <input class="form-input input-left-label" type="password" id="inputConfirmModPassword" name="confirm-modpassword" value="" placeholder="Repetir contraseña" autocomplete="new-password">
    </div>

  <?php endif; ?>

  <!-- Hidden submit input -->
  <?php include "app/views/partial/fake-input.html.php"; ?>

</form>
