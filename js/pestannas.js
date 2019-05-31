function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("nav-link");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function mapaActivo() {
    var mapa = document.getElementById("n1");
    var datos = document.getElementById("n2");
        
    if (mapa.className == "nav-item") {
        mapa.className = "nav-item selected";
        datos.className = "nav-item";
    }
}

function datosActivo() {
    var mapa = document.getElementById("n1");
    var datos = document.getElementById("n2");
    
    if (datos.className == "nav-item") {
        datos.className = "nav-item selected";
        mapa.className = "nav-item";
    }
}






