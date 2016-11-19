
/*-----------------custom js starts----------------------------*/
jQuery("#search").keyup(function(){
	jQuery(".aSearch").hide();
	var data=jQuery("#search").val();
	//alert("test");
	if(data.length>3)
	{
		jQuery.ajax({
			url:"../search.php?data="+data,
			success:function(response){
				var result=JSON.parse(response);
				//console.log(result.vFile[0]);
				//console.log(result.vName[0]);
				jQuery(".aSearch ul").empty();
				jQuery(result.vName).each(function(index,element){
					var fileName=result.vFile[index].replace("   ","+++");
					fileName=fileName.replace("  ","++");
					fileName=fileName.replace(" ","+");
					jQuery(".aSearch ul").append('<li file='+fileName+'>'+element+'</li>');
					jQuery(".aSearch ul li").bind("click",showData);
					});
				jQuery(".aSearch").show();
			}
        });
    }
});
var vPath;
var vname ;
var showData=(function(){
	vname=$(this).text();
	vPath=$(this).attr('file');
	console.log(vPath);
	
	jQuery("#search").val(vname);
	//jQuery("#search").attr('file',vPath);
	jQuery(".aSearch").hide();

});
jQuery(".icon-search").click(function(){
	window.location.href="http://debateplus.com/single.php?v="+vname;
});


/*-----------------custom js ends----------------------------*/
