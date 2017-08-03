$(document).ready(function()
		{
			$("body").css("background-color","rgba(125,125,125,.6)");
			$(".Login-btn").on("click",function(){
				$(".Signup").slideUp("slow",function()
				{
					$(".Login").slideToggle("slow",function()
					{
					  setTimeout(function(){ $(".Log_user").focus()},0);
					});
				});
			});
			$(".Signup-btn").on("click",function(){
				$(".Login").slideUp("slow",function()
				{
					$(".Signup").slideToggle("slow",function()
					{
					  setTimeout(function(){ $(".Sign_user").focus()},0);
					});
				});
			});
			$(".notification").on("click",function()
			{
			  $(".notify").slideToggle("slow");
			});
		});