/**
 * Created by camello on 6/22/14.
 */

(function($){
    var PluginName = function(element, options)
    {
        var elem = $(element);
        var obj = this;

        var defaults = {

            id : (options.id===undefined) ? 'selector' : options.id,
            formId : (options.id===undefined) ? 'selector' : '#' + options.id

            /*others default options here*/
        };

        var settings = $.extend({

            /*others settings options here*/

        }, defaults, options || {});

        this.publicMethod = function()
        {
            console.log('this method load');
        };

        obj.publicMethod();
    };

    $.fn.pluginName = function(options)
    {
        return this.each(function()
        {
            var element = $(this);
            if (element.data('pluginName')) return;
            var wizardForm = new PluginName(this, options);
            element.data('pluginName', pluginName);
        });
    };
})(jQuery);

var options = {
    /*options by client*/
};

/*simple usage*/
$('selector').pluginName(options);

/*custom usage*/
var pluginCustom = $('selector').data('pluginName');
pluginCustom.publicMethod();
