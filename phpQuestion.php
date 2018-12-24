<?php
// 创建一个带有数字数组的函数，并将平均值作为字符串返回。
$arr = [1, 0, 4, 5, 2, 4, 1, 2, 3, 3, 3];
function text4($arr){
    foreach ($arr as $value){
        $num += $value;
    }
//    array_sum($arr);
    $value = $num / count($arr);
    echo $value;

}
text4($arr);
//   创建一个函数，该函数接受一个数字数组并返回一个数组，其中每个数字是其自身的总和+数组中的所有先前数字。
// [3, 3, -2, 408, 3, 3] ➞ [3, 6, 4, 412, 415, 418]
$arr = [3, 3, -2, 408, 3, 3];
function text_3($arr){
    foreach ($arr as $value){
        $sum += $value;
        $new[] = $sum;
    }
    var_dump($new);
}
/*text_3($arr);*/
// 创建一个采用字符串数组的函数。返回数组中恰好是四个字母的所有单词。
// ["Ryan", "Kieran", "Jason", "Matt"] ➞ ["Ryan", "Matt"]
function appe ($arr){
    foreach ($arr as $value){
        if(strlen($value) == 4){
            $new[] = $value;
        }
    }
    var_dump($new);
}
/*$app = ["Ryan", "Kieran", "Jason", "Matt"];
appe($app);*/

//创建一个获取数字数组并仅返回偶数值的函数。

function text($arr){
    $a = array_filter($arr,function($key){

        return $key % 2 === 0;
    });
    var_dump($a);
}
/*$arr = [1,2,3,4,5,6,7,8];
 text($arr);*/

// 创建一个函数，该函数将任何非负数作为参数，并以降序返回数字。降序是指从最高到最低排序。
// $this->assertEquals(977766200, sortDecending(670276097));
// 1254859723 ➞ 9875543221
function text1($string){
    $str = str_split($string);
    rsort($str);
    $str_1 = implode($str);
    var_dump($str_1);
}
/*$str = 13324142;
text1($str);*/

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
