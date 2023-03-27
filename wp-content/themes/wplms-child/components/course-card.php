<div class="single-card-ali">
    <div class="before-hover">
        <?php
            $featured_image_id = get_post_thumbnail_id( $course->ID );
            $featured_image_url = wp_get_attachment_url( $featured_image_id ) ?? wp_get_attachment_url("hello");
        ?>
        <img src="<?php echo $featured_image_url;?>" alt="img">
        <div class="card-cats">
            <ul>
                <li><a href="#"><?php echo get_term( $course->parent, 'course-cat' )->name;?></a></li>
                <li><a href="#"><?php echo $course->parent_name?></a></li>
            </ul>
        </div>
        <div class="card-title">
            <h5><?php echo $course->post_title?></h5>
        </div>
        <div class="card-btn">
            <?php the_course_button($course->ID);?>
        </div>
    </div>
    <div class="hover-card-content">
        <div class="card-socials">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i
                    class="fa fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/share?url=<?php the_permalink(); ?>" target="_blank"><i
                    class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"
                target="_blank"><i class="fa fa-twitter"></i>
                </i></a>
        </div>
        <div class="card-hover-title">
            <h5><?php echo $course->post_title?></h5>
        </div>
        <div class="card-author">
            <i class="fa fa-university" aria-hidden="true"></i>
            <h6><?php echo get_the_author_meta('display_name', $course->post_author);?></h6>
        </div>
        <div class="card-short-des">
            <p><?php echo ($course->post_excerpt ?? "No Excerpt") ?></p>
        </div>
        <div class="hover-card-btn">
            <!-- <a href="#">More Informantion <i class="fa fa-question-circle-o" aria-hidden="true"></i></a> -->
            <div class="hoverd-side-info-btn">
                <a href="<?php echo get_the_permalink($course->ID)?>">More Informantion <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>
            </div>
            <?php the_course_button($course->ID);?>
            <!-- <div class="hoverd-side-start-btn"><a href="#">Start Course</a></div> -->
        </div>
    </div>
</div>