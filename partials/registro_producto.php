<main>
    <h1>Gestión de productos</h1>
    <form class="fom_producto" action="?action=registrar_producto" method="POST">
    <legend>Producto</legend>
    <label for="producto">Nombre</label>
    <br\>
    <input type="text" name="producto" class="item_requerid" size="20" maxlength="25" value=""/>
    <br\>
    <label for="descripcion">Descripción del producto</label>
    <br\>
    <input type="text" name="descripcion" class="item_requerid" size="256" maxlengt="512" value="">
    <br\>
    <label for="url_img">Imagen</label>
    <br\>
    <input type="text" name="url_img" class="item_requerid" size="256" maxlength="256" value="">
    <br\>
    <label for="precio">Precio</label>
    <br\>
    <input type="text" name="precio" class ="item_requerid" size="256" maxlengt="512" value="">
    </form>
    <p><input type="submit" value="Enviar">
	<input type="reset" value="Deshacer">
	</p>
    </form>
</main>