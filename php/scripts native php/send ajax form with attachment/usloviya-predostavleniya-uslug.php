<!-- ajax send -->
<script src="/wp-content/themes/dugriteam/js/form.js" type="text/javascript"></script>

<!-- arcticModal -->
<script src="/wp-content/themes/dugriteam/js/jquery.arcticmodal-0.3.min.js"></script>
<link rel="stylesheet" href="/wp-content/themes/dugriteam/css/jquery.arcticmodal-0.3.css">

<!-- arcticModal theme -->
<link rel="stylesheet" href="/wp-content/themes/dugriteam/css/themes/simple.css">

<!-- html form -->
<div class="send-to-email-form-inner">
<form name="send-to-email-form" id="send-to-email-form" enctype="multipart/form-data" action="javascript:void(null);" onsubmit="sendform()" method="post">
	<div class="send-to-email-text-field"><input placeholder="Email" type="email" name="send-to-email-text-field" /></div>
	<div class="send-to-email-btn"><input type="submit" name="send-to-email-btn" value="Отправить на E-mail" title="Отправить на E-mail" class="agreement-email" id="phone-head" /></div>
	<div class="clear-both"></div>
</form>
</div>

<!-- modal window -->									
<div style="display: none;">
	<div class="box-modal" id="send-to-email-form-result-modal">
		<div class="box-modal_close arcticmodal-close">закрыть</div>
		<div class="send-to-email-form-result"></div>
	</div>
</div>