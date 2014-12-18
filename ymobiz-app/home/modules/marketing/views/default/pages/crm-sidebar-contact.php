<?php

use ymobiz\components\ymoTools;

echo ymoTools::preloadModal([
    ['id'=>'new-contact','module' => 'marketing','size'=>'md'],
    ['id'=>'filter','module' => 'marketing','size'=>'sm'],
]);

?>


<div class="col-md-4 ymo-aside-left ymo-nopadding">
	
	<div class="col-md-12 ymo-menu-left ymo-nopadding">
		<ul class="list-inline ymo-nav-left">
			<li>
				<a class="ymo-icon-client active" href="/marketing">
					<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','contacts') ?>
				</a>
			</li>
			<li>
				<a class="ymo-icon-leads" href="/marketing/crm-sidebar-leads">
					<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','leads') ?>
				</a>
			</li>
		</ul>
		
		<a class="ymo-icon-plus" data-action="new-contact" data-size="lg"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','add new') ?></a>
	</div>
	
	<div class="col-md-12 ymo-table-general ymo-scroll ymo-nopadding">
		<div class="col-md-12 ymo-table ymo-nopadding">
		
			<table class="table ymo-table-list table-responsive">
			  	<tbody>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Sun Infotech</p>
		                    <img class="ymo-icon-home" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('home.png','img/icons')?>" alt="...">
		                    <img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
		                    <a class="ymo-show" href="#">hide staff members</a>
		                    
		                    <tbody class="ymo-list-show">
		                    	<tr>
		                    		<td>
		                        		<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                           		<p>Staff member name (staff member position)</p>
		                            	<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
		                        	</td>
		                  		</tr>
		             			<tr>
		                        	<td>
		                            	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                            	<p>Staff member name (staff member position)</p>
		                           		<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
		                       		</td>
		                  		</tr>
		       					<tr>
		                        	<td>
		                            	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>Staff member name (staff member position)</p>
		                            	<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
		                       		</td>
		                   		</tr>
		     				</tbody>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Info Soft Pvt Ltd</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>General Electric</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Dell Dupe</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Dell Dupe</p>
		                    <img class="ymo-icon-home" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('home.png','img/icons')?>" alt="...">
		                    <img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Accenture</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Oracle</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Hewlett-Packard</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>DHL Parcel Service</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Cisco Systems</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Microsoft</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Oracle</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Hewlett-Packard</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>DHL Parcel Service</p>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
			  				<p>Cisco Systems</p>
			  			</td>
			  		</tr>
			  	</tbody>
			</table>
		
		</div>
	</div>
	
	<div class="col-md-12 ymo-footer-left ymo-nopadding">
		<a class="ymo-icon-filter" data-action="filter" data-size="lg">filter</a>
		
		<div class="col-md-6 ymo-search ymo-nopadding">
			<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
			<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
		</div>
	</div>
	
</div>

























<!-- <div class="col-md-4 ymo-left-marketing ymo-nopadding"> -->
<!--     <div class="col-md-12 ymo-nopadding"> -->

        
<!--         <ul class="col-md-12 ymo-left-list ymo-nopadding ymo-Panel"> -->
<!--             <li> -->
<!--                 <a class="ymo-icon-contacts active" href="/marketing"> -->
                    <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','contacts') ?>
<!--                 </a> -->
<!--             </li> -->
<!--             <li> -->
<!--                 <a class="ymo-icon-leads" href="/marketing/crm-sidebar-leads"> -->
                    <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','leads') ?>
<!--                 </a> -->
<!--             </li> -->
<!--             <a class="ymo-link-add" href="#" data-action="new-contact" data-size="lg"> -->
                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app',' add new') ?>
<!--             </a> -->
<!--         </ul> -->
        

        
<!--         <div class="col-md-12 ymo-nopadding ymo-table-sidebar ymo-scroll"> -->
<!--             <div class="col-md-12 ymo-nopadding ymo-table"> -->

                
<!--                 <table class="ymo-table-list table table-responsive"> -->
<!--                     <tbody> -->
<!--                     <tr> -->
<!--                         <td> -->
  <!--                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                            <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Sun Infotech') ?>
<!--                             </p> -->
 <!--                            <img class="ymo-icon-home" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/home.png" alt="...">
                            <img class="ymo-icon-off" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/buble_on.png" alt="...">
                            <a class="ymo-view-staff"> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','view staff members') ?>
<!--                             </a> -->
<!--                         </td> -->
<!--                         <td> -->
<!--                             <div class="ymo-table-list table table-responsive"> -->
<!--                                 <tbody class="ymo-list-show"> -->
<!--                                     <tr> -->
<!--                                         <td colspan="2"> -->
 <!--                                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                                             <p> -->
                                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Staff member name (staff member posit)') ?>
<!--                                             </p> -->
 <!--                                           <img class="ymo-icon-off" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/buble_on.png" alt="...">
                                         </td> -->
<!--                                     </tr> -->
<!--                                     <tr> -->
<!--                                         <td colspan="2"> -->
  <!--                                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                                            <p> -->
                                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Staff member name (staff member posit)') ?>
<!--                                             </p> -->
  <!--                                          <img class="ymo-icon-off" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/buble_on.png" alt="...">
                                         </td> -->
<!--                                     </tr> -->
<!--                                     <tr> -->
<!--                                         <td colspan="2"> -->
  <!--                                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                                             <p> -->
                                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Staff member name (staff member posit)') ?>
<!--                                             </p> -->
 <!--                                           <img class="ymo-icon-off" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/buble_on.png" alt="...">
                                         </td> -->
<!--                                     </tr> -->
<!--                                 </tbody> -->
<!--                             </div> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Info Soft Pvt Ltd') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
 <!--                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','General Electric') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Dell Dupe') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td> -->
  <!--                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                            <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Dell Dupe') ?>
<!--                             </p> -->
 <!--                           <img class="ymo-icon-home" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/home.png" alt="...">
                            <img class="ymo-icon-off" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/buble_on.png" alt="...">
                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="2"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Accenture') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
 <!--                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Oracle') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Hewlett-Packard') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','DHL Parcel Service') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
   <!--                         <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Cisco Systems') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
 <!--                           <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Microsoft') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     <tr> -->
<!--                         <td colspan="4"> -->
  <!--                          <img class="ymo-image-user" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                             <p> -->
                                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','Microsoft') ?>
<!--                             </p> -->
<!--                         </td> -->
<!--                     </tr> -->
<!--                     </tbody> -->
<!--                 </table> -->

<!--             </div> -->
<!--         </div> -->


<!--         <div class="col-md-12 ymo-table-footer ymo-nopadding"> -->

            
<!--             <a href="#" data-action="filter" data-size="lg" class="col-md-5 ymo-icon-filter ymo-nopadding"> -->
                <?php Yii::$app->getModule('site')->ymoTranslate->t('site','app','filter') ?>
<!--             </a> -->
            

            
<!-- 			<div class="col-md-6 ymo-search ymo-nopadding"> -->
<!-- 				<input type="text" name="search" class="form-control input-sm" placeholder="search"> -->
<!-- 				<input type="submit" name="magnifier" value=""> -->
<!-- 			</div> -->

<!--         </div> -->

<!--     </div> -->
<!-- </div> -->