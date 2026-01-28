(function ($) {
  'use strict';

  // Wait for DOM to be ready
  $(document).ready(function () {

    /**
     * Mobile Menu Navigation
     */
    const $mobileMenu = $('#mobile-menu');
    const $mobileLevels = $('.mobile-menu-level');
    let mobileHistory = ['mobile-level-1'];

    function goToMobileLevel(targetId, label) {
      const currentId = mobileHistory[mobileHistory.length - 1];
      $(`#${currentId}`).removeClass('active');

      const nextId = targetId.includes('mobile') ? targetId : (targetId === 'soluciones' ? 'mobile-level-2-soluciones' : `mobile-level-3-${targetId}`);
      const $nextLevel = $(`#${nextId}`);

      if ($nextLevel.length) {
        // Actualizar texto del botón volver interno
        $nextLevel.find('.mobile-back-trigger span').text(label || 'Volver');

        $nextLevel.addClass('active');
        mobileHistory.push($nextLevel.attr('id'));
      }
    }

    function goBackMobile() {
      if (mobileHistory.length > 1) {
        const currentId = mobileHistory.pop();
        $(`#${currentId}`).removeClass('active');

        const prevId = mobileHistory[mobileHistory.length - 1];
        $(`#${prevId}`).addClass('active');
      }
    }

    function closeMobileMenu() {
      $mobileMenu.removeClass('active');
      $('body').css('overflow', '');

      // Reset navigation
      $mobileLevels.removeClass('active');
      $('#mobile-level-1').addClass('active');
      mobileHistory = ['mobile-level-1'];
    }

    $('#mobile-menu-toggle').on('click', function () {
      $mobileMenu.addClass('active');
      $('body').css('overflow', 'hidden');
    });

    $('#mobile-menu-close').on('click', closeMobileMenu);

    $(document).on('click', '.mobile-back-trigger', goBackMobile);

    $(document).on('click', '.mobile-nav-trigger', function () {
      const label = $(this).find('span').text() || $(this).text();
      goToMobileLevel($(this).data('target'), label.trim());
    });

    /**
     * Smooth Scroll for Anchor Links
     */
    $('a[href*="#"]:not([href="#"])').on('click', function (e) {
      const target = $(this.hash);

      if (target.length) {
        e.preventDefault();

        $('html, body').animate({
          scrollTop: target.offset().top - 80 // Offset for fixed header
        }, 600, 'swing');

        // Close mobile menu if open
        if ($mobileMenu.hasClass('active')) {
          closeMobileMenu();
        }
      }
    });

    /**
     * Header Scroll Effect
     */
    const header = $('#masthead');
    let lastScroll = 0;

    $(window).on('scroll', function () {
      const currentScroll = $(this).scrollTop();

      // Add background when scrolled
      if (currentScroll > 100) {
        header.addClass('bg-dark bg-opacity-95 shadow-lg');
      } else {
        header.removeClass('bg-dark bg-opacity-95 shadow-lg');
      }

      // Hide/show header on scroll
      if (currentScroll > lastScroll && currentScroll > 300) {
        // Scrolling down
        header.css('transform', 'translateY(-100%)');
      } else {
        // Scrolling up
        header.css('transform', 'translateY(0)');
      }

      lastScroll = currentScroll;
    });

    /**
     * Mega Menu Functionality
     */
    const $megaMenu = $('#mega-menu');
    const $headerItems = $('.menu-item-has-children');
    let megaMenuTimer;
    let isMenuActive = false;

    function showMegaMenu() {
      if (!$megaMenu.length) return;
      clearTimeout(megaMenuTimer);
      isMenuActive = true;
      $megaMenu.removeClass('opacity-0 invisible pointer-events-none')
        .addClass('opacity-100 visible pointer-events-auto');
    }

    function hideMegaMenu() {
      megaMenuTimer = setTimeout(() => {
        isMenuActive = false;
        $megaMenu.removeClass('opacity-100 visible pointer-events-auto')
          .addClass('opacity-0 invisible pointer-events-none');
      }, 200);
    }

    // Mostrar megamenú al pasar sobre elementos del header
    $headerItems.on('mouseenter', function (e) {
      // Solo mostrar si el header está visible
      const transform = header.css('transform');
      if (transform === 'none' || transform === 'matrix(1, 0, 0, 1, 0, 0)') {
        showMegaMenu();
      }
    }).on('mouseleave', function () {
      hideMegaMenu();
    });

    // Mantener megamenú abierto cuando el mouse está sobre él
    $megaMenu.on('mouseenter', function () {
      clearTimeout(megaMenuTimer);
      isMenuActive = true;
    }).on('mouseleave', function () {
      hideMegaMenu();
    });

    /**
     * Mega Menu Tabs Navigation
     */
    $('.menu-tab-item').on('mouseenter click', function (e) {
      e.preventDefault();
      const target = $(this).data('target');

      // Actualizar estado activo de las tabs
      $('.menu-tab-item').each(function () {
        $(this).removeClass('active text-red-600 font-medium')
          .addClass('text-gray-700 font-normal');
        $(this).find('svg:last-child').addClass('opacity-0');
      });

      // Activar la tab actual
      $(this).addClass('active text-red-600 font-medium')
        .removeClass('text-gray-700 font-normal');
      $(this).find('svg:last-child').removeClass('opacity-0');

      // Mostrar el contenido correspondiente con transición suave
      $('.tab-content').addClass('hidden');
      $(`#${target}`).removeClass('hidden').hide().fadeIn(200);
    });

    /**
     * Fade-in Animation on Scroll
     */
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observe elements with animation class
    $('.animate-on-scroll').each(function () {
      observer.observe(this);
    });

    /**
     * Footer Accordion (Mobile)
     */
    $('.accordion-title').on('click', function () {
      if ($(window).width() >= 1024) return;

      const $content = $(this).next('.accordion-content');
      const $arrow = $(this).find('.arrow-up-footer');
      const isClosed = $content.hasClass('max-h-0');

      if (isClosed) {
        $content.removeClass('max-h-0 opacity-0').addClass('max-h-96');
        $arrow.removeClass('-rotate-45').addClass('rotate-45');
      } else {
        $content.removeClass('max-h-96').addClass('max-h-0 opacity-0');
        $arrow.removeClass('rotate-45').addClass('-rotate-45');
      }
    });

    /**
     * FAQ Accordion
     */
    window.toggleFAQ = function (button) {
      const $button = $(button);
      const $faqItem = $button.parent();
      const $answer = $faqItem.find('.accordion-content');
      const $arrow = $button.find('.arrow-up');
      const isClosed = $answer.hasClass('max-h-0');

      // Close others
      $('.accordion-content').not($answer).removeClass('max-h-96').addClass('max-h-0 opacity-0');
      $('.arrow-up').not($arrow).removeClass('rotate-45').addClass('-rotate-45');

      if (isClosed) {
        $answer.removeClass('max-h-0 opacity-0').addClass('max-h-96');
        $arrow.removeClass('-rotate-45').addClass('rotate-45');
      } else {
        $answer.removeClass('max-h-96').addClass('max-h-0 opacity-0');
        $arrow.removeClass('rotate-45').addClass('-rotate-45');
      }
    };

    /**
     * Form Validation
     */
    $('form.validate').on('submit', function (e) {
      let isValid = true;
      const form = $(this);

      // Remove previous error messages
      form.find('.error-message').remove();
      form.find('.error').removeClass('error');

      // Validate required fields
      form.find('[required]').each(function () {
        const field = $(this);
        const value = field.val().trim();

        if (value === '') {
          isValid = false;
          field.addClass('error border-red-600');
          field.after('<p class="error-message text-red-600 text-sm mt-1">Este campo es requerido</p>');
        }
      });

      // Validate email fields
      form.find('input[type="email"]').each(function () {
        const field = $(this);
        const email = field.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
          isValid = false;
          field.addClass('error border-red-600');
          field.after('<p class="error-message text-red-600 text-sm mt-1">Email inválido</p>');
        }
      });

      if (!isValid) {
        e.preventDefault();

        // Scroll to first error
        $('html, body').animate({
          scrollTop: form.find('.error').first().offset().top - 100
        }, 300);
      }
    });

  }); // End document ready

})(jQuery);