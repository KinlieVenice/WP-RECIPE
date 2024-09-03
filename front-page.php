<?php get_header()?>

    <section class="banner mb-20">
            <?php $banner = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'meta_key' => 'Grouping',
            'meta_value' => 'Banner',
            ))?>

            <?php if($banner->have_posts()) : while($banner->have_posts()) : $banner->the_post()?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div
            class="banner__content flex flex-col justify-center items-center md:items-start px-1">
                <small>Must Try</small>
                <h1><?php the_title()?></h1>
                <p>
                    <?php echo wp_trim_words(get_the_excerpt(), 30)?>
                </p>
                <a href="<?php the_permalink()?>" class="btn btn--accent">Read More</a>
            </div>
            <div class="banner__img">
                <?php if(the_post_thumbnail()) {the_post_thumbnail();}?>
            </div>
        </div>
            <?php endwhile;
            else:
                echo "no posts";
            endif;
            wp_reset_postdata();
            ?>
    </section>

    <section class="week mb-20">
      <div class="container mx-auto">
        <h2 class="text-center mb-20">Recipe of the Week</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <?php $homeweek = new WP_Query(array (
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'meta_key' => 'Grouping',
                    'meta_value' => 'Homeweek',
                    'order' => "ASC"
                ))?>

            <?php if($homeweek->have_posts()) : while($homeweek->have_posts()) : $homeweek->the_post()?>
          <div class="grid__item text-center">
            <a href="<?php the_permalink()?>">
              <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
              <small><?php echo get_the_category()[0]->name?></small>
              <h3><?php the_title() ?></h3>
              <p>
                <?php echo wp_trim_words(get_the_excerpt(), 21)?>
              </p>
            </a>
          </div>
            <?php endwhile;
                else:
                    echo "no blogs";
                endif;
                wp_reset_postdata();
            ?>


        </div>
      </div>
    </section>

    <section class="collection">
      <div class="container mx-auto">
        <h2 class="mb-20">Recipe Collection</h2>
        <div class="collection__item">

            <?php $homecollection = new WP_Query(array (
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'meta_key' => 'Grouping',
                        'meta_value' => 'Homecollection',
                        'order' => "ASC"
                    ))?>

            <?php if($homecollection->have_posts()) : while($homecollection->have_posts()) : $homecollection->the_post()?>
          <div class="homecollection__item flex justify-between flex-col md:flex-row gap-10 mb-10">
            <div class="collection__item__img basis-1/2">
              <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
            </div>
            <div class="collection__item__content basis-1/2">
              <div
                class="flex flex-col justify-center items-start w-[80%] h-[80%] mx-auto"
              >
                <small><?php echo get_the_category()[0]->name?></small>
                <h3><?php the_title() ?></h3>
                <p>
                  <?php echo wp_trim_words(get_the_excerpt(), 25)?>
                </p>
                <a href="<?php the_permalink()?>" class="btn btn--accent">Read More</a>
              </div>
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
    </section>

    <section
      class="newsletter h-[50vh] grid place-content-center bg-cover bg-no-repeat bg-center"
    >
      <div class="newsletter__content max-w-[750px] w-full text-center px-1">
        <h2>Get out weekly Newsletter</h2>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima
          molestiae earum quam eos veritatis saepe explicabo cupiditate facere
          harum animi.
        </p>
        <form action="">
          <div class="">
            <input type="text" placeholder="Email" />
            <button class="btn btn--accent">Subscribe</button>
          </div>
        </form>
      </div>
    </section>

    <section class="classic mb-20">
      <div class="container mx-auto">
        <h2 class="mb-20">Recipe classic</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
       
          <?php $homeclassic = new WP_Query(array (
                'post_type' => 'post',
                'posts_per_page' => 9,
                'meta_key' => 'Grouping',
                'meta_value' => 'Homeclassic',
                'order' => "ASC"
            ))?>

            <?php if($homeclassic->have_posts()) : while($homeclassic->have_posts()) : $homeclassic->the_post()?>  
          <div class="classic__item flex gap-4">
            <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
            <div class="classic__item__content">
              <small><?php echo get_the_category()[0]->name?></small>
              <h4><?php the_title() ?></h4>
              <ul class="flex gap-2 mb-4">
                <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon1', true)?>"></i></li>
                <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon2', true)?>"></i></li>
                <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon3', true)?>"></i></li>
                <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon4', true)?>"></i></li>
                <li><i class="fas fa-star <?php echo get_post_meta(get_the_ID(), 'Icon5', true)?>"></i></li>
              </ul>
              <a href="<?php the_permalink()?>">Get Recipe Here</a>
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
    </section>


<?php get_footer()?>

