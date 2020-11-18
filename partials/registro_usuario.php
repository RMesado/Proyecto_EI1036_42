<main>
    <h1>Datos de registro: </h1>
    <form class="form_usuario" onsubmit="submitClick(event)" action="?action=insertar_usuario" method="POST">

        <legend>Datos básicos</legend>
        <label for="username">Usuario</label>
        <br />
        <input oninput="validacionUsername()" type="text" id="username" name="username" required="required" class="item_requerid" size="20"
            maxlength="25" value="" />
        <br />
        <label for="email">Email</label>
        <br />
        <input oninput="validacionEmail()" id="email" required="required" type="text" name="email" class="item_requerid"
            size="20" maxlength="25" value="" />
        <br />
        <label for="passwd">Clave</label>
        <br />
        <input oninput="validacionPasswd()" type="password" id="passwd" name="passwd" required="required" class="item_requerid" size="8"
            maxlength="25" value="" />
        <br />
        <p><input type="submit" value="Enviar">
            <input type="reset" value="Deshacer">
        </p>
    </form>
</main>