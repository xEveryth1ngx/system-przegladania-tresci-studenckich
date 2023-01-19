var svg1 = document.getElementById("WI1PP");
var svg2 = document.getElementById("WI1P1");

svg1.style.display = "block";
svg2.style.display = "none";



function chngimg(){
  var e = document.getElementById("buildingselect");
  var value = e.value;
  if (value=="WI1PP"){
    svg1.style.display = "block";
    svg2.style.display = "none";
  }
  
  if (value=="WI1P1"){
    svg1.style.display = "none";
    svg2.style.display = "block";
  }
}



  
function hide(){
    var option = document.getElementById("search-select");

    if(option.value == "pracownik"){
        document.getElementById("pomieszczenie_form").style.display = "none";
        document.getElementById("pracownik_form").style.display = "block";
    }
    
    if(option.value == "pomieszczenie"){
        document.getElementById("pracownik_form").style.display = "none";
        document.getElementById("pomieszczenie_form").style.display = "block";
    }

}
