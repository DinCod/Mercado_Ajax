function listarHistorial(){
	var busca= $("#txtbuscar").val();
	$.ajax({
        url: "controlador/historial_Usuario.php",
        type: "post",
        data: { "buscar": busca },
        success: function(data){
			$("#historial").html(data);
        }
    });
}

function listarProductosEnVenta(){
    
}