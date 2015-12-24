<?php
/**
 * Implements hook_form_system_theme_settings_alter() function.
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
// function opc_theme_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
function opc_theme_form_system_theme_settings_alter(&$form, &$form_state) {

   $form['opc_theme'] = array(
    '#type' => 'fieldset',
    '#title' => t('<center><b style="color: blue;">OWASP PHILIPPINES APPSEC CONFERENCE 2016 THEME (SINGLE PAGE)</b></center>'),
    '#collapsible' => FALSE,
	 '#collapsed' => FALSE,
   );

  ##########################################################################################
  # header intro form                                                                      
  ##########################################################################################
  // header information
  $form['opc_theme']['header'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>Header Settings</b>'),
		'#collapsible' => TRUE, // BUTTON
		'#collapsed' => TRUE, // FORM
 	);
  # show header intro checkbox
  $form['opc_theme']['header']['show_header_intro'] = array(
		'#type' => 'checkbox',
		'#title' => t('Show Header Intro'),
		'#default_value' => theme_get_setting('show_header_intro'),
		'#description' => t("Check this opation to Header Introdunction Section. Uncheck to hide"),
	);

  # ### slider image information ###
  $form['opc_theme']['header']['slideshow'] = array(
    '#type' => 'fieldset',
    '#title' => t('<b>Animated Slideshow</b>'),
    '#collapsible' => TRUE, // BUTTON
    '#collapsed' => TRUE, // FORM
  );

  $form['opc_theme']['header']['slideshow']['used_slideshow'] = array(
    '#type' => 'checkbox',
    '#title' => 'Use Animated Slideshow',
    '#default_value' => theme_get_setting('used_slideshow'),
    '#description' => t('This option selects to activate slideshow capabilities of page.'),
  );

  $form['opc_theme']['header']['slideshow']['slide_desc'] = array(
    '#markup' => t('Note: You can change the description and URL of each slide in the following Slide Setting fieldsets.'),
  );

  # slide no. 1
  # ______________________
  $form['opc_theme']['header']['slideshow']['slide1_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Custom slide 1 image'),
    '#default_value' => theme_get_setting('slide1_image'),
    '#description' => t('.jpg or .jpeg are allowed file extension only.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extentions' => array('jpg jpeg'),
    ),
  );

  # slide no. 2
  # ______________________
  $form['opc_theme']['header']['slideshow']['slide2_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Custom slide 2 image'),
    '#default_value' => theme_get_setting('slide2_image'),
    '#description' => t('.jpg or .jpeg are allowed file extension only.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extentions' => array('jpg jpeg'),
    ),
  );


  # slide no. 3
  # ______________________
  $form['opc_theme']['header']['slideshow']['slide3_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Custom slide 3 image'),
    '#default_value' => theme_get_setting('slide3_image'),
    '#description' => t('.jpg or .jpeg are allowed file extension only.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extentions' => array('jpg jpeg'),
    ),
  );

  # slide no. 4
  # ______________________
  $form['opc_theme']['header']['slideshow']['slide4_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Custom slide 4 image'),
    '#default_value' => theme_get_setting('slide4_image'),
    '#description' => t('.jpg or .jpeg are allowed file extension only.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extentions' => array('jpg jpeg'),
    ),
  );

  # slide no. 5
  # ______________________
  $form['opc_theme']['header']['slideshow']['slide5_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Custom slide 5 image'),
    '#default_value' => theme_get_setting('slide5_image'),
    '#description' => t('.jpg or .jpeg are allowed file extension only.'),
    '#upload_location' => 'public://theme/',
    '#upload_validators' => array(
      'file_validate_extentions' => array('jpg jpeg'),
    ),
  );

  # ### end slider image information ###

  // $form['opc_theme'][]
  ##########################################################################################
  # agenda section
  ##########################################################################################
  $form['opc_theme']['agenda'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>Agenda Section Settings</b>'),
		'#collapsible' => TRUE, // BUTTON
		'#collapsed' => TRUE, // FORM
 	);
  $form['opc_theme']['agenda']['show_agenda_section'] = array(
  		'#type' => 'checkbox',
  		'#title' => t('Show Agenda Section'),
  		'#default_value' => theme_get_setting('show_agenda_section'),
  		'#description' => t("Check this option to Agenda Section. Uncheck to hide"),
  	);

  ##########################################################################################
  # registration section
  ##########################################################################################
  $form['opc_theme']['registration'] = array(
    '#type' => 'fieldset',
    '#title' => t('<b>Registration Section Settings</b>'),
    '#collapsible' => TRUE, # BUTTON
    '#collapsed' => TRUE, # FORM
  );
  $form['opc_theme']['registration']['show_registration_section'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Registration Section'),
    '#default_value' => theme_get_setting('show_registration_section'),
    '#description' => t('Check this option to Registration Section. Uncheck to hide'),
  );
    
  ##########################################################################################
  # schedule section
  ##########################################################################################
  	$form['opc_theme']['schedule'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>Schedule Section Settings</b>'),
		'#collapsible' => TRUE, // BUTTON 
		'#collapsed' => TRUE, // FORM
 	);
 	$form['opc_theme']['schedule']['show_schedule_section'] = array(
 		'#type' => 'checkbox',
 		'#title' => t('Show Schedule Section'),
 		'#default_value' => theme_get_setting('show_schedule_section'),
 		'#description' => t('Check this option to Schedule Section. Uncheck to hide.'),
 	);
  
  ##########################################################################################
  # location section
  ##########################################################################################
   $form['opc_theme']['location'] = array(
    '#type' => 'fieldset',
    '#title' => t('<b>Location Section Settings</b>'),
    '#collapsible' => TRUE, // FOR BUTTON
    '#collapsed' => TRUE, // FOR FORM
   );
   $form['opc_theme']['location']['show_location_section'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Location Section'),
    '#default_value' => theme_get_setting('show_location_section'),
    '#description' => t('Check this option to Location Section. Uncheck to hide.'),
   );

   ##########################################################################################
   # speakers and call for speakers section
   ##########################################################################################
   $form['opc_theme']['speakers_cfs'] = array(
    '#type' => 'fieldset',
    '#title' => t('<b>Call for speakers and speakers settings</b>'),
    '#collapsible' => TRUE, // FOR BUTTON
    '#collapsed' => FALSE, // FOR FORM
   );

   $form['opc_theme']['speakers_cfs']['show_cfs_section'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Call of Speakers Section'),
    '#default_value' => theme_get_setting('show_cfs_section'),
    '#description' => t('Check this option to Call for Speakers section. Uncheck to hide.'),
   );

   $form['opc_theme']['speakers_cfs']['show_speakers_section'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Speakers Section'),
    '#default_value' => theme_get_setting('show_speakers_section'),
    '#description' => t('Check this option to Speakers Section. Uncheck to hide.'),
    );

    // $form['opc_theme']['speakers_cfs']['speakers_html'] = array(
    //   '#type' => 'text_format',
    //   '#title' => t('place your html markup here.'),
    //   '#default_value' => check_markup(theme_get_setting('speakers_html')),
    //   '#format' => 'full_html',
    //);


   // $form['opc_theme']['speakers_cfs']['speakers'] = array(
    
   // );


   ##########################################################################################
   # sponsorship section
   ##########################################################################################
   $form['opc_theme']['sponsorship'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>Sponsor Section Settings</b>'),
		'#collapsible' => TRUE, // BUTTON
		'#collapsed' => TRUE, // FORM
 	);
 	$form['opc_theme']['sponsorship']['show_sponsorship_section'] = array(
 		'#type' => 'checkbox',
 		'#title' => t('Show Sponsorship Section'),
 		'#default_value' => theme_get_setting('show_sponsorship_section'),
 		'#description' => t("Check this option to Sponsorhip Section. Uncheck to hide."),
 	);

 	##########################################################################################
  # faq section
  ########################################################################################## 
  $form['opc_theme']['faq'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>FAQ Section Settings</b>'),
		'#collapsible' => TRUE, // FOR BUTTON
		'#collapsed' => TRUE, // FOR FORM
 	);
 	$form['opc_theme']['faq']['show_faq_section'] = array(
 		'#type' => 'checkbox',
 		'#title' => t('Show FAQ Section'),
 		'#default_theme' => theme_get_setting('show_faq_section'),
 		'#description' => t("Check this option to FAQ Section. Uncheck to hide."),
 	);

  ##########################################################################################
	# footer section
	##########################################################################################
  $form['opc_theme']['footer'] = array(
		'#type' => 'fieldset',
		'#title' => t('<b>Footer Section Settings</b>'),
		'#collapsible' => TRUE, // FOR BUTTON
		'#collapsed' => TRUE, // FOR FORM
 	);
 	$form['opc_theme']['footer']['show_footer_section'] = array(
 		'#type' => 'checkbox',
 		'#title' => t('Show Footer Section'),
 		'#default_value' => theme_get_setting('show_footer_section'),
 		'#description' => t('Check this option to Footer Section. Uncheck to hide.'),
 	);


  $form['opc_theme']['footer']['copyright_info'] = array(
    '#type' => 'fieldset',
    '#title' => t('Copyright Information'),
    '#collapsible' => TRUE, // for button
    '#collapsed' => FALSE, // for form,
  );

  $form['opc_theme']['footer']['copyright_info']['copyright_holder'] = array(
    '#type' => 'textfield',
    '#title' => t('Copyright Holder'),
    '#default_value' => theme_get_setting('copyright_holder'),
  );
}