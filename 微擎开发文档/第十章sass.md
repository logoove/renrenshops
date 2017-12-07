定义变量 $black:#000000;
$qq: 2px !default;定义默认值 不存在将使用这个值
rgba($black,0.9);//生成带透明颜色
5px+5=10px +也具有连接字符串作用
#{5 + $w} $w:2 输出7
1px/1px=1 去单位
2*1px =2px 加单位
== !=,not,or,and 非 或 与
#{$aa} 不编译
& 引用父级
hsla(0,100%,50%,0) 参数1是度数 0红色 60黄色 120绿 180青 240蓝色 300紫红色 参数2饱和度 参数3亮度 参数4是透明度 0%黑100%白
lighten($black,30%); 变浅颜色 darken($black,10%)加深
mix(red,black,50%) 混合颜色 百分比重
@extend .class 扩展一个类的样式
@extend %class 定义占位符扩展 公共类不会被应用
定义宏
~~~
@mixin radius($radius:5px){ -webkit-border-radius: $radius; -moz-border-radius: $radius; border-radius: $radius;}
.radius-lg{
  @include radius(15px);
}
~~~
~~~
@mixin box-shadow($shadows...) {}
~~~
表示可以多个参数 逗号隔开
定义函数 as() *@function as(){ @return 2px; }

逻辑
~~~
@if 9>8{width:1 }@else if 7>7{width:2 }@else{width:7}

 @for $i from 1 through 10{ //从1到10  to不包括最后一个
    .font#{$i}{
        font-size:(9px+$i)
    }
}
~~~
~~~
$i: 6;
@while $i > 0 {
  .item-#{$i} { width: 2em * $i; }
  $i: $i - 2;
}
~~~
~~~
@each $animal, $color, $cursor in (puma, black, default),
                                  (sea-slug, blue, pointer),
                                  (egret, white, move) {
  .#{$animal}-icon {
    background-image: url('/images/#{$animal}.png');
    border: 2px solid $color;
    cursor: $cursor;
  }
}
~~~
~~~
@each $i1  in 35,40,45,50{
    .f#{$i1}{
    @include f12($i1*1px);
    }
}
~~~