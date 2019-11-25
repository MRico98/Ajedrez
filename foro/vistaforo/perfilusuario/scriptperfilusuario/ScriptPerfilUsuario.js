var cuerpo = document.getElementById("cuerpoperfil");

var modal = document.getElementsByClassName("modal")[0];

// Get the button that opens the modal
var btn = document.getElementById("botoncrearforo");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
};
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == cuerpo) {
        modal.style.display = "none";
    }
};
function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (26+o.scrollHeight)+"px";
}