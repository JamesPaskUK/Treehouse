<?php get_header(); ?>
    
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <section class="hero">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1><?php the_title(); ?></h1>
                <h2 class="lead">Relax and unwind with our artisan coffees and food in our tranquil surroundings.</h2>
            </div>
        </div>
    </section>

    <div class="container home">
      <div class="row">
        <div class="col-md-12">
		
          <p>
          	<?php the_content(); ?>	
          </p>

        </div>
        
        <?php endwhile; endif; ?>
        
      </div>

<?php get_footer(); ?>