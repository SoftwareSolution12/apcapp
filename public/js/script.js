
$(document).ready(function(){
    $(".btn-excluir").click(function(e){
        if (!confirm("Deseja mesmo remover?")) {
        	return false;
        }
    });
});