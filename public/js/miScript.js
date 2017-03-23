function LeerURL(input){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload=function(e){
			$("#mi_img").attr('src',e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
};
$('#miImagenInput').change(function(){
	LeerURL(this);
});