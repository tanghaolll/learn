<?php
/*创建一个函数，它将两个数字作为参数及其总和。return
* */
function addition($int,$int1){
    return $int + $int1;
}

echo addition(1,2);

/*创建一个以数字作为唯一参数的函数，如果它小于或等于零则返回，否则返回。truefalse*/
    function lessThanOrEqualToZero($num) {
        return $num <= 0 ? "true":"false";
    }
    print_r(lessThanOrEqualToZero(-2)) ;

/*
 * 创建一个函数，该函数将数字作为参数，并返回偶数和奇数。"even""odd"
 * */
    function isEvenOrOdd($num) {
        return ($num % 2)?'odd':'even';

    }
    $num = 3;
    isEvenOrOdd($num);



    /*
     * 创建一个接受字符串并返回单词计数的函数。这个字符串将是一个句子。
     * */
    function countWords($str) {
        echo count(explode(' ',$str));
    }
    $set ="Just an example here move along";
      //  countWords($set);

/*
 * 创建一个接受字符串（人名和姓）的函数，并返回一个字符串，其中交换了名字和姓氏。*/
function nameShuffle($str){
    return implode(' ',array_reverse(explode(' ',$str)));

}
/*合并三个数组的所有可能性*/
function arrMer($arr1,$arr2,$arr3){
    $data = [];
    $len1 = count($arr1);
    $len2 = count($arr2);
    $len3 = count($arr3);
    for($i = 0; $i < $len1; $i++){
        for($j = 0; $j < $len2; $j++){
            for($k = 0; $k < $len3; $k++){
                $str = $arr1[$i].'-'.$arr2[$j]."-".$arr3[$k];
                array_push($data,$str);
            }
        }
    }
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}
$arr1= ['1','2','3','4','5'];
$arr2= ['A','B','C','D'];
$arr3= ['a','b',];
//arrMer($arr1,$arr2,$arr3);

/** 实现随机红包
 * @param $total 红包总金额
 * @param $num   红包个数
 * @return array
 */
class  redbao {
    public function rand_section($total,$num)
    {
        $min = 0.01;//每个人最少能收到0.01元
        $data = [];
        for ($i = 1; $i < $num; $i++) {
            $safe_total = ($total - ($num - $i) * $min) / ($num - $i);
            $money = mt_rand($min * 100, $safe_total * 100) / 100;
            $total = $total - $money;

            $data[$i] = $money;
        }
        $data[$num] = $total;
        return $data;
    }
}

//$a = new redbao();
//var_dump($a->rand_section(100,7));

/*创建一个函数，该函数接受一组数字并返回集合中的最小数字。
 * findSmallestNum*/
function findSmallestNum($arr) {
    echo  min($arr);
    echo max($arr);
}
$arr = [0.4356, 0.8795, 0.5435, -0.9999];
//findSmallestNum($arr);
/*字母排序*/
function azSort($str){
    $arr = str_split($str);
    sort($arr);
    return $arr;
}
$str = "hello";
//print_r(azSort($str));

/*创建一个以数字作为参数的函数。将所有数字从1添加到传递给函数的数字。例如，如果输入为4，那么您的函数应返回10，因为1 + 2 + 3 + 4 = 10。*/

function addUp($num) {
    if($num == 1) {
        return $num;
    }else {
        $sum = $num + addUp($num-1);

        //return $sum;
    }
}
$num = 4;
echo addUp($num);
/*
 * 创建一个函数，非负的数组数和字符串，没有字符串返回一个新的数组。*/
function   filterArray($arr) {
    return  array_filter($arr,'is_integer');
}
$arr = [1, 2, "aasf", "1", "123", 123];

//print_r(filterArray($arr));
/*计算整数的二进制表示中的1的数量。因此，例如，因为12是二进制的'1100'，返回值应该是。2
 * */
function totwo($num){
    $a =  decbin($num);
    return substr_count($a,1);
}
//print_r(totwo(12));
//给定数字n，编写一个将PI返回到n个小数位的函数。
function piapia($num){
    echo round(M_PI,$num);
}
piapia(5);
/*创建一个函数，该函数接受一个数字数组并返回一个新数组，按升序排列（从最小到最大）。
按升序对数字数组排序。
如果functions参数为null或空数组，则返回一个空数组。
返回新的已排序数字数组。
*/
function sortNumsAscending($arr) {
    if(is_null($arr) || $arr === []){
        return [];
    }else{
        sort($arr);
        return $arr;

    }
}
/*print_r(sortNumsAscending([1, 2, 10, 50, 5]));*/
/*创建一个获取数字数组并返回以下统计信息的函数：
最低价值
最大价值
序列长度
平均值
minMaxLengthAverage([6, 9, 15, -2, 92, 11]) ➞ [-2, 92, 6, 21.833333333333332]
minMaxLengthAverage([30, 43, 20, 92, 3, 74]) ➞ [3, 92, 6, 43.666666666666664]
minMaxLengthAverage([4.54, 8.32, 5.20]) ➞ [4.54, 8.32, 3, 6.02]
*/
function minMaxLengthAverage($arr){
    return [min($arr), max($arr), count($arr), array_sum($arr) / count($arr)];
}
//print_r(minMaxLengthAverage([6, 9, 15, -2, 92, 11]));

/*编写一个带有四个字符串参数的函数。您将比较第一个字符串和三个下一个字符串。验证第一个字符串是以第二个字符串开头
，包括第三个字符串，还是以第四个字符串结尾。如果第一个字符串通过所有检查，则返回字符串，
否则返回。"My head, body, and tail.""Incomplete."
例子
verifySubstrs("Onomatopeia", "on", "mato", "ia") ➞ "Incomplete."
verifySubstrs("Centipede", "Cent", "tip", "pede") ➞ "My head, body, and tail."
verifySubstrs("apple", "AP", "PPL", "LE") ➞ "Incomplete."
*/
function verifySubstrs ($first,$second,$third,$fourth) {
    if( substr($first,0,strlen($second)) === $second && strpos($first,$third) >= 0 && substr($first,-strlen($fourth)) === $fourth) {
        return "My head, body, and tail.";
    }else{
        return "Incomplete.";
    }
}
//var_dump(verifySubstrs("Centipede", "Cent", "tip", "pede"));
/*创建一个函数，该函数采用10个数字（0到9之间）的数组，并返回格式化为电话号码的那些数字的字符串（例如，（555）555-5555）。*/
function formatPhoneNumber($arr){
    return "(" . join(array_slice($arr,0,3)) .")" . " " . join(array_slice($arr,3,3)) . "-" . join(array_slice($arr,6,4));
}
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
/*print_r(formatPhoneNumber($arr));*/

/*创建一个带字符串的函数，检查它是否具有相同数量的'x'和'o'并返回或者。truefalse
返回一个布尔值（或）。truefalse
该字符串可以包含任何字符。
如果字符串中既不是x也不是o，则返回。true*/
function Xo($str){
    return substr_count(strtolower($str),"x") == substr_count(strtolower($str),"o");
}
function XOo($str) {
    $char_arr = str_split($str);
    $xs = 0;
    $os = 0;
    foreach ($char_arr as $char)
    {
        if (strtoupper($char) === "X")
            $xs++;

        if (strtoupper($char) === "O")
            $os++;
    }

    return $xs === $os;
}
$str = "sfdmxoo";
//var_dump(Xo($str));
/*highLow("1 2 3 4 5") ➞ "5 1"
输出最大 最小值
*/
function highLow($str){
    $arr = explode(' ',$str);
    $count = count($arr);
    rsort($arr);
    echo $arr[0]." ".$arr[$count-1];
}
$str = "1 2 3 4 5";
highLow($str);


//求平均数，保留两位小数
function mean($arr){
    return round (array_sum($arr) / count($arr),2);
    $count = count($arr);
    $d =  array_sum($arr) / $count;
    $b= sprintf("%.2f", $d);
    return (string)$b;
}
function mean1($arr){
    return round (array_sum($arr) / count($arr),2);
}
$arr =[1, 0, 4, 5, 2, 4, 1, 2, 3, 3, 3];
// var_dump( mean($arr));


/*capMe
capMe(["mavis", "senaida", "letty"]) ➞ ["Mavis", "Senaida", "Letty"]*/
function capMe1($arr){
    return array_map('ucfirst',array_map('strtolower',$arr));
}

function capMe($arr) {
    $new =  array_map('change',$arr);
    print_r($new);
}
function change($arr){
    $first = strtoupper(substr($arr,0,1));
    $end = strtolower(substr($arr,1,strlen($arr)));
    $str = $first.$end;
    return $str;
}

/*$arr = ["samuel", "MABELLE", "letitia", "meridith"];
var_dump(capMe($arr));*/
/*
 * 创建一个获取项目数组的函数，
 * 删除所有重复项目并以与旧数组相同的顺序返回一个新数组（减去重复项）。
 */
function removeDups1($arr){
    $new = array_unique($arr);
    return $new;
}
function removeDups($arr){
    $new = array();
    foreach ($arr as $item){
        if(!in_array($item,$new)){
            $new[] = $item;
        }
    }
    return $new;
}
$arr = ["John",1, "Taylor", "John",1];
/*print_r(removeDups($arr));*/

//快速排序
function quickSort($arr){
    if(count($arr) <= 1){
        return $arr;
    }
    $index = (int)floor(count($arr) / 2);
    $value = $arr[$index];
    $left = $right = array();
    array_splice($arr,$index,1);
    for ($i = 0; $i < count($arr); $i++){
        if($arr[$i] < $value){
            array_push($left,$arr[$i]);
        }else{
            array_push($right,$arr[$i]);
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    array_push($left,$value);
    $new_arr = array_merge($left,$right);
    return $new_arr;
}
/*$arr = [6,5,3,1,8];
print_r(quickSort($arr));*/


//冒泡排序
function bubbleSort($num) {
    $count = count($num);
    for ($i = 0; $i < $count-1;$i++){
        for ($j = 0; $j < $count - $i - 1; $j++){
            if($num[$j] < $num[$j+1]){
                $temp = "";
                $temp = $num[$j];
                $num[$j] = $num[$j+1];
                $num[$j+1] = $temp;
            }
        }
    }
    return $num;
}

//编写一个函数，它接受两个字符串并返回（或）它们是否是字谜。true false
/*isAnagram("cristian", "Cristina") ➞ true

isAnagram("Dave Barry", "Ray Adverb") ➞ true

isAnagram("Nope", "Note") ➞ false*/
$str1 = "Dave Barry";
$str2 = "Ray Adverb";
function isAnagram($s1, $s2) {
    $s1_arr = str_split(strtolower($s1));
    $s2_arr = str_split(strtolower($s2));
    sort($s1_arr, SORT_STRING);
    sort($s2_arr, SORT_STRING);
    return $s1_arr === $s2_arr;
}
isAnagram($str1,$str2);

//求出b返回a的相对路径
function comporseDir($str1,$str2){
    $arr1 = explode('/',dirname($str1));
    $arr2 = explode('/',dirname($str2));
    $len = count($arr2);
    for($i = 0; $i < $len; $i++){
        if ($arr1[$i] != $arr2[$i]){
            break;
        }
    }
    if ($i == 1) {
        $return_arr = array_fill(0,$len,'..');
    }
    if ($i !=1 && $i < $len) {
        $return_arr = array_fill(0,$len-$i ,"..");
        var_dump($return_arr);
    }
    if($i == $len){
        $return_arr = array("./");
    }
    $return_arr = array_merge($return_arr,array_slice($arr1,$i));
    return implode('/',$return_arr);

}
/*$a = "/a/b/c/d.txt";
$b = "/a/b/12/123.php";
print_r(comporseDir($a,$b));*/

//递归遍历文件夹
function fileOPen($dir){
    if(is_dir($dir)){
        $files = array();
        $child_dirs = scandir($dir);
        foreach($child_dirs as $child_dir){
            if($child_dir != '.' && $child_dir != '..'){
                if(is_dir($dir.'/'.$child_dir)){
                    $files[$child_dir] = fileOPen($dir.'/'.$child_dir);
                }else{
                    $files[] = $child_dir;
                }
            }
        }
        return $files;
    }else{
        return $dir;
    }

}
/*    echo "<pre>";
var_dump(fileOpen("F:\AppServ\www\book"));
    echo "</pre>";*/

//传入一段字符串，大于5个反转
$str = "This is a typical sentence.";
function reverse($str){
    $arr = explode(' ',$str);
    foreach ($arr as $key => $value){
        if(strlen($value) >=5 ){
            $item = strrev($value);
            $arr[$key] = $item;
        }
    }
    $str =  implode(' ',$arr);
    print_r($str);
}
reverse($str);

//去掉重复，排序
$arr = [1, 4, 4, 4, 4, 4, 3, 2, 1, 2];
function uniqueSort($arr){
    $new_arr = array_unique($arr);
    sort($new_arr);
    var_dump($new_arr);

}
uniqueSort($arr);

//首字母和最后一个互换位置，如果长度小于2 显示Incompatible ，如果传入的[1,2,3,4]，显示Incompatible，如果首字母和尾字母相同，显示Two's a pair.

$str = "Cat, dog, and mouse.";
function flipEndChars($str) {
    if(gettype($str) !== "string"){
        return  "Incompatible";
    }elseif (strlen($str) < 2 ){
        return "Incompatible";
    }elseif ((substr($str,0,1)) == (substr($str,-1)) ){
        return "Two's a pair.";
    }else{
        return substr($str,-1).substr($str,1,strlen($str)-2).substr($str,0,1);
    }
}
print_r(flipEndChars($str));
function flipEndChars1($str){
    if(gettype($str) == "string"){
        $arr =  str_split($str);
        $count = count($arr);
    }else{
        echo "Incompatible";
        return false;
    }
    if($count < 2){
        echo "Incompatible.";
    }elseif ($arr[0] === $arr[$count-1]){
        echo  "Two's a pair.";
    }elseif (gettype($str) == "array"){
        echo "Incompatible";
    }else{
        $replace = "";
        $replace = $arr[0];
        $arr[0] = $arr[$count-1];
        $arr[$count-1] = $replace;
        $new = implode($arr);
        echo "<pre>";
        var_dump($new);
        echo "</pre>";
    }
}
/*
 *只有12.24 可以
 * */
function timeForMilkAndCookies( $date){
    if( $date->format("md") === "1224" )
    {
        return true;
    }else{
        return false;
    }


}
/*$a = timeForMilkAndCookies(new DateTime("2013-12-24"));
var_dump($a);*/
/*
 * 字符串翻转
 * */
function reverse($string){
    preg_match_all('/./us', $string, $ar);
    echo '<pre>';
    var_dump($ar);
    echo '</pre>';
    print_r(strrev($string));
}
/*$str = "Edabit is really helpful!";
reverse($str);*/
/*
 * 求圆的周长和半径
 * */
class Circle{
    public $range;
    public $aa;
    public  $bb;
    public function __construct($range){
                $this->range = $range;

    }
    public function getPerimeter(){
        echo $this->aa = 2*pi()*$this->range;
    }
    public function getArea(){
        echo $this->bb = pi() * ($this->range * $this->range);
    }
}
/*$a = new Circle(11);
$a->getPerimeter();
echo "\n";
$a->getArea();*/

/*
 * "Hello" ➞ "HeLlO"
 * */
function alternatingCaps ($str) {
    $arr =  str_split($str);

    foreach ($arr as $key=>$value){
        if($key % 2 == 0){
            $arr[$key] = strtoupper($value);
        }else{
            $arr[$key] = strtolower($value);
        }
        $a =  implode($arr);

    }
    var_dump($a);
}
$string = "OMG!!! This website is awesome!!!";
/*alternatingCaps($string);*/
/*
 * aka 演示输出
 * eg： 5321 =》 5000+300+20+1
 * */
$num = 17890000000;
function text14($num){
    $arr = str_split($num);
    $count = count($arr);
    foreach ($arr as $key =>$value){
        $new[] = (int)$value * pow(10,$count-$key-1);
    }
    $new_array = array_filter($new ,function($key){
        return $key > 0;
    });
    foreach ($new_array as $value){
        if($sum == 0){
            $sum = $value ;
        }else{
            $sum = $sum ."+".$value ;
        }
    }
    var_dump($sum);
}
text14($num);
//判断第二个字符串是否是第一个字符串的结尾，是返回true，不是返回false；
//
$a = "abc";
$b = "bc";
$c = "d";
function text13($string1,$string2){
    $cout_a = strlen($string2);
    $new = stristr($string1,$string2);
    $cout_new  = strlen($new);
    if($cout_a == $cout_new){
        echo "true";
    }else{
        echo "false";
    }

}
text13($a,$c);
/*countWords("Just an example here move along") ➞ 6

countWords("This is a test") ➞ 4

countWords("What an easy task, right") ➞ 5*/
$str = "This is a test";
function text12($string){
    $arr = str_split($string);
    $count = 0;
    foreach ($arr as $value){
        if($value == " "){
            $count++;
        }
    }
    echo $count+1;
    /*echo "<pre>";
    var_dump($arr);
    echo "</pre>";*/
}
/*text12($str);*/

/*创建一个带有正数和负数数组的函数。返回一个数组，其中第一个元素是正数的计数，第二个元素是负数的总和。
[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15] ➞ [10, -65]

[92, 6, 73, -77, 81, -90, 99, 8, -85, 34] ➞ [7, -252]

[91, -4, 80, -73, -28] ➞ [2, -105]

null ➞ []

[] ➞ []*/
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15];
function text9($arr){
    if($arr == null || $arr == [] ){
        $new_arr = [];
    }else{
        $arr_z = array_filter($arr,function($key){
            return $key >=0;
        });
        $count = count($arr_z);
        $sum_f ="";
        foreach ($arr as $value){
            if($value <0 ){
                $sum_f +=$value;
            }
        }
        $new_arr = [];
        array_push($new_arr,$count,$sum_f);
    }

    var_dump($new_arr);
}
$arr1 = [] ;
text9($arr);


/*创建一个接受数组的函数，并返回数组中的最后一项。
例子
getLastItem([1, 2, 3]) ➞ 3

getLastItem(['cat', 'dog', 'duck']) ➞ 'duck'

getLastItem([true, false, true]) ➞ true笔记*/
$arr = ['cat', 'dog', 'duck'];
function text10($arr){
    $count = count($arr);
    print_r($arr[$count-1]);
}
function text8($arr){
    $b = end($arr);
    var_dump($b);
}
/*text8($arr);*/


// 创建一个接受字符串并返回其中包含的元音数量（计数）的函数。
// "Celebration" ➞ 5
$abc = "aeiouthgnbaeiou";
function text6($abc){
    $abc = str_split($abc);
    $a =  array_filter($abc,function ($key){
        return $key === "a"||$key === "e"||$key === "i"||$key === "o"||$key === "u";
    });
    $sum = count($a);
    print_r($sum);
}
text6($abc);


// 隐藏指定的字符串
// "4556364607935616" ➞ "############5616"
$str = "4556364607935616";
function text5($str){
    $len = strlen($str);
    if($len < 4){
        return $str;
    }
    $str1 = substr($str,-4);
    $new_str =  str_pad($str1, $len, '#', STR_PAD_LEFT);
    print_r($new_str);
}
/*text5($str);*/

/*取一个整数数组（正数或负数或两者）并返回每个元素的绝对值之和*/
$arr = [2, -1, 4, 8, 10];
function abssume($arr){
    $a = array_sum(array_map('abs',$arr)) ;
    var_dump($a);
}
/*abssume($arr);*/
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
