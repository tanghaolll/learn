#<p align=center>sql练习题 </p>


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

#### 4.给定一个表`salary`，例如下面的表，其中m =男性，f =女性值


|id         |    name  |    sex   |  salary  | 
| :-------- | --------:| :------: | :------: |
| 1         |   A      |  M       |  2500    |
| 2         |   B      |  F       |  1500    |
| 3         |   C      |  M       |  500     |
| 4         |   D      |  F       |  1000    |


使用单个更新查询交换所有f和m值（即，将所有f值更改为m，反之亦然），并且没有中间临时表。


|id         |    name  |    sex   |  salary  | 
| :-------- | --------:| :------: | :------: |
| 1         |   A      |  F       |  2500    |
| 2         |   B      |  M       |  1500    |
| 3         |   C      |  F       |  500     |
| 4         |   D      |  M       |  1000    |


正解如下:

`update salary set sex = if( sex = "m" ,"f" , "m"); `

或者：

`update salary set sex = case sex when  "m" then "f" when "f" then "m" else sex end; `


#### Employee表包含所有员工。每个员工都有一个Id，并且还有一个部门ID列。

|Id         |    Name   |   Salary | DepartmentId| 
| :-------- | --------: | :------: | :------:    |
| 1         |   Joe     |  70000   |  1          |
| 2         |   Henry   |  80000   |  2          |
| 3         |   Sam     |  60000   |  2          |
| 4         |   Max     |  90000   |  1          |
| 5         |   Janet   |  69000   |  1          |
| 6         |   Randy   |  85000   |  1          |

Department表包含公司的所有部门

|id         |    name    | 
| :-------- | :--------: | 
| 1         |   IT       |  
| 2         |   Sales    | 

编写SQL查询以查找在每个部门中获得前三名薪水的员工,结果如下：

|Department |   Employee | DepartmentId| 
| :--------:| :------:   | :------:    |
|   IT      |  Max       |  90000      |
|   IT      |  Randy     |  85000      |
|   IT      |  Joe       |  70000      |
|   Sales   |  Henry     |  80000      |
|   Sales   |  Sam       |  60000      |


正解如下:
 `select p2.Name as Department,p1.Name as Employee,p1.Salary from employee p1 join department p2 on p1.DepartmentId = p2.Id where  3 > (select count(distinct(p3.Salary)) from employee p3 where p3.Salary > p1.Salary and p1.DepartmentId = p3.DepartmentId) ;`




