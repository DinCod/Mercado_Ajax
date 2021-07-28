function cancelarVenta(id){
    alertify.confirm('Venta Del Producto','¿Desea Cancelar la venta del Producto?', function(){ 
        alertify.success('Se canceló la venta del Producto') 
        $.ajax({
            url:"../controlador/borrarVentaProducto.php",
            type:"post",
            data:{"idproducto":id},
            success:function(data){
                if(data=="ok"){
                   listarImgProducto();
                }else{
                    alert("error al cancelar la venta");
                }
            }
        });
    },
     function(){ alertify.error('Canceló la operación')});
}

function verProductoVenta(id){
    $.ajax({
        url: "../controlador/obtenerImgProducto.php",
        type: "post",
        data: { "idproducto": id },
        success: function(response){
            const file = JSON.parse(response);
            file.forEach(file =>{
                $("#idproducto").val(file.idproducto);
                $("#txtnombre").val(file.nombreproducto);
                $("#txtprecio").val(file.precioVenta);
                $("#txtcantidad").val(file.cantidad); 
                $("#modal-venta").modal('show');
            });
        }
    });
}

function venderProducto(){
    var id = $("#idproducto").val();
    var cantidad = $("#txtcantidad").val();
    var cantidadVender  = $("#txtventa").val();
    var cantidad_stock  = Number(cantidad);
    var cantidad_vender = Number(cantidadVender);
    if(!cantidadVender){ 				 			 
	alertify.alert('Venta de Producto','Ingrese una cantidad a vender');
    }else{
    if(cantidad_vender <=cantidad_stock){
        $.ajax({
            url:"../controlador/insertarVentaProducto.php",
            type:"post",
            data:{"id":id,"cantidad":cantidad,"cantidadVender":cantidadVender},
            success: function(get){
              if(get=="ok"){
                $("#modal-venta").modal('hide');
                $("#txtventa").val("");
                cantidadVender=null;
                listarImgProducto();
              }else{
                alert("Error al vender el Producto");
              } 
            }
        });
    }else{
        alertify.alert('Venta de Producto', 'La cantidad a verder sobrepasa el stock');
    }
}

}
function listarComboBox(){
    $.ajax({
        url: "../controlador/listarComboBox.php",
        type:"post",
        success: function(get){
        $('#combo').html(get);
        }
    });
}

function verdatosImg(id){
    $.ajax({
        url: "../controlador/obtenerImgProducto.php",
        type: "post",
        data: { "idproducto": id },
        success: function(response){
            const file = JSON.parse(response);
            file.forEach(file =>{
                $("#idproductoimg").val(file.idproducto);
                $("#txtidimg").val(file.idImagen);
                $("#txtnombreimagen").val(file.nombreproducto);
                $("#txtcantidadimagen").val(file.cantidad); 
                $("#txtprecioimagen").val(file.precioVenta);
                $('#txtimagen').attr('src','data:image/png;charset=utf8;base64,'+file.imagen);
                $("#modal-imagen").modal('show');
            });
        }
    });
}
function actualizarImg(){
    var edit = false;
    var frmData = new FormData;
    var image = document.getElementById('txtimage').files[0];
        frmData.append("id", $("#idproductoimg").val());
        frmData.append("nombre",$("#txtnombreimagen").val());
        frmData.append("cantidad",$("#txtcantidadimagen").val());
        frmData.append("precio", $("#txtprecioimagen").val());
        frmData.append("img",image);
    console.log(image);  
    if(!image){
       edit = false;
    }else{
       edit=true;
    }
    let url = edit === false ? '../controlador/actualizarSinImg.php' : '../controlador/actualizarImgProducto.php';
        $.ajax({
        url: url,
        type: "post",
		data: frmData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
			if(data=="ok"){
                $("#txtimage").val("");
				$("#modal-imagen").modal('hide');
                listarComboBox();
                listarImgProducto();
                
            }else {
				alert("error al actualizar");
			}
        }
    });
}
function guardarImagen(){
    var frmData = new  FormData;
    var combo = document.getElementById('combo').value;
    var image = document.getElementById('image').files[0];
    frmData.append('combo',combo);
    frmData.append('img',image);
    $.ajax({
        url: "../controlador/insertarImgProducto.php",
        type: "post",
		data: frmData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
			if(data=="ok"){
				listarImgProducto();
                listarComboBox();
                $("#image").val("");
			}else if(data=="existe") {
                alertify.alert('Imagen Producto', 'El producto ya cuenta con una imagen');
                $("#image").val("");
			}else{
                alertify.alert('Imagen Producto', 'Seleccione una Imagen');
            }
        }
    });
}
function listarImgProducto(){
    $.ajax({
        url: "../controlador/listarImgProducto.php",
        type: "post",
        data: {  },
        success: function(data){
			$("#tbodyList").html(data);
        }
    });
}
function eliminarImg(id){
    alertify.confirm('Eliminar Imagen Producto','¿Desea eiliminar la imagen del Producto?',
    function(){ alertify.success('Eliminado') 
    $.ajax({
        url: "../controlador/borrarImgProducto.php",
        type: "post",
        data: { "idproducto": id },
        success: function(data){
        	if( data == "ok"){
        		listarImgProducto();
                listarComboBox();
        	} else {
        		alert("error al eliminar la imagen");
        	}
        }
    });
    }, 
    function(){ alertify.error('Se canceló la operación')});
}