<?php

function twbs_sead_form_system_theme_settings_alter(&$form, $form_state) {
  
  $form['theme_settings']['theme_color'] = array(
    '#type' => 'select',
    '#title' => 'Cor do tema',
    '#options' => array(
      'green' => t('Verde'),
      'white' => t('Branco'),
      'yellow' => t('Amarelo'),
      'blue' => t('Azul')
    ),
    '#default_value' => theme_get_setting('theme_color'),
  );

  $form['theme_settings']['unidade_organizacional'] = array(
    '#type' => 'textfield',
    '#title' => 'Unidade organizacional Barra Governo',
    '#default_value' => theme_get_setting('unidade_organizacional'),
    '#description' => 'Mantendo o contexto do órgão no Portal de Serviços ao clicar no link Serviços da barra.<br />Encontre o <strong>NÚMERO</strong> da unidade organizacional no <a href="http://siorg.planejamento.gov.br/" target="_blank" title="SIORG">site do SIORG</a>.'
  );

  $form['theme_settings']['page_acessibilidade'] = array(
    '#type' => 'textfield',
    '#title' => 'Página Acessibilidade',
    '#default_value' => theme_get_setting('page_acessibilidade'),
    '#description' => 'Essa url serve para o item de menu no cabeçalho do tema',
    '#field_prefix' => url(NULL, array('absolute' => TRUE))
  );
  
  $form['theme_settings']['page_mapasite'] = array(
    '#type' => 'textfield',
    '#title' => 'Página Mapa do Site',
    '#default_value' => theme_get_setting('page_mapasite'),
    '#description' => 'Essa url serve para o item de menu no cabeçalho do tema',
    '#field_prefix' => url(NULL, array('absolute' => TRUE))
  );
  
  $form['social_media'] = array(
    '#type' => 'fieldset',
    '#title' => t('Redes Sociais'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['social_media']['smyoutube'] = array(
    '#type' => 'textfield',
    '#title' => 'Youtube',
    '#default_value' => theme_get_setting('smyoutube'),
    '#field_prefix' => 'https://www.youtube.com/channel/'
  );
  
  $form['social_media']['smfacebook'] = array(
    '#type' => 'textfield',
    '#title' => 'Facebook',
    '#default_value' => theme_get_setting('smfacebook'),
    '#field_prefix' => 'http://www.facebook.com/'
  );
  
  $form['social_media']['smgoogle-plus'] = array(
    '#type' => 'textfield',
    '#title' => 'Google Plus',
    '#default_value' => theme_get_setting('smgoogle-plus'),
    '#field_prefix' => 'https://plus.google.com/'
  );
  
  $form['social_media']['sminstagram'] = array(
    '#type' => 'textfield',
    '#title' => 'Instagram',
    '#default_value' => theme_get_setting('sminstagram'),
    '#field_prefix' => 'https://www.instagram.com/'
  );
  
  $form['social_media']['smtwitter'] = array(
    '#type' => 'textfield',
    '#title' => 'Twitter',
    '#default_value' => theme_get_setting('smtwitter'),
    '#field_prefix' => 'https://twitter.com/'
  );
  
  $form['social_media']['smflickr'] = array(
    '#type' => 'textfield',
    '#title' => 'Flickr',
    '#default_value' => theme_get_setting('smflickr'),
    '#field_prefix' => 'https://www.flickr.com/photos/'
  );
  
  $form['social_media']['smsoundcloud'] = array(
    '#type' => 'textfield',
    '#title' => 'Soundcloud',
    '#default_value' => theme_get_setting('smsoundcloud'),
    '#field_prefix' => 'https://soundcloud.com/'
  );
  
  $form['social_media']['smslideshare'] = array(
    '#type' => 'textfield',
    '#title' => 'Slideshare',
    '#default_value' => theme_get_setting('smslideshare'),
    '#field_prefix' => 'https://www.slideshare.net/'
  );
  
  $form['social_media']['smrss'] = array(
    '#type' => 'select',
    '#title' => 'Exibir ícone de Rss?',
    '#options' => array(
      0 => t('Não'),
      1 => t('Sim'),
    ),
    '#default_value' => theme_get_setting('smrss')
  );
  
}