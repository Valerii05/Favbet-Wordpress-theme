<div class="open-position__post">
    <a class="open-position__post-link" href="#">
        <h2 class="open-position__post-title">
            <?php
              the_title();
            ?>

        </h2>

        <div class="open-position__post-items">
            <div class="open-position__post-item">
                <img
                    src="<?php echo get_template_directory_uri() ?>/inc/image/location.svg"
                    alt="Location"
                    class="open-position__post-item-img"
                >

                <p class="open-position__post-item-text">
                    <?php the_field('location'); ?>
                </p>
            </div>

            <div class="open-position__post-item">
                <img
                    src="<?php echo get_template_directory_uri() ?>/inc/image/humans.svg"
                    alt="Location"
                    class="open-position__post-item-img"
                >

                <p class="open-position__post-item-text">
                    Marketing
                </p>
            </div>

            <div class="open-position__post-item">
                <img
                    src="<?php echo get_template_directory_uri() ?>/inc/image/phone.svg"
                    alt="Location"
                    class="open-position__post-item-img"
                >

                <p class="open-position__post-item-text">
                    <?php the_field('phone'); ?>
                </p>
            </div>
        </div>

        <a class="learn-more" href="#">
            Learn more
            <img
                src="<?php echo get_template_directory_uri() ?>/inc/image/loadmore.svg"
                alt=">"
                class="learn-more__img"
            >
        </a>
    </a>
</div>