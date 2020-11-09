<div id="ventanita" class="popup">
    <script src="js/pop.js"></script>
    <button type="button" id="x"" onclick=fuctionhide()>X</button>
<form action=" ?action=upload" method="post" enctype="multipart/form-data">
        Selecciona una imagen:
        <input type="file" accept="image/*" name="tmp_file" id="update" onchange="handleFiles(event)">
        <canvas id="canvas"></canvas>
        <input type="submit" value="SUBIR" name="submit">
        </form>
</div>