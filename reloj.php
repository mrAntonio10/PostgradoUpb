<html>
<head>
<title>Reloj con Javascript</title>
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = (momentoActual.getMinutes()<10?'0':'') + momentoActual.getMinutes()
    segundo = (momentoActual.getSeconds()<10?'0':'') + momentoActual.getSeconds()
    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>
</head>

<body onload="mueveReloj()">

Vemos aquí el reloj funcionando...

<form name="form_reloj">
<input type="text" name="reloj" size="10">
</form>

</body>
</html>