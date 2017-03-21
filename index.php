<html>
  <head>
    <title>DoorSign - 98Seaturtles</title>
    <style>
    	body {
      		margin: 0;
    	}
		#main {
			height: 1366px;
			width: 768px;
			background-color: black;
			text-align: center;
		}
		#header {
			background-color: green;
			color: yellow;
		}
/* CUSTOM TYPEFACES */
    .title {
      font-size: 60pt;
    }
    .status {
      font-size: 48pt;
    }
/* END CUSTOM TYPEFACES */
	  </style>
  </head>
  <body>
    <div id="main">
		<div id="header">
		<br>
			<a style="font-size: 72pt;">
			Ciaran's Room
			</a><br>
		<br>
		</div>
		<br>
<!-- MESSAGES MESSAGES MESSAGES MESSAGES -->
		<div class="message">
			<br>
			<span id="title">
				TITLE TITLE
			</span>
			<br><br>
			<span id="status">
				STATUS STATUS STATUS
			</span>
			<br>
		</div>
	  </div>
  </body>
<script>
	
	setInterval(function(){
        get();
     }, 1000);
	
    function get(e){
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {
          if (request.readyState == 4 && request.status == 200) {
            document.getElementById('title').innerHTML = response['title'];
            document.getElementById('status').innerHTML = response['status'];
          }
        };
        request.open('GET', 'pageupdate.php', true);
        request.send();
    }
</script>
</html>
