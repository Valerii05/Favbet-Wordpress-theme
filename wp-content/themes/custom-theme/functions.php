<?php



add_action( 'wp_enqueue_scripts', 'my_css_js' );

function my_css_js()
{
    $the_theme = wp_get_theme();
    wp_enqueue_style('my-styles', get_template_directory_uri() . '/src/sass/styles.css', false, NULL, 'all');

    wp_enqueue_script('jquery');

    //AJAX
    wp_enqueue_script('my-scripts', get_template_directory_uri() . '/js/myScripts.js', array(), $the_theme->get('Version'));
    wp_localize_script('my-scripts', 'myajax', ['url' => admin_url('admin-ajax.php')]);
}




//  register MY POST TYPE CARS AND TACSONOMY
add_action('init', 'register_post_types');

function register_post_types()
{
    register_post_type('vacancies', [
        'labels' => [
            'name' => 'Vacancies', // основное название для типа записи
            'menu_name' => 'Vacancies',
        ],
        'description' => 'Taxon for vacancies',
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => true, // добавить в REST API. C WP 4.7
        'menu_icon' => 'dashicons-admin-users',
        'has_archive' => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'rewrite' => true,
    ]);

    $args = array(
        'labels' => array(
            'menu_name' => 'Departments'
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('Departments', 'vacancies', $args);
}


//  Main Sort

add_action('wp_ajax_main_sort', 'Main_sort');
add_action('wp_ajax_nopriv_main_sort', 'Main_sort');

function Main_sort()
{
    if (is_front_page()) {
        $currentPage = (get_query_var("page")) ? get_query_var("page") : 1;
    } else {
        $currentPage = (get_query_var("paged")) ? get_query_var("paged") : 1;
    }


    $category = $_POST['category'];

    $args = [
      'post_type' => ['vacancies'],
      'post_status' => 'publish',
      'posts_per_page'=> 8,
      'order' => 'ASC',
      'tax_query' => [
        [
          'taxonomy' => 'Departments',
           'field' => 'slug',
           'terms' => $category,
        ]
      ]
    ];

    if ((int) $category >= 1000 && (int) $category < 2000) {
        $args = array(
            'post_type'  => 'vacancies',
            'meta_key'   => 'salary',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'meta_query' => array(
                array(
                    'key'     => 'salary',
                    'value'   => array(1000,1999),
                    'compare' => 'IN',
                ),
            ),
        );
    }

    if ((int) $category >= 2000 && (int) $category < 3000) {
        $args = array(
            'post_type'  => 'vacancies',
            'meta_key'   => 'salary',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'meta_query' => array(
                array(
                    'key'     => 'salary',
                    'value'   => array(2000,2999),
                    'compare' => 'IN',
                ),
            ),
        );
    }

    if ((int) $category >= 3000 && (int) $category < 5000) {
        $args = array(
            'post_type'  => 'vacancies',
            'meta_key'   => 'salary',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'meta_query' => array(
                array(
                    'key'     => 'salary',
                    'value'   => array(3000,5000),
                    'compare' => 'IN',
                ),
            ),
        );
    }





    $myQuery = new WP_Query($args);

    while ($myQuery->have_posts()) {
        $myQuery->the_post();
        get_template_part('template-parts/open-position');
    }

//    $pagination = paginate_links([
//        "base"    => "",
//        "format"  => "%_%",
//        "current" => max(1, $currentPage),
//        "total"   => $myQuery->max_num_pages,
//        "prev_next"          => false,             // показ ссылок предыдущая/следующая
//        "end_size"           => 1,                // кол-во ссылок в начале и конце
//        "mid_size"           => 1,                // кол-во ссылок до и после текущей страницы
//    ]);
//
//    echo "<div class='pagination_2'>" . $pagination . "</div>";

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    echo '<div  class="loadmore" 
            data-max-page="' . $myQuery->max_num_pages . '"
            data-page="' . $paged . '">More posts</div>';


    wp_reset_postdata();
    wp_die();
}


add_action('wp_ajax_loadmore', 'loadMore');
add_action('wp_ajax_nopriv_loadmore', 'loadMore');

function loadMore()
{
    $args = array(
        'post_type' => 'vacancies',
        'paged' => $_POST['page'] + 1,
        'posts_per_page'=> 8,
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'Departments',
                'field' => 'slug',
                'terms' => $_POST['category'],
            ]
        ]
    );

    if (isset($_POST['sort_by'])) {
        $args['order'] = $_POST['sort_by'];
    }


    $myQuery = new WP_Query($args);

    while ($myQuery->have_posts()) {
        $myQuery->the_post();
        get_template_part('template-parts/open-position');
    }


    wp_reset_postdata();
    wp_die();
}