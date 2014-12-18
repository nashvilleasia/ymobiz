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
			jQuery('body').on('click','button.close',function(){
                jQuery('#load-modal').on('hidden.bs.modal', function (e) {
                    //if(!confirm('You want to close me?'))
                        //e.preventDefault();
                        jQuery('.modal-content.ymo-popup').empty();
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
		pub.ymoRadio();
		pub.ymoCheckbox();
		pub.ymoDataAction();
		pub.ymoCloseModal();
		pub.ymoHelpVideo();
	}

	return pub;

})(jQuery);

jQuery(document).ready(function () {
	ymoMobiz.initModule(ymoMobiz);
});

function ymoForm($form,url){
	jQuery(document).ready(function () {

		/*jQuery.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			data: $form.serialize(),
			success: function(response) {
				console.log(response.result);
			},
			error: function(response) {
				console.log(response.result);
			}
		});
		return false;*/

		var options = {
			url: url,
			target: "#output1",
			resetForm: true,
			forceSync: true,
			clearForm: true,
			/*beforeSubmit:  showRequest,
			 success:       showResponse,*/
			data: $form.serialize()
		};
		$form.ajaxSubmit(options);
		return false;
	});
}

function ymoFormSave($form,url){
	jQuery(document).ready(function () {

		/*jQuery.ajax({
		 url: url,
		 type: "POST",
		 dataType: "json",
		 data: $form.serialize(),
		 success: function(response) {
		 console.log(response.result);
		 },
		 error: function(response) {
		 console.log(response.result);
		 }
		 });
		 return false;*/

		var options = {
			url: url,
			target: "#output1",
			resetForm: true,
			forceSync: true,
			/*beforeSubmit:  showRequest,
			 success:       showResponse,*/
			data: $form.serialize()
		};
		$form.ajaxSubmit(options);
		return false;
	});
}

// pre-submit callback
function showRequest(formData, jqForm, options) {
	// formData is an array; here we use $.param to convert it to a string to display it
	// but the form plugin does this for you automatically when it submits the data
	var queryString = $.param(formData);

	// jqForm is a jQuery object encapsulating the form element.  To access the
	// DOM element for the form do this:
	// var formElement = jqForm[0];

	alert('About to submit: \n\n' + queryString);

	// here we could return false to prevent the form from being submitted;
	// returning anything other than false will allow the form submit to continue
	return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form)  {
	// for normal html responses, the first argument to the success callback
	// is the XMLHttpRequest object's responseText property

	// if the ajaxForm method was passed an Options Object with the dataType
	// property set to 'xml' then the first argument to the success callback
	// is the XMLHttpRequest object's responseXML property

	// if the ajaxForm method was passed an Options Object with the dataType
	// property set to 'json' then the first argument to the success callback
	// is the json data object returned by the server

	alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
		'\n\nThe output div should have already been updated with the responseText.');
}

$('.ymo-scroll').mCustomScrollbar({
    theme:'dark',
});




jQuery('.ymo-show').on('click',function(e){
		e.preventDefault();

		var textButton = jQuery(this);
		if(textButton.text()==='view staff members')
		{
			textButton.text('hide staff members');
		}else if(textButton.text()==='hide staff members'){
            textButton.text('view staff members');
        }

		var boxButton = jQuery('.ymo-list-show');
		if(boxButton.is(':visible')===false)
        {
            boxButton.show();
        }else {
            boxButton.hide();
        }
});


jQuery(document).ready(function(){
	
	var $myJquery = jQuery(document);
	
	var arrawUpClass = 'arrow-up';
	var arrawDownClass = 'arrow-down';
	
	var arrowUp = $myJquery.find('.' + arrawUpClass);
	var arrowDown = $myJquery.find('.' + arrawDownClass);
	
	$myJquery.on('click','#click',function(e){
		
		e.preventDefault();
		
		var buttonClass = jQuery(this).attr('class');
		var idShow = jQuery(this).data('id');
		
		if(buttonClass===arrawUpClass){
			jQuery(this).removeClass(buttonClass);
			jQuery(this).addClass(arrawDownClass);
			jQuery('#' + idShow).hide();
		}else if(buttonClass===arrawDownClass){
			jQuery(this).removeClass(buttonClass);
			jQuery(this).addClass(arrawUpClass);
			jQuery('#' + idShow).show();
		}
	});
});


jQuery(window).load(function(){
	
	jQuery(window).resize(function(){
		
		var windowW = jQuery(this).width();
		var windowH = jQuery(this).height();

		var bodyW = jQuery('body').width();
		var bodyH = jQuery('body').height();
		
		jQuery.fn.centerLeft = function () {
			this.css("position","relative");
			this.css("left", "0px");
			this.css("top", Math.max(0, ((jQuery(window).height() 
				- this.outerHeight()) / 2 )
				+ jQuery(window).scrollTop()) + "px");
			return this;
		}
		
		var homeBox = jQuery('.boxmain');
		var homeBoxW = homeBox.width();
		var homeBoxH = homeBox.height();
		
		homeBox.centerLeft();
		
		jQuery.fn.centerLeftSubMain = function () {
			this.css("position","relative");
			this.css("left", "0px");
			this.css("top", Math.max(0, ((jQuery(window).height() 
					- this.outerHeight()) / 2 )
					+ jQuery(window).scrollTop()) + homeBoxH + "px");
			return this;
		}
		
		var homeBoxSub = jQuery('.boxsubmain');
		
		homeBoxSub.centerLeftSubMain();
		homeBoxSub.css('margin-bottom',homeBoxH + 'px');
		
	});
	
	jQuery(window).resize();
	
});




