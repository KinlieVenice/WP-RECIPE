<?php get_header()?>

            <?php if(have_posts()) : while(have_posts()) : the_post()?>
    <section class="page__banner bg-light_accent mb-[180px]">
      <div class="container px-4 mx-auto">

        <div class="text-center pt-10">
          <h1 class="-mb-7"><?php the_title() ?></h1>
          <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
        </div>
      </div>
    </section>

    <section class="page__content mb-20">
      <div class="container px-4 mx-auto">
        <div
          class="grid grid-cols-1 md:grid-cols-[1fr_350px] gap-10 max-w-[1000px] w-full mx-auto"
        >

          <div class="page__body max-w-[800px] w-full mx-auto">
            <h2><?php the_title() ?></h2>
            <?php echo get_the_content() ?>
             <ul>
              <li><?php echo get_post_meta(get_the_ID(), 'Source', true)?></li>
              <li><?php echo get_post_meta(get_the_ID(), 'Address', true)?></li>
              <li><?php echo get_post_meta(get_the_ID(), 'Zip', true)?></li>
            </ul>
          </div>

          <div class="page__sidebar">
            <h4 class="mb-10">Looking for something else</h4>

            <?php $aboutside = new WP_Query(array (
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'meta_key' => 'Grouping',
                    'order' => "ASC",
                    'orderby' => 'rand',
                    'post_not_in' => array(get_the_ID())
                ))?>

            <?php if($aboutside->have_posts()) : while($aboutside->have_posts()) : $aboutside->the_post()?>
            <div class="recipe__card flex gap-5 mb-5">
              <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
              <div>
                <small><?php echo get_the_category()[0]->name?></small>
                <h5><?php the_title() ?></h5>
                <ul class="flex gap-1">
                  <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon1', true)?>"></i></i></li>
                  <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon2', true)?>"></i></i></li>
                  <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon3', true)?>"></i></i></li>
                  <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon4', true)?>"></i></i></li>
                </ul>
                <a href="#">Get recipe</a>
              </div>
            </div>
            <?php endwhile;
            else:
                echo "no blogs";
            endif;
            wp_reset_postdata();
            ?>


          </div>
        </div>
      </div>
    </section>
            <?php endwhile;
            else:
                echo "no blogs";
            endif;
            wp_reset_postdata();
            ?>
<?php get_footer()?>