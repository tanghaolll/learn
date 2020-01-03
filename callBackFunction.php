<?php
/*array_map 返回的是新数组，原数组不变（新数组和原数组的数组长度应该一样）。
array_filter 返回的是新数组，原数组不变。它的作用是过滤数组中的元素。
回调函数返回真，元素才能保存到新数组中，即（新数组和原数组的数组长度可能不一样）*/

/*array_map()回调函数，可用于循环处理数组*/
$arr= [SFSFSF,QEQWE]; 
$b = array_map('strtolower', $arr);
$a = array_map('ucfirst', array_map('strtolower', $arr));
var_dump($a);

//创建一个获取数字数组并仅返回偶数值的函数。

function text($arr){
    $a = array_filter($arr,function($key){

        return $key % 2 === 0;
    });
    var_dump($a);
}
$arr = [1,2,3,4,5,6,7,8];
/* text($arr);*/