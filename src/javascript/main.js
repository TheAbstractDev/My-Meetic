$(document).ready(function()
{
	var tmp = 0;

	$(".link").click(function(e)
	{
		$("#ulSlide").slideToggle('slow');

		if(tmp %2 == 0)
		{	
			
			$(".btn img").addClass('rotation');
		}

		else
		{
			$(".btn img").removeClass('rotation');
		}

		tmp++;
	});
});