<?php
// ������post����д�����ݿ�,ʵ�ֱ��ύ����ҳ��
if (isset($_POST['action']) && $_POST['action'] == '�ύ') {
//����
$name = $_POST['name'];
$text = $_POST['text'];
$day=date(Y��m��d��);
//������

require 'downloader.php';
$file = new HttpDownload(); # ʵ������
$file->OpenUrl($text); # Զ���ļ���ַ
$file->SaveToBin("down/".$name); # ����·�����ļ���
$file->Close(); # �ͷ���Դ



/*






#����ʹ�÷������ֱ����£�

#����ҳ
$httpdown = new HttpDownload();
$httpdown->OpenUrl("http://www.google.com.hk");
echo $httpdown->GetHtml();
$httpdown->Close();


#�����ļ�
$file = new HttpDownload(); # ʵ������
$file->OpenUrl("http://www.ti.com.cn/cn/lit/an/rust020/rust020.pdf"); # Զ���ļ���ַ
$file->SaveToBin("rust020.pdf"); # ����·�����ļ���
$file->Close(); # �ͷ���Դ
*/

  
    print '<a href="'. $_SERVER['PHP_SELF'] .'">�ɹ�������</a>';
// ����ת��
echo '<script LANGUAGE="JavaScript">';
echo 'window.location=';
echo '"';
echo $_SERVER['PHP_SELF'];
echo '"';
echo ';';
echo '</script>';


} else {
?>

<html>
	<head>
		<title>��������</title>
	</head>
	<body>
		<center><h1>��������</h1></center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

 	<center>�ļ���: <input type="text" name="name" style="height:30px; font-size:25px;" /> </center><p>
	<center>��ַ��: <input type="text" name="text" style="height:30px; font-size:25px;" /> </center><p>
	<textrea name="text" cds ="500" rows="500"</textrea> 
    
    <center><input type="hidden" name="action" value="�ύ"></center>
    <center><input type="submit" name="submit" value="�ύ"></center>
</form>

<table border =2 width=100%>
<tr><td>
<?php
//�� downĿ¼
$dir = dir("down");

//�г� down Ŀ¼�е��ļ�
while (($file = $dir->read()) !== false)
{
echo '<a href="down/'. $file .'">'.$file.'</a><br>';
}

$dir->close();
?> 
</td></tr></table>
</body>
</html>
<?php
}
?> 