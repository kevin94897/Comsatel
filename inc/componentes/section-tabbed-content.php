<?php

$section_id = $args['section_id'] ?? 'tabbed-section';
$eyebrow = $args['eyebrow'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$tabs = $args['tabs'] ?? [];
$background_image = $args['background_image'] ?? '';

if (empty($tabs))
    return;
?>

<section class="py-8 lg:py-16" id="<?php echo esc_attr($section_id); ?>">
    <div class="container-fluid py-6 lg:py-16 md:mb-20 mb-16 bg-cover bg-center bg-no-repeat"
        style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class=" mx-auto px-4 lg:px-8 max-w-2xl">
            <!-- Header -->
            <div class="text-center">
                <?php if ($eyebrow): ?>
                    <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-in">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-2xl lg:text-4xl font-medium text-primary mb-4" data-aos="fade-in">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <p class="max-w-2xl mx-auto aos-init aos-animate" data-aos="fade-in" data-aos-delay="100">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

                <!-- Main Tabs Navigation -->
                <div class="flex flex-wrap justify-center gap-2" data-aos="fade-in" data-aos-delay="200">
                    <?php foreach ($tabs as $index => $tab): ?>
                        <button
                            class="main-tab-btn px-6 py-3 rounded-full font-medium transition-all duration-300 text-sm <?php echo $index === 0 ? 'bg-dark text-white' : 'bg-white text-gray-900 hover:bg-gray-100'; ?>"
                            data-tab="<?php echo esc_attr($tab['id']); ?>"
                            data-section="<?php echo esc_attr($section_id); ?>">
                            <?php echo esc_html($tab['label']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Tabs Content -->
        <?php foreach ($tabs as $tab_index => $tab): ?>
            <div class="main-tab-content <?php echo $tab_index === 0 ? '' : 'hidden'; ?>"
                data-tab-content="<?php echo esc_attr($tab['id']); ?>" data-section="<?php echo esc_attr($section_id); ?>">

                <div class="grid lg:grid-cols-[300px_1fr] md:gap-8 gap-4 items-start">
                    <!-- Nested Tabs Navigation (Left Side) -->
                    <div class="space-y-2 order-2 lg:order-1" data-aos="fade-right">
                        <?php foreach ($tab['content_tabs'] as $content_index => $content_tab): ?>
                            <button
                                class="nested-tab-btn w-full text-left px-6 py-4 rounded-md transition-all duration-300 <?php echo $content_index === 0 ? 'bg-dark text-white' : 'bg-white text-gray-900 hover:bg-gray-100'; ?>"
                                data-nested-tab="<?php echo esc_attr($content_tab['id']); ?>"
                                data-parent="<?php echo esc_attr($tab['id']); ?>"
                                data-section="<?php echo esc_attr($section_id); ?>">
                                <?php echo esc_html($content_tab['label']); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Nested Content (Right Side) -->
                    <div class="nested-content-wrapper order-1 lg:order-2">
                        <?php foreach ($tab['content_tabs'] as $content_index => $content_tab): ?>
                            <div class="nested-tab-content <?php echo $content_index === 0 ? '' : 'hidden'; ?>"
                                data-nested-content="<?php echo esc_attr($content_tab['id']); ?>"
                                data-parent="<?php echo esc_attr($tab['id']); ?>"
                                data-section="<?php echo esc_attr($section_id); ?>">

                                <div class="rounded-md overflow-hidden" data-aos="zoom-in">
                                    <?php if (!empty($content_tab['image'])): ?>
                                        <div class="relative aspect-square md:aspect-video">
                                            <img src="<?php echo esc_url($content_tab['image']); ?>"
                                                alt="<?php echo esc_attr($content_tab['label']); ?>"
                                                class="w-full h-full object-cover">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($content_tab['description'])): ?>
                                        <div class="md:py-6 py-4">
                                            <p class="md:text-lg text-sm leading-relaxed mb-0 ">
                                                <?php echo esc_html($content_tab['description']); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Main tabs functionality
        const mainTabButtons = document.querySelectorAll('.main-tab-btn');

        mainTabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                const sectionId = this.dataset.section;

                // Update button states
                document.querySelectorAll(`.main-tab-btn[data-section="${sectionId}"]`).forEach(btn => {
                    btn.classList.remove('bg-dark', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-900');
                });
                this.classList.remove('bg-white', 'text-gray-900');
                this.classList.add('bg-dark', 'text-white');

                // Show/hide content
                document.querySelectorAll(`.main-tab-content[data-section="${sectionId}"]`).forEach(content => {
                    content.classList.add('hidden');
                });
                document.querySelector(`.main-tab-content[data-tab-content="${tabId}"][data-section="${sectionId}"]`).classList.remove('hidden');

                // Scroll section into center
                document.getElementById(sectionId).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
        });

        // Nested tabs functionality
        const nestedTabButtons = document.querySelectorAll('.nested-tab-btn');

        nestedTabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const nestedTabId = this.dataset.nestedTab;
                const parentId = this.dataset.parent;
                const sectionId = this.dataset.section;

                // Update button states
                document.querySelectorAll(`.nested-tab-btn[data-parent="${parentId}"][data-section="${sectionId}"]`).forEach(btn => {
                    btn.classList.remove('bg-dark', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-900');
                });
                this.classList.remove('bg-white', 'text-gray-900');
                this.classList.add('bg-dark', 'text-white');

                // Show/hide nested content
                document.querySelectorAll(`.nested-tab-content[data-parent="${parentId}"][data-section="${sectionId}"]`).forEach(content => {
                    content.classList.add('hidden');
                });
                document.querySelector(`.nested-tab-content[data-nested-content="${nestedTabId}"][data-parent="${parentId}"][data-section="${sectionId}"]`).classList.remove('hidden');

                // Scroll section into center
                document.getElementById(sectionId).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
        });
    });
</script>