(function ($, Drupal) {
  Drupal.behaviors.rocketship_theme_starter_block_info = {
    attach: function (context, settings) {
      $('.block--type-info').once('block--type-info').each(function () {
        console.log('Block info attached')
      });
    }
  }
})(jQuery, Drupal)
