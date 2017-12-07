### 事件
~~~
click单机 tap手机单机
 singleTap手机单机 doubleTap手机双击
 longTap 手机长按
 swipe, swipeLeft, swipeRight, swipeUp, swipeDown 手机滑动
  hide()
 show()
 toggle()
 fateTo()
 fadeIn()淡入显示
 fadeOut()淡出 隐藏
 fadeToggle()
  $('#id').tap(function(){//手机单机
 });
 $('#id').live('tap',function(){//绑定单机 后面动态添加也生效
 });
 $(document).on('click', 'a', function(e){});//绑定到单机
 $("#id").on('click', function(e){ ... })//同上
~~~