<?php
// $Id: page.tpl.php,v 1.13 2008/09/15 08:31:58 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
<!-- OSU identity --><div id="osu-identity" style="margin: auto; width: 100%; height: 42px; background-color: rgb(0, 0, 0);">
    <a href="#content">
      <img width="13" height="42" border="0" alt="skip page navigation" src="http://oregonstate.edu/u_central/images/blackHeight.gif"/>
    </a>
    <a target="_parent" href="http://oregonstate.edu">
      <img width="262" height="42" border="0" alt="Oregon State University" src="http://oregonstate.edu/u_central/images/blackWordmark.gif"/>
    </a>
  </div><!-- end OSU identity -->
  <div id="page"><div id="page-inner">
    <div id="header"><div id="header-inner" class="clear-block">
        <div id="logo-title" style="background-image:url(<?php print $logo; ?>);">
              <h1 id="site-name" class="">
                <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </h1>
          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
          <?php if (!$is_front): ?>
            <div id="breadcrumb"><?php print $breadcrumb; ?></div>
          <?php endif; ?>
        </div> <!-- /#logo-title -->
          <?php if ($search_box): ?>
            <div id="search-box">
              <?php print $search_box; ?>
            </div> <!-- /#search-box -->
          <?php endif; ?>
    </div></div> <!-- /#header-inner, /#header -->

    <div id="main"><div id="main-inner" class="clear-block<?php if ($search_box or $primary_links or $secondary_links or $navbar) { print ' with-navbar'; } ?>">

      <div id="content"><div id="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> <!-- /#content-top -->
        <?php endif; ?>

        <?php if ($title or $tabs or $help or $messages): ?>
          <div id="content-header">
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /#content-inner, /#content -->

      <?php if ($primary_links or $secondary_links or $navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="region region-navbar">

          <a name="navigation" id="navigation"></a>

          <?php if ($primary_links): ?>
            <div id="primary">
              <?php print theme('links', $primary_links); ?>
            </div> <!-- /#primary -->
          <?php endif; ?>

          <?php if ($secondary_links): ?>
            <div id="secondary">
              <?php print theme('links', $secondary_links); ?>
            </div> <!-- /#secondary -->
          <?php endif; ?>

          <?php print $navbar; ?>

        </div></div> <!-- /#navbar-inner, /#navbar -->
      <?php endif; ?>

      <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
        </div></div> <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>

    </div></div> <!-- /#main-inner, /#main -->

    <?php if ($footer or $footer_message): ?>
      <div id="footer"><div id="footer-inner" class="region region-footer">

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>

      </div></div> <!-- /#footer-inner, /#footer -->
    <?php endif; ?>

  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>

</body>
</html>