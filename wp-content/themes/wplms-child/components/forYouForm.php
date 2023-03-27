<div class="container" id="for-you-container">
    <div class="for-you-steps-container">
        <h4 class="steps-count">Steps <span id="current-step">1</span> of 5</h4>
        <span class="for-you-step for-you-step-active"></span>
        <span class="for-you-step"></span>
        <span class="for-you-step"></span>
        <span class="for-you-step"></span>
        <span class="for-you-step"></span>
    </div>
    <form action="" id="for-you-form" method="POST">
        <div class="form-tab" id="main-goals">
            <h2>What is your main goal at Alison?</h2>
            <p class="select-instruction">Select one. This will help us find courses that are best
                suited to help you achieve your
                goal.</p>
            <div id="main-goals-inputs">
                <input type="radio" name="main-goal" value="1" id="up-skill">
                <label for="up-skill" class="input-label">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/questionnaire-page-1-img-1.svg" class="" alt="">
                    <p>I want to upskill</p>
                </label>
                <input type="radio" name="main-goal" value="2" id="change-career-filed">
                <label for="change-career-filed" class="input-label">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/questionnaire-page-1-img-2.svg" class="" alt="">
                    <p>I want to change my career field</p>
                </label>
                <input type="radio" name="main-goal" value="3" id="hobbies-interest">
                <label for="hobbies-interest" class="input-label">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/questionnaire-page-1-img-3.svg" class="" alt="">
                    <p>I want to I want to upskill</p>
                </label>
            </div>
            <div class="nav-button-container">
                <button id="questionnaire-nav-next-one" class="questionnaire-nav-button" disabled>Next:
                    Course Categories</button>
            </div>
        </div>
        <div class="form-tab" id="courses-categories">
            <h2>Which Career Categories are you most interested in?</h2>
            <p class="select-instruction">Select 3. This will help us recommend careers best suited to
                you and relevant courses.</p>
            <div id="courses-category-select">
                <?php
                $args = array(
                    'taxonomy' => 'course-cat',
                    'hide_empty' => true,
                    'parent' => 0,
                    'number' => 8,
                    'orderby' => 'count',
                    'order' => 'DESC',
                );
                $categories = get_terms($args);
                $cat_array = array();
                if (!is_wp_error($categories) && !empty($categories)) {
                    foreach ($categories as $category) {
                        $thumbnail_id = get_term_meta( $category->term_id, 'course_cat_thumbnail_id', true );
                        $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                        $image_src =  $image[0] ?? '';
                        $children = get_terms(array(
                            'taxonomy' => 'course-cat',
                            'parent' => $category->term_id,
                            'hide_empty' => false
                        ));
                        // check if category has at least 3 subcategories
                        if (!empty($children) && count($children) >= 3) {
                            // This category has child categories
                            $category_name = $category->name;
                            $category_slug = $category->slug;
                            $cat_id = $category->term_id;
                            array_push($cat_array, $children);
                ?>           
                            <input type="checkbox" name="course_cat[]" value="<?php echo $cat_id; ?>" id="<?php echo $cat_id; ?>">
                            <label for="<?php echo $cat_id; ?>" class="input-label">
                                <img src="<?php echo $image_src ?>" style="height: 50px; width: 50px">
                                <p class=course-cat-title><?php echo $category_name; ?></p>
                            </label>
                        <?php } ?>
                <?php }
                } ?>
            </div>
            <div class="nav-button-container">
                <button class="btn-nav-back">Back</button>
                <button id="questionnaire-nav-next-two" class="questionnaire-nav-button" disabled>Next:
                    Course Categories</button>
            </div>
        </div>
        <div class="form-tab" id="courses-sub-categories">
            <h2>What is your main goal at Alison?</h2>
            <p class="select-instruction">Select 3 per category.</p>
        
            <!-- Subcategory div -->
            <div id="courses-sub-category-container"></div>s
            <div class="nav-button-container">
                <button class="btn-nav-back">Back</button>
                <button id="questionnaire-nav-next-three" class="questionnaire-nav-button" disabled>Next:
                    Career Categories</button>
            </div>
        </div>
        <div class="form-tab" id="career-categories">
            <h2>Which Career Categories are you most interested in?</h2>
            <p class="select-instruction">Select 3. This will help us recommend careers best suited to
                you and relevant courses.</p>

            <div id="career-category-container">

                <input type="checkbox" name="career-cat[]" value="health-science" id="health-science">
                <label for="health-science" class="input-label">
                    <p class=course-cat-title>Health Science</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="arts-audio-video-technology" id="arts-audio-video-technology">
                <label for="arts-audio-video-technology" class="input-label">
                    <p class=course-cat-title>Arts, Audio/Video Technology, and Communications</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="agriculture-food-natural-resources" id="agriculture-food-natural-resources">
                <label for="agriculture-food-natural-resources" class="input-label">
                    <p class=course-cat-title>Agriculture, Food, and Natural Resources</p>
                </label>

                <input type="checkbox" name="career-cat[]" value="information-technology" id="information-technology">
                <label for="information-technology" class="input-label">
                    <p class=course-cat-title>Information Technology</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="marketing-sales-service" id="marketing-sales-service">
                <label for="marketing-sales-service" class="input-label">
                    <p class=course-cat-title>Marketing, Sales, and Service</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="government-public-administration" id="government-public-administration">
                <label for="government-public-administration" class="input-label">
                    <p class=course-cat-title>Government and Public Administration</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="manufacturing" id="manufacturing">
                <label for="manufacturing" class="input-label">
                    <p class=course-cat-title>Manufacturing</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="law-security" id="law-security">
                <label for="law-security" class="input-label">
                    <p class=course-cat-title>Law, Public Safety, Corrections, and Security</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="science-technology-engineering" id="science-technology-engineering">
                <label for="science-technology-engineering" class="input-label">
                    <p class=course-cat-title>Science, Technology, Engineering, and Mathematics</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="transportation-distribution" id="transportation-distribution">
                <label for="transportation-distribution" class="input-label">
                    <p class=course-cat-title>Transportation, Distribution, and Logistics</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="business-management" id="business-management">
                <label for="business-management" class="input-label">
                    <p class=course-cat-title>Business Management and Administration</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="education-training" id="education-training">
                <label for="education-training" class="input-label">
                    <p class=course-cat-title>Education and Training</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="finance" id="finance">
                <label for="finance" class="input-label">
                    <p class=course-cat-title>Finance</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="human-services" id="human-services">
                <label for="human-services" class="input-label">
                    <p class=course-cat-title>Human Services</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="hospitality-tourism" id="hospitality-tourism">
                <label for="hospitality-tourism" class="input-label">
                    <p class=course-cat-title>Hospitality and Tourism</p>
                </label>
                <input type="checkbox" name="career-cat[]" value="architecture-construction" id="architecture-construction">
                <label for="architecture-construction" class="input-label">
                    <p class=course-cat-title>Architecture and Construction</p>
                </label>
            </div>

            <div class="nav-button-container">
                <button class="btn-nav-back">Back</button>
                <button id="questionnaire-nav-next-four" class="questionnaire-nav-button" disabled>Next:
                    Career Stages</button>
            </div>
        </div>
        <div class="form-tab" id="career-stage">
            <h2>What Career Stage are you currently in?</h2>
            <p class="select-instruction">Select the most applicable option for you (select one).
            </p>
            <div id="career-stages-inputs">
                <input type="radio" name="career-stage" value="seek-promotion" id="seek-promotion">
                <label for="seek-promotion" class="input-label">
                    <p>Seeking a Promotion</p>
                </label>
                <input type="radio" name="career-stage" value="recently-promoted" id="recently-promoted">
                <label for="recently-promoted" class="input-label">
                    <p>Recently Promoted</p>
                </label>
                <input type="radio" name="career-stage" value="currently-in-school" id="currently-in-school">
                <label for="currently-in-school" class="input-label">
                    <p>Currently in School</p>
                </label>
                <input type="radio" name="career-stage" value="upskilling-current-job" id="upskilling-current-job">
                <label for="upskilling-current-job" class="input-label">
                    <p>Upskilling in my Current Job</p>
                </label>
                <input type="radio" name="career-stage" value="currently-unemployed" id="currently-unemployed">
                <label for="currently-unemployed" class="input-label">
                    <p>Currently Unemployed</p>
                </label>
                <input type="radio" name="career-stage" value="career-change" id="career-change">
                <label for="career-change" class="input-label">
                    <p>Looking to Change Careers</p>
                </label>
                <input type="radio" name="career-stage" value="reenterning-workspace" id="reenterning-workspace">
                <label for="reenterning-workspace" class="input-label">
                    <p>Re-entering the Workplace</p>
                </label>
                <input type="radio" name="career-stage" value="currently-university" id="currently-university">
                <label for="currently-university" class="input-label">
                    <p>Currently in University</p>
                </label>
            </div>

            <div class="nav-button-container">
                <button class="btn-nav-back">Back</button>
                <button id="submit-btn" type="submit" name="for_you_submit" class="questionnaire-nav-button" disabled>Get
                    Recommendations</button>
            </div>
        </div>
    </form>
</div>