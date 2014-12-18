/**
 * Created by camello on 6/22/14.
 */

(function($){
    var EditableActiveForm = function(element, options)
    {
        var elem = $(element);
        var obj = this;

        var defaults = {

            id : (options.id===undefined) ? 'form' : options.id,
            formId : (options.id===undefined) ? 'form' : '#' + options.id,

            editButtomAction : 'activeform-edit',
            saveButtomAction : 'activeform-save',
            cancelButtomAction : 'activeform-cancel',

            objectClass : 'form-objects',
            editableClass : 'value-editable',
            fieldClass : 'form-group'
        };

        var settings = $.extend({

            inputsForm: elem.find(':input'),
            nodesForm: elem.find(' ul li p'),

            btnEditForm: elem.find('.' + defaults.id + '-' + defaults.editButtomAction),
            btnSaveForm: elem.find('.' + defaults.id + '-' + defaults.saveButtomAction),
            btnCancelForm: elem.find('.' + defaults.id + '-' + defaults.cancelButtomAction)

        }, defaults, options || {});

        this.hideForm = function()
        {
            settings.btnSaveForm.hide();
            settings.btnCancelForm.hide();
            settings.inputsForm.hide();
            settings.nodesForm.show();
            settings.btnEditForm.show();
        };

        this.showForm = function()
        {
            settings.btnEditForm.on('click',function(event){
                event.preventDefault();
                settings.btnSaveForm.show();
                settings.btnCancelForm.show();
                settings.inputsForm.show();
                settings.nodesForm.hide();
                settings.btnEditForm.hide();
            });
        };

        this.updateForm = function(response)
        {
            if(response){
                settings.inputsForm.each(function() {
                    if(this.id!==''){
                        elem.find(defaults.formId + '-' + this.id).html(this.value);
                    }
                });

                elem.find('.' + defaults.fieldClass).css('margin-bottom','0px');
                obj.hideForm();
            }
        };

        this.cancelForm = function()
        {
            settings.btnCancelForm.on('click',function(event){
                event.preventDefault();
                obj.hideForm();
            });
        };

        // Private method - can only be called from within this object
        var privateMethod = function()
        {
            console.log('private method called!');
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

            // Return early if this element already has a plugin instance
            if (element.data('editableActiveForm')) return;

            // pass options to plugin constructor
            var editableActiveForm = new EditableActiveForm(this, options);

            // Store plugin object in this element's data
            element.data('editableActiveForm', editableActiveForm);
        });
    };
})(jQuery);

/*jQuery.fn.EditableActiveForm = function( options ) {

    // Bob's default settings:

    var defaults = {

        id : (options.id===undefined) ? 'form' : options.id,
        formId : (options.id===undefined) ? 'form' : '#' + options.id,

        editButtomAction : 'activeform-edit',
        saveButtomAction : 'activeform-save',
        cancelButtomAction : 'activeform-cancel',

        objectClass : 'form-objects',
        editableClass : 'value-editable',
        fieldClass : 'form-group',

        hideForm : function() {
            settings.btnSaveForm.hide();
            settings.btnCancelForm.hide();
            settings.inputsForm.hide();
            settings.nodesForm.show();
            settings.btnEditForm.show();
        },

        showForm : function() {
            settings.btnEditForm.on('click',function(event){
                event.preventDefault();
                settings.btnSaveForm.show();
                settings.btnCancelForm.show();
                settings.inputsForm.show();
                settings.nodesForm.hide();
                settings.btnEditForm.hide();
            });
        },

        updateForm : function(response) {
            if(response){
                settings.inputsForm.each(function() {
                    jQuery(defaults.formId + ' .' + defaults.editableClass + '#' + this.id).html($(this).val());
                });

                jQuery(defaults.formId + ' .' + defaults.fieldClass).css('margin-bottom','0px');
            }
        },

        cancelForm : function() {
            settings.btnCancelForm.on('click',function(event){
                event.preventDefault();
                settings.hideForm();
            });
        }
    };

    var settings = $.extend( {

        btnEditForm: jQuery(defaults.formId + ' .' + defaults.id + '-' + defaults.editButtomAction),
        btnSaveForm: jQuery(defaults.formId + ' .' + defaults.id + '-' + defaults.saveButtomAction),
        btnCancelForm: jQuery(defaults.formId + ' .' + defaults.id + '-' + defaults.cancelButtomAction),

        inputsForm: jQuery(defaults.formId + ' :input'),
        nodesForm: jQuery(defaults.formId + ' ul li p')

    }, defaults, options );

    return this.each(function() {
        // Plugin code would go here...

        settings.hideForm();
        settings.showForm();
        settings.cancelForm();

    });

};*/

