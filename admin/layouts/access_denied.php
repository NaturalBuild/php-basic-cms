<!DOCTYPE html>
<html>
<head>
	<title>ACCESS DENIED</title>
	<style>

		div#hdr {
			background: #8D0100;
			padding: 8px;
			font-size: 2em;
			color: white;
			text-align: center;
			margin: 20px auto;
		}

		div#container {
			width: 50%;
			margin:0 auto;
			background: #fff;
			border-radius: 5px;
			padding: 10px;
			text-align: center;
			
		}
		div#container  img {
			display: block;			
			margin: auto;
			padding: 10px;
		}

		body {
			background: #C2C2C2; /* For browsers that do not support gradients */	
		}

		div#content {
			background: #D0D0D0;
			border: 2px solid #272822;
			border-radius: 5px; 
		}

	</style>
</head>
<body>
<div id="hdr">
	Trying to unauthorised access
</div>

<div id="container">
	<img src="../css/loader/access_denied.png" id="imgId">

	<div id="content">
		<h1 style="color: #FF0000;">Access to the requested page has been denied</h1>
		URL: <?php 	echo '<a href="">http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'</a>';?>
		<br>
		Client IP: <?php echo $_SERVER["REMOTE_ADDR"]; ?>

		<p>Please contact the Network Administrator if you think there has been an error</p>
	</div>
</div>

</body>
</html>