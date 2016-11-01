<?php

get_header(); ?>

    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>We Are Creative Nerds</h1>
                        <p>Boudin doner frankfurter pig. Cow shank bresaola pork loin tri-tip tongue venison pork belly meatloaf short loin landjaeger biltong beef ribs shankle chicken andouille.</p>
                        <a href="#" class="btn btn-common">SIGN UP</a>
                    </div>
                    <img src="<?php bloginfo('template_url'); ?>/images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="<?php bloginfo('template_url'); ?>/images/home/slider/house.png" class="slider-house" alt="slider image">
                    <img src="<?php bloginfo('template_url'); ?>/images/home/slider/sun.png" class="slider-sun" alt="slider image">
                    <img src="<?php bloginfo('template_url'); ?>/images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="<?php bloginfo('template_url'); ?>/images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
	<?php 	
		$args = array(
			'post_status' => array('publish'),
	        'post_type' => 'services',
	        'orderby'=> 'post',
	        'order'=> 'ASC',
	        'posts_per_page' => 3,
			);
		$trServices = new WP_Query( $args );
	 ?>

    <section id="services">
        <div class="container">
            <div class="row">
            <?php if ($trServices->have_posts()): while ($trServices->have_posts()): $trServices->the_post(); ?>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="<?php echo get_post_custom_values("duration")[0];?>ms" data-wow-delay="<?php echo get_post_custom_values("delay")[0];?>ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="<?php echo get_post_custom_values("duration")[0];?>ms" data-wow-delay="<?php echo get_post_custom_values("delay")[0];?>ms">
                            <?php the_post_thumbnail(array(80,85)); ?>
                        </div>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
            <?php 
            	endwhile;
            	endif;
            	wp_reset_query();
                wp_reset_postdata();
            ?>
              

            </div>
        </div>
    </section>
    <!--/#services-->


    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Triangle Corporate Template</h1>
                            <p>A responsive, retina-ready &amp; wide multipurpose template.</p>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="#" class="btn btn-common">TAKE THE TOUR</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->
    
    <?php 
        $args = array(
            'post_status' => array('publish'),
            'post_type' => 'features',
            'orderby'=> 'post',
            'order'=> 'ASC',
            'posts_per_page' => 4,
            );
        $trFeatures = new WP_Query( $args );
     ?>
    <section id="features">
        <div class="container">
            <div class="row">
                <?php if ($trFeatures->have_posts()): ?>

                    <?php

                        $count = 1;
                        while($trFeatures->have_posts()):
                            
                            $trFeatures->the_post();


                            echo get_post_meta( get_the_id() , 'align' , true);

                            if($count % 2 == 0 ): ?>
                            
                                <div class="single-features">
                                    <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <P><?php the_content(); ?></P>
                                    </div>
                                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                                        <?php the_post_thumbnail('full',array( 'class' => 'img-responsive' )); ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="single-features">
                                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                                        <?php the_post_thumbnail('full',array( 'class' => 'img-responsive' )); ?>
                                    </div>
                                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <P><?php the_content(); ?></P>
                                    </div>
                                </div>            

                            <?php endif;
                            $count++;
                        endwhile; 
                        endif;
                        wp_reset_query();
                        wp_reset_postdata();
                    ?>
                
            </div>
        </div>
    </section>
    <!--/#features-->

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p><img src="<?php bloginfo('template_url'); ?>/images/home/clients.png" class="img-responsive" alt=""></p>
                        <h1 class="title">Happy Clients</h1>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client1.png" class="img-responsive" alt=""></a>
                        </div>
                        <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client2.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client3.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client4.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client5.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/home/client6.png" class="img-responsive" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!--/#clients-->

<?php get_footer(); ?>