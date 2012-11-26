<?php
$stringtime = date(Ym,time());
echo $stringtime;
echo "<br/>";
$id="03";
if(strlen($id)<3){
$len=3-strlen($id);
for ($i=0;$i<$len;$i++){
$id='0'.$id;
}
}
echo $id;
echo "<br/>";
$str="2012031100309";
echo $str;
echo "<br/>";
$str1=substr($str,0,6);
echo $str1;
echo "<br/>";
$str1=substr($str,strlen($id)-2,2);
echo $str1+=1;
echo "<br/>";
echo '0'.$str1;



if ($a > $b)
  echo "a is bigger than b"; 
elseif ($a=$b)
echo "想等";
elseif ($a<$b)
echo "小于";

if(now>23:00)
睡觉
else 
看书


if(now>23:00)
{
	星光喝牛奶
	开暖风机
	洗澡
	吹头发
	if(头发干了){
	睡觉
	}
	else{
		吹头发
	}
}
else 
看书





for (给一个鸡翅; 给了小于或等于10个鸡翅; 再给一个) {
   吃掉
}





$arr = array(咖啡, 香蕉, 苹果, 柚子,西瓜);
foreach ($arr as &$value) {
   吃 $value;
}
?>




  