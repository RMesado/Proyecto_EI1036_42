<div id="ventanita" class="popup">
    <script src="js/pop.js"></script>
    <button type="button" id="x"" onclick=fuctionhide()>X</button>
<form onsubmit="validarImagen(event)" action=" ?action=upload" method="post" enctype="multipart/form-data">
        <label for="url_img">Selecciona una imagen:</label><br/>
        <input type="file" accept="image/*" name="url_img" id="update" onchange="handleFiles(event)"><!--como toques la etiqueta name te reviento :)-->
        <br/>
        <canvas id="canvas"></canvas>
        <br/>

        <input type="submit" value="SUBIR" name="submit" onclick=guardarDatoFile()>
        </form>
</div>