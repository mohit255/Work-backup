$(document).on("click",".click_to_chech_other_content",function(){

alert("dfv");
	$(".click_to_chech_other_content").each(function(){
		  console.log($(this).text());
	})
});