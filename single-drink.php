<?php get_header(); ?>

    <div class="container">
      <div class="row">
      
        <div class="col-md-8">
        
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            	<div class="page-header">
                	<h1><?php the_title(); ?></h1>
            	</div>
                
                <div class="well drink-image">
					
						<?php 
    
                        $image = get_field('image');
                        
                        if( !empty($image) ): ?>
                        
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        
                        <?php endif; ?>

                </div>
                
                <p><?php the_field('description'); ?></p>
                
            <?php endwhile;  else: ?>
            
            	<div class="page-header">
                	<h1>Oh no!</h1>
                </div>
                
                <p>No content is appearing for this page!</p>
            
            <?php endif; ?>
            
         </div>
        
        <div class="col-md-4">
			<?php get_sidebar( 'drinks' ); ?>
        </div>

      </div>
      
<?php get_footer(); ?>