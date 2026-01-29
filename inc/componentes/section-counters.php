<?php

/**
 * Component: Animated Counters
 * 
 * @param array $args {
 *     @type array $counters {
 *         @type string $number
 *         @type string $prefix
 *         @type string $suffix
 *         @type string $label
 *     }
 * }
 */

$counters = $args['counters'] ?? array();
?>

<section class="py-12 md:py-24 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4 lg:gap-8">
            <?php foreach ($counters as $index => $counter): ?>
                <div class="text-center" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="mb-2">
                        <span class="text-3xl lg:text-5xl font-bold text-primary flex items-center justify-center">
                            <?php if (!empty($counter['prefix'])): ?>
                                <span><?php echo $counter['prefix']; ?></span>
                            <?php endif; ?>

                            <span class="js-counter tabular-nums"
                                data-target="<?php echo esc_attr($counter['number']); ?>"
                                data-duration="2000">0</span>

                            <?php if (!empty($counter['suffix'])): ?>
                                <span><?php echo $counter['suffix']; ?></span>
                            <?php endif; ?>
                        </span>
                    </div>
                    <p class="text-gray-600 font-medium text-sm lg:text-base max-w-[160px] mx-auto leading-tight mb-0">
                        <?php echo $counter['label']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.js-counter');

        const animateCounter = (el) => {
            const target = parseFloat(el.getAttribute('data-target').replace(/,/g, ''));
            const duration = parseInt(el.getAttribute('data-duration')) || 2000;
            const startTime = performance.now();

            const update = (now) => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function: easeOutQuart
                const ease = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(ease * target);

                // Format with commas
                el.textContent = current.toLocaleString('en-US');

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    el.textContent = target.toLocaleString('en-US');
                }
            };

            requestAnimationFrame(update);
        };

        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => observer.observe(counter));
    });
</script>