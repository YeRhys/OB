<?php
/*
捕捉对一些不可获取的函数的输出，比如phpinfo()会输出一大堆的HTML，
但是我们无法用一个变量例如$info=phpinfo();来捕捉
*/
ob_start();                      //打开缓冲区   
phpinfo();                       //使用phpinfo函数   
$info = ob_get_contents();       //得到缓冲区的内容并且赋值给$info   
$file = fopen('info.txt', 'w');  //打开文件info.txt   
fwrite($file, $info);            //写入信息到info.txt   
fclose($file);                   //关闭文件info.txt



/*
ob_start();                   //打开缓冲区  
echo "Hello\n";               //输出  
header("location:index.php"); //把浏览器重定向到index.php   
ob_end_flush();               //输出全部内容到浏览器
*/

/*
所有对header()函数有了解的人都知道，这个函数会发送一段文件头给浏览器，
但是如果在使用这个函数之前已经有了任何输出（包括空输出，比如空格，回车和换行）就会提示出错。
如果我们去掉第一行的ob_start()，再执行此程序，
我们会发现得到了一条错误提示："Header had all ready send by"！
但是加上ob_start，就不会提示出错，
原因是当打开了缓冲区，echo后面的字符不会输出到浏览器，
而是保留在服务器，直到你使用flush或者ob_end_flush才会输出，
所以并不会有任何文件头输出的错误！

*/










?>
