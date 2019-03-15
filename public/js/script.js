$(document).ready(function(){
	//alert('prueba');
	//$("#myModal").modal("show");
	$('.btn-danger').click(function(e){
		e.preventDefault();
		 //alert('prueba');
		 if (! confirm("Eliminar?")){
		 		return false; 
		 }
		 var row = $(this).parents('tr');
		 var form = $(this).parents('form');
		 var url = form.attr('action');

		 $.post(url, form.serialize(), function(result){
		 	row.fadeOut();
		 	$("#myModalLabel").html("BORRAR");
		 	$("#Titulo").html("Producto Eliminado");
		 	$("#btn1").fadeOut();
		 	$("#myModal").modal("show");
		 }).fail(function(){
		 	alert('Algo salio mal');
		 });
		 
	});
});

