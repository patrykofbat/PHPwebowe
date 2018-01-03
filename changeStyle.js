
function setStyle() {
  var cookies = document.cookie.split(";");
  var style = cookies[0].split("=");
  document.getElementById('linkStyle').setAttribute("href", style[1]);
}

function changeStyle(style){
  var controlStyle = document.getElementById('linkStyle');
  controlStyle.setAttribute("href", "style" + style + ".css");
  document.cookie = "currentStyle=style" + style + ".css;";

}
