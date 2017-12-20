### foxui是人人商城微信端样式
文本框

~~~
<div class="fui-cell bank-group" {if empty($type_array[3]['checked'])}style="display: none;"{/if}>
                <div class="fui-cell-label" style="width: 120px;">银行开户行</div>
                <div class="fui-cell-info"><input type="text" id="bankaddress" name="bankaddress" class='fui-input' value="{$last_data['bankaddress']}" /></div>
            </div>
~~~

上传

~~~
            <div class='fui-cell'>
			 <div class='fui-cell-label'>上传身份证</div>
			 <div class='fui-cell-info'>

				 <ul class="fui-images fui-images-sm"></ul>
				  <div class="fui-uploader fui-uploader-sm"
							 data-max="5"
							 data-count="0">
							 <input type="file" name='cid' id='cid' multiple="" accept="image/*" >
				</div>
			 </div>
		 </div>
~~~
