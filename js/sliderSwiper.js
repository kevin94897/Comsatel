/**
 * Swiper Slider for Testimonials
 * Requires Swiper library loaded from CDN
 */
document.addEventListener("DOMContentLoaded", function () {
    // Check if Swiper is loaded
    if (typeof Swiper === 'undefined') {
        console.error('Swiper library is not loaded');
        return;
    }

    // Initialize Testimonial Slider
    const testimonialSlider = new Swiper(".myTestimonialSlider", {
        loop: true,
        speed: 600,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: "#nextTestimonial",
            prevEl: "#prevTestimonial",
        },
        // Responsive breakpoints
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
        },
    });
});
