<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>BaseStatus</title>

	<link href="core/stylesheets/BaseStatus.css" rel="stylesheet">

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