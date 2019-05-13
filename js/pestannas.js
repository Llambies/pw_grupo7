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






function showdetails(wwww) {
  if (wwww==1) {
    console.log(wwww)
    document.getElementById("alpha").style.display = "none";
    document.getElementById("beta").style.display = "block";
    

    
  }
  else{
    console.log(wwww)
    document.getElementById("alpha").style.display = "block";
    document.getElementById("beta").style.display = "none";
    

    
  }

}



