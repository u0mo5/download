<?php
// 将接受post数据写入数据库,实现表单提交本身页面
if (isset($_POST['action']) && $_POST['action'] == '提交') {
//定义
$name = $_POST['name'];
$text = $_POST['text'];
$day=date(Y年m月d日);
//调用类

require 'downloader.php';
$httpdown = new HttpDownload();
$httpdown->OpenUrl($text);
echo $httpdown->GetHtml();
$httpdown->Close();



/*
require 'downloader.php';
$file = new HttpDownload(); # 实例化类
$file->OpenUrl($text); # 远程文件地址
$file->SaveToBin("down/".$name); # 保存路径及文件名
$file->Close(); # 释放资源





#两种使用方法，分别如下：

#打开网页
$httpdown = new HttpDownload();
$httpdown->OpenUrl("http://www.google.com.hk");
echo $httpdown->GetHtml();
$httpdown->Close();


#下载文件
$file = new HttpDownload(); # 实例化类
$file->OpenUrl("http://www.ti.com.cn/cn/lit/an/rust020/rust020.pdf"); # 远程文件地址
$file->SaveToBin("rust020.pdf"); # 保存路径及文件名
$file->Close(); # 释放资源


  
    print '<a href="'. $_SERVER['PHP_SELF'] .'">成功，返回</a>';
// 域名转向
echo '<script LANGUAGE="JavaScript">';
echo 'window.location=';
echo '"';
echo $_SERVER['PHP_SELF'];
echo '"';
echo ';';
echo '</script>';
*/

} else {
?>

<html>
	<head>
		<title>离线下载</title>
	</head>
	<body>
		<center><h1>离线下载</h1></center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

 	<center>文件名: <input type="text" name="name" style="height:30px; font-size:25px;" /> </center><p>
	<center>地址链: <input type="text" name="text" style="height:30px; font-size:25px;" /> </center><p>
	<textrea name="text" cds ="500" rows="500"</textrea> 
    
    <center><input type="hidden" name="action" value="提交"></center>
    <center><input type="submit" name="submit" value="提交"></center>
</form>

<table border =2 width=100%>
<tr><td>
<?php
//打开 down目录
$dir = dir("down");

//列出 down 目录中的文件
while (($file = $dir->read()) !== false)
{
echo '<a href="down/'. $file .'">'.$file.'</a>';
}

$dir->close();
?> 
</td></tr></table>
</body>
</html>
<?php
}
?> 