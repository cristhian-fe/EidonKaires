<?php if ($offCanvas > 0) { ?>
		<nav id="topMenu" role="navigation">
          <jdoc:include type="modules" name="offCanvasTopMenu" style="none" />										
		</nav>    
        <div class="row">
       		<jdoc:include type="modules" name="offCanvasTopModule" style="html5" />										
		</div>
            <?php } ?>

<!--Logo / Nav Row -->
    <div class="row">
            <div class="three columns">
				<?php if ($logoUp > 0) { ?>
                <a href="<?php echo $this->baseurl ?>" alt="<?php echo $sitename ?>" title="<?php echo $sitename ?>">
                <img src="<?php echo $custLogo ?>" alt="<?php echo $sitename ?>" title="<?php echo $sitename ?>" />
                </a>
                
                <?php } else { ?>	
                <jdoc:include type="modules" name="logo" style="none" />
                <?php }; ?>	
            </div>
        	<?php if ($menu > 0) : ?>
            	<?php if ($offCanvas > 0) { ?>
            <nav id="menu" role="navigation" class="nine columns hide-for-small">
                <jdoc:include type="modules" name="menu" style="none" />
            </nav>
            		<p class="show-for-small">
              <?php if ($offCanvasTopMenu > 0 or $offCanvasTopModule > 0) { ?>
  				  <a class='menu-button button' id="menuButton" href="#menu"><?php echo $topButton ?></a>
              <?php } ?>
              <?php if ($offCanvasSideMenu > 0 or $offCanvasSideModule > 0) { ?>
  			  	<a class='sidebar-button button' id="sidebarButton" href="#sidebar"><?php echo $sideButton ?></a>
              <?php } ?>
  			</p>
            <? } else { ?>
            <nav id="menu" role="navigation" class="nine columns">
                <jdoc:include type="modules" name="menu" style="none" />
            </nav>
            <?php } ?>
   		 <?php endif; ?>	
    </div>
    <?php if ($offCanvas > 0) { ?>
         <section id="sidebar" role="complementary">
				 <?php if ($offCanvasSideMenu > 0) { ?>
                    <nav id="sideMenu" role="navigation">
                      <jdoc:include type="modules" name="offCanvasSideMenu" style="none" />										
                	</nav>
                <?php } ?>
                <?php if ($offCanvasSideModule > 0) { ?>
                      <jdoc:include type="modules" name="offCanvasSideModule" style="html5" />										
                <?php } ?> 
                
  		</section>
          		<section role="main">
<?php } else { }?>
<!--Orbit Row -->
    <div class="row">
        <?php if ($orbit > 0) : ?>
            <div class="twelve columns" id="orbit">
                <jdoc:include type="modules" name="orbit" style="raw" />
            </div>
   		<?php endif; ?>	
    </div>
    
<!--Slideshow Row -->
    <div class="row">
        <?php if ($slideshow > 0) : ?>
            <div class="twelve columns">
                <jdoc:include type="modules" name="slideshow" style="html5" />
            </div>
   		<?php endif; ?>	    
    </div>

 <!--Top Row -->
    <div class="row">
		<?php if ($top1 > 0) : ?>
            <div class="<?php echo $topWidth ?>">
                <jdoc:include type="modules" name="top1" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($top2 > 0) : ?>
            <div class="<?php echo $topWidth ?>">
                <jdoc:include type="modules" name="top2" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($top3 > 0) : ?>
            <div class="<?php echo $topWidth ?>">
                <jdoc:include type="modules" name="top3" style="html5" />
            </div>
        <?php endif; ?>	    
    </div>

<!--MAIN Row -->
    <div class="row">
    
		 <?php if ($left > 0) : ?>
              <div class="<?php echo htmlspecialchars($leftWidth); ?> ">
                 <jdoc:include type="modules" name="left" style="html5" />
              </div>
         <?php endif; ?>
         	
               <div class="<?php echo htmlspecialchars($mainWidth); ?>">

               			<?php if ($above1 > 0) : ?>
                            <div class="<?php echo $aboveWidth ?>">
                                <jdoc:include type="modules" name="above1" style="html5" />
                            </div>
                        <?php endif; ?>	
                        <?php if ($above2 > 0) : ?>
                            <div class="<?php echo $aboveWidth ?>">
                                <jdoc:include type="modules" name="above2" style="html5" />
                            </div>
                        <?php endif; ?>	
                        <?php if ($above3 > 0) : ?>
                            <div class="<?php echo $aboveWidth ?>">
                                <jdoc:include type="modules" name="above3" style="html5" />
                            </div>
                        <?php endif; ?>	 
                         
                   <jdoc:include type="message" />
                   <jdoc:include type="component" />
                   
						<?php if ($below1 > 0) : ?>
                            <div class="<?php echo $belowWidth ?>">
                                <jdoc:include type="modules" name="below1" style="html5" />
                            </div>
                        <?php endif; ?>	
                        <?php if ($below2 > 0) : ?>
                            <div class="<?php echo $belowWidth ?>">
                                <jdoc:include type="modules" name="below2" style="html5" />
                            </div>
                        <?php endif; ?>	
                        <?php if ($below3 > 0) : ?>
                            <div class="<?php echo $belowWidth ?>">
                                <jdoc:include type="modules" name="below3" style="html5" />
                            </div>
                        <?php endif; ?>	                     
               </div>
               
         <?php if ($right > 0) : ?>
              <div class="<?php echo htmlspecialchars($rightWidth); ?> ">
                 <jdoc:include type="modules" name="right" style="html5" />
              </div>
         <?php endif; ?>	
    </div>

<!--Bottom Row -->
    <div class="row">
		<?php if ($bottom1 > 0) : ?>
            <div class="<?php echo $bottomWidth ?>">
                <jdoc:include type="modules" name="bottom1" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($bottom2 > 0) : ?>
            <div class="<?php echo $bottomWidth ?>">
                <jdoc:include type="modules" name="bottom2" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($bottom3 > 0) : ?>
            <div class="<?php echo $bottomWidth ?>">
                <jdoc:include type="modules" name="bottom3" style="html5" />
            </div>
        <?php endif; ?>	      
    </div>

<!--FooterTop Row -->
    <div class="row">
		<?php if ($footerTop1 > 0) : ?>
            <div class="<?php echo $footerTopWidth ?>">
                <jdoc:include type="modules" name="footerTop1" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($footerTop2 > 0) : ?>
            <div class="<?php echo $footerTopWidth ?>">
                <jdoc:include type="modules" name="footerTop2" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($footerTop3 > 0) : ?>
            <div class="<?php echo $footerTopWidth ?>">
                <jdoc:include type="modules" name="footerTop3" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($footerTop4 > 0) : ?>
            <div class="<?php echo $footerTopWidth ?>">
                <jdoc:include type="modules" name="footerTop4" style="html5" />
            </div>
        <?php endif; ?>	        
    </div>

<!--Footer Row -->
    <div class="row">
		<?php if ($footer1 > 0) : ?>
            <div class="<?php echo $footerWidth ?>">
                <jdoc:include type="modules" name="footer1" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($footer2 > 0) : ?>
            <div class="<?php echo $footerWidth ?>">
                <jdoc:include type="modules" name="footer2" style="html5" />
            </div>
        <?php endif; ?>	
        <?php if ($footer3 > 0) : ?>
            <div class="<?php echo $footerWidth ?>">
                <jdoc:include type="modules" name="footer3" style="html5" />
            </div>
        <?php endif; ?>	      
    </div>
<?php if ($offCanvas > 0) { ?>
  		</section>
        <?php } else {} ?>

  <!-- Initialize JS Plugins -->
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/app.js"></script>
<?php if ($orbit > 0) : ?>
	<script type="text/javascript">
       $(window).load(function() {
          $('#orbit').orbit({
             animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
             animationSpeed: 800,                // how fast animtions are
             timer: true, 			 // true or false to have the timer
             resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress
             advanceSpeed: 4000, 		 // if timer is enabled, time between transitions 
             pauseOnHover: false, 		 // if you hover pauses the slider
             startClockOnMouseOut: false, 	 // if clock should start on MouseOut
             startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
             directionalNav: true, 		 // manual advancing directional navs
             captions: true, 			 // do you want captions?
             captionAnimation: 'fade', 		 // fade, slideOpen, none
             captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
             bullets: false,			 // true or false to activate the bullet navigation
             bulletThumbs: false,		 // thumbnails for the bullets
             bulletThumbLocation: '',		 // location from this file where thumbs will be
             afterSlideChange: function(){}, 	 // empty function 
             fluid: true                         // or set a aspect ratio for content slides (ex: '4x3') 
        });
    </script>
<?php endif; ?>	


