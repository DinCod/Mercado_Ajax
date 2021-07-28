function listado(){
	var busca= $("#txtbusca").val();
	$.ajax({
        url: "../controlador/listarProducto.php",
        type: "post",
        data: { "busca": busca },
        success: function(data){
			console.log(data);
			$("#registros").html(data);
        }
    });
}

function insert(){
	var nombre = $("#txtnombre").val();
	var cantidad = $("#txtcantidad").val();
	var precio = $("#txtprecio").val();
	var venta = $("#txtprecioventa").val();
	var cat = $("#txtcat").val();
    $.ajax({
        url: "../controlador/insertarProducto.php",
        type: "post",
		data: { "nombre": nombre, "cantidad": cantidad, "precio": precio, "venta": venta, "cat": cat},
        success: function(data){
			console.log(data);
			if(data=="ok"){
				listado();
				$("#modalfrm").modal('hide');
			} else {
				alert("Error al insertar los datos");
			}
        }
    });
}
//limpiar las cajas de texto;
function nuevo(){
    $("#idproducto").val('');
	$("#txtnombre").val('');
	$("#txtcantidad").val('');
	$("#txtprecio").val('');
	$("#txtprecioventa").val('');
	$("#txtcat").val('');
    $("#modalfrm").modal('show');
}
function eliminar(id){
	$.ajax({
        url: "../controlador/borrarProducto.php",
        type: "post",
        data: { "idproducto": id },
        success: function(data){
        	if( data == "ok"){
        		listado();
        	} else {
        		alert("Hubo un error al eliminar la persona");
        	}
        }
    });
}
function verdatos(id){
	$.ajax({
        url: "../controlador/obtenerProducto.php",
        type: "post",
        data: { "idproducto": id },
        success: function(data){
			//console.log(data);
        	var datos = JSON.parse(data);
			$("#idproducto").val(datos.idproducto);
			$("#txtnombre").val(datos.nombreproducto);
			$("#txtcantidad").val(datos.cantidad); 
			$("#txtprecio").val(datos.preciocompra);
			$("#txtprecioventa").val(datos.precioventa);
			$("#txtcat").val(datos.idcategoria);
			$("#modalfrm").modal('show');
        }
    });
}
function guardar(){
 var id = $("#idproducto").val();
   if(id>0){
    actualizar();
   }else{
 
   insert();
   }
   
}
function actualizar(){
	var id = $("#idproducto").val();
	var nombre = $("#txtnombre").val();
	var cantidad = $("#txtcantidad").val();
	var precio = $("#txtprecio").val();
	var venta = $("#txtprecioventa").val();
	var cat = $("#txtcat").val();
	$.ajax({
        url: "../controlador/actualizarProducto.php",
        type: "post",
		data: { "nombre": nombre, "cantidad": cantidad, "precio": precio, "idpersona": id , "venta": venta, "cat": cat},
        success: function(data){
			console.log(data);
			if(data=="ok"){
				listado();
				$("#modalfrm").modal('hide');
			} else {
				alert("Error al actualizar los datos");
			}
        }
    });

}

/*
function buscardatos(consulta){
	$.ajax({
        url: "buscar.php",
        type: "POST",
		dataType: 'html',
        data: {consulta: consulta},
    })	
    .done(function(respuesta){
		
		$('#registros').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup','#buscar', function(){
	var valor = $(this).val();
	if(valor !=  ""){
		listado(valor);

	}else{
        listado();
	}
});*/











