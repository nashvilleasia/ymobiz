<?php

/**
 * XeditableText class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

use yii\helpers\ArrayHelper;

class XEditableFile extends XEditable
{
	/**
	 * @see Xeditable
	 * @var string
	 * Type of input. text
	 */
	public $type = 'file';

	/**
	 * @see XEditable
	 * @var boolean
	 * If true - html will be escaped in content of element via $.text() method.
	 * If false - html will not be escaped, $.html() used.
	 * When you use own display function, this option obviosly has no effect.
	 */
	public  $escape = true;

	/**
	 * @see XEditable
	 * @var string
	 * CSS class automatically applied to input
	 */
	public  $inputclass = null;

	/**
	 * @see XEditable
	 * @var string
	 * Placeholder attribute of input. Shown when input is empty.
	 */
	public  $placeholder = null;

	/**
	 * @see XEditable
	 * @var string
	 * HTML template of input. Normally you should not change it.
	 */
	public  $tpl = '<div class=\"editable-file\">" +
							"<span style=\"position:relative; display: inline-block; overflow: hidden; cursor: pointer;\">" +
							"<input type=\"file\" name=\"file\" class=\"input-small\" size=\"1\" style=\"opacity: 0;filter: alpha(opacity=0); cursor: pointer; font-size: 400%; height: 600%; position: absolute; top: 0; right: 0; width: 240%\" />" +
							"<button type=\"button\" style=\"cursor: pointer; display: inline-block; margin-right: 5px;  \">Chose file</button>" +
						"</span></div>';

    /**
     * @see XEditable
     * @var string
     */
    public  $uploadAction = false;
    public  $uploadOptions = [
        'basePath' => '@webroot/upload',
        'baseUrl' => '@web/upload',
    ];

	/**
	 * @see Xeditable
	 * @see Load extension with all settings
	 */
	public function run()
	{
		$this->jsOptions();
		$this->registerScript();
		return $this->htmlOptions();
	}



    public function jsOptions()
    {

        /**
         * @see Xeditable
         * @see set default params
         */
        $this->paramsOptions['default'] = [
            'mode' => $this->mode,
            'id' => $this->id,
            'type' => $this->type,
            'url' => $this->url,
            'placement' => $this->placement,
            'emptytext' => $this->emptytext,
            'showbuttons' => $this->showbuttons,
            'send' => $this->send,
        ];

        /**
         * @see Xeditable
         * @see get data with model
         */
        if($this->model)
        {
            $name = $this->pluginOptions['name'];

            $this->paramsOptions['model'] = [
                'url' => 'upload',
                'value' => $this->model->getFile(),
                'pk' => [
                    'id' => $this->model->id,
                    'options' => $this->uploadOptions,
                ],
            ];

            $this->options = ArrayHelper::merge(
                $this->paramsOptions['default'],
                $this->paramsOptions['model'],
                $this->pluginOptions
            );

        }else{

            $this->options = ArrayHelper::merge(
                $this->paramsOptions['default'],
                $this->pluginOptions,
                [
                    'send' => 'always',
                    'pk' => [
                        'id' => 1,
                        'options' => $this->uploadOptions,
                    ],
                ]
            );
        }
    }

	/**
	 * @see Xeditable
	 * @see Init extension default
	 */
	public function registerAssets()
	{
		$view = $this->getView();

		$view->registerJs('
		(function ($) {

			"use strict";

				var File = function (options) {
					this.init("file", options, File.defaults);
				};

				$.fn.editableutils.inherit(File, $.fn.editabletypes.abstractinput);

				File.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {

					tpl: "'.$this->tpl.'",

					inputclass: "",
					size: 2000000,
					width: 150,
					height: 150,
					html5: false,
				});

				$.extend(File.prototype, {

					render: function() {
						this.$input = this.$tpl.find("input");

						this.$input.filter("[type=\"file\"]").bind("change focus click", function() {
							var $this = $(this),
								newVal = $this.val().split(/\s+/).pop(),
								$button = $this.siblings("button");
							if(newVal !== "") {
								$button.text(newVal);
							}
						});

					},

					init: function(type, options, defaults) {
					   this.type = type;
					   this.options = $.extend({}, defaults, options);
				   },

					value2html: function(value, element) {
						$(element).html(value);
					},

				   value2str: function(value) {
					    var str = "";
					    if(value) {
						    for(var k in value) {
							    str = str + k + ":" + value[k] + ";";
						    }
					    }
					   return str;
				   },

				   str2value: function(str) {
						return str;
					},

				   value2submit: function(value) {
					   return value;
				   },

				   value2input: function(value) {
					    if(!value) {
							return;
						}
						this.$input.filter("[type=\"file\"]").val(value.file);
				   },

				   input2value: function() {

				        var image;
						var $input = this.$input;
						var $options = this.options;

						var file = $input.get(0).files[0];

						if(file)
						{

							if($options.html5===true)
							{
								if(file.size > $options.size){
									alert("Max size is " + $options.size);
									return false;
								}

								var typefile = file.type;

								var reader = new FileReader();

								reader.addEventListener("load",function(event){
									var image = new Image();
									image.width = $options.width;
									image.height = $options.height;
									image.src = event.target.result;
									$($options.scope).editable("setValue",image);
								});

								reader.readAsDataURL(file);

							}

							$(this.options.scope).editable("option", "savenochange", true );
							$(this.options.scope).editable("option", "ajaxOptions", {
								dataType: "json",
								iframe: true,
								files: this.$input.filter("[type=\"file\"]"),
								success: function(data){
									if($options.html5===false)
									{
									    if(data.error){
									        alert(data.error.file);
									        console.log(data);
									    }else{
										    $($options.scope).filter("[id]").find("img").attr("src",data);
										    console.log(data);
										}
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {
									console.log(xhr.status);
									console.log(thrownError);
								}
							});

						}else{
							this.$input.val();
						}
				   },

				   activate: function() {
						this.$input.filter("[type=\"file\"]").focus();
					},

				   setValue: function(value) {
						if(!value) {
							return;
						}
					},

					autosubmit: function() {
						this.$input.keydown(function (e) {
							if (e.which === 13) {
								$(this).closest("form").submit();
							}
						});
					},

				});

				$.fn.editabletypes.file = File;

			}(window.jQuery));

		');

		XEditableFileAsset::register($view);
	}

}
