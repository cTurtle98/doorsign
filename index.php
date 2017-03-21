<html>
  <head>
	  <title>DoorSign - 98Seaturtles</title>
	  <link rel="stylesheet" href="main.css">
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
		<div id="message" class="">
			<br>
			<span id="title">
			</span>
			<br><br>
			<span id="status">
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
			  var response = request.responseText;
			  var title = response[0].title;
			  var type = response[0].type;
			  var status = response[0].status
			  var currentTitle = document.getElementById('title');
			  var currentStatus = document.getElementById('status');
			  
if(title != currentTitle || status != currentStatus){
    currentTitle.innerHTML = title;
    currentStatus.innerHTML = status;
    document.getElementById('message').setAttribute("class", type)
}
          }
        };
        request.open('GET', 'pageupdate.php', true);
        request.send();
    }
</script>
</html>
