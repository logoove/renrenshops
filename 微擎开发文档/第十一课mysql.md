原生的mysql
~~~
mysql_connect("localhost","root","mysql") or die(mysql_error());

mysql_select_db($db) or die(mysql_error());

mysql_query("set names utf8");

$result1 = mysql_query("insert into t_typevalues(null,'你好','hello') ");
echo mysql_affected_rows();
if(mysql_affected_rows()>0){ echo '插入成功'; }

$result2 = mysql_query("update t_type set value='中国' where id=61");
echo mysql_affected_rows();
if($result2 && mysql_affected_rows()>0){ echo '修改成功'; }

$result3 = mysql_query("delete from t_type where id=3");
echo mysql_affected_rows(); if($result3 &&
mysql_affected_rows()>0){ echo "删除成功"; }

$sql2 = "create table if not exists t_mysql1( 
id int(10) primary key AUTO_INCREMENT, no int(10), name VARCHAR(255))";
$result4 = mysql_query($sql2);
if($result4){ echo "创建表成功"; }

$sql3 = "drop table if exists t_mysql1";
$result5 = mysql_query($sql3);
if($result5){ echo "删除表成功"; }

mysql_query("begin");
$result7 = mysql_query("insert into t_mysql
values(null,'11111112333vs')");
$result8 = mysql_query("insert into t_mysql
values(null,'111111111111vs44433')");
if($result7 && $result8 && mysql_affected_rows()>0){
mysql_query("commit");
echo '事务成功';
}else{ mysql_query("rollback");
}

关联数组和数字数组 MYSQL_ASSOC关联 MYSQL_NUM数字
 while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        printf ("ID: %s  Name: %s", $row[0], $row[1]);
    }
关联数组
mysql_fetch_assoc($result)) 
对象
mysql_fetch_object($result)) 
数字数组
mysql_fetch_row($result);
插入的id
$id = mysql_insert_id();
结果集数目
$num = mysql_num_rows($result);
版本号
mysql_get_server_info();
~~~