window.onload=function(){

this.document.getElementById('btnRegistracija').addEventListener('click', provera);
  
function provera (e){
  e.preventDefault();
  var punoIme = document.getElementById("ime1");
  var rePunoIme = /^([A-Z][a-z]{2,15})(\s[A-Z][a-z]{2,15})+$/;
 
  var greska=false;
 
  if (!rePunoIme.test(punoIme.value) || punoIme.length==0) {
  punoIme.classList.add("error");
 
  document.getElementById("ime1Greska").innerHTML="Polje za ime nije u dobrom formatu";
  greska=true;
  }
  else {
  punoIme.classList.remove("error");
  document.getElementById("ime1Greska").innerHTML=" ";
  greska=false;
  }
 
  var proveraEmail = document.getElementById("email");
  var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
 
  if(!reEmail.test(proveraEmail.value) || proveraEmail.length==0) {
  proveraEmail.classList.add("error");
  document.getElementById("emailGreska").innerHTML="Polje za email nije u dobrom formatu";
  greska=true;
  }
  else {
  proveraEmail.classList.remove("error");
  document.getElementById("emailGreska").innerHTML=" ";
  greska=false;
  }
 
  var proveraUsername = document.getElementById("korisnickoIme");
  var reUsernamePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
 
  if(!reUsernamePassword.test(proveraUsername.value) || proveraUsername.length==0)
 {
  proveraUsername.classList.add("error");
  document.getElementById("korisnickoGreska").innerHTML="Korisnicko ime mora imati barem 8 karaktera, jedno veliko slovo i brojeve"
  greska=true;
  }
  else {
  proveraUsername.classList.remove("error");
  document.getElementById("korisnickoGreska").innerHTML=" ";
  greska=false;
  }
 
  var lozinkaProvera = document.getElementById("lozinka");
 
  if(!reUsernamePassword.test(lozinkaProvera.value) || lozinkaProvera.length==0)
 {
  lozinkaProvera.classList.add("error");
  document.getElementById("lozinkaGreska").innerHTML="Lozinka mora imati barem 8 karaktera, jedno veliko slovo i brojeve"

  greska=true;
  }
  else {
  lozinkaProvera.classList.remove("error");
  document.getElementById("lozinkaGreska").innerHTML=" ";
  greska=false;
  }
 
  if(greska==false){
  var obj={
  fullname: $("#ime1").val(),
  email: $("#email").val(),
  username: $("#korisnickoIme").val(),
  password: $("#lozinka").val(),
  register: true
  };

$.ajax({
  url: "php/registracija.php",
  method: "POST",
  dataType: "json",
  data: obj,
  success: function(data){
  $("#proslo").html("You've successfully made an account");
   
},
  error: function(xhr, status, error){
  var poruka ="";
  switch(xhr.status){
  case 404: poruka = "Page not found";
  break;
 case 409: poruka = "Username or email already exists";
  break;
 case 422: poruka = "Data not entered in a valid format";
  break;
 case 500: poruka = "Error";
  break;
  }
  $("#proslo").html(poruka);
  }
  });
  }
}
}