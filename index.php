 <!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- external libs and css -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="style.css"></link>
<!-- scripts -->

</head>
<body>
<div id="main"">
	<center>
	<div id="main-content-left-container">
		<ul id="menu_items">
			<li onclick="location.href='IAcommentsArtistsWork.php';">> AI comments Artist's work <</li>
			<li onclick="location.href='ArtistfeedIAwhofeedArtist.php';" >> Artist feeds AI who feeds Artist <</li>
		</ul>
	</div>
</div>
<div id="info" class="hidden">
	<center>
		<br><br><br>
	<u>Machine Jacqueline</u> has been created during the workshop 
        <i>Machine Jacking</i> <br>organised by <a href="http://chevalvert.fr">ChevalVert</a> at <a href="http://stereolux.org">Stereolux</a> in December 2017<br>
        <br><br>
    <iframe width="1280px" height="720px" src="https://realtimeboard.com/app/embed/o9J_k0ZYSDY=/?" frameborder="1" scrolling="no" allowfullscreen></iframe>
</center>
</div>
<div id="menu">
    <div  id="infobttn"  alt="infos">i</div>
</div>
<script type="text/javascript">
    $("#infobttn").click(function() {
        $("#info").toggleClass("hidden");
        $("#main").toggleClass("blured");
    });
    $("#info").click(function() {
        $(this).toggleClass("hidden");
        $("#main").toggleClass("blured");
    });
</script>
</body>
</html>