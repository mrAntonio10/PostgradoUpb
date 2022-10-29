
<div id="demo">
 </div>
<script language="JavaScript">
  
function geoloc() {
  d=document.getElementById("demo");
  if (navigator.geolocation){
    
    navigator.geolocation.getCurrentPosition(showPosition,showError);

    
  }
else {
   d.innerHTML="<p>Lo sentimos, tu dispositivo no admite la geolocaización.</p>";
   }
}
function showPosition(position){
  latitud=position.coords.latitude;
  longitud=position.coords.longitude;

  nombre='https://www.google.com/maps/@'+latitud+","+longitud+',18z';
  document.form_reloj.geo.value = nombre;
  document.form_reloj2.geo.value = nombre;
  document.form_reloj3.geo.value = nombre;

}
function showError(error){
  switch(error.code) {
    case error.PERMISSION_DENIED:
      d.innerHTML+="<p>El usuario ha denegado el permiso a la localización.</p>"
      break;
    case error.POSITION_UNAVAILABLE:
      d.innerHTML+="<p>La información de la localización no está disponible.</p>"
      break;
    case error.TIMEOUT:
      d.innerHTML+="<p>El tiempo de espera para buscar la localización ha expirado.</p>"
      break;
    case error.UNKNOWN_ERROR:
      d.innerHTML+="<p>Ha ocurrido un error desconocido.</p>"
      break;
    }
  }

</script>


