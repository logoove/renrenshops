>表格变色
~~~
<script>
$(function(){
 $(".ui-table").each(function () {
        var _this = $(this);
        _this.find("tr:even").css("background-color", "#f5f5f5");
        _this.find("tr:odd").css("background-color", "#fff");
        _this.find("tr:not(:first)").hover(function () {
            $(this).attr("bColor", $(this).css("background-color")).css("background-color", "#fcf8e3").css("cursor", "pointer");
        }, function () {
            $(this).css("background-color", $(this).attr("bColor"));
        });
 
    });
    });
    </script>
~~~
>js
~~~
	<script>
	require.config({
	paths: {
		city:"{MODULE_URL}weui/city",
		validform:"{MODULE_URL}weui/validform"
	}
});
require(['city','validform'], function(citys) {
	$("#form2").Validform({
		tiptype:function(msg,o,cssctl){
			if(!o.obj.is("form")){
				var objtip=o.obj.siblings(".help-block");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		}
	});
});
</script>	
~~~
>文本
~~~
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-3 col-lg-2 control-label v">标题</label>
				<div class="col-sm-7">
					<input datatype="s5-10" errormsg="填写5-10个字符" type="text" name="title" class="form-control" value="{$item['title']}" /> 
					<span class="help-block">标题</span>
				</div>
			</div>
~~~
>文本域
~~~
					<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label v">描述</label>
					<div class="col-sm-7">
						<textarea datatype="s5-250" errormsg="填写5-250个字符" class="form-control" name="content" rows="5">{$item['content']}</textarea>
						<span class="help-block">名片的描述</span>
					</div>
				</div>	
~~~
>单选
~~~
	          <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">名片类型</label>
          <div class="col-sm-7">
             <label class="radio-inline"><input type="radio" value="1"  name="tid"  {if !isset($item['tid'])}checked{/if} {if $item['tid'] == 1 }checked{/if}>微信群名片</label>
             <label class="radio-inline"><input type="radio" value="2" name="tid"  {if $item['tid'] == 2 }checked{/if}>QQ群名片</label>
             <div class="help-block">正确选择不同类型二维码,微信群类型还支持分类</div>
          </div>
        </div> 
~~~
>选择
~~~
		<div class="form-group" id="cid">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信群分类</label>
		<div class="col-sm-7">
			<select name="cid"  class="form-control">
			{php $cate = pdo_fetchall("SELECT * FROM ".tablename('yoby_pig_type')." where weid=$weid");}
			{loop $cate $catelist}
					<option value="{$catelist['id']}" {if $item['cid']==$catelist['id']}selected{/if}>{$catelist['title']}</option>
					{/loop}
			</select>
			 <div class="help-block">微信群的分类</div>
		</div>
	</div>
~~~
>图片
~~~
		<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label v" >二维码</label>
		<div class="col-sm-7">
			{php echo tpl_form_field_image('qr', $item['qr'] =='' ? $setting['thumb'] : $item['qr']);}
			<span class="help-block">上传二维码图片</span>
		</div>
	</div>	
~~~
>富文本框
~~~
	     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label v">内容</label>
                    <div class="col-sm-7">
                       	<textarea  id="content" type="text" style='height:400px' class="form-control richtext-clone" placeholder="" name="content">{$item['content']}</textarea>
	        			<span class="help-block">稿件内容</span>
                    </div>
                </div>
                
				<script type="text/javascript">
   require(['util'],function(util){
       util.editor($('.richtext-clone')[0]); 
    });
</script>
~~~
>按钮
~~~
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-4">
				<input type="hidden" name="id" value="{$item['id']}">
				<input type="hidden" name="token" value="{$_W['token']}" />
					<input name="submit" type="submit" value="保存" class="btn bg-green btn-block" />
					
				</div>
			</div>
~~~