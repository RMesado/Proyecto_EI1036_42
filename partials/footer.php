<footer>
	<p>
	<img src="https://licensebuttons.net/l/by-sa/3.0/88x31.png" height="31px" /><br/>
	<time datetime="2018-09-18">2018</time>.</p>
	</p>
	<address>
		<p class="izq"> Written by
			<a href="mailto:webmaster@example.com" rev="author">Lola</a>.</p>
		<p class="der"> Visit us at:12006 UJI </p>
	</address>
</footer>

<script>
	let divCaja=document.getElementById("caro_movil");
   divCaja.onmousedown=function(){startDrag();}
   fetch('/includes/datos.php')
.then(response => response.json())
.then(json => rellenarVisor(json))
.catch(err => console.log(err))

</script>
</body>

</html>