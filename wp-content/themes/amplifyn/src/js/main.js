/**
* Amplifyn Site
*/

/* eslint-env browser */
'use strict';
// Vendor imports
import aos from './vendor/aos';
import heroSlider from './modules/heroSlider';
import nav from './modules/nav';
import scrollAnimation from './modules/scrollAnimation';

(function () {
  aos.init({ disable: function () {
    const maxWidth = 768;
    return window.innerWidth < maxWidth;
  },
  });

  heroSlider();
  nav();
  scrollAnimation();
})(jQuery);
