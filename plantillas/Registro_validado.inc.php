
<div class = 'form-group'>
<label>Nombre de Usuario</label>
<input text = 'type' class = 'form-control' name = "nombre" placeholder = "Ejemplo: Jimmy" <?php $validador->mostrar_nombre(); ?> >
<?php $validador->mostrar_error_nombre(); ?>
</div>
<div class = 'form-group'>
<label>Email</label>
<input type = 'email' class = 'form-control' name = "email" placeholder = "Ejemplo: Jimmy@ejemplo.com"<?php $validador->mostrar_email(); ?>>
<?php $validador->mostrar_error_email(); ?>
</div>
<div class = 'form-group'>
<label>Contraseña</label>
<input type = "password" class = 'form-control' name = "clave1" placeholder = "*****">
<?php $validador->mostrar_error_clave1(); ?>
</div>
<div class = 'form-group'>
<label>Confirmar Contraseña</label>
<input type = "password" class = 'form-control' name = "clave2" placeholder = "*****">
<?php $validador->mostrar_error_clave2(); ?>
</div>
<button type = 'submit' class = 'btn btn-primary' name = "enviar">Enviar datos</button>
<br>
<br>
<button type = 'submit' class = 'btn btn-primary'>Limpiar datos</button>

