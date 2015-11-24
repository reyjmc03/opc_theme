<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see opc_theme_process_maintenance_page()
 */
?>
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>
  <head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>
  <body data-spy="scroll" data-target="#site-nav" class="<?php print $classes; ?>" <?php print $attributes; ?>>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    <?php # javascripts ?>
    <?php if ($is_front): ?>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/bower_components/smooth-scroll/dist/js/smooth-scroll.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/assets/js/main.js'; ?>"></script>    
    <?php else: ?>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'opc_theme') . '/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
    <?php endif; ?>
  </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <div id="page-wrapper"><div id="page">

    <div id="header"><div class="section clearfix">
      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>
          <?php if ($site_name): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
            <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
              <?php print $site_slogan; ?>
            </div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
    </div></div> <!-- /.section, /#header -->

    <div id="main-wrapper"><div id="main" class="clearfix">
      <div id="content" class="column"><div class="section">
        <a id="main-content"></a>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print $content; ?>
        <?php if ($messages): ?>
          <div id="messages"><div class="section clearfix">
            <?php print $messages; ?>
          </div></div> <!-- /.section, /#messages -->
        <?php endif; ?>
      </div></div> <!-- /.section, /#content -->
    </div></div> <!-- /#main, /#main-wrapper -->

  </div></div> <!-- /#page, /#page-wrapper -->

</body>
</html>
