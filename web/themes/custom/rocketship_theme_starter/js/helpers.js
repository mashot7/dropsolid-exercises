(function ($, Drupal) {
  Drupal.behaviors.rocketship_theme_starter_helpers = {
    attach: function (context, settings) {
      $('body').once('helpers').each(function () {
        console.log('Helpers attached')
      });
    }
  }
})(jQuery, Drupal)
