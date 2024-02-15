<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nueva contraseña a continuacion</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php"
?>

<?php if($error) return; ?>
<form class="formulario" method="POST" >

    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password" 
            id="password"
            placeholder="Tú Nueva Contraseña"
            name="password"
        />
    </div>
    
    <input type="submit" class="boton" value="Guardar Nueva Contraseña">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión.</a>
    <a href="/olvide">¿Aún no tienes cuenta? Crear una</a>
</div>