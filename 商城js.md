FoxUI方法

~~~
FoxUI.loader.show('mini');//loading
FoxUI.loader.hide();

FoxUI.toast.show('取消支付');//自动消失
FoxUI.alert('下单失败');


FoxUI.confirm('内容','标题',function(){
		console.log("确定");
	},function(){
		console.log("取消");
	});

FoxUI.message.show({
                            title: "很遗憾，您没有中奖!",
                            icon: 'icon icon-wrong',
                            content: '',
                            buttons: [{
                                text: '确定', extraClass: 'btn-danger', onclick: function () {
                                    console.log(11)
                                }
                            }]
                        });	
~~~

调用clipboard.min.js不使用flash复制插件

~~~
    require([myconfig.path+'dist/clipboard.min.js'], function(Clipboard){
   var clipboard = new Clipboard('.jsclip', {
   text: function(e) {
    return $(e).data('url')||$(e).data('href');
    }
   });
   clipboard.on('success', function(e) {
   tip.msgbox.suc('复制成功');
   
   });
  })
~~~