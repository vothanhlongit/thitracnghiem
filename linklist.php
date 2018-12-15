<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="treejquery/jquery.js" type="text/javascript"></script>
	<script src="treejquery/jquery-ui.custom.js" type="text/javascript"></script>
	<script src="treejquery/jquery.cookie.js" type="text/javascript"></script>

	<link href="treejquery/src/skin-vista/ui.dynatree.css" rel="stylesheet" type="text/css">
	<script src="treejquery/src/jquery.dynatree.js" type="text/javascript"></script>
	<script src="treejquery/sample.js" type="text/javascript"></script>
	<title>Dynatree - Example Browser</title>

<style type="text/css">
body {
	background-color: #033;
	color: white;
	font-family: Helvetica, Arial, sans-serif;
	font-size: smaller;
	background-image: url("nav_bg.png");
	background-repeat: repeat-x;
}
a {
	color: white;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
div#tree {
	position: absolute;
	height: 95%;
	width: 95%;
	padding: 5px;
	margin-right: 0px;
	
}
ul.dynatree-container {
	height: 100%;
	width: 100%;
	background-color: transparent;
}
ul.dynatree-container a {
	color: white;
    font-weight: bold;
	border: 1px solid transparent;
	background-color: transparent;
}
ul.dynatree-container a:hover {
	background-color: transparent;
}
ul.dynatree-container a:focus, span.dynatree-focused a:link {
	background-color: gray;
}
</style>

<script type="text/javascript">
	$(function(){
		// --- Initialize sample trees
		$("#tree").dynatree({
			autoFocus: true,
//			persist: true,
			minExpandLevel: 2,
			onFocus: function(node) {
				// Auto-activate focused node after 1 second
				if(node.data.href){
					node.scheduleAction("activate", 1000);
				}
			},
			onBlur: function(node) {
				node.scheduleAction("cancel");
			},
			onActivate: function(node){
				if(node.data.href){
					window.open(node.data.href, node.data.target);
				}
			}
		});
	});
</script>

</head>

<body>
<div id="tree">
  <ul>
	<li class="folder expnded">CMTEST2
   <ul>
     <li class="folder">GIÁM KHẢO
		  <ul>
			<li><a target="content" href="GiamKhao/danhsachbaithi.php">Xem Bài Thi</a>            
	    </ul>   
   <li class="folder">THÍ SINH
         <ul>
			<li><a target="content" href="ThiSinh/timkiembaithi.php">Xem lại bài thi</a>
          </ul>    
          
          
      </ul>
</ul>
	</div>
</body>
</html>