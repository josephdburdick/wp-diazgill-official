/* eslint
  prefer-arrow-callback: 0
  func-names: 0
*/
/* global acf:true */

jQuery(document).ready(function($) {
  if (acf.fields.color_picker) {
    // custom colors
    const palette = [
      '#3a3342', // $plum:
      '#7d285a', // $violet:
      '#c10c6f', // $magenta:
      '#1b5c83', // $cobalt:
      '#187bb4', // $azure:
      '#0b7e7d', // $seafoam:
      '#a8c75b', // $lime:
      '#e4ca00', // $gold:
      '#e53d32', // $tangerine:
      '#e60009', // $cherry:
    ];

    // when initially loaded find existing colorpickers and set the palette
    acf.add_action('load', function loadPalettes() {
      $('input.wp-color-picker').each(function () {
        $(this).iris('option', 'palettes', palette);
      });
    });

    // if appended element only modify the new element's palette
    acf.add_action('append', function (el) {
      $(el).find('input.wp-color-picker').iris('option', 'palettes', palette);
    });
  }
});
