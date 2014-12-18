<?php

$view = Yii::$app->getView();
$view->registerJs("

/**
 * Created by camello on 6/22/14.
 */

(function($){
    var WizardForm = function(element, options)
    {
        var elem = $(element);
        var obj = this;

        var defaults = {

            id : (options.id===undefined) ? 'form' : options.id,
            formId : (options.id===undefined) ? 'form' : '#' + options.id,

            stepClass : '.steps',
            stepBack : '#stepBack',
            stepNext : '#stepNext',
            stepFinish : '#stepFinish'

        };

        var settings = $.extend({

            steps : elem.find(defaults.stepClass),
            stepBackButton : elem.find(defaults.stepBack),
            stepNextButton : elem.find(defaults.stepNext),
            stepFinishButton : elem.find(defaults.stepFinish),

            currentStep : false

        }, defaults, options || {
            count : settings.steps.size()
        });

        this.hideSteps = function()
        {
            settings.steps.each(function(i) {

                if (i == 0) {
                    //createNextButton(i);
                    //selectStep(i);
                }
                else if (i == options.count - 1) {
                    elem.find('#' + this.id).css('display','none');
                    //createPrevButton(i);
                }else {
                    elem.find('#' + this.id).css('display','none');
                    //createPrevButton(i);
                    //createNextButton(i);
                }


                /*function createPrevButton(i) {
                    var stepName = 'step' + i;
                    $('#' + stepName + 'commands').append('<a href='#' id='\" + stepName + \"Prev' class='prev'>< Back</a>');

                    $('#' + stepName + 'Prev').bind('click', function(e) {
                        $('#' + stepName).hide();
                        $('#step' + (i - 1)).show();
                        $(submmitButtonName).hide();
                        selectStep(i - 1);
                    });
                }

                function createNextButton(i) {
                    var stepName = 'step' + i;
                    $('#' + stepName + 'commands').append('<a href='#' id='\" + stepName + \"Next' class='next'>Next ></a>');

                    $('#'+ stepName + 'Next').bind('click', function(e) {
                        $('#' + stepName).hide();
                        $('#step' + (i + 1)).show();
                        if (i + 2 == count)
                            $(submmitButtonName).show();
                        selectStep(i + 1);
                    });
                }

                function selectStep(i) {
                    $('#steps li').removeClass('current');
                    $('#stepDesc' + i).addClass('current');
                }*/

                /*if(stepId!==0){
                    elem.find('#' + this.id).css('display','none');
                    if(stepId !== settings.steps.length - 1){
                        settings.stepNextButton.attr('data-formstep',this.id);
                    }
                }else{
                    elem.find('#' + this.id).css('display','block');
                }*/
            });
        };

        this.hideStepBack = function(mode)
        {
            elem.find(defaults.stepBack).css('display',mode);
        };

        this.hideStepNext = function(mode)
        {
            elem.find(defaults.stepNext).css('display',mode);
        };

        this.hideStepFinish = function(mode)
        {
            elem.find(defaults.stepFinish).css('display',mode);
        };

        this.nextStep = function()
        {
            settings.stepNextButton.on('click',function(event){
                event.preventDefault();

                var nextFormStep = jQuery(this).attr('data-formstep');

                elem.find('#' + settings.currentStep.id).css('display', 'none');
                elem.find('#' + nextFormStep).css('display', 'block');
                settings.stepBackButton.css('display', 'block');
                settings.stepBackButton.attr('data-formstep',settings.currentStep.id);

            });
        };

        this.backStep = function()
        {
            settings.stepBackButton.on('click',function(event){
                event.preventDefault();

            });
        };

        this.finishStep = function()
        {
            settings.stepFinishButton.on('click',function(event){
                event.preventDefault();

            });
        };

        this.currentStep = function()
        {
            settings.steps.each(function() {
                if(elem.find('#' + this.id).css('display')==='block'){
                    settings.currentStep = this;
                }
            });
        };


        obj.hideSteps();
        obj.hideStepBack('none');
        obj.hideStepFinish('none');

        obj.currentStep();

        obj.nextStep();
        obj.backStep();
        obj.finishStep();
    };

    $.fn.wizardForm = function(options)
    {
        return this.each(function()
        {
            var element = $(this);
            if (element.data('wizardForm')) return;
            var wizardForm = new WizardForm(this, options);
            element.data('wizardForm', wizardForm);
        });
    };
})(jQuery);

var options = {

};

$('#form').wizardForm(options);

",$view::POS_READY);

$view->registerCss("
    fieldset{
        border: none;
        margin: 0px;
        padding: 0px;
    }
");

?>

<form action="" id="form">
    <fieldset>
        <div class="col-md-12 ymo-nopadding steps" id="step1">
            <h3>Step 1</h3>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control"/>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="col-md-12 ymo-nopadding steps" id="step2">
            <h3>Step 2</h3>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control"/>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="col-md-12 ymo-nopadding steps" id="step3">
            <h3>Step 3</h3>
            <div class="form-group">
                <label for="">Msg</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
    </fieldset>
    <div class="col-md-12 ymo-nopadding steps-buttons">
        <a href="#" class="btn btn-info" id="stepBack">Back</a>
        <a href="#" class="btn btn-info" id="stepNext">Next</a>
        <a href="#" class="btn btn-success" id="stepFinish">Finish</a>
    </div>
</form>