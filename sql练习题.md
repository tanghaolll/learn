#sql练习题 


#### 1.给出一张表，`customer`提供客户信息和推荐人id。
|id         |    name  |referee_id|
| :-------- | --------:| :------: |
| 1         |   Will   |  NULL    |
| 2         |   Jane   |  NULL    |
| 3         |   Alex   |  2       |
| 4         |   Bill   |  NULL    |
| 5         |   Zack   |  1       |
| 6         |   Mark   |  2       |

查询返回name，并且referee_id不等于2 的结果：

| name      |
| :-------- |
| wiil      |
| Jane      |
| Bill      |
| Zack      |



  该条sql只会返回Zack一条数据，无法返回referee_id为Null的。
  
` select name from customer where referee_id != 2 or referee_id = NULL;`

正解如下：

`select name from customer where referee_id != 2 or referee_id is null;`


#### 2.表point保存平面中x轴上某些点的x坐标，它们都是整数。
| x         |
| :-------- |
|     -1    |
|      0    |
|      2    |


查询以查找这些点中两点之间的最短距离。
最短距离显然为“1”，即从“-1”到“0”。所以输出如下：


| shorttext |
| :-------- |
| 1         |


正解如下：

`select abs(p1.x-p2.x) as shorttext from  point p1 join point p2 on p1.x != p2.x order by shorttext limit 1`

或者

`select min(abs(p1.x - p2.x)) as shorttext from point p1 join point p2 on p1.x != p2.x`


#### 3.如果一个国家面积超过300万平方公里或人口超过2500万，那么这个国家就很大,表名`World`。


|id         |    name   |continent |    area  |population|    gdp   |
| :-------- | --------: | :------: | --------:| --------:| --------:|
| 1         |Afghanistan|  Asia    | 652230   |  25500100|  20343000|
| 2         |  Albania  |  Europe  | 28748    |  2831741 |  12960000|
| 3         |  Algeria  |  Africa  | 2381741  |  37100000| 188681000|
| 4         |  Andorra  |  Europe  | 468      |   78115  |  3712000 |
| 5         |  Angola   |  Africa  | 11246700 |  20609294| 100990000|


编写SQL解决方案以输出大国的名称，人口和面积。


|id         |    name   |continent |    area  |population|    gdp   |
| :-------- | --------: | :------: | --------:| --------:| --------:|
| 1         |Afghanistan|  Asia    | 652230   |  25500100|  20343000|
| 3         |  Algeria  |  Africa  | 2381741  |  37100000| 188681000|


正解如下：

`select name,population,area from World where area > 3000000 OR population > 25000000;`

#### 4.




