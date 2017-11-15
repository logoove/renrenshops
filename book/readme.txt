添加正则
 ^p(.*) ^藏馆(.*) 
 
 book目录放到微擎同级目录
 book_api.php放到framework\builtin\userapi\api
 
 导入数据表 
 

CREATE TABLE `ims_yoby_books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `openid` varchar(65) DEFAULT NULL,
  `book` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

删除数据表
 DROP TABLE IF EXISTS `ims_yoby_books`;