>MyISAM支持全文搜索,不支持事务,InnoDB支持行锁定和事务
登录mysql
~~~
mysql -h localhost -u root -p
~~~
创建数据库
~~~
create database zoo
~~~
查看数据库
~~~
show databases
~~~
查看某个数据库编码
~~~
show create database zoo
~~~
删除数据库
~~~
drop database zoo
~~~
选择数据库
~~~
use zoo
~~~