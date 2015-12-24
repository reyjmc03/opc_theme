<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php ####################################################################################
      # begin navigation                                                                 #
      #################################################################################### ?>
<?php if ($is_front): ?>
<nav id="site-nav" class="navbar navbar-fixed-top navbar-custom"> 
<?php else: ?>
<nav id="site-nav" class="navbar navbar-fixed-top navbar-custom navbar-solid">
<?php endif; ?>
  <div class="container">
    <div class="navbar-header">
      <!-- logo -->
      <div class="animated pulse">
        <div class="site-branding">
          <?php if ($logo): ?>
            <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img width="350" class="img-responsive" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>
        </div>
      </div>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
    </div><!-- /.navbar-header -->

    <?php if ($main_menu): ?>
      <?php print theme('links__system_main_menu', array(
        'links' => $main_menu,
        'attributes' => array(
          'id' => 'main-menu-links',
          'class' => array('nav navbar-nav', 'navbar-right'),
        ), 
        'heading' => array(
          'text' => t('Main menu'),
          'level' => 'h2',
          'class' => array('element-invisible'),
        ),
      )); ?>
    <?php endif; ?>

    <?php //print '<ul class="nav navbar-nav navbar-right">'; ?>
      <?php # agenda ########### ?>
      <?php //if (theme_get_setting('show_agenda_section')):
      //print '<li><a data-scroll href="' . base_path() . '/#agenda' .'">Agenda</a></li>'; 
      //endif; ?>
      <?php # registration ########## ?>
      <?php //if (theme_get_setting('show_registration_section')):
      //print '<li><a data-scroll href="' . base_path() . '#registration' . '">Registration</a></li>';
      //endif; ?>
      <?php # schedule ############## ?>
      <?php //if (theme_get_setting('show_schedule_section')):
      //print '<li><a data-scroll href="' . base_path() . '#schedule' . '">Schedule</a></li>';
      //endif; ?>
      <?php # location ############## ?>
      <?php //if (theme_get_setting('show_location_section')):
      //print '<li><a data-scroll href="' . base_path() . '#location' . '">Location</a></li>';
      //endif; ?> 
      <?php # faq ################### ?>
      <?php //if (theme_get_setting('show_faq_section')):
      //print '<li><a data-scroll href="' . base_path() . '#faq' . '">FAQ</a></li>';
      //endif; ?>
      <?php # call for speakers ##### ?>
      <?php //if (theme_get_setting('show_cfs_section')):
      //print '<li><a data-scroll href="' . base_path() . '#cfs' . '">Call for Speakers</a></li>';
      //endif; ?>
      <?php # speakers ############## ?>
      <?php //if (theme_get_setting('show_speakers_section')):  
      //print '<li><a data-scroll href="' . base_path() . '#speakers' . '">Speakers</a></li>';
      //endif; ?>
      <?php # sponsorship ########### ?>
      <?php //if (theme_get_setting('show_sponsorship_section')):
      //print '<li><a data-scroll href="' . base_path() . '#sponsors' . '">Sponsors</a></li>';
      //endif; ?>
    <?php //print '</ul>'; ?>  
  </div><!-- /.container -->
</nav>
<?php ####################################################################################
      # end navigation                                                                   #
      #################################################################################### ?>


<?php if ($is_front): ?>
<?php ###########################################################################################################################################
      # BEGIN CUSTOMIZED PAGE                                                                                                                   #
      ########################################################################################################################################### ?>
  <?php ####################################################################################
      # begin header intro                                                               #
      #################################################################################### ?>
  <?php if (theme_get_setting('show_header_intro')): ?>
    <?php if(theme_get_setting('used_slideshow')): ?>
      <header id="myCarousel" class="carousel slide carousel-fade">
       <!-- Indicators -->
       <!--  <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol> -->
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
          <div class="item active"> 
            <div class="fill" <?php print $slide1_image_styles; ?>></div>
          </div>
          <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" <?php print $slide2_image_styles; ?>></div>
          </div>
          <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" <?php print $slide3_image_styles; ?>></div>
          </div>
          <div class="item">
            <!-- Set the fourth background image using inline CSS below. -->
            <div class="fill" <?php print $slide4_image_styles; ?>></div>
          </div>
          <div class="item">
            <!-- Set the fifth background image using inline CSS below. -->
            <div class="fill" <?php print $slide5_image_styles; ?>></div>
          </div>

          <div class="doverlay">
            <div class="overlay">
             <div class="intro">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php if($page['header_section']): print render($page['header_section']); endif; ?>
                  </div><!-- ./col-lg-12 col-md-12 col-sm-12 -->
                </div><!-- ./row -->
              </div><!-- ./container -->
                <?php if (theme_get_setting('show_registration_section')): ?>
                  <a class="btn-register" data-scroll href="#registration" target="_blank" href="/node/3"> REGISTER </a>
                <?php endif; ?>
                <div class="row btn-wrap" style="line-height: 60px;">
                  <div class="col-md-2 col-sm-3 col-xs-12">
                  </div>
                  <?php if (theme_get_setting('show_faq_section')): ?>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <a class="page-scroll btn btn-primary highlights" href="#highlights">Frequently Asked Questions</a>
                  </div>
                  <?php endif; ?>
                </div> 
            </div>
            </div>
          </div>
        </div> 
        <!-- Controls -->
        <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a> -->
      </header>
    <?php else: ?>
      <header id="site-header" class="site-header valign-center"> 
        <div class="doverlay">
          <div class="overlay">
            <div class="intro">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php if($page['header_section']): print render($page['header_section']); endif; ?>
                  </div><!-- ./col-lg-12 col-md-12 col-sm-12 -->
                </div><!-- ./row -->
              </div><!-- ./container -->
                
              <a class="btn-register" data-scroll href="#registration" target="_blank" href="/node/3"> REGISTER </a>

                  <div class="col-md-2 col-sm-3 col-xs-12">
                  </div>
                  <?php if (theme_get_setting('show_faq_section')): ?>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                    <a class="page-scroll btn btn-primary highlights" href="#highlights">Frequently Asked Questions</a>
                  </div>
                  <?php endif; ?>
              </div> 
            </div>
          </div>
        </div>
      </header>
    <?php endif; ?>
  <?php endif; ?>
  <?php ####################################################################################
        # end header intro                                                                 #
        #################################################################################### ?>


  <?php ####################################################################################
        # begin agenda section                                                             #
        #################################################################################### ?>
  <?php if (theme_get_setting('show_agenda_section')): ?>
  <section id="agenda" class="section about">
    <br><br><br><br>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="WOW pulse">
            <h3 class="section-title">Agenda</h3>
          </div>
        </div>
      </div>
      <?php if($page['agenda_section']): print render($page['agenda_section']); endif; ?>
    </div><!-- /.container -->
  </section>
  <?php endif; ?>
  <?php ####################################################################################
        # end agenda section                                                               #
        #################################################################################### ?>


  <?php ####################################################################################
        # begin registration section                                                       #
        #################################################################################### ?>
  <?php if (theme_get_setting('show_registration_section')): ?>
    <section id="registration" class="section registration">
      <br><br><br><br>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h3 class="section-title">Register</h3>
              </div>
          </div>
          <center><p>Be part of this exciting event! Limited slots available, REGISTER NOW!</p></center>
      </div>     
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end registration section                                                         #
          #################################################################################### ?>


    <?php ####################################################################################
          # begin schedule section                                                           #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_schedule_section')): ?>
    <section id="schedule" class="section schedule">
      <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Event Schedule</h3>
          </div>
          <?php if($page['schedule_section']): print render($page['schedule_section']); endif; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end schedule secton                                                              #
          #################################################################################### ?>


    <?php ####################################################################################
          # begin location section                                                           #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_location_section')): ?>
    <section id="location" class="section location">    
      <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="section-title">Event Location</h3>
          </div>
        </div>
        <?php # -- address description -- ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <?php if ($page['location_section']): ?>
              <?php print render($page['location_section']); ?>
            <?php endif; ?>
            <hr>
          </div>
        </div>
        <?php # -- location maps -- ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/templates/streetviewmap.php';?>"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end location section                                                             #
          #################################################################################### ?>

     
    <?php #################################################################################### 
          # begin faq section                                                                #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_faq_section')): ?>
    <section id="faq" class="section faq">
      <br><br><br><br>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Frequently Asked Questions</h3>
            </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end faq section                                                                  #
          #################################################################################### ?>


    <?php ####################################################################################
          # begin call for speakers section                                                  #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_cfs_section')): ?>
    <section id="cfs" class="section cfs">
      <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Call for Speakers</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="section bg-image-1 cfs">
      <div class="row">
          <div class="col-md-12">
            <center>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <p class="cfs-para">ksadlkalskdlkasld asdlalskdlkasd laksldkalskldkalskd asldklaksldkalksdlkalskdlas.</p>
              <div class="btn-wrap cfs-button">
                  <a class="page-scroll btn btn-primary" href="">Click here for more information</a>
              </div>
            </center>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end call for speaker section                                                     #
          #################################################################################### ?>
     

    <?php ####################################################################################
          # begin speakers section                                                           #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_speakers_section')):?>
    <section id="speakers" class="section speakers">
      <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Speakers</h3>
          </div>
        </div>
        <?php if ($page['speakers_section']): ?>
          <?php print render($page['speakers_section']); ?>
        <?php endif; ?>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end speakers section                                                             #
          #################################################################################### ?>


    <?php ####################################################################################
          # begin sponsors                                                                   #
          #################################################################################### ?>
    <?php if (theme_get_setting('show_sponsorship_section')): ?>
    <section id="sponsors" class="section partner">
      <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Event Sponsors</h3>
          </div>
        </div>
        <?php if($page['sponsors_section']): ?>
          <?php print render($page['sponsors_section']); ?>
        <?php endif; ?>
      </div>
    </section>
    <?php endif; ?>
    <?php #################################################################################### 
          # end sponsors                                                                     #
          #################################################################################### ?>
<?php ###########################################################################################################################################
      # END CUSTOMIZED PAGE                                                                                                                     #
      ########################################################################################################################################### ?>
<?php else: ?>
<?php ###########################################################################################################################################
      # BEGIN DRUPAL DYNAMIC PAGE CONTENT                                                                                                       #
      ########################################################################################################################################### ?>
<section id="content" class="section content">
  <br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php //print render($page['header']); ?>
        <?php
        # messages   #
        ############## ?>
        <?php if ($messages): ?>
        <div id="messages"><div class="section clearfix">
          <?php print $messages; ?>
        </div></div> <!-- /.section, /#messages -->
        <?php endif; ?>
        <?php
        ##############
        # ./messages #  ?>

        <?php //if ($page['highlighted']): ?><!-- <div id="highlighted"> --><?php //print render($page['highlighted']); ?><!-- </div> --><?php //endif; ?>
        <!-- <a id="main-content"></a> -->
        <?php //print render($title_prefix); ?>
        <?php if ($title): ?>
         <h3 class="section-title">
            <?php print $title; ?>
         </h3>
        <?php endif; ?>

         <?php print render($title_suffix); ?>
          <?php if ($tabs): ?>
            <div class="tabs">
              <?php print render($tabs); ?>
            </div>
          <?php endif; ?>

          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>

          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
      </div>
    </div>
  </div>
</section>
<?php ###########################################################################################################################################
      # END DRUPAL DYNAMIC PAGE CONTENT                                                                                                         #
      ########################################################################################################################################### ?>
<?php endif; ?>



<?php ####################################################################################
      # begin pre footer block                                                           #
      #################################################################################### ?>
<?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
<?php 
  $footer_col = ( 12 / ( (booL) $page['footer_firstcolumn'] + 
    (bool) $page['footer_secondcolumn'] +  
    (bool) $page['footer_thirdcolumn'] + 
    (bool) $page['footer_fourthcolumn'] ) ); 
?>
<section id="pre-footer" class="section pre-footer">
  <div class="container">
    <div class="row">
      <?php if ($page['footer_firstcolumn']): ?>
        <div class="footer-block col-sm-<?php print $footer_col; ?>">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if ($page['footer_secondcolumn']): ?>
        <div class="footer-block col-sm-<?php print $footer_col; ?>">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if ($page['footer_thirdcolumn']): ?>
        <div class="footer-block col-sm-<?php print $footer_col; ?>">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if ($page['footer_fourthcolumn']): ?>
        <div class="footer-block col-sm-<?php print $footer_col; ?>">
          <?php print render($page['footer_fourthcolumn']); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php ####################################################################################
      # end pre footer block                                                             #
      #################################################################################### ?>
<?php ####################################################################################
      # begin footer section                                                             #
      #################################################################################### ?>
<?php if (theme_get_setting('show_footer_section')): ?>
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php # copyright information ?>
        <p class="site-info" style="text-align:center;">
          &copy; <?php echo date("Y"); ?>, <?php print check_plain(theme_get_setting('copyright_holder')) . ". " . "All Rights Reserved." ?>
        </p>
        </ul>
      </div>
    </div>
  </div>
</footer>
<?php endif; ?>
<?php ####################################################################################
      # end footer section                                                               #
      #################################################################################### ?>

<?php //print $closure ?>