<?php
/**
 * Component: Modal Beneficio
 */

$id = $args['id'] ?? 'benefit-modal';
$title = $args['title'] ?? null;
$description = $args['description'] ?? null;
$image = $args['image'] ?? null;

if (empty($title)) {
    return;
}

// Global contact info (Options Page)
$phone_central = get_field('phone_central', 'option');
$phone_whatsapp = get_field('whatsapp_number', 'option');
$email_contact = get_field('email_contact', 'option');
?>

<div id="<?php echo esc_attr($id); ?>"
    class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col md:flex-row relative"
        data-aos="zoom-in">

        <!-- Close Button -->
        <button onclick="closeModal('<?php echo esc_attr($id); ?>')"
            class="absolute top-4 right-4 z-10 p-2 bg-white/80 backdrop-blur rounded-full text-gray-500 hover:text-red-600 transition-colors shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Left Image Section -->
        <?php if (!empty($image)): ?>
            <div class="w-full md:w-1/2 h-48 md:h-auto overflow-hidden">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                    class="w-full h-full object-cover">
            </div>
        <?php endif; ?>

        <!-- Right Content Section -->
        <div class="w-full <?php echo !empty($image) ? 'md:w-1/2' : 'w-full'; ?> p-8 lg:p-12 overflow-y-auto">
            <h3 class="text-2xl lg:text-3xl font-medium text-black mb-6">
                <?php echo wp_kses_post($title); ?>
            </h3>

            <div class="prose prose-sm prose-gray max-w-none mb-10 text-gray-600">
                <?php if (!empty($description)): ?>
                    <p class="mb-4">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Contact Information Area -->
            <div class="space-y-6 pt-6 border-t border-gray-100">
                <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">¿Te interesa este
                    beneficio?
                </h4>

                <div class="grid grid-cols-1 gap-6">
                    <!-- Central Telefónica -->
                    <?php if (!empty($phone_central)): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0">Central Telefónica</p>
                                <p class="text-sm font-semibold text-gray-900 mb-0">
                                    <?php echo esc_html($phone_central); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- WhatsApp -->
                    <?php if (!empty($phone_whatsapp)): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0">WhatsApp</p>
                                <p class="text-sm font-semibold text-gray-900 mb-0">
                                    <?php echo esc_html($phone_whatsapp); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Email -->
                    <?php if (!empty($email_contact)): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0">Correo electrónico</p>
                                <p class="text-sm font-semibold text-gray-900 mb-0">
                                    <?php echo esc_html($email_contact); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>