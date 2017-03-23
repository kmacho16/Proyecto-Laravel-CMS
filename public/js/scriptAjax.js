$(document).ready(function(){
	var myForm  = $("#comment-form");
	var miMensaje = $("#mensaje-enviado");
	miMensaje.hide();
	var id_post = $("#post_id").val();
	var id_rol = $("#id_rol").val();
	var eliminar; 

recarga(id_post);




	myForm.submit(function(e){
		e.preventDefault();
		var name  = $(myForm).find("#name").val();
		var email  = $(myForm).find("#email").val();
		var website  = $(myForm).find("#website").val();
		var comment  = $(myForm).find("#comment").val();
		var post_id = $(myForm).find("#post_id").val();

		var path_user = $(myForm).find("#path").val();
		var token = $('input[name=_token]').val();	

		$.ajax({
			url:'/comments',
			type:'POST',
			data:{
				'name':name,
				'email':email,
				'website':website,
				'comment':comment,
				'id_post':post_id,
				'_token':token,
				'path_user':path_user
			},
			success:function(data){
				myForm.fadeOut();
				miMensaje.fadeIn();
				recarga(post_id);
			},
			error:function(data){
				var obj = jQuery.parseJSON(data.responseText);
				if(obj.name){
					alert('El campo Nombre es Obligatorio');
				}
				if(obj.email){
					alert('El campo Email es Obligatorio');
				}
				if(obj.comment){
					alert('El campo comment es Obligatorio');
				};

			}
		});

	});
});

function recarga(id_post){
$("#comentariosPost").html('');
$.get('/comentarios/'+id_post,function(resp){
	$(resp).each(function(id,value){

	
		if(id_rol>1){
			eliminar="";
		}else{
			eliminar = '<a onclick="eliminarComent('+value.id+')">Eliminar</a>';
		}

		if(value.path_user=='NULL' || value.path_user==null){
			var image = "/img/default-image.png"
		}else{
			var image = "/uploads/"+value.path_user;
		}

		$("#comentariosPost").append('<div class="row"><div class="col-md-2"><img src="'+image+'" class="img-responsive"></div><div class="col-md-10"><strong>'+value.name+'</strong><p>'+value.comment+'</p><strong>Publicado el: </strong><span>'+value.created_at+'</span>'+eliminar+'</div></div><hr>');
	});
});
}
function eliminarComent(id){
	var token = $('input[name=_token]').val();
	var id_post = $("#post_id").val();
		$.ajax({
			url:'/eliminarCom/'+id,
			type:'DELETE',
			data:{
				'_token':token,
				'id':id,
			},
			success:function(data){
				recarga(id_post);
			},
			error:function(data){
			}
		});
	};	
