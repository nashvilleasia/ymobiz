var _YmoPrefix = 'ymo';
var _YmoClass = '.' + _YmoPrefix + '-';
var _YmoId = '#' + _YmoPrefix + '-';

(function($){

	jQuery('iframe').each(function() {
		var url = jQuery(this).attr("src");
		if (jQuery(this).attr("src").indexOf("?") > 0) {
			jQuery(this).attr({
				"src" : url + "&wmode=transparent",
				"wmode" : "Opaque"
			});
		}
		else {
			jQuery(this).attr({
				"src" : url + "?wmode=transparent",
				"wmode" : "Opaque"
			});
		}
	});
	
	var budgetIcon = jQuery('.ymo-badge-b');
	var budgetImportant = jQuery('.ymo-important');
	budgetImportant.hide();
	
	budgetIcon.hover(
		function(){
			budgetImportant.show();
		}, function() {
			budgetImportant.hide();
	});

	jQuery(_YmoClass + "marketing").addClass('ymo-marketing services-active');
	jQuery(_YmoId + "business.ymo-view").hide();
	jQuery(_YmoId + "network.ymo-view").hide();

	jQuery(_YmoClass + "service ul li").click(function() {
		var idContent = jQuery(this).attr('id');
		jQuery(_YmoClass + "service ul li").removeClass('services-active');
		jQuery(this).addClass(_YmoPrefix + '-' + idContent + ' services-active');
		jQuery(".ymo-view").hide();
		jQuery(_YmoId + idContent + ".ymo-view").show();
	});
	
	var btnCaptchaRefresh = jQuery(document);
	var btnClassCaptcha = jQuery('.ymo-refresh-captcha');
	btnCaptchaRefresh.on('click','label#btn-refresh-captcha',function(e){
		e.preventDefault();
		btnClassCaptcha.find('img').trigger('click');
	});

}( jQuery ));

ymoMobiz = (function () {
	var pub = {

		isActive: true,

		initModule: function (module) {
			if (module.isActive === undefined || module.isActive) {
				if (jQuery.isFunction(module.init)) {
					module.init();
				}
				jQuery.each(module, function () {
					if (jQuery.isPlainObject(this)) {
						pub.initModule(this);
					}
				});
			}
		},

		ymoRadio : function() {

			jQuery.each(jQuery('input[type=radio]'), function() {

				var radioName = jQuery(this).attr("name");
				var radioButton = jQuery('input[name="' + radioName + '"]');

				jQuery(this).each(function(){

					jQuery(this).wrap( "<span class='custom-radio'></span>" );
					if(jQuery(this).is(':checked')){
						jQuery(this).parent().addClass("selected");
					}
				});

				jQuery(radioButton).click(function(){
					if(jQuery(this).is(':checked')){
						jQuery(this).parent().addClass("selected");
						jQuery(this).attr('checked', true);
					}
					jQuery(radioButton).not(this).each(function(){
						jQuery(this).parent().removeClass("selected");
						jQuery(this).attr('checked', false);
					});
				});

			});
		},

		ymoCheckbox : function() {

			jQuery.each(jQuery('input[type=checkBox]'), function() {

				var checkBoxName = jQuery(this).attr("name");
				var checkBox = jQuery('input[name="' + checkBoxName + '"]');

				jQuery(this).each(function(){
					jQuery(this).wrap( "<span class='custom-checkbox'></span>" );
					if(jQuery(this).is(':checked')){
						jQuery(this).parent().addClass("selected");
					}
				});

				jQuery(checkBox).click(function(){
					if(jQuery(this).is(':checked')){
						jQuery(this).attr('checked', 'checked');
					}else{
						jQuery(this).removeAttr('checked');
					}
					jQuery(this).parent().toggleClass("selected");
				});

			});
			return false;
		},

		ymoDataAction : function(){
			jQuery('body').on('click','*[data-action]',function(e){
				e.preventDefault();
				var idModal = jQuery(this).attr('data-action');

				jQuery('#load-modal-'+idModal).modal({
					show:true,
					keyboard: false,
					backdrop: 'static'
				});
			});
		},

		ymoCloseModal : function()
		{
			jQuery(document).on('click','button.close',function(){
				jQuery(document).on('hidden.bs.modal', function () {
					//jQuery('.modal-content.ymo-popup').empty();
					//jQuery('.ymo-json-response').empty();
				});
			});
			
			jQuery(document).on('click','button.close-modal',function(){
				jQuery(document).on('hidden.bs.modal', function () {
					//jQuery('.modal-content.ymo-popup').empty();
					//jQuery('.ymo-json-response').empty();
				});
			});
		},

		ymoHelpVideo : function() {
			jQuery('body').on('click','*[data-video]',function(e){
				e.preventDefault();
				var urlVideo = jQuery(this).attr('data-video');
				var textVideo = jQuery('.popup-list-text p',this).text();
				jQuery('.popup-video-player iframe').attr('src',urlVideo);
				jQuery('.popup-text-player p').text(textVideo);
			});
		},

		init: function() {
			initAllPlugins();
		}
	};

	function initAllPlugins(){
		//pub.ymoRadio();
		//pub.ymoCheckbox();
		pub.ymoDataAction();
		pub.ymoCloseModal();
		pub.ymoHelpVideo();
	}

	return pub;

})(jQuery);

jQuery(document).ready(function () {
	ymoMobiz.initModule(ymoMobiz);
});

