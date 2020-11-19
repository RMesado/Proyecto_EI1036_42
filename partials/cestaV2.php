<div id="caro_movil" class="widget">  
<form class="form_compra" action="?action=comprar" method="POST">

<section class="lista">
  <ul id="list">
  </ul>
  <table class="tabla"id=tabla>

  </table>
</section>

<center>
   <button onclick="rellenar()">Guardar</button>
</center>
<input type="text" id="nover" hidden name="productos" >
<input type="submit" value="Enviar" onclick="rellenar()" >
<input type="reset" value="Deshacer" onclick="rellenar()">
</form>
</div>