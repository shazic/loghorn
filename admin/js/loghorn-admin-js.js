	function HandleLogoBrowseClick()	{
			var logofileinput = document.getElementById("loghorn_logo_browse");
			logofileinput.click();
	}
	function HandleLogochange()	{
			var logofileinput = document.getElementById("loghorn_logo_browse");
			var logotextinput = document.getElementById("loghorn_logo_filename");
			logotextinput.value = logofileinput.value.replace("C:\\fakepath\\", "");
	}
	function HandleBGBrowseClick()	{
			var bgfileinput = document.getElementById("loghorn_bg_browse");
			bgfileinput.click();
	}
	function HandleBGchange()	{
			var bgfileinput = document.getElementById("loghorn_bg_browse");
			var bgtextinput = document.getElementById("loghorn_bg_filename");
			bgtextinput.value = bgfileinput.value.replace("C:\\fakepath\\", "");
	}
	function showValueFormRed(newValue)
	{
		document.getElementById("loghorn_form_slider_red_span").innerHTML=newValue;
	}
	function showValueFormGreen(newValue)
	{
		document.getElementById("loghorn_form_slider_green_span").innerHTML=newValue;
	}
	function showValueFormBlue(newValue)
	{
		document.getElementById("loghorn_form_slider_blue_span").innerHTML=newValue;
	}
	function showValueFormAlpha(newValue)
	{
		document.getElementById("loghorn_form_slider_alpha_span").innerHTML=newValue+"%";
	}