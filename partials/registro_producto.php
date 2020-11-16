<main>
    <h1>Gestión de productos</h1>
    <form class="fom_producto" action="?action=registrar_producto" method="POST">
    <fieldset>
    <legend>Producto</legend>
    <label for="producto">Nombre</label>
    <br\>
    <input id="producto" type="text" name="producto" class="item_requerid" size="20" maxlength="25" value="">
    <br\>
    <label for="descripcion">Descripción del producto</label>
    <br\>
    <input id="descripcion" type="text" name="descripcion" class="item_requerid" size="256" maxlengt="512" value="">
    <br\>
    <label for="precio">Precio</label>
    <br\>
    <input id="precio" type="text" name="precio" class="item_requerid" size="10" value="">
    <br\>
    <input type="button" value="Añadir Imagen" id=68 onclick="popup(); guardarDatos();">
    <input id="foto" type="text"  name="url_img" readonly>
    <br\>
    </fieldset>
    <br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Deshacer">
    </br>
    </form>
</main>