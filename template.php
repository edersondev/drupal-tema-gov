<?php

/**
 * Doc for reference:
 * https://www.drupal.org/docs/7/theming
 */

/**
 * Preprocess variables for html.tpl.php
 *
 * @see system_elements()
 * @see html.tpl.php
 */
function twbs_sead_preprocess_html(&$variables) {
  addMetaBootStrap();
  checkJquery();
  addGoogleFont();
  setThemeColor();
}

/**
 * Preprocess variables for page.tpl.php
 *
 * Most themes utilize their own copy of page.tpl.php. The default is located
 * inside "modules/system/page.tpl.php". Look in there for the full list of
 * variables.
 *
 * Uses the arg() function to generate a series of page template suggestions
 * based on the current path.
 *
 * Any changes to variables in this preprocessor should also be changed inside
 * template_preprocess_maintenance_page() to keep all of them consistent.
 *
 * @see drupal_render_page()
 * @see template_process_page()
 * @see page.tpl.php
 */
function twbs_sead_preprocess_page(&$variables) {
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = "node__{$variables['node']->type}";
  }

  $variables['link_acessibilidade'] = '#';
  $page_acessibilidade = theme_get_setting('page_acessibilidade','twbs_sead');
  if ( !empty($page_acessibilidade) ) {
    $variables['link_acessibilidade'] = url(NULL, array('absolute' => TRUE)) . $page_acessibilidade;
  }

  $variables['link_mapasite'] = '#';
  $page_mapasite = theme_get_setting('page_mapasite','twbs_sead');
  if ( !empty($page_mapasite) ) {
    $variables['link_mapasite'] = url(NULL, array('absolute' => TRUE)) . $page_mapasite;
  }

  setVarSocialMedia($variables);
}

/**
 * Processes variables for block.tpl.php.
 *
 * Prepares the values passed to the theme_block function to be passed
 * into a pluggable template engine. Uses block properties to generate a
 * series of template file suggestions. If none are found, the default
 * block.tpl.php is used.
 *
 * Most themes utilize their own copy of block.tpl.php. The default is located
 * inside "modules/block/block.tpl.php". Look in there for the full list of
 * variables.
 *
 * The $variables array contains the following arguments:
 * - $block
 *
 * @see block.tpl.php
 */
function twbs_sead_preprocess_block(&$variables) {
  $objBlock = $variables['elements']['#block'];
  
  switch($objBlock->region) {
    case 'footer':
      $get_blocks_by_region = block_get_blocks_by_region('footer');
      if ( !empty($get_blocks_by_region) ) {
        $variables['classes_array'][] = drupal_html_class("col-md-3");
        $variables['classes_array'][] = drupal_html_class("col-sm-4");
        $variables['classes_array'][] = drupal_html_class("col-xs-6");
      }
    break;
    case 'sidebar_first':
    case 'sidebar_second':
    case 'content_bottom':
    case 'highlighted':
      $panel_class = preg_grep("/^panel-/i", $variables['classes_array']);
      if ( empty($panel_class) ) {
        $variables['classes_array'][] = drupal_html_class("panel-default");
      }
    break;
  }
}

/**
 * Preprocess variables for region.tpl.php
 *
 * Prepares the values passed to the theme_region function to be passed into a
 * pluggable template engine. Uses the region name to generate a template file
 * suggestions. If none are found, the default region.tpl.php is used.
 *
 * @see drupal_region_class()
 * @see region.tpl.php
 */
function twbs_sead_preprocess_region(&$variables) {
  if ( $variables['region'] === 'footer' ) {
    $variables['classes_array'][] = 'row';
  }
}

/**
 * Adiciona a class 'img-responsive' na tag img
 * @param array $vars
 */
function twbs_sead_preprocess_image_style(&$vars) {
  $vars['attributes']['class'][] = 'img-responsive';
}

/**
 * Implements template_preprocess_HOOK() for theme_menu_tree().
 */
function twbs_sead_preprocess_menu_tree(&$variables) {
  if ( isset($variables['#tree']['#block']->region) ) {
    switch($variables['#tree']['#block']->region) {
      case 'menu_servicos':
        $variables['#tree']['#ul_class'] = 'list-inline barra-servicos';
        $variables['#tree']['#block']->subject = '';
      break;
      case 'menu_sidebar':
        $variables['#tree']['#ul_class'] = 'nav navbar-nav';
        $variables['#tree']['#block']->subject = '';
      break;
      case 'footer':
      case 'sidebar_first':
      case 'sidebar_second':
        $variables['#tree']['#ul_class'] = 'list-unstyled';
      break;
    }
  }
}

/**
 * Returns HTML for a wrapper for a menu sub-tree.
 *
 * @param $variables
 *   An associative array containing:
 *   - tree: An HTML string containing the tree's items.
 *
 * @see template_preprocess_menu_tree()
 * @ingroup themeable
 */
function twbs_sead_menu_tree($variables) {
  $ul_class = ( isset($variables['#tree']['#ul_class']) ? $variables['#tree']['#ul_class'] : 'menu' );
  $html_list = <<<EOF
    <ul class="{$ul_class}">
      {$variables['tree']}
    </ul>
EOF;
  return $html_list;
}

/**
 * Override of theme_breadcrumb().
 */
function twbs_sead_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<ol class="breadcrumb">';
    foreach ( $breadcrumb as $link ) {
      $output .= "<li>{$link}</li>";
    }
    $output .= '</ol>';

    return $output;
  }
}

/**
 * Implements MODULE_preprocess_HOOK().
 *
 * Adds appropriate attributes to the list item.
 *
 * @see theme_menu_link()
 */
function twbs_sead_preprocess_menu_link(&$variables) {
  $element = $variables['element'];
  if ( $element['#below'] ) {
    $variables['element']['#below']['#ul_class'] = 'dropdown-menu';

    array_push($variables['element']['#attributes']['class'], 'dropdown');
    array_push($variables['element']['#attributes']['class'], 'keep-open');

    $variables['element']['#localized_options']['attributes']['data-target'] = '#';
    $variables['element']['#localized_options']['attributes']['data-toggle'] = 'dropdown';

    $active = in_array('active-trail', $variables['element']['#attributes']['class']);
    if ( $active ) {
      array_push($variables['element']['#attributes']['class'], 'open');
    }
    $variables['element']['#localized_options']['attributes']['class'][] = 'haschild';
  }
}

/**
 * Adiciona novas tags do tipo meta no header
 */
function addMetaBootStrap() {
  $arrMeta = array(
    'meta1' => array(
      '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
          'http-equiv' => 'X-UA-Compatible',
          'content' => 'IE=edge'
        )
      ),
      'meta2' => array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
          'name' => 'viewport',
          'content' => 'width=device-width, initial-scale=1'
        )
      )
    );
  $unidade_organizacional = theme_get_setting('unidade_organizacional','twbs_sead');
  if ( !empty($unidade_organizacional) ) {
    $arrMeta['unidade_gov'] = array(
      '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
          'property' => 'creator.productor',
          'content' => 'http://estruturaorganizacional.dados.gov.br/id/unidade-organizacional/' . $unidade_organizacional
        )
    );
  }
  foreach ( $arrMeta as $key => $meta ) {
    drupal_add_html_head($meta, $key);
  }
}

function addGoogleFont() {
  drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:800', array('type' => 'external'));
}


function get_size_main_content($page) {
  $md = 9;
  $sm = 9;
  if ( $page['sidebar_second'] ) {
    $md = 6;
    $sm = 6;
  }
  $str_class = "col-md-{$md} col-sm-{$sm} col-xs-12";
  return $str_class;
}

/**
 * Seta o css padrão para o tema
 */
function setThemeColor() {
  $path = path_to_theme();
  $color = theme_get_setting('theme_color', 'twbs_sead');
  drupal_add_css("{$path}/styles/{$color}/theme.css");
  drupal_add_css("{$path}/styles/{$color}/navbar.css");
}

/**
 * Carrega jquery
 */
function checkJquery() {
  if ( !module_exists('jquery_update') ) {
    drupal_add_js('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', 'external');
  }
}

/**
 * Cria a variavel $social_media para guardar as config do tema
 *
 * @param array $variables
 * @return void
 * @see header/social_media.tpl.php
 */
function setVarSocialMedia(&$variables) {
  $variables['social_media'] = array(
    'youtube'     => theme_get_setting('smyoutube', 'twbs_sead'),
    'facebook'    => theme_get_setting('smfacebook', 'twbs_sead'),
    'google-plus' => theme_get_setting('smgoogle-plus', 'twbs_sead'),
    'instagram'   => theme_get_setting('sminstagram', 'twbs_sead'),
    'twitter'     => theme_get_setting('smtwitter', 'twbs_sead'),
    'flickr'      => theme_get_setting('smflickr', 'twbs_sead'),
    'soundcloud'  => theme_get_setting('smsoundcloud', 'twbs_sead'),
    'slideshare'  => theme_get_setting('smslideshare', 'twbs_sead'),
    'rss'         => theme_get_setting('smrss', 'twbs_sead')
  );
}