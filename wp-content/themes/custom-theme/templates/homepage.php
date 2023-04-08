<?php
/* Template Name: HomePage */
get_header();
?>

<section class="logo">
    <div class="container">
        <img
          src="<?php echo get_template_directory_uri() ?>/inc/image/logo.svg"
          alt="Logo"
          class="logo__img"
        >
    </div>
</section>

<section class="open-position">
    <div class="container">
        <div class="open-position__block">
            <h1 class="open-position__title">Our open positions</h1>

            <?php
            $cat_args = array(
                'orderby' => 'slug',
                'order' => 'ASC',
                'hide_empty' => false,
            );

            $terms = get_terms('Departments', $cat_args); ?>

            <div class="select_category">
                <select name="salary" class="open-position__select">
                  <option class="sort_btn" value="" disabled hidden selected>All departments</option>

                    <?php

                    foreach ($terms as $term) {?>
                        <option class="sort_btn" value="<?php echo $term->slug ?>"><?php echo $term->name; ?></option>
                    <?php } ?>

                  <option class="sort_btn" value="1000">Salary 1000+</option>
                  <option class="sort_btn" value="2000">Salary 2000+</option>
                  <option class="sort_btn" value="3000">Salary 3000+</option>
                </select>
            </div>


            <div class="open-position__posts result">
                <?php

                if (is_front_page()) {
                    $currentPage = (get_query_var("page")) ? get_query_var("page") : 1;
                } else {
                    $currentPage = (get_query_var("paged")) ? get_query_var("paged") : 1;
                }

                $posts_Query = new WP_Query(array(
                    "post_type"      => "vacancies",  // тип записи
                    "posts_per_page" => 8,             // кол-во записей на странице
                    'order' => 'ASC',
                    "paged"          => $currentPage,  // текущая страница
                ));

                if ($posts_Query->have_posts()) {
                    while ($posts_Query->have_posts()) {
                        $posts_Query->the_post();
                        get_template_part('template-parts/open-position');
                    }
                    wp_reset_postdata();
                }

                $pagination = paginate_links([
                    "base"    => str_replace(999999999, "%#%", get_pagenum_link(999999999)),
                    "format"  => "",
                    "current" => max(1, $currentPage),
                    "total"   => $posts_Query->max_num_pages,
                    "prev_next"          => false,             // показ ссылок предыдущая/следующая
                    "end_size"           => 1,                // кол-во ссылок в начале и конце
                    "mid_size"           => 2,                // кол-во ссылок до и после текущей страницы
                ]);



                ?>
            </div>

            <?php echo "<div class='pagination'>" . $pagination . "</div>";  ?>

        </div>
    </div>
</section>




<?php get_footer(); ?>
