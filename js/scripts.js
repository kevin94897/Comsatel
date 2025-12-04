/**
 * COMSATEL Theme Scripts
 * Main JavaScript file for theme functionality
 */

(function($) {
  'use strict';

  // Wait for DOM to be ready
  $(document).ready(function() {
    
    /**
     * Mobile Menu Toggle
     */
    const mobileMenuToggle = $('#mobile-menu-toggle');
    const mobileMenu = $('#mobile-menu');
    
    if (mobileMenuToggle.length && mobileMenu.length) {
      mobileMenuToggle.on('click', function() {
        mobileMenu.toggleClass('hidden');
        
        // Toggle hamburger icon to X
        const icon = $(this).find('svg');
        if (mobileMenu.hasClass('hidden')) {
          icon.html('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />');
        } else {
          icon.html('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />');
        }
      });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    $('a[href*="#"]:not([href="#"])').on('click', function(e) {
      const target = $(this.hash);
      
      if (target.length) {
        e.preventDefault();
        
        $('html, body').animate({
          scrollTop: target.offset().top - 80 // Offset for fixed header
        }, 600, 'swing');
        
        // Close mobile menu if open
        if (!mobileMenu.hasClass('hidden')) {
          mobileMenu.addClass('hidden');
          mobileMenuToggle.find('svg').html('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />');
        }
      }
    });

    /**
     * Header Scroll Effect
     */
    const header = $('#masthead');
    let lastScroll = 0;
    
    $(window).on('scroll', function() {
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
     * Fade-in Animation on Scroll
     */
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observe elements with animation class
    $('.animate-on-scroll').each(function() {
      observer.observe(this);
    });

    /**
     * Testimonial Slider Navigation
     */
    let currentTestimonial = 0;
    const testimonials = $('.testimonial-item');
    const totalTestimonials = testimonials.length;

    function showTestimonial(index) {
      testimonials.addClass('hidden');
      $(testimonials[index]).removeClass('hidden').addClass('fade-in');
    }

    $('.testimonial-prev').on('click', function() {
      currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
      showTestimonial(currentTestimonial);
    });

    $('.testimonial-next').on('click', function() {
      currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
      showTestimonial(currentTestimonial);
    });

    /**
     * Form Validation
     */
    $('form.validate').on('submit', function(e) {
      let isValid = true;
      const form = $(this);
      
      // Remove previous error messages
      form.find('.error-message').remove();
      form.find('.error').removeClass('error');
      
      // Validate required fields
      form.find('[required]').each(function() {
        const field = $(this);
        const value = field.val().trim();
        
        if (value === '') {
          isValid = false;
          field.addClass('error border-red-600');
          field.after('<p class="error-message text-red-600 text-sm mt-1">Este campo es requerido</p>');
        }
      });
      
      // Validate email fields
      form.find('input[type="email"]').each(function() {
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

    /**
     * Search Toggle
     */
    $('.search-toggle').on('click', function() {
      $('.search-form').toggleClass('hidden');
      $('.search-form input').focus();
    });

    /**
     * Back to Top Button
     */
    const backToTop = $('<button class="back-to-top fixed bottom-8 right-8 w-12 h-12 bg-primary text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-dark z-50" aria-label="Volver arriba"><svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg></button>');
    
    $('body').append(backToTop);
    
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 300) {
        backToTop.removeClass('opacity-0 invisible').addClass('opacity-100 visible');
      } else {
        backToTop.removeClass('opacity-100 visible').addClass('opacity-0 invisible');
      }
    });
    
    backToTop.on('click', function() {
      $('html, body').animate({ scrollTop: 0 }, 600);
    });

    /**
     * Lazy Load Images (Native)
     */
    if ('loading' in HTMLImageElement.prototype) {
      const images = document.querySelectorAll('img[loading="lazy"]');
      images.forEach(img => {
        img.src = img.dataset.src;
      });
    }

    /**
     * External Links - Open in New Tab
     */
    $('a[href^="http"]').not('a[href*="' + window.location.hostname + '"]').attr({
      target: '_blank',
      rel: 'noopener noreferrer'
    });

    /**
     * Copy to Clipboard
     */
    $('.copy-button').on('click', function() {
      const text = $(this).data('copy');
      const button = $(this);
      
      navigator.clipboard.writeText(text).then(function() {
        const originalText = button.text();
        button.text('¡Copiado!');
        
        setTimeout(function() {
          button.text(originalText);
        }, 2000);
      });
    });

    /**
     * Video Modal
     */
    $('.video-trigger').on('click', function(e) {
      e.preventDefault();
      const videoUrl = $(this).data('video');
      
      const modal = $(`
        <div class="video-modal fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4">
          <button class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">&times;</button>
          <div class="relative w-full max-w-4xl">
            <div class="relative pb-16/9">
              <iframe src="${videoUrl}" class="absolute inset-0 w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      `);
      
      $('body').append(modal);
      
      modal.on('click', function(e) {
        if (e.target === this || $(e.target).is('button')) {
          $(this).remove();
        }
      });
    });

    /**
     * Accordion
     */
    $('.accordion-header').on('click', function() {
      const item = $(this).parent();
      const content = item.find('.accordion-content');
      
      // Close other accordions
      $('.accordion-item').not(item).removeClass('active').find('.accordion-content').slideUp(300);
      
      // Toggle current accordion
      item.toggleClass('active');
      content.slideToggle(300);
    });

    /**
     * Number Counter Animation
     */
    $('.counter').each(function() {
      const counter = $(this);
      const target = parseInt(counter.data('target'));
      const duration = 2000;
      const increment = target / (duration / 16);
      let current = 0;
      
      const observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
          const timer = setInterval(function() {
            current += increment;
            if (current >= target) {
              counter.text(target.toLocaleString());
              clearInterval(timer);
            } else {
              counter.text(Math.floor(current).toLocaleString());
            }
          }, 16);
          observer.disconnect();
        }
      });
      
      observer.observe(counter[0]);
    });

    /**
     * Toast Notification
     */
    window.showToast = function(message, type = 'info') {
      const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        warning: 'bg-yellow-500',
        info: 'bg-blue-500'
      };
      
      const toast = $(`
        <div class="toast fixed bottom-4 right-4 ${colors[type]} text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300">
          ${message}
        </div>
      `);
      
      $('body').append(toast);
      
      setTimeout(() => toast.removeClass('translate-x-full'), 100);
      setTimeout(() => {
        toast.addClass('translate-x-full');
        setTimeout(() => toast.remove(), 300);
      }, 3000);
    };

    /**
     * Console Welcome Message
     */
    console.log('%c🚚 COMSATEL Theme', 'font-size: 20px; color: #E31E25; font-weight: bold;');
    console.log('%cDesarrollado con ❤️ usando WordPress + Tailwind CSS', 'font-size: 12px; color: #474546;');
    
  }); // End document ready

  /**
   * Window Load Event
   */
  $(window).on('load', function() {
    // Remove loading class from body
    $('body').removeClass('loading');
    
    // Trigger animations
    $('.animate-on-load').each(function(index) {
      const element = $(this);
      setTimeout(function() {
        element.addClass('fade-in');
      }, index * 100);
    });
  });

  /**
   * Window Resize Event (Debounced)
   */
  let resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      // Close mobile menu on desktop
      if ($(window).width() >= 1024) {
        $('#mobile-menu').addClass('hidden');
      }
    }, 250);
  });

})(jQuery);