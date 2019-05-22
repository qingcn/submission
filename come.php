<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>

<body>
  	*数据正在尝试提交.....*<br>
	名字:<?php echo $_POST["name"]; ?>！<br>
  班级:<?php echo $_POST["num"]; ?><br>
   邮箱:<?php echo $_POST["classl"]; ?><br> 
	<?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST["num"] . PHP_EOL . $_POST["classl"] .PHP_EOL . $_POST["name"];
			fwrite($fp, $str);
			
		}
		fclose($fp);
  											
	?>
	<?php
			$conn = mysqli_connect(localhost,user, password);
			if(! $conn){
				die("连接失败！ " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'bt_lovpass_cn');
			$sql="INSERT INTO student (name, Sno, class)
			VALUES
			('$_POST[name]','$_POST[num]','$_POST[classl]')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("提交失败！,有几种可能，数据库连接失败，存在数据重复提交，存在不合法字符。" . mysqli_error($conn));
 
			}
			mysqli_close($conn);
	?>
</head>
</body>
</html>