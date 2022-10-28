<!-- script para tener en cuenta la hora ACTUAL en la que se envió el Doc-->
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = (momentoActual.getMinutes()<10?'0':'')+momentoActual.getMinutes()
    segundo = (momentoActual.getSeconds()<10?'0':'')+momentoActual.getSeconds()
    horaImprimible = hora+":"+minuto+":"+segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>