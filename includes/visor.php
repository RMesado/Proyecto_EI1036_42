<div class="visor"></div>
<div>
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