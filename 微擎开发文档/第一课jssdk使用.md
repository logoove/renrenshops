加载jssdk
~~~
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
~~~
微擎中调用签名
~~~
<?php
$wx = $_W['account']['jssdkconfig']; 
$wxurl = ($_W['account']['level']==4)?'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']:$row['share_url'];

?>
~~~
html写法
~~~
<input type="hidden" value="{$wxurl}" id='wx-share-link'>
<input type="hidden" value='{php echo tomedia($row["share_img"]);}'  id='wx-share-img'>
<input type="hidden" value='{$row["share_title"]}'  id='wx-share-title'>
<input type="hidden" value='{$row["share_desc"]}'  id='wx-share-desc'>
~~~
使用方法
~~~
<script type="text/javascript">
    var appIdstr = "{$wx['appId']}";
    var timestampstr = "{$wx['timestamp']}";
    var nonceStrstr = "{$wx['nonceStr']}";
    var signaturestr = "{$wx['signature']}";
        	wx.config({
	debug: false,
	appId: appIdstr,
	timestamp: timestampstr,
	nonceStr: nonceStrstr,
	signature: signaturestr,
	jsApiList: [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'hideMenuItems',
		'showMenuItems',
		'translateVoice',
		'startRecord',
		'stopRecord',
		'onRecordEnd',
		'playVoice',
		'pauseVoice',
		'stopVoice',
		'uploadVoice',
		'downloadVoice',
		'chooseImage',
		'previewImage',
		'uploadImage',
		'downloadImage',
		'getNetworkType',
		'openLocation',
		'getLocation',
		'hideOptionMenu',
		'showOptionMenu',
		'closeWindow',
		'scanQRCode',
		'chooseWXPay',
		'openProductSpecificView',
		'addCard',
		'chooseCard',
		'openCard'
	]
});
 
function wx_share() { 
	wx.ready(function () {
      var shareData = {
    title:document.getElementById('wx-share-title').value,
    desc: document.getElementById('wx-share-desc').value,
    link:document.getElementById("wx-share-link").value ,
    imgUrl:document.getElementById('wx-share-img').value,
    type:'music', // 分享类型,music、video或link，不填默认为link 分享给朋友
    dataUrl:"", // 如果type是music或video，则要提供数据链接，默认为空 分享给朋友
  };
		wx.hideOptionMenu();
		wx.showMenuItems({
			menuList: [
			'menuItem:share:timeline', 
			'menuItem:share:appMessage',
			'menuItem:copyUrl',
			],
		}); 
//分享给好友	
wx.onMenuShareAppMessage({
      title: shareData.title,
      desc: shareData.desc,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
      type: shareData.type,
    dataUrl: shareData.dataUrl,
			trigger: function (res) {
			},
			success: function (res) {
			},
			cancel: function (res) {
			},
			fail: function (res) {
            alert(JSON.stringify(res));
			}
		});
//分享给朋友圈	
wx.onMenuShareTimeline({
      title:shareData.title+','+shareData.desc,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
       type: shareData.type,
    dataUrl: shareData.dataUrl,
			trigger: function (res) {
			},
			success: function (res) {
			},
			cancel: function (res) {
			},
			fail: function (res) {
            alert(JSON.stringify(res));
			}
		});
   //QQ     
wx.onMenuShareQQ({
      title: shareData.title,
      desc: shareData.desc,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
    success: function () { 
    },
    cancel: function () { 

    },
	fail: function (res) {
            alert(JSON.stringify(res));
			}    
});
//QQ空间	
wx.onMenuShareQZone({
      title: shareData.title,
      desc: shareData.desc,
      link: shareData.link,
      imgUrl:shareData.imgUrl,
    success: function () { 
    },
    cancel: function () { 

    },
	fail: function (res) {
            alert(JSON.stringify(res));
			}    
});


	});
}
wx_share();
    	</script>
~~~        