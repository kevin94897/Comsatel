/**
 * Blog Functionality
 * JavaScript para búsqueda, filtros y carga de posts
 */

(function ($) {
    'use strict';

    // Variables globales
    let searchTimeout;
    const searchDelay = 500; // ms

    /**
     * Inicializar funcionalidad del blog
     */
    /**
     * Inicializar funcionalidad del blog
     */
    function initBlog() {
        // Búsqueda
        $('#blog-search').on('input', function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function () {
                filterPosts();
            }, searchDelay);
        });

        // Filtro de orden
        $('#blog-filter').on('change', function () {
            filterPosts();
        });

        // Toggle dropdown de categorías
        $('#category-dropdown-toggle').on('click', function (e) {
            e.stopPropagation();
            $('#category-dropdown-menu').toggleClass('hidden');
            $(this).find('svg').toggleClass('rotate-180');
        });

        // Cerrar dropdown al hacer click fuera
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#category-filter-wrapper').length) {
                $('#category-dropdown-menu').addClass('hidden');
                $('#category-dropdown-toggle').find('svg').removeClass('rotate-180');
            }
        });

        // Prevenir cierre al hacer click dentro del menú
        $('#category-dropdown-menu').on('click', function (e) {
            e.stopPropagation();
        });

        // Cambio en checkboxes de categorías
        $('.blog-category-checkbox').on('change', function () {
            filterPosts();
        });

        // Cargar más posts
        $('#load-more-posts').on('click', function () {
            loadMorePosts();
        });
    }

    /**
     * Obtener categorías seleccionadas
     */
    function getSelectedCategories() {
        const categories = [];
        $('.blog-category-checkbox:checked').each(function () {
            categories.push($(this).val());
        });
        return categories;
    }

    /**
     * Filtrar posts por búsqueda, orden y categorías
     */
    function filterPosts() {
        const searchTerm = $('#blog-search').val();
        const orderBy = $('#blog-filter').val();
        const categories = getSelectedCategories();

        // Mostrar loading
        $('#blog-posts-grid').css('opacity', '0.5');

        $.ajax({
            url: comsatel_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_blog_posts',
                nonce: comsatel_ajax.nonce,
                search: searchTerm,
                orderby: orderBy,
                categories: categories,
            },
            success: function (response) {
                if (response.success) {
                    $('#blog-posts-grid').html(response.data.html);
                    $('#blog-posts-grid').css('opacity', '1');

                    // Actualizar botón de cargar más
                    const loadMoreBtn = $('#load-more-posts');
                    loadMoreBtn.attr('data-page', '1');
                    loadMoreBtn.attr('data-max-pages', response.data.max_pages);

                    if (response.data.max_pages > 1) {
                        loadMoreBtn.parent().removeClass('hidden').addClass('flex');
                    } else {
                        loadMoreBtn.parent().addClass('hidden').removeClass('flex');
                    }
                }
            },
            error: function () {
                $('#blog-posts-grid').css('opacity', '1');
                console.error('Error al filtrar posts');
            },
        });
    }

    /**
     * Cargar más posts
     */
    function loadMorePosts() {
        const loadMoreBtn = $('#load-more-posts');
        const currentPage = parseInt(loadMoreBtn.attr('data-page'));
        const maxPages = parseInt(loadMoreBtn.attr('data-max-pages'));
        const nextPage = currentPage + 1;

        if (nextPage > maxPages) {
            return;
        }

        const searchTerm = $('#blog-search').val();
        const orderBy = $('#blog-filter').val();
        const categories = getSelectedCategories();

        // Deshabilitar botón y mostrar spinner
        loadMoreBtn.prop('disabled', true);
        $('#loading-spinner').removeClass('hidden');

        $.ajax({
            url: comsatel_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                nonce: comsatel_ajax.nonce,
                page: nextPage,
                search: searchTerm,
                orderby: orderBy,
                categories: categories,
            },
            success: function (response) {
                if (response.success) {
                    // Agregar nuevos posts
                    const newPosts = $(response.data.html);
                    $('#blog-posts-grid').append(newPosts);

                    // Actualizar página actual
                    loadMoreBtn.attr('data-page', nextPage);

                    // Ocultar botón si no hay más páginas
                    if (nextPage >= maxPages) {
                        loadMoreBtn.parent().addClass('hidden').removeClass('flex');
                    }
                }

                // Rehabilitar botón y ocultar spinner
                loadMoreBtn.prop('disabled', false);
                $('#loading-spinner').addClass('hidden');
            },
            error: function () {
                loadMoreBtn.prop('disabled', false);
                $('#loading-spinner').addClass('hidden');
                console.error('Error al cargar más posts');
            },
        });
    }

    // Inicializar cuando el documento esté listo
    $(document).ready(function () {
        if ($('#blog-posts-grid').length) {
            initBlog();
        }
    });
})(jQuery);
