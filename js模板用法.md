html模板中使用js模板

- html代码

~~~
 <div class="fui-list-group" id="qq"></div>

        <script type="text/html" id="tpl_list">
                <%each list as item%>
                <a class="fui-list" href="{php echo mobileUrl('qa/detail')}&id=<%item.id%>">
                    <div class="fui-list-inner">
                        <div class="title"><%item.title%></div>
                    </div>
                    <div class="fui-list-angle">
                        <div class="angle"></div>
                    </div>
                </a>
                <%/each%>
        </script>
~~~

- 模板加载

~~~
<script>
var result = {list: [
		{
			title: '<油价>调整周期缩至10个工作日 无4%幅度限制',
			url: 'http://finance.qq.com/zt2013/2013yj/index.htm'
		},
		{
			title: '明起汽油价格每吨下调310元 单价回归7元时代',
			url: 'http://finance.qq.com/a/20130326/007060.htm'
		},
		{
			title: '广东副县长疑因抛弃情妇遭6女子围殴 纪检调查',
			url: 'http://news.qq.com/a/20130326/001254.htm'
		},
		{
			title: '湖南27岁副县长回应质疑：父亲已不是领导',
			url: 'http://news.qq.com/a/20130326/000959.htm'
		},
		{
			title: '朝军进入战斗工作状态 称随时准备导弹攻击美国',
			url: 'http://news.qq.com/a/20130326/001307.htm'
		}
	]};
core.tpl('#qq', 'tpl_list', result);
</script>
~~~

- 其他语法

~~~
<%content%> 输出内容
<%#content%> 不输出
条件语句
<%if k>0%>
<%else if k<0%>
<%else%>

<%/if%>

循环数组或对象
<%each list as k v%>
<%k%>-<%v.user%>
<%/each%>

子模板
<%include 'temp_name'%>

辅助方法
~~~
