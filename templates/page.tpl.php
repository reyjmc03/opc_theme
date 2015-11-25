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
<?php if ($is_front): ?>
<?php ###########################################################################################################################################
      # BEGIN CUSTOMIZED PAGE                                                                                                                   #
      ########################################################################################################################################### ?>
  <?php ####################################################################################
        # begin navigation                                                                 #
        #################################################################################### ?>
  <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header">
          <!-- logo -->
          <div class="animated pulse">
            <div class="site-branding">
              <?php if ($logo): ?>
                <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                  <img class="img-responsive" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
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

        <div class="collapse navbar-collapse" id="navbar-items">
            <ul class="nav navbar-nav navbar-right">
              <?php # agenda ?>
              <?php if (theme_get_setting('show_agenda_section')):?>
                <li><a data-scroll href="#agenda">Agenda</a></li>
              <?php endif; ?>
              <?php # registration ?>
              <?php if (theme_get_setting('show_registration_section')): ?>
                <li><a data-scroll href="#registration">Registration</a></li>
              <?php endif; ?>
              <?php # schedule ?>
              <?php if (theme_get_setting('show_schedule_section')): ?>
                <li><a data-scroll href="#schedule">Schedule</a></li>
              <?php endif; ?>
              <?php # location ?>
              <?php if (theme_get_setting('show_location_section')): ?>
                <li><a data-scroll href="#location">Location</a></li>
              <?php endif; ?> 
              <?php # faq ?>
              <?php if (theme_get_setting('show_faq_section')):?>
                <li><a data-scroll href="#faq">FAQ</a></li>
              <?php endif; ?>
              <?php # call for speakers ?>
              <?php if (theme_get_setting('show_cfs_section')): ?>
                <li><a data-scroll href="#cfs">Call for Speakers</a></li>
              <?php endif; ?>
              <?php # speakers ?>
              <?php if (theme_get_setting('show_speakers_section')): ?>
                <li><a data-scroll href="#speakers">Speakers</a></li>
              <?php endif; ?>
              <?php # sponsorship ?>
              <?php if (theme_get_setting('show_sponsorship_section')): ?>
                <li><a data-scroll href="#sponsors">Sponsors</a></li>
              <?php endif; ?>

              <li><a data-scroll href="">About</a></li>

                <!-- <li><a data-scroll href="#partner">Partner</a></li> -->
                <!-- <li><a data-scroll href="#photos">Photos</a></li> -->
            </ul>

            <?php if ($main_menu): ?>
              <div id="main-menu" class="navigation">
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
              </div> <!-- /#main-menu -->
            <?php endif; ?>
        </div>
    </div><!-- /.container -->
  </nav>
  <?php ####################################################################################
        # end navigation                                                                   #
        #################################################################################### ?>

  <?php ####################################################################################
      # begin header intro                                                               #
      #################################################################################### ?>
  <?php if (theme_get_setting('show_header_intro')): ?>
  <?php 
     $lead_in        = check_plain(theme_get_setting('intro_lead_in')); 
      $intro_heading = check_plain(theme_get_setting('intro_heading'));
      $intro_desc    = check_plain(theme_get_setting('intro_desc'));
      $date          = check_plain(theme_get_setting('date_of_the_event'));
      $venue         = check_plain(theme_get_setting('venue_for_the_event'));
  ?>
  <div class="overlay">
    <!-- <h2>Contact us</h2> -->
    <div class="container">
      <div class="intro-text text-left">
        <div class="intro-lead-in"><?php print $lead_in; ?></div>
        <div class="intro-heading"><?php print $intro_heading; ?></div>
        <hr class="hrl">
        <div class="row">
          <div class="col-md-8">
            <p class="intro-sub">
              <?php print $intro_desc; ?>
           </p>
          </div>
        </div>
        <hr>
        <div class="row">
           <div class="col-md-12 col-xs-12">
                <p><?php print $date; ?></p>
                <p><?php print $venue; ?></p>
            </div>
        </div>
        <hr>
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
    <a class="btn-register" data-scroll href="#registration" target="_blank" href="/node/3"> REGISTER </a>
  </div>
  
  <header id="myCarousel" class="carousel slide carousel-fade">
    <!-- Indicators -->
   <!--  <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol> -->

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header.jpg'; ?>');"></div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header-2.jpg'; ?>');"></div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header-3.jpg'; ?>');"></div>
       </div>
       <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header-4.jpg'; ?>');"></div>
       </div>
       <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header-3.jpg'; ?>');"></div>
       </div>
       <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/backgrounds/header-3.jpg'; ?>');"></div>
       </div>
       <div class="doverlay"></div>
    </div> 

    <!-- Controls -->
    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a> -->
  </header>
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
              <h3 class="section-title">Agenda</h3>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-6">

                  <h3 class="section-sub-title">About Us</h3>

                  <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                  <figure>
                      <img alt="" class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/about-us.jpg'; ?>">
                  </figure>

              </div><!-- /.col-sm-6 -->

              <div class="col-sm-6">

                  <h3 class="section-sub-title multiple-title">What is Our Goal?</h3>

                  <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                  <ul class="list-arrow-right">

                      <li>Learn from the best Asian Social Media Experts &amp; Case Studies</li>
                      <li>Have dedicated 2-to-1 meetings with the experts</li>
                      <li>Reach more consumers for less by learning new digital media skills</li>
                      <li>Save money when spending in online advertising</li>
                  
                  </ul>

              </div><!-- /.col-sm-6 -->
          </div><!-- /.row -->
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
           <div id="ticket_information_wrapper" class="panel_628" style="position: relative;">
        <form name="mgform" onsubmit="return validateform();" action="http://www.eventbrite.com/orderstart?ebtv=C" method="post" target="_blank" style="margin: 0px;">
        <div style="display:none"><input name="csrfmiddlewaretoken" value="4c91132458f6496689e4419cfc48497b" type="hidden"></div>
    <input name="eid" value="18032849739" type="hidden">
    <input name="eventpassword" value="" type="hidden">
    <input name="affiliate" value="etckt" type="hidden">
    <input name="referral_code" value="etckt" type="hidden">
    <input name="referrer" value="" type="hidden">
    <input name="invite" value="" type="hidden">
    <input name="t" value="seG2s+Hk5Le05LWws7GzteWxuOOz4uK4uLiz4bKxsLHf37Gysa61tK6zsq6xtrHfsbS0tbC0sbGzuQ==" type="hidden">
    <input name="w" value="" type="hidden">
    <input name="waitlist_code" value="" type="hidden">
    <input id="ticketCurrency" value="&amp;#8369;" type="hidden">
    <input name="has_javascript" value="1" type="hidden">
    <input name="_nomo" value="" type="hidden">
        <input name="source_id" value="a9ba1575746411e5959b22000bc18495" type="hidden">


      <input name="payment_type" value="" type="hidden">
    <script type="text/javascript">
      document.mgform.has_javascript.value = '1';
    </script>




<div class="l-block-stack">


    <div class="panel_head2 l-block-3" id="ticketInfo">
            <h3>Ticket Information</h3>


        </div>

    </div> 

    <div id="TicketReg" class="panel_body">

        <table class="ticket_table" id="ticket_table" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr class="ticket_table_head">


                <td nowrap="nowrap" width="40%">
                    Ticket Type
                </td>

                <td>Sales End</td>
                <td>
                    Price
                </td>
                <td>Fee</td>


                <td align="right" width="70">Quantity</td>
            </tr> 
            
            <tr class="ticket_row">
    
                <td class="ticket_type_name">
                    Professionals

                    <div id="descriptionDiv38340647" style="font-size: 11px; line-height: 12px; margin: 5px 0 0 0;">Ticket price includes 2 day conference pass with shirt, event kit, meals, digital certificate, more freebies from sponsors, a day full of fun learning with awesome raffle giveaways! Ticket is non-refundable.</div>

                </td>

    

    
                <td nowrap="nowrap">
                    Nov 12, 2015
                </td>

        
                <td class="price_td" nowrap="nowrap">
                    <input name="cost_38340647_None" value="2730" type="hidden">
        
                    PHP2,800.00

                </td>

        
                <td class="fee_td" nowrap="nowrap">
        
                    PHP0.00

                </td>

        

        
                <td align="right" nowrap="nowrap">
            
        
            
                    <label class="is-hidden-accessible" for="quant_38340647_None">Ticket Quantity Select</label>
                    <select class="ticket_table_select" name="quant_38340647_None" id="quant_38340647_None" onchange="updateCheckout();">
                        <option value="0">0</option>

            
                        <option value="1">1&nbsp;</option>
                        <option value="2">2&nbsp;</option>
                        <option value="3">3&nbsp;</option>
                        <option value="4">4&nbsp;</option>
                        <option value="5">5&nbsp;</option>
                        <option value="6">6&nbsp;</option>
                        <option value="7">7&nbsp;</option>
                        <option value="8">8&nbsp;</option>
                        <option value="9">9&nbsp;</option>
                        <option value="10">10&nbsp;</option>
                    </select>


                </td>

            </tr>

    
    
    
      
            
            <tr class="ticket_row">
    
                <td class="ticket_type_name">
                    Students

                    <div id="descriptionDiv38340646" style="font-size: 11px; line-height: 12px; margin: 5px 0 0 0;">Ticket price includes 2 day conference pass with shirt, event kit, meals, digital certificate, more freebies from sponsors, a day full of fun learning with awesome raffle giveaways! Ticket is non-refundable.</div>

                </td>

    

    
                <td nowrap="nowrap">
                    Nov 12, 2015
                </td>

        
                <td class="price_td" nowrap="nowrap">
                    <input name="cost_38340646_None" value="2242.5" type="hidden">
        
                    PHP2,300.00

                </td>

        
                <td class="fee_td" nowrap="nowrap">
        
                    PHP0.00

                </td>

                <td align="right" nowrap="nowrap">
                  <label class="is-hidden-accessible" for="quant_38340646_None">Ticket Quantity Select</label>
                  <select class="ticket_table_select" name="quant_38340646_None" id="quant_38340646_None" onchange="updateCheckout();">
                      <option value="0">0</option>
                      <option value="1">1&nbsp;</option>
                      <option value="2">2&nbsp;</option>
                      <option value="3">3&nbsp;</option>
                      <option value="4">4&nbsp;</option>
                      <option value="5">5&nbsp;</option>
                      <option value="6">6&nbsp;</option>
                      <option value="7">7&nbsp;</option>
                      <option value="8">8&nbsp;</option>
                      <option value="9">9&nbsp;</option>
                      <option value="10">10&nbsp;</option>
                  </select>
                </td>
            </tr>

            
            <tr class="ticket_row">
                <td class="ticket_type_name">
                    Early Bird Professional - 20% Discount
                    <div id="descriptionDiv40049575" style="font-size: 11px; line-height: 12px; margin: 5px 0 0 0;">
                      DISCOUNTED ticket price includes 2 day conference pass with shirt, event kit, meals, digital certificate, 
                      more freebies from sponsors, a day full of fun learning with awesome raffle giveaways! Ticket is non-refundable.
                    </div>
                </td>

                <td nowrap="nowrap">
                    Oct 31, 2015
                </td>

                <td class="price_td" nowrap="nowrap">
                    <input name="cost_40049575_None" value="2184" type="hidden">
                    PHP2,240.00
                </td>
        
                <td class="fee_td" nowrap="nowrap">
                    <p>PHP0.00</p>
                </td>

        
                <td align="right" nowrap="nowrap">
                    <label class="is-hidden-accessible" for="quant_40049575_None">Ticket Quantity Select</label>
                    <select class="ticket_table_select" name="quant_40049575_None" id="quant_40049575_None" onchange="updateCheckout();">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </td>

            </tr>

            <tr class="ticket_row">
                <td class="ticket_type_name">
                    Early Bird Student - 20% Discount
                    <div id="descriptionDiv40049576" style="font-size: 11px; line-height: 12px; margin: 5px 0 0 0;">
                      DISCOUNTED ticket price includes 2 day conference pass with shirt, event kit, meals, digital certificate, 
                      more freebies from sponsors, a day full of fun learning with awesome raffle giveaways! Ticket is non-refundable.
                    </div>
                </td>
    
                <td nowrap="nowrap">
                    Oct 31, 2015
                </td>

        
                <td class="price_td" nowrap="nowrap">
                    <input name="cost_40049576_None" value="1840" type="hidden">
                    PHP1,840.00
                </td>

        
                <td class="fee_td" nowrap="nowrap">
                    PHP46.00
                </td>

                <td align="right" nowrap="nowrap">
                  <label class="is-hidden-accessible" for="quant_40049576_None">Ticket Quantity Select</label>
                  <select class="ticket_table_select" name="quant_40049576_None" id="quant_40049576_None" onchange="updateCheckout();">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </td>
            </tr>

    
        </tbody></table>




        <div id="discounts">
          <div id="discountDiv1">
            <a href="javascript: Hide('discountDiv1'); Show('discountDiv');">Enter promotional code</a>
          </div>
          <div id="discountDiv" style="white-space: nowrap; display: none;">
            If you have a promotional code, enter it here:
            <input class="discount_smartling_css" name="discount" id="discount_code" value="" type="text">&nbsp;&nbsp;
            <span class="button_css">
                            <a href="javascript: applyDiscount('external_body');" title="Apply">Apply</a>
                        </span>
                        <br clear="all">
          </div>
        </div>

    </div><!-- end panel_body -->

    

    <div id="OrderReg" class="panel_footer" style="text-align: right;  padding: 10px;">

      <table id="freeButton" style="display: none;" align="right">
      <tbody><tr>
        <td>&nbsp;</td>
        <td><span id="primary_cta" class="button_css"><a href="javascript: freeCheckout();" class="js-checkout-button" style="text-decoration:none;color:#FFFFFF;">Register</a></span></td>
      </tr>
      </tbody></table>

      <div id="paidButton">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
          <td align="right">
              <div class="cta_container">
                                <span id="primary_cta" class="button_css">
                                    <a style="text-decoration:none;color:#fff;" class="js-checkout-button" href="javascript: Checkout();">
                                        Order Now
                                    </a>
                                </span>
                            </div>
                                <div class="payment_logos">



                      <img src="http://cdn.evbstatic.com/s3-s3/static/images/logo/credit_cards_2013-trans.png" style="margin-right: 10px;" title="PayPal accepts Visa, MasterCard, American Express, Discover, eCheck, and PayPal." alt="PayPal" align="middle" hspace="5" vspace="3">
                </div>


                                      <div class="clearfloat"></div>
                                <div id="options">
                                    <small><b><a href="javascript: Show('optionsExpanded'); Hide('options');"> Show other payment options</a></b></small><br>
                                </div>

                                <div id="optionsExpanded" style="display: none;">
                                    <small><b>Other Payment Options</b>&nbsp;&nbsp;&nbsp;<a href="javascript: Hide('optionsExpanded'); Show('options');">Hide</a><br><br>
                                        <p>
                                            <span class="button_css"><a style="text-decoration:none;" href="javascript: offlineCheckout();">Pay Offline</a></span><br clear="all"><br>
                                            <small>
                                                You can
                                                pay by check.


                                            </small>
                                        </p>
                                </small></div><small>



          </small></td>
        </tr>
        </tbody></table>
      </div>    <!-- end paidButton -->
  <!-- end hide_order -->
    <div class="clearfloat"></div>

    </div><!-- end panel_footer -->

</form>
<div class="clearfloat"></div>
</div>   
          <!-- <form action="#" id="registration-form">
              <div class="row">
                  <div class="col-md-12" id="registration-msg" style="display:none;">
                      <div class="alert"></div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required>
                      </div>

                      <div class="form-group">
                          <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Phone" id="cell" name="cell" required>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Zip Code" id="zip" name="zip" required>
                      </div>

                      <div class="form-group">
                          <select class="form-control" name="city" id="city" required>
                              <option readonly>City</option>
                              <option>City Name 1</option>
                              <option>City Name 2</option>
                              <option>City Name 3</option>
                              <option>City Name 4</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <select class="form-control" name="program" id="program" required>
                              <option readonly>Select Your Program</option>
                              <option>Program Name 1</option>
                              <option>Program Name 2</option>
                              <option>Program Name 3</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="text-center mt20">
                  <button type="submit" class="btn btn-black" id="registration-submit-btn">Submit</button>
              </div>
          </form> -->
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
        </div>
        <div class="container">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#day1"><h4 class="event-schedule-header-tab">DAY 1</h4></a></li>
            <li><a data-toggle="tab" href="#day2"><h4 class="event-schedule-header-tab">DAY 2</h4></a></li>
            <li><a data-toggle="tab" href="#day3"><h4 class="event-schedule-header-tab">DAY 3</h4></a></li>
            <li><a data-toggle="tab" href="#day3"><h4 class="event-schedule-header-tab">DAY 4</h4></a></li>
          </ul>
          <div class="tab-content">
            <?php # begin schedule > day 1 ?>
            <div id="day1" class="tab-pane fade in active">
              <br><br>
              <div class="row">
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="09:00">09:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Securing PHP 101</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>

              </div>
              <br>
              <div class="row">
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="09:00">09:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  
              </div>
            </div>
            <?php # schedule > day 1 ?>
            <?php # begin schedule > day 2 ?>
            <div id="day2" class="tab-pane fade">
              <br><br>
              <div class="row">
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="09:00">09:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
              </div>
              <br>
               <div class="row">
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="09:00">09:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Tips and share</h3>
                          <p>Mustafizur Khan, SD Asia</p>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                      <div class="schedule-box">
                          <div class="time">
                              <time datetime="10:00">10:00 am</time> - <time datetime="22:00">10:00 am</time>
                          </div>
                          <h3>Welcome and intro</h3>
                          <h4>Mustafizur Khan</h4>
                          <p>SD Asia</p>
                      </div>
                  </div>
              </div>
            </div>
            <?php # end schedule > day 2 ?>
          </div>
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
    <!-- css -->
    <style type="text/css">
      #wrapper { position: relative; }
      #google_map { }
      #over_map { position: absolute; top: 10px; left: 10px; z-index: 99; }
    </style>
    <!-- javascript -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
    function initialize() {
      var mapProp = {
        center:new google.maps.LatLng(51.508742,-0.120850),
        zoom:5,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <section id="location" class="section location">
      <br><br><br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="section-title">Event Location</h3>
          </div>
        </div>
        <div class="row">
          
        </div>
        <div class="row">
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-sm-8">
              <div id="wrapper">
                <div id="googleMap">
                </div>
                <div id="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96706.50013548559!2d-78.9870674333782!3d40.76030630398601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sbd!4v1436299406518" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div id="over_map">
                  <address>
                    <p>Eardenia<br> The Grand Hall<br> House # 08, Road #52, Street<br> Phone: +1159t3764<br> Email: example@mail.com</p>
                  </address>
                </div>
              </div>
          </div>
          <div class="col-sm-2">&nbsp;</div>
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
          <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> What is the price of the ticket ?</a>
                            </h4>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <h3>Hello</h3>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is included in my ticket ?</a>
                            </h4>
                        </div>

                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">Hello</div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Office address ?</a>
                            </h4>
                        </div>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">Hello</div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How should I dress ?</a>
                            </h4>
                        </div>

                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">Hello</div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> I have specific questions that are not addressed here. Who can help me ?</a>
                            </h4>
                        </div>

                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">Hello</div>
                        </div>
                    </div>
                </div>
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

        <div class="row">
            <div class="col-md-3">
                <div class="speaker">
                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>CEO, Peren</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">
                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>
                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . 
                          drupal_get_path('theme', 'opc_theme') .  
                          '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . 
                          drupal_get_path('theme', 'opc_theme') .  
                          '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . 
                          drupal_get_path('theme', 'opc_theme') .  
                          '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . 
                          drupal_get_path('theme', 'opc_theme') .  
                          '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>CEO, Peren</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>CEO, Peren</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>CEO, Peren</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-3">
                <div class="speaker">

                    <figure>
                        <img alt="" class="speaker-img img-responsive center-block" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/images/owasp_logo.jpg'; ?>">
                    </figure>

                    <h4>Jhon Smith</h4>

                    <p>Security Engineer, Owasp</p>

                    <ul class="social-block">
                      <li><a href="">
                        <!--  <i class="ion-social-twitter"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/twitter.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-facebook"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/fb.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-linkedin-outline"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/linkedin.png'; ?>">
                      </a></li>
                      <li><a href="">
                        <!-- <i class="ion-social-googleplus"></i> -->
                        <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/social_media/google+.png'; ?>">
                      </a></li>
                    </ul>

                </div><!-- /.speaker -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
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
      <br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Sponsors</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
              <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/1.png'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/2.png'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/3.png'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/4.png'; ?>">
              </a>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/5.png'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/6.png'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
               <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/7.jpg'; ?>">
              </a>
          </div>
          <div class="col-sm-3">
              <a href="">
                <img class="img-responsive" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') .  '/assets/images/sponsors/8.jpg'; ?>">
              </a>
          </div>
        </div>   
      </div>
    </section>
    <?php endif; ?>
    <?php #################################################################################### 
          # end sponsors                                                                     #
          #################################################################################### ?>



    <?php ####################################################################################
          # begin pre footer section                                                         # 
          #################################################################################### ?>
    <?php if ($page['sp_footer_first_col'] || $page['sp_footer_second_col'] || $page['sp_footer_third_col'] || $page['sp_footer_fourth_col']): ?>
    <?php $footer_col = ( 12 / ( (booL) $page['sp_footer_first_col'] + 
                                 (bool) $page['sp_footer_second_col'] +  
                                 (bool) $page['sp_footer_third_col'] + 
                                 (bool) $page['sp_footer_fourth_col'] ) ); ?>
    <section id="pre-footer" class="section pre-footer">
      <div class="container">
        <div class="row">
          <?php if ($page['sp_footer_first_col']): ?>
            <div class="footer-block col-sm-<?php print $footer_col; ?>">
              <?php print render ($page['sp_footer_first_col']); ?>
            </div>
          <?php endif; ?>
          <?php if ($page['sp_footer_second_col']): ?>
            <div class="footer-block col-sm-<?php print $footer_col; ?>">
              <?php print render ($page['sp_footer_second_col']); ?>
            </div>
          <?php endif; ?>
          <?php if ($page['sp_footer_third_col']): ?>
            <div class="footer-block col-sm-<?php print $footer_col; ?>">
              <?php print render ($page['sp_footer_third_col']); ?>
            </div>
          <?php endif; ?>
          <?php if ($page['sp_footer_fourth_col']): ?>
            <div class="footer-block col-sm-<?php print $footer_col; ?>">
              <?php print render ($page['sp_footer_fourth_col']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php ####################################################################################
          # end pre fiiter section                                                           #
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
<?php ###########################################################################################################################################
      # END CUSTOMIZED PAGE                                                                                                                     #
      ########################################################################################################################################### ?>










<?php else: ?>
<?php ###########################################################################################################################################
      # BEGIN DRUPAL DYNAMIC PAGE CONTENT                                                                                                       #
      ########################################################################################################################################### ?>
<?php ####################################################################################
      # begin navigation                                                                 #
      #################################################################################### ?>
<nav id="site-nav" class="navbar navbar-fixed-top navbar-custom navbar-solid">
  <div class="container">
      <div class="navbar-header">
        <!-- logo -->
        <div class="animated pulse">
          <div class="site-branding">
            <?php if ($logo): ?>
            <div class="img-responsive">
              <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
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

      <div class="collapse navbar-collapse" id="navbar-items">
          <?php if ($main_menu): ?>
            <div id="main-menu" class="navigation">
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
            </div> <!-- /#main-menu -->
          <?php endif; ?>
          <!-- <ul class="nav navbar-nav navbar-right">
              <li><a data-scroll href="#about">About</a></li>
              <li><a data-scroll href="#registration">Registration</a></li>
              <li><a data-scroll href="#location">Location</a></li>
              <li><a data-scroll href="#speakers">Speakers</a></li>              
              <li><a data-scroll href="#schedule">Schedule</a></li>                  
              <li><a data-scroll href="#partner">Partner</a></li>                  
              <li><a data-scroll href="#sponsors">Sponsors</a></li>
              <li><a data-scroll href="#faq">FAQ</a></li>
              <li><a data-scroll href="#photos">Photos</a></li>
          </ul> -->
      </div>
  </div><!-- /.container -->
</nav>
<?php ####################################################################################
      # end navigation                                                                   #
      #################################################################################### ?>
<div class="container" style="padding-top:100px;">
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
      <?php //if ($title): ?>
       <!--  <h1 class="title" id="page-title"> -->
          <?php //print $title; ?>
       <!--  </h1> -->
      <?php //endif; ?>

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
<?php ###########################################################################################################################################
      # END DRUPAL DYNAMIC PAGE CONTENT                                                                                                         #
      ########################################################################################################################################### ?>
<?php endif; ?>