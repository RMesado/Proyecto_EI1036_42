function handleFiles(e) {
    var canvas = document.getElementById('canvas');
    canvas.width  = 500;
    canvas.height = 300;
    let ctx = document.getElementById('canvas').getContext('2d');
    let img = new Image();
    img.src = URL.createObjectURL(e.target.files[0]);
    img.onload = function () {
        ctx.drawImage(img, 0, 0, img.width,    img.height,     // source rectangle
            0, 0, canvas.width, canvas.height);
    }
}