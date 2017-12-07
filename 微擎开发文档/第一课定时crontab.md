启用 crontab:  
**crontab -e**

查看  **crontab -l**

删除 **crontab -r**

进入Vi输入**i**进入编辑模式
编辑一个定时
<b>00 \*/1  \*  \*  \* curl http://we7.yoby123.cn/xxx.php</b>

退出esc 输入**:wq**

\* 表示可能的值
\,  表示取值  1,2,34,5
\- 表示范围  1-5
\/ 表示频率  /10 每十分钟 按分钟

![](image/1.png)