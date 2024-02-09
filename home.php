<?php 
/** * Template Name: Home Template * 
 * @package WordPress 
 * @subpackage Doeyekh_Wp 
 * @since  1.0 */
?>
<?php get_header() ?>

<!-- slide -->
<section class="mx-4 mt-4">
    
    <?php 
        $slide = new WP_Query(array(
            'post_type' => 'slide',
            'posts_per_page' => 4, // Display all posts
        ));
    ?>
    <?php 
        if($slide->have_posts()) : ?>
        <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <?php
                    while($slide->have_posts()) :
                    $slide->the_post();
                    ?>
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <img src="<?php the_post_thumbnail_url() ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="<?php the_title() ?>">
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                <?php
                    $no= 0;
                    while($slide->have_posts()) :
                        $slide->the_post();
                        ?>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="<?= $no++ ?>"></button>
                <?php endwhile; ?>
            </div>
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
        </div>
       <?php endif; ?>

</section>

<?php get_footer() ?>