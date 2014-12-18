/**
**/
(function ($) {
    "use strict";
    
    var ckeditor = function (options) {
        this.init('ckeditor', options, ckeditor.defaults);
        
        //extend ckeditor manually as $.extend not recursive 
        this.options.ckeditor = $.extend({}, ckeditor.defaults.ckeditor, options.ckeditor);
    };

    $.fn.editableutils.inherit(ckeditor, $.fn.editabletypes.abstractinput);

    $.extend(ckeditor.prototype, {
        render: function () {
            var deferred = $.Deferred(),
            msieOld;
            
            //generate unique id as it required for ckeditor
            this.$input.attr('id', 'textarea_'+(new Date()).getTime());

            this.setClass();
            this.setAttr('placeholder');            
            
            //resolve deffered when widget loaded
            $.extend(this.options.ckeditor, {
                events: {
                  load: function() {
                      deferred.resolve();
                  }  
                }
            });
            
            this.$input.ckeditor(this.options.ckeditor);
            
            /*
             In IE8 ckeditor iframe stays on the same line with buttons toolbar (inside popover).
             The only solution I found is to add <br>. If you fine better way, please send PR.   
            */
            msieOld = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
            if(msieOld) {
                this.$input.before('<br><br>');
            }
            
            return deferred.promise();
        },
       
        value2html: function(value, element) {
            $(element).html(value);
        },

        html2value: function(html) {
            return html;
        },
        
        value2input: function(value) {
            this.$input.data("ckeditor").editor.setValue(value, true);
        }, 

        activate: function() {
            this.$input.data("ckeditor").editor.focus();
        },
        
        isEmpty: function($element) {
            if($.trim($element.html()) === '') {
                return true;
            } else if($.trim($element.text()) !== '') {
                return false;
            } else {
                //e.g. '<img>', '<br>', '<p></p>'
                return !$element.height() || !$element.width();
            } 
        }
    });

    ckeditor.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
        /**
        @property tpl
        @default <textarea></textarea>
        **/
        tpl:'<textarea></textarea>',
        /**
        @property inputclass
        @default editable-ckeditor
        **/
        inputclass: 'editable-ckeditor',
        /**
        Placeholder attribute of input. Shown when input is empty.

        @property placeholder
        @type string
        @default null
        **/
        placeholder: null,
        /**
        ckeditor default options.  
        See https://github.com/jhollingworth/bootstrap-ckeditor#options

        @property ckeditor
        @type object
        @default {stylesheets: false}
        **/        
        ckeditor: {
            stylesheets: false //see https://github.com/jhollingworth/bootstrap-ckeditor/issues/183
        }
    });

    $.fn.editabletypes.ckeditor = ckeditor;

}(window.jQuery));
