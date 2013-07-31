<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>ToDo's</title>
	
	<style type="text/css">

		@font-face {
			font-family: "Roadgeek2005SeriesD";
			src: url("http://panic.com/fonts/Roadgeek 2005 Series D/Roadgeek 2005 Series D.otf");
		}

	body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td {
			margin: 0;
			padding: 0;
		}

		fieldset,img {
			border: 0;
		}
		#wrapper{
			overflow: hidden;
		}
		body, a {
			color: white;
 			font-family: 'Roadgeek2005SeriesD', sans-serif;
			font-size: 20px;
			line-height: 24px;
			text-decoration: none;
		}
		body, html, #wrapper {
			background: transparent !important;
		}
		
		#container {
			padding: 10px;
		}
		#container * {
			font-weight: normal;
		}
			
		.avatar {
			border-radius: 100px;
			vertical-align: top;
			float: left;
			margin-right: 25px;
		}
		
		.todo {
			padding-bottom: 10px;
		}
		
		h1 {
				margin-bottom: 28px;
				color: white;
				text-shadow:0px -2px 0px black;
				text-transform: uppercase;
		}
			
		h2 {
			font-size: 20px;
			color: rgb(252,107,0);
		}
		h3 {
			font-size: 16px;
			line-height: 18px;
			color: rgb(100,112,118);
			text-transform: uppercase;
		}
		ul {
			list-style: none;
			margin: 0px; 
		}
		li {
			padding-left: 1em; 
			text-indent: -.7em;
			margin: 20px;
		}
		li:before {
    	content: "☐ ";
	    color: rgb(252,107,0);
		}
		.info {
			color: rgb(100,112,118);
			font-size: 70%;
			display: block;
		}
		
		
	</style>

	<script type="text/javascript">

		function refresh()
		{
		  var req = new XMLHttpRequest();
		  console.log("Connectiong to Basecamp...");
		  
		  req.onreadystatechange=function() {
		    if (req.readyState==4 && req.status==200) {
		    	document.getElementById('container').innerHTML = req.responseText;
		    }
		  }
		  req.open("GET", 'core/todos.php', true);
		  req.send(null);
		}; 

		function init()
		{
			// Change page background to black if the URL contains "?desktop", for debugging while developing on your computer
			if (document.location.href.indexOf('desktop') > -1)
			{
				document.getElementById('container').style.backgroundColor = 'black';
			}
			
			refresh()
			var int=self.setInterval(function(){refresh()},30000);
		}

	</script>
</head>
<body onload="init()">
	<div id="wrapper">
		<div id="container">
		</div>
	</div>
</body>
</html>