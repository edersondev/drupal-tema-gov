<?php

/**
 * @file
 * Displays the search form block.
 *
 * Available variables:
 * - $search_form: The complete search form ready for print.
 * - $search: Associative array of search elements. Can be used to print each
 *   form element separately.
 *
 * Default elements within $search:
 * - $search['search_block_form']: Text input area wrapped in a div.
 * - $search['actions']: Rendered form buttons.
 * - $search['hidden']: Hidden form elements. Used to validate forms when
 *   submitted.
 *
 * Modules can add to the search form, so it is recommended to check for their
 * existence before printing. The default keys will always exist. To check for
 * a module-provided field, use code like this:
 * @code
 *   <?php if (isset($search['extra_field'])): ?>
 *     <div class="extra-field">
 *       <?php print $search['extra_field']; ?>
 *     </div>
 *   <?php endif; ?>
 * @endcode
 *
 * @see template_preprocess_search_block_form()
 */
?>
<div class="row">
  <div class="col-md-10 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
    <?php if (empty($variables['form']['#block']->subject)): ?>
      <h2 class="element-invisible"><?php print t('Search form'); ?></h2>
    <?php endif; ?>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar no portal" name="search_block_form"> 
      <span class="input-group-btn"> 
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
        </button> 
      </span> 
    </div>
    <?php print $search['hidden']; ?>
  </div>
</div>
