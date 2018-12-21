<?php
/*array_map()回调函数，可用于循环处理数组*/
$arr= [SFSFSF,QEQWE];
$b = array_map('strtolower', $arr);
$a = array_map('ucfirst', array_map('strtolower', $arr));
var_dump($a);

/*创建一个函数，该函数采用1-10之间的数字数组，并返回缺少的数字
[1,2,3,4,6,7,8,9,10] => 5*/
    function text($arring){
        $arr = [1,2,3,4,5,6,7,8,9,10];
        $arr_a = array_diff($arr,$arring);
        echo "<pre>";
        print_r($arr_a);
        echo "<pre>";
    }
    $a = [1,3,5,6,7,8,9,10];
    text($a);

    function text1($arring){
        $arr = [1,2,3,4,5,6,7,8,9,10];

        foreach ( $arr as $item){
          if(!in_array($item,$arring)){
              print_r($item);
          }
        }
    }
        $a = [1,3,5,6,7,8,9,10];
        text1($a);

/*创建一个接受字符串并返回一个字符串的函数，其中每个字符重复一次。
"String" ➞ "SSttrriinngg"

"Hello World!" ➞ "HHeelllloo  WWoorrlldd!!"

"1234!_ " ➞ "11223344!!__  "*/

function echoit($string)
{
    $aa = str_split($string);
    $count = count($aa);
    for ($i = 0; $i < $count; $i++){
        for($j = 0; $j <= 1; $j++){
            print_r($aa[$i]);
        }

    }
}
echoit("dsfdsf");

/*创建一个接受字符串并返回中间字符的函数。如果单词的长度为奇数，则返回中间字符。如果单词的长度是偶数，则返回中间的两个字符。
        test" ➞ "es"
       "testing" ➞ "t"
       "middle" ➞ "dd"
       "A" ➞ "A" */
 function aqiu($string){
    $str = str_split($string);
    $count = count($str);
    if($count % 2 ){
        $a = $count / 2;
        $b =  round($a);
        print_r($str[$b-1]);
    }else{
        $a = $count / 2;
        print_r($str[$a-1]);
        print_r($str[$a]);
    }

}
aqiu(qwerer);
