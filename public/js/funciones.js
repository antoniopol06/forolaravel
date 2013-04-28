$(document).on("ready",iniciar);
function iniciar()
{
	$('input#titulo').on('blur', reemplazar); 
}

function reemplazar()
{
	
	var title = $('#titulo').val();
	title = title.replace(/[\s]/gi, '-');
	title = title.toLowerCase();
    title = title.replace(/[àáâãäå]/g,"a");
    title = title.replace(/[æ]/g,"ae");
    title = title.replace(/[ç]/g,"c");
    title = title.replace(/[èéêë]/g,"e");
    title = title.replace(/[ìíîï]/g,"i");
    title = title.replace(/[ñ]/g,"n");                
    title = title.replace(/[òóôõö]/g,"o");
    title = title.replace(/[œ]/g,"oe");
    title = title.replace(/[ùúûü]/g,"u");
    title = title.replace(/[ýÿ]/g,"y");
    title = title.replace(/[ñ]/g,"n");
    title = title.replace(/[=();:.{},"\[\]\/]/g,"");  
	$('#url').val(title);
}


