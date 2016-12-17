<?php
if(isset($_POST['submit'])){
  $link=mysql_connect("localhost","root","");
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("mydb") or die("Не могу подключиться к базе.");
 $name=htmlspecialchars(trim(stripslashes($_POST['name'])));
 $text=htmlspecialchars(trim(stripslashes($_POST['text'])));
$query=mysql_query("INSERT INTO `comments`(`id`,`user_name`,`text`)VALUES(NULL,'$name','$text')");
  $result_set = mysql_query("SELECT * FROM `comments`"); //Вытаскиваем все комментарии для 
  while ($row =mysql_fetch_assoc($result_set)) {
  	echo "<div id='comment'>";
    echo "<h1 >".$row['user_name']."</h1>";
    echo "<hr>";
    $mes="Your message is: ";
    echo "<p id='para'>".$mes.$row['text']."</p>";
    echo "<p><input type=submit id=delete name=delete value=delete><br></p>";
    echo "</div>";
  }

  
  mysql_close($link);
}
?>




<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Online store</title>

</head>

<body>
</div>
    <p><input type="submit" id="sub" name="press" value="Comment"><br></p>
  

<div>
 <form  hidden action="main.php" method="post" enctype="multipart/form-data" id="form">
Name: <br />
<input name="name"  id="name" type="text"  /> <br />
Text <br />
 <textarea rows="10" cols="45" placeholder="Share with us..." name="text"></textarea>
  <p><input type="submit" id="button" name="submit" value="Add"><br></p>


      </form>
</div>

      </div>
     <script>
     function centr_div(){
     	window_width=$(window).width();
     	window_height=$(window).height();
     	form_width=$("#form").width();
     	form_height=$("#form").height();
$("#form").css('top',(window_height/2)-(form_height/2)).css('left',(window_width/2)-(form_width/2));
     }
$("#sub").click(function(){
	$("#form").fadeIn();
centr_div();
})

     </script>
     <style>
     
#form{
	display: none;
	position:absolute;
	left:470px;
	width:430px;
	height:340px;
	border:2px dashed green;
	border-radius:12px;
	background-color: orange;

}

h1{
	text-align:center;
	padding: 5px;
	text-shadow: 1px 1px 16px #800000;
	color:#152B12;
}

#sub{
	cursor: pointer;
	position:absolute;
	left:70px;
  -webkit-border-radius: 24;
  -moz-border-radius: 24;
  border-radius: 24px;
  text-shadow: 1px 1px 3px #19301c;
  font-family: Georgia;
  color: #cbf0c9;
  font-size: 16px;
  background: #94351e;
  padding: 10px 20px 14px 16px;
  text-decoration: none;
}

#sub:hover {
  background: #a0d93c;
  text-decoration: none;
}
#button{
	cursor:pointer;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 59;
  -moz-border-radius: 59;
  border-radius: 59px;
  text-shadow: 0px 0px 8px #ff00ff;
  font-family: Courier New;
  color: #de9e85;
  font-size: 23px;
  padding: 0px 21px 10px 20px;
  text-decoration: none;
}

#button:hover {
	cursor: pointer;
  background: #b0b872;
  background-image: -webkit-linear-gradient(top, #b0b872, #48703d);
  background-image: -moz-linear-gradient(top, #b0b872, #48703d);
  background-image: -ms-linear-gradient(top, #b0b872, #48703d);
  background-image: -o-linear-gradient(top, #b0b872, #48703d);
  background-image: linear-gradient(to bottom, #b0b872, #48703d);
  text-decoration: none;
}
#comment{
	width:300px;
	height:300px;
	background:#2092c7;
	border-radius:50px;

}
#para{
	margin:5px;
	color:black;
}
body{
	padding:0;
	margin:0;
	background:url('http://images.aif.ru/008/884/4b5d077aa1342675d6bd3b8ef700cbff.jpg');
	-moz-background-size: 100%; 
    -webkit-background-size: 100%; 
    -o-background-size: 100%; 
    background-size: 100%;

}
#delete{
cursor:pointer;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 59;
  -moz-border-radius: 59;
  border-radius: 59px;
  text-shadow: 0px 0px 8px #ff00ff;
  font-family: Courier New;
  color: #de9e85;
  font-size: 23px;
  padding: 0px 21px 10px 20px;
  text-decoration: none;
}

#delete:hover {
	cursor: pointer;
  background: #b0b872;
  background-image: -webkit-linear-gradient(top, #b0b872, #48703d);
  background-image: -moz-linear-gradient(top, #b0b872, #48703d);
  background-image: -ms-linear-gradient(top, #b0b872, #48703d);
  background-image: -o-linear-gradient(top, #b0b872, #48703d);
  background-image: linear-gradient(to bottom, #b0b872, #48703d);
  text-decoration: none;
}


     </style>
</body>
</html>
