/**
 * Created by camello on 6/22/14.
 */

(function($){
    var EditableActiveForm = function(element, options)
    {
        var elem = jQuery(document).find(element);
        var obj = this;

        var defaults = {

            id : (options.id===undefined) ? 'form' : options.id,
            formId : (options.id===undefined) ? 'form' : '#' + options.id,

            editButtomAction : 'activeform-edit',
            saveButtomAction : 'activeform-save',
            cancelButtomAction : 'activeform-cancel',

            objectClass : 'form-objects',
            objectForm : ':input',
            editableClass : 'value-editable',
            fieldClass : 'form-group',
            displaylabel : 'displaylabel'
        };

        var settings = $.extend({

            inputsForm: elem.find(defaults.objectForm),
            nodesForm: elem.find('.' + defaults.editableClass),

            btnEditForm: jQuery(document).find('.' + defaults.id + '-' + defaults.editButtomAction),
            btnSaveForm: jQuery(document).find('.' + defaults.id + '-' + defaults.saveButtomAction),
            btnCancelForm: jQuery(document).find('.' + defaults.id + '-' + defaults.cancelButtomAction),
            btnClearModal: '#buttom-modal-' + defaults.id

        }, defaults, options || {});

        this.hideForm = function()
        {
            settings.btnSaveForm.hide();
            settings.btnCancelForm.hide();
            settings.inputsForm.hide();
            settings.nodesForm.show();
            settings.btnEditForm.show();
            obj.hideDisplayLabel();
        };

        this.showForm = function()
        {
            settings.btnEditForm.on('click',function(event){
                event.preventDefault();

                obj.showDisplayLabel();

                settings.btnSaveForm.show();
                settings.btnCancelForm.show();
                settings.inputsForm.show();
                settings.nodesForm.hide();
                settings.btnEditForm.hide();
            });
        };

        this.updateForm = function(options)
        {
        	var _inputsForm = elem.find(defaults.objectForm);
        	
            if(options){
                var callFunction = options.response;
                if (typeof callFunction === 'function') {
                    var result = callFunction();
                }else{
                    var result = eval(callFunction);
                }
                obj.hideAfterUpdate();
                return result;
            }else{
                _inputsForm.each(function() {
                    if(this.id!==''){
                    	var tagName = jQuery(this).prop('tagName');
                    	if(tagName==='SELECT'){
                    		var dataList = jQuery('#'+this.id+' option:selected');
                    		elem.find(defaults.formId + '-' + this.id).html(dataList.text());
                    	}else{
                    	   	elem.find(defaults.formId + '-' + this.id).html(this.value);
                    	}	
                    }
                });
                obj.hideAfterUpdate();
            }
        };

        this.hideAfterUpdate = function()
        {
            jQuery('.' + defaults.objectClass).find('.' + defaults.fieldClass).css('margin-bottom','0px');
            obj.clearInput();
            obj.hideForm();
        };

        this.cancelForm = function()
        {
            settings.btnCancelForm.on('click',function(event){
                event.preventDefault();
                
                //$(formId).yiiActiveForm({id:formId});
           	 	//var activeFormPluginFormAccountDetails = $(formId).data('yiiActiveForm');
                
                $(defaults.formId + ' .form-group').removeClass('has-error');
                $(defaults.formId + ' .help-block').html('');
                
                elem.find('.form-response-' + defaults.id).html('');
                obj.clearInput();
                obj.hideForm();
            });
        };

        this.clearModal = function()
        {
            jQuery('body').find(settings.btnClearModal).on('click',function(event){
                event.preventDefault();
                elem.find('.form-response-' + defaults.id).html('');
                jQuery('#result-popup').modal('hide');
                jQuery('.modal-backdrop.fade.in').remove();
                jQuery('body').removeClass('modal-open');
            });
        };

        this.showDisplayLabel = function()
        {
        	var _inputsForm = elem.find(defaults.objectForm);
            _inputsForm.each(function() {
                if(this.id!==''){
                    elem.find('.' + defaults.objectClass + '.' + defaults.displaylabel + '-' + this.id).show();
                    elem.find('#' + this.id).show();
                }
            });
        };

        this.clearInput = function()
        {
        	var _inputsForm = elem.find(defaults.objectForm);
            _inputsForm.each(function() {
                if(this.id!==''){
                    //elem.find('.' + defaults.objectClass + '.' + defaults.displaylabel + '-' + this.id + ' input').val('');
                    //elem.find('#' + this.id).val('');
                }
            });
        };

        this.hideDisplayLabel = function()
        {
        	var _inputsForm = elem.find(defaults.objectForm);
            _inputsForm.each(function() {
                if(this.id!==''){
                    elem.find('.' + defaults.objectClass + '.' + defaults.displaylabel + '-' + this.id).hide();
                    elem.find('#' + this.id).hide();
                }
            });
        };

        obj.hideForm();
        obj.showForm();
        obj.cancelForm();
    };

    $.fn.editableActiveForm = function(options)
    {
        return this.each(function()
        {
            var element = $(this);
            if (element.data('editableActiveForm')) return;
            var editableActiveForm = new EditableActiveForm(this, options);
            element.data('editableActiveForm', editableActiveForm);
        });
    };
})(jQuery);

