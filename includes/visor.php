<div class="visor"></div>
<div>
<fieldset>
<legend>Buscar producto por nombre</legend>
<label for="productos">Nombre</label>
<input type="text" list="lista" name="productos" onselect = "buscador(this.value)">
<datalist id ="lista" >
</datalist>
</fieldset>
    <form class="form_usuario" action="javascript:null" onsubmit="filtroPrecio()" method="POST">
		<fieldset>
            <legend>Filtrar rango de precios</legend>
            <label for="min">Mínimo</label>
			<br/>
			<input type="text" id="min" class="item_requerid" size="20" maxlength="25"/>
            <br/>
            <label for="max">Máximo</label>
			<br/>
			<input type="text" id="max"  class="item_requerid" size="20" maxlength="25"/>
			<br/>
		</fieldset>
		<p>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form></div>