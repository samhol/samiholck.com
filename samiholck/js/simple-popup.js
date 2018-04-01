/* 
 * The MIT License
 *
 * Copyright 2018 Sami Holck <sami.holck@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


(function ($) {
  'use strict';
  /**
   * The jQuery plugin namespace.
   * @external "jQuery.fn"
   * @see {@link http://learn.jquery.com/plugins/|jQuery Plugins}
   */
  /**
   * Loads the data from the server pointed on the data attribute 'data-sph-load' using 
   * jQuery's Ajax capabilities and places the returned HTML into the object.
   * 
   * @function external:"jQuery.fn".sphpAjaxPrepend
   * @returns  {jQuery.fn} object for method chaining
   */
  $.fn.sphpSimplePopup = function ($content) {
    return this.each(function () {
      var $this = $(this),
              $url = $this.attr("data-sphp-ajax-prepend"),
              $popper = $('<div class="simple-popup">');
      console.log("initializing simple popup");
      $popper.html("<p>" + $content + "</p>");
      $this.append($popper);
      $popper.toggle();
    });
  };
}(jQuery));
