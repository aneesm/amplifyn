export default function () {
  // Portraits dropdown function
  const dropLink = $('.nav__items > li:last-child a.js-dropdown');
  const winWidth = $(window).width();
  
  dropLink.click(function(e) {
    if (winWidth < 768) {
      const subMenu = $('.nav__items-sub');

      e.preventDefault();

      if (!subMenu.hasClass('open')) {
        $(this).addClass('active');
        subMenu.addClass('open');
        subMenu.slideDown();
      } else {
        $(this).removeClass('active');
        subMenu.removeClass('open');
        subMenu.slideUp();
      }
    }
  });

  // Mobile Navigation
  $('.js-hamburger').on('click', function () {
    const mobileNav = $('.js-mobile-nav');

    if (!$(this).hasClass('active')) {
      $(this).addClass('active');
      mobileNav.slideDown();
      $('body').css('overflow', 'hidden');
    } else {
      $(this).removeClass('active');
      mobileNav.slideUp();
      $('body').css('overflow', '');
    }
  });

  // Window Scroll
  const header = $('.header');
  let lastScrollTop = 0;

  $(window).scroll(function (event) {
    const st = $(this).scrollTop();

    if (st > lastScrollTop) {
      // Scroll Down
      if (st > 100) {
        header.addClass('js-snap-up');
      }
    } else {
      // Scroll Up
      header.removeClass('js-snap-up');
      header.addClass('js-shrink');
    }

    // Top most of the page
    if (st == 0) {
      header.removeClass('js-snap-up, js-shrink');
    }

    lastScrollTop = st;
  });
}
