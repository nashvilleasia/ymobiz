<html>
    <head>
        <title><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Email confirmation')?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table id="Table_01" width="759" height="345" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td rowspan="2" style="width: 237px; height: 70px; line-height: 0px;">
                    <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('images/logo.jpg','img') ?>" alt="">
                </td>
                <td colspan="2" style="width: 522px; height: 41px; background: #ffffff; line-height: 0px;">
                </td>
            </tr>
            <tr>
                <td style="width: 273px; height: 29px; background: #ffffff; line-height: 0px;">
                </td>
                <td rowspan="2" style="width: 249px; height: 221px; line-height: 0px;">
                    <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('images/girl.jpg','img') ?>" alt="">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 510px; height: 192px; background: #ffffff; line-height: 0px;">
                    <h4 style="float left; font-size: 1.50em; font-family: 'microsoft_tai_lebold'; color: #787878; padding-right: 40px; margin: 5px 0px 0px 60px;">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Dear')?> Mr. Pedro Almeida,
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','your account details was sucessfully edited.')?>
                    </h4>
                    <p style="float left; font-size: 1.25em; font-family: 'microsoft_tai_leregular'; color: #787878; padding-right: 40px; margin: 10px 0px 0px 60px; line-height: 20px;">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','To access you Ymocard account please insert your new login i formation')?>
                    </p>
                    <h6 style="float left; padding-right: 40px; margin: 21px 0px 0px 60px;">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <p style="float left; font-size: 1.25em; font-family: 'microsoft_tai_leregular'; color: #787878;">
                                        <strong style="font-family: 'microsoft_tai_lebold'; margin-right: 6px;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','email:')?> </strong>
                                        envnrvwrwvr@vffg.com
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="float left; font-size: 1.25em; font-family: 'microsoft_tai_leregular'; color: #787878;">
                                        <strong style="font-family: 'microsoft_tai_lebold'; margin-right: 6px;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','password:')?></strong>
                                        123456789
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h6>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width: 759px; height: 83px; line-height: 0px;">
                    <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('images/footer.jpg','img') ?>" alt="">
                </td>
            </tr>
        </table>
    </body>
</html>