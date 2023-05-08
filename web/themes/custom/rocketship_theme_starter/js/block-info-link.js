(function ($, Drupal) {
  Drupal.behaviors.rocketship_theme_starter_block_info_link = {
    attach: function (context, settings) {
      $('.block-block_content .field--name-field-link').once('field--name-field-link').each(function () {
        console.log('Block info link attached')
      });
    }
  }
})(jQuery, Drupal)
