<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
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
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
  <ul id="menu-barra-temp" style="list-style:none;">
    <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
    <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
  </ul>
</div>

<div class="header">
  <div class="container">
    
    <?php include(drupal_get_path('theme', 'twbs_sead').'/header/links_top.tpl.php'); ?>
    
    <div class="row">
      <div class="visible-xs col-xs-1">
        <button type="button" class="btn btn-success" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
          <i class="glyphicon glyphicon-list" aria-hidden="true"></i>
        </button>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-8">
        
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site_name">
          <h1><?php echo $site_name; ?></h1>
        </a>
        <h4 class="site_slogan"><?php echo $site_slogan; ?></h4>

      </div>
      <div class="col-md-4 col-sm-4 col-xs-3 hidden-xs" id="main_search" accesskey="3">
        <?php 
          if($page['search']) {
            print render($page['search']);
          }
        ?>
        <?php include(drupal_get_path('theme', 'twbs_sead').'/header/social_media.tpl.php'); ?>
      </div>

      <div class="visible-xs">
        <?php include(drupal_get_path('theme', 'twbs_sead').'/header/buttons_xs.tpl.php'); ?>
      </div>

    </div>
    
  </div>
</div>

<?php if($page['menu_servicos']) : ?>
<div class="header_bottom hidden-xs">
  <div class="container">
    <?php print render($page['menu_servicos']); ?>
  </div>
</div>
<?php endif; ?>

<div class="collapse" id="collapse_search_xs">
  <div class="container">
    <div class="well well-sm">
      <?php 
        if($page['search']) {
          print render($page['search']);
        }
      ?>
    </div>
  </div>
</div>

<div class="container start_content">

  <?php if ( $page['content_top'] ) : ?>
  <div class="hidden-xs">
    <?php print render($page['content_top']); ?>
  </div>
  <?php endif; ?>

  <?php if ($breadcrumb): ?>
    <div class="hidden-xs" id="breadcrumb"><?php print $breadcrumb; ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">

      <div class="hidden-xs">
        <?php
          if ($page['sidebar_top']) {
            print render($page['sidebar_top']);
          }
        ?>
      </div>

      <?php if ($page['menu_sidebar']) : ?>
      <div class="sidebar-nav" id="main_navbar" accesskey="2">
        <div class="navbar navbar-default" role="navigation">
          
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            
            <?php
              if($page['menu_sidebar']) {
                print render($page['menu_sidebar']);
              }
            ?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
      <?php endif; ?>
      
      <div class="hidden-xs">
        <?php 
          if ( $page['sidebar_first'] ) {
            print render($page['sidebar_first']);
          }
        ?>
      </div>
      
    </div>

    <div class="<?php echo get_size_main_content($page); ?>" id="main_content" accesskey="1">
      <?php print $messages; ?>
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      
      <?php print render($title_prefix); ?>
      <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php print render($page['content']); ?>
      
      <?php if ( $page['content_bottom'] ) : ?>
        <div>
          <?php print render($page['content_bottom']); ?>
        </div>
      <?php endif; ?>

    </div>
    
    <?php if ( $page['sidebar_second'] ) : ?>
    <div class="col-md-3 col-sm-3 col-xs-12">
      <?php print render($page['sidebar_second']); ?>
    </div>
    <?php endif; ?>
    
  </div>
</div>

<?php if ( $page['footer'] ) : ?>
<div class="footer" id="main_footer" accesskey="4">
  <div class="container">
    <?php print render($page['footer']); ?>
  </div>
</div>
<?php endif; ?>
<div id="footer-brasil"></div>

<?php if ( $page['extra_footer'] ) : ?>
<div class="container"><?php print render($page['extra_footer']); ?></div>
<?php endif; ?>

<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
