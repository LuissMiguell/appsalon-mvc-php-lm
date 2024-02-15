<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión con tus Datos</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php"
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email" 
            id="email"
            placeholder="Escribe un email"
            name="email"
            value="<?php echo s($auth->email); ?>"
        />
    </div>

    <div class="campo">
        <label for="password">Contraseña</label>
        <input
            type="password"
            id="password"
            placeholder="Escribe una contraseña"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">

</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una Cuenta.</a>
    <a href="/olvide">¿Olvidaste tú password?</a>
</div>