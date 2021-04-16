<?php
/*
 * Social
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;

while ( have_rows('contacts-socials', 'options') ) : the_row(); ?>
    <li>
        <a href="<?= get_sub_field('contacts-socials-url') ?>" target="_blank">
            <img
                    src="<?= get_sub_field('contacts-socials-icon') ?>"
                    alt="<?= get_sub_field('contacts-socials-name') ?>"
                    title="<?= get_sub_field('contacts-socials-name') ?>"
                    class="svg"
            >
        </a>
    </li>
<?php endwhile;
