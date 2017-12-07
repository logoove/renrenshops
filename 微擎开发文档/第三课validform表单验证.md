###validform验证
~~~
datatype=""  
s   字符串
s6-10  6-10个字符串
n 数字
n6-10  6-10个数字
*  不能为空
*6-16  任意6-16字符
p  是否邮编
m 手机号码
url 是否网址
e 邮箱
m|e  可以是手机或邮箱或者
datatype="/\w{3,6}/i"  正则3-6位字母
zh  中文
zh,s2-4 中文2-4位累加

为空时候提示,默认请填入信息
nullmsg="请填写用户名！"
.v类会自动查找不用绑定

sucmsg="用户名还未被使用，可以注册！"
通过后提示,支持ajaxurl

errormsg="用户名必须是2到4位中文字符！"
错误时候信息,能自动的

ignore="ignore"  不填写不验证

recheck="password1"两次是否一致

tip="提示字符" 获得焦点后消失

btnSubmit:"#btn_sub", 
btnReset:".btn_reset",
tiptype:1, 
1是弹出提示

$("#form2").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){
				var objtip=o.obj.siblings(".help-block");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		}
	});
~~~