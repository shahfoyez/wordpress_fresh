<?php
  require_once get_stylesheet_directory() . '/classes/for_you.php';
  global $wpdb;
  $user = wp_get_current_user();
  $userId = $user->id;
  $for_you_obj = new ForYou();
  // submit the form and insert data
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['for_you_submit'])) {
      $dataInsert = $for_you_obj->insert($_POST, $userId);
    }
  }
  ?>
 <?php
  // check if user already submitted the form and get recommended courses
  $dataSubmitted = $for_you_obj->getUserSubmit($userId);
  if ($dataSubmitted != null) {
    $userRecommendedCourses = $for_you_obj->userRecommendedCourses($dataSubmitted[0]);
  }
  ?>
 <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['foy-reset'])) {
      $resetForm = $for_you_obj->resetForm($userId);
    }
  }
  ?>

 <?php
  //var_dump(isAllUsers());
  if (isAllUsers()) {

    $user_id = get_current_user_id();

    $pageposts = $wpdb->get_results(apply_filters('wplms_usermeta_direct_query', $wpdb->prepare("
        SELECT posts.ID as id, IF(meta.meta_value > %d,'active','expired') as status
        FROM {$wpdb->posts} AS posts
        LEFT JOIN {$wpdb->usermeta} AS meta ON posts.ID = meta.meta_key
        WHERE   posts.post_type   = %s
        AND   posts.post_status   = %s
        AND   meta.user_id   = %d
        ", time(), 'course', 'publish', $user_id)));

    $singleCourseArray = [];
    $allCourseArray = [];
    $term_list = [];
    $valCatID = [];
    $courseFound = 1;


    if ($pageposts) {

      $continueCount = 0;
      $completedCount = 0;
      $startCount = 0;
      $evaluatedCount = 0;


      $count = 0;
      foreach ($pageposts as $singleCourse) {
        $count++;
        if ($count == 1) {
          $singleCourseArray[] = $singleCourse->id;
        }
      }
      foreach ($pageposts as $allCourse) {
        $allCourseArray[] = $allCourse->id;
        $cat = get_the_terms($allCourse->id, 'course-cat');
        $term_list[] =  wp_list_pluck($cat, 'slug');

        $status = bp_course_get_user_course_status($user_id, $allCourse->id);
        if ($status == 1) {
          $startCount++;
        } elseif ($status == 2) {
          $continueCount++;
        } elseif ($status == 4) {
          $completedCount++;
        } elseif ($status == 3) {
          $evaluatedCount++;
        }
      }
      foreach ($term_list as $terms) {
        $valCatID[] = $terms[0];
      }
    } else {
      $courseFound = 0;
    }

  ?>
   <style>
     .foy-success {
       text-align: left;
       border-radius: 3px;
       padding: 10px;
       display: inline-block;
       background: #70c989;
       color: #FFF;
       font-weight: 600;
       width: 100%;
     }

     .foy-error {
       text-align: left;
       border-radius: 3px;
       padding: 10px;
       display: inline-block;
       background: #f15656;
       ;
       color: #FFF;
       font-weight: 600;
       width: 100%;
     }

     .menu-list>a {
       border-left: 5px solid transparent;
     }

     .menu-list>a:hover,
     .menu-list>.activemenu>a {
       border-left-color: green;
       transition: all .3s ease-in;
       color: #6ea21f;
     }

     #global .pusher>.wplms-dashboard,
     #global .pusher>.col-md-6.col-sm-12,
     #global .pusher>.col-md-12 {
       display: none;
     }

     /* .common-design a:hover {
       color: #6ea21f !important;
       background: rgba(234, 249, 255, .08) 0 0 no-repeat padding-box;
       transition: all .25s ease-in;
     } */

     /* css for dashboard settings page */

     .mha_settings_panel {
       background-color: #ecf1f5;
       padding: 30px;
     }

     .mha_settings_panel div.settings_own {
       width: 31%;
     }

     .mha_settings_panel div.settings_box_others {
       width: 102%;
       margin: 0 !important;
       margin-top: 30px;
     }

     .mha_settings_panel div.first_settings1 {
       padding-right: 15px;
     }

     .mha_settings_panel div.first_settings2 {
       width: 200px;
       padding-right: 15px;
     }

     .mha_settings_panel div.first_settings3 {
       width: 410px;
     }

     .mha_settings_panel form {
       display: flex;
       background: white;
       padding: 20px 20px;
       margin-bottom: 30px;
       margin: 10px;
     }

     .mha_settings_panel .submit #submit {
       margin-top: 30px;
     }

     .settings_own {
       background-color: #fff;
       margin: 10px;
       padding: 20px 20px;
       display: flex;
     }

     .settings_own_content h2 {
       font: 400 1.2em Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;
       margin: 0 0 10px;
     }

     .settings_own_content {
       padding-left: 20px;
       padding-bottom: 40px;
     }

     .settings_own_content p {
       margin-bottom: 30px;
     }

     .btn_for_settings {
       background: #0091c7;
       color: #fff;
       font-size: 1.05em;
       max-width: none;
       padding: 9px 18px;
       border-radius: 5px;
     }

     .btn_for_settings:hover {
       background: #006c94;
     }

     @media only screen and (max-width: 768px) {
       .mha_settings_panel form {
         display: block;
       }

       .mha_settings_panel div {
         width: 90%;
       }

       .mha_settings_panel div.first_settings2 {
         width: 90%;
       }

       .mha_settings_panel div.first_settings3 {
         width: 90%;
       }
     }
   </style>
   <div class="ar-main-content">
     <div class="ar-sidebar" id="#ar-id-side">
       <div class="sidebar-user-data">
         <div class="user_avatar_img">
           <?php
            $user = wp_get_current_user();
            if ($user) :
            ?>
             <img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" alt="" />
           <?php endif; ?>
         </div>
         <h4 class="sidebar-user-name">
           <?php
            $username = get_user_meta($user_id);
            // echo '<pre>';
            // var_dump($username);
            // echo '</pre>';

            $fname = $username['first_name'][0] ?? '';
            $lname = $username['last_name'][0] ?? '';
            $fullname =  ($fname != '' && $lname != '') ? $fname . ' ' . $lname : 'Set Your Name';
            echo $fullname;
            ?></h4>
         <a class="user-profile-link"><span class="new-badge"><?php echo $user->user_email; ?></span></a>
         <h6 class="user-id">
           Last Login : <br>
           <span>
             <?php
              // echo $user->last_activity;
              $last_login = $user->last_activity;
              // echo $user->last_activity . '<br>';
              // $dtdt = current_time('timestamp');
              // echo date('Y-m-d h:i:s', $dtdt) . '<br>';
              echo human_time_diff(strtotime($last_login), current_time('timestamp')) . ' ago';
              ?>
           </span>
         </h6>
       </div>

       <ul class="menu-list" id="idforactive">

         <li class="common-design">
           <a href="#for_you" data-toggle="tab" class="common-design-2">
             <i class="fa fa-heart side-icon" aria-hidden="true"></i> For You
           </a>
         </li>

         <li class="common-design">
           <a href="#dashboard" data-toggle="tab" class="common-design-2">
             <i class="fa fa-th side-icon" aria-hidden="true"></i> Dashboard
           </a>
         </li>


         <hr class="hrwdth">


         <a href="<?php echo home_url('/go-premium'); ?>" class="common-design common-design-2">
           <i class="fa fa-magic  side-icon"></i> Upgrade to Premium
         </a>


         <li class="common-design">
           <a href="#certificates" data-toggle="tab" class="common-design-2">
             <i class="fa fa-trophy  side-icon"></i> Get Certification
           </a>
         </li>

         <hr class="hrwdth">

         <li class="common-design">
           <a href="#settings" data-toggle="tab" class="common-design-2">
             <i class="fa fa-cogs  side-icon"></i> Account Settings
           </a>
         </li>

         <li class="common-design">
           <a href="#support" data-toggle="tab" class="common-design-2">
             <i class="fa fa-plus-square  side-icon"></i> Help
           </a>
         </li>

         <a href="<?php echo wp_logout_url(home_url()); ?>" class="common-design-2 common-design">
           <i class="fa fa-power-off  side-icon"></i> Logout
         </a>

       </ul>


     </div>
     <div id="ar-sidebar-btn">
       <span></span>
       <span></span>
       <span></span>
     </div>

     <div class="ar-content">
       <div class="tab-content">
         <div class="tab-pane" id="for_you">
           <div class="ar-banner-cmn">
             <div class="titandtx">
               <h1 class="bn-title">My Courses</h1>
             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>


           <?php
            // if user submission is null
            if (isset($dataSubmitted) && $dataSubmitted == null) {
              // for you form 
              include get_stylesheet_directory() . '/components/forYouForm.php';
            }
            // if user submission is not null
            elseif (isset($dataSubmitted) && $dataSubmitted != null) { ?>
             <div class="container">
               <form action="" method="POST">
                 <button type="submit" name="foy-reset" value="Reset">Reset</button>
               </form>
               <?php
                if ($userRecommendedCourses != null) {
                  foreach ($userRecommendedCourses as $key => $categories) { ?>
                   <h4><?php echo $key ?></h4>
                   <div class="foy-for-you-course">
                     <?php

                      foreach ($categories as $course) {
                        // for you recommedded courses
                        include get_stylesheet_directory() . '/components/course-card.php';
                      }
                      ?>
                   </div>
                 <?php }
                } else { ?>
                 <h3>No recommended courses found!</h3>
               <?php } ?>
             </div>
           <?php } ?>
           <script>
             const categories = <?php echo json_encode($categories); ?>;
             //  const userRecommendedCourses = <?php echo json_encode($userRecommendedCourses); ?>;
             const subCategories = <?php echo json_encode($cat_array); ?>;
             let selectedCat = [];
             let selectedSubCat = [];
             let filteredArrayOfObject = [];
             let currentIndex = 0;
             let stepCountSpan = document.getElementById("current-step");
             let stepCount = currentIndex + 1;
             const mainGoalsInputs = document.querySelectorAll('#main-goals-inputs input');
             const catCheckboxes = document.querySelectorAll('#courses-category-select input[type=checkbox]');
             const careerCatCheckboxes = document.querySelectorAll(
               '#career-category-container input[type=checkbox]');
             const careerStageInputs = document.querySelectorAll(
               '#career-stages-inputs input[type=radio]');
             const stepsCollection = document.querySelectorAll('.for-you-step');
             const formTabCollection = document.querySelectorAll('.form-tab');
             const navBackBtnCollection = document.querySelectorAll('.btn-nav-back');
             const coursesSubCategoryContainer = document.getElementById('courses-sub-category-container');
             const nextNavBtnOne = document.getElementById('questionnaire-nav-next-one');
             const nextNavBtnTwo = document.getElementById('questionnaire-nav-next-two');
             const nextNavBtnThree = document.getElementById('questionnaire-nav-next-three');
             const nextNavBtnFour = document.getElementById('questionnaire-nav-next-four');


             formTabCollection[currentIndex].style.display = 'block';
             stepCountSpan.innerText = stepCount;

             function countSubCatCheckBox(subCatCollection) {
               subCatCollection.forEach(subcheckbox => {
                 subcheckbox.addEventListener('change', () => {
                   let checkedCount = 0;
                   subCatCollection.forEach(subcb => {
                     if (subcb.checked) {
                       checkedCount++;
                       if (!selectedSubCat.includes(subcb.id)) {
                         selectedSubCat.push(subcb.id);
                       }
                     }
                   });

                   subCatCollection.forEach(subcb => {
                     if (!subcb.checked) {
                       subcb.disabled = checkedCount >= 3;
                       const index = selectedSubCat.indexOf(subcb.id);
                       if (index > -1) {
                         selectedSubCat.splice(index, 1);
                       }
                     }
                   });

                   if (selectedSubCat.length == 9) {
                     nextNavBtnThree.disabled = false;
                   } else {
                     nextNavBtnThree.disabled = true;
                   }
                 });
               });
             }


             function goPrevQuestionnaire(e) {
               e.preventDefault();
               currentIndex--;
               formTabCollection[currentIndex].style.display = 'block';
               stepsCollection[currentIndex].classList.add('for-you-step-active');
               stepsCollection[currentIndex + 1].classList.remove('for-you-step-active');
               if (formTabCollection[currentIndex + 1]) {
                 formTabCollection[currentIndex + 1].style.display = 'none';
               }
               if (currentIndex == 1) {
                 selectedSubCat = [];
                 nextNavBtnThree.disabled = true;
                 const catSubCatContainer = document.querySelectorAll('.cat-subcat-container');
                 catSubCatContainer?.forEach(item => {
                   item.innerHTML = ``;
                 });
               }
               if (currentIndex == 2) {

                 const subCatCheckBoxOne = document.querySelectorAll('[name^=course-sub-cat-0]');
                 const subCatCheckBoxTwo = document.querySelectorAll('[name^=course-sub-cat-1]');
                 const subCatCheckBoxThree = document.querySelectorAll('[name^=course-sub-cat-2]');

                 countSubCatCheckBox(subCatCheckBoxOne);
                 countSubCatCheckBox(subCatCheckBoxTwo);
                 countSubCatCheckBox(subCatCheckBoxThree);
               }
               if (stepCount > 1) {
                 stepCount = stepCount - 1;
                 stepCountSpan.innerText = stepCount;
               } else {
                 stepCountSpan.innerText = 0;
               }
             }

             navBackBtnCollection.forEach(item => {
               item.addEventListener('click', goPrevQuestionnaire);
             });

             function goNextQuestionnaire() {
               currentIndex++;
               formTabCollection[currentIndex].style.display = 'block';
               stepsCollection[currentIndex].classList.add('for-you-step-active');
               if (formTabCollection[currentIndex - 1]) {
                 formTabCollection[currentIndex - 1].style.display = 'none';
               }

               if (currentIndex == 1) {
                 selectedSubCat = [];
                 nextNavBtnThree.disabled = true;
                 const catSubCatContainer = document.querySelectorAll('.cat-subcat-container');
                 catSubCatContainer?.forEach(item => {
                   item.innerHTML = ``;
                 });
               }

               if (currentIndex == 2) {
                 const subCatCheckBoxOne = document.querySelectorAll('[name^=course-sub-cat-0]');
                 const subCatCheckBoxTwo = document.querySelectorAll('[name^=course-sub-cat-1]');
                 const subCatCheckBoxThree = document.querySelectorAll('[name^=course-sub-cat-2]');

                 countSubCatCheckBox(subCatCheckBoxOne);
                 countSubCatCheckBox(subCatCheckBoxTwo);
                 countSubCatCheckBox(subCatCheckBoxThree);
               }
               stepCount = currentIndex + 1;
               stepCountSpan.innerText = stepCount;
             }

             nextNavBtnOne.addEventListener('click', function(e) {
               e.preventDefault();
               goNextQuestionnaire();
             })
             nextNavBtnTwo.addEventListener('click', function(event) {
               event.preventDefault();
               const filteredCategories = categories.filter(cat => selectedCat.find(selectedCat =>
                 selectedCat == cat.term_id));

               subCategories.forEach((item) => {
                 let subCat = [];

                 const x = item.filter(cat => filteredCategories.find(filterCat =>
                   filterCat.term_id == cat.parent));
                 x.forEach(item => {
                   filteredCategories.forEach(filcat => {
                     if (item.parent == filcat.term_id) {
                       subCat.push(item);
                       filcat.sub_categories = subCat;
                     }
                   });
                 });
               });

               filteredCategories.forEach((item, index) => {
                 const catContainer = document.createElement('div')
                 catContainer.classList.add('cat-subcat-container');
                 const catTitle = document.createElement('h3');

                 catTitle.innerText = item.name;
                 catContainer.append(catTitle);
                 item.sub_categories.forEach((subcat) => {
                   catContainer.innerHTML += `
                            <input type="checkbox" name= course-sub-cat-${index}[] value=${subcat.term_id}
                                    id=${subcat.term_id}>
                                <label for=${subcat.term_id} class="input-label">
                                  ${subcat.name}
                                </label>
                            `
                 });
                 coursesSubCategoryContainer.append(catContainer);
               });
               goNextQuestionnaire();
             });

             nextNavBtnThree.addEventListener('click', function(e) {
               e.preventDefault();
               goNextQuestionnaire();
             })
             nextNavBtnFour.addEventListener('click', function(e) {
               e.preventDefault();
               goNextQuestionnaire();
             })

             mainGoalsInputs.forEach(item => {
               item.addEventListener('change', function() {
                 document.getElementById('questionnaire-nav-next-one').disabled = false;
               });
             });
             careerStageInputs.forEach(item => {
               item.addEventListener('change', function() {
                 document.getElementById('submit-btn').disabled = false;
               });
             });

             catCheckboxes.forEach(checkbox => {
               checkbox.addEventListener('change', () => {
                 let checkedCount = 0;
                 catCheckboxes.forEach(cb => {
                   if (cb.checked) {
                     checkedCount++;
                     if (!selectedCat.includes(cb.id)) {
                       selectedCat.push(cb.id);
                     }
                   }

                 });

                 catCheckboxes.forEach(cb => {
                   if (!cb.checked) {
                     cb.disabled = checkedCount >= 3;
                     const index = selectedCat.indexOf(cb.id);

                     if (index > -1) {
                       selectedCat.splice(index, 1);
                     }
                   }
                 });
                 nextNavBtnTwo.disabled = checkedCount < 3;
               });
             });


             careerCatCheckboxes.forEach(checkbox => {
               checkbox.addEventListener('change', () => {
                 let checkedCount = 0;
                 careerCatCheckboxes.forEach(cb => {
                   if (cb.checked) {
                     checkedCount++;
                     if (!selectedCat.includes(cb.id)) {
                       selectedCat.push(cb.id);
                     }
                   }

                 });

                 careerCatCheckboxes.forEach(cb => {
                   if (!cb.checked) {
                     cb.disabled = checkedCount >= 3;
                     const index = selectedCat.indexOf(cb.id);

                     if (index > -1) {
                       selectedCat.splice(index, 1);
                     }
                   }
                 });
                 nextNavBtnFour.disabled = checkedCount < 3;
               });
             });
           </script>

           <!-- End container for tawsif er code -->


           <!-- <div class="container">

            <div class="ar-othr-crsOvrflx">

              <?php
              if ($allCourseArray) :
                foreach ($allCourseArray as $allCourse) :
                  setup_postdata($allCourse);
              ?>
                  <div class="ar-cntn-fll ar-mrg-btm">
                    <?php
                    $imgbg = get_the_post_thumbnail_url($allCourse);
                    $imgLc = get_stylesheet_directory_uri() . '/assets/img/428x320.jpg';
                    ?>
                    <img src="<?php if ($imgbg) {
                                echo $imgbg;
                              } else {
                                echo $imgLc;
                              } ?>" class="ar-crs-img">

                    <div class="ar-crs-dt">
                      <h4 class="ar-crs-ttl"><b><?php echo get_the_title($allCourse); ?></b></h4>

                      <div class="ar-crs-prgr">
                        <?php
                        $progress = bp_course_get_user_progress($user_id, $allCourse);
                        ?>
                        <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd">
                        </progress>
                        <h5 class="ar-crs-cmplt"><b>
                            <?php
                            if (empty($progress)) {
                              echo '0';
                            } else {
                              echo $progress;
                            }
                            ?> % </b> Complete</h5>
                      </div>

                      <h5 class="ar-crs-btmsub"><b>Last active:</b><?php

                                                                    ?> Today</h5>
                    </div>

                    <hr class="hrforline">
                    <div class="ar-btn-lrn">
                      <?php the_course_button($allCourse); ?>
                    </div>

                  </div>
              <?php
                endforeach;
              endif;
              ?>

            </div>
          </div> -->



         </div>

         <div class="tab-pane active" id="dashboard">


           <!-- Banner -->
           <div class="ar-banner">
             <div class="titandtx">
               <h1 class="bn-title">Welcome to your Dashboard</h1>

               <ul class="navtabs">

                 <li class="active">
                   <a href="#tab1default" data-toggle="tab" class="linkn">
                     <i class="icon-book nmarg"></i>
                     <span class="long">Learn & Get Certificates</span>
                     <span class="Short">Learn</span>
                   </a>
                 </li>

                 <li>
                   <a href="#tab2default" data-toggle="tab" class="linkn">
                     <i class="icon-suitcase nmarg"></i>
                     <span class="long">Your Runing Offers</span>
                     <span class="Short">Career</span>
                     <span class="notification-badge">3</span>
                   </a>
                 </li>

                 <li>
                   <a href="#tab3default" data-toggle="tab" class="linkn">
                     <i class="icon-usd nmarg"></i>
                     <span class="long">Earn Now</span>
                     <span class="Short">Earn</span>
                     <span class="notification-badge">1</span>
                   </a>
                 </li>

               </ul>

             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>
           <div class="container">
             <?php
              if (isset($dataInsert)) {
                echo $dataInsert;
              }
              if (isset($resetForm)) {
                echo $resetForm;
              }
              ?>
           </div>

           <div class="container">

             <div class="tab-content">
               <!-- 1st tab content -->
               <div class="tab-pane fade in active" id="tab1default">
                 <div class="panel-body">
                   <div class="tab-content">
                     <div class="tab-pane fade in active" id="tab1default">
                       <div class="tab1-full">
                         <h2 class="tab1h">Get Personalised Course & Career Recommendations!</h2>
                         <div class="tab1sub">
                           <p>Tell us what your learning goals and career objectives are, and we
                             will recommend the best courses for you to enrol in. </p>
                         </div>
                         <a href="#" class="btn tab1btn">Get Recommendations</a>
                       </div>
                       <div class="ar-crs-prgrs">
                         <div class="ar-crs-cntnt">
                           <div class="ar-crs-p1h1">
                             <div class="ar-crsr-ttl">Courses In Progress
                               (<?php echo count($allCourseArray); ?>)</div>
                             <div class="ar-crsr-mre">
                               <a href="#open-modal" class="crs-lng">Other Courses In Progress
                                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/expand_icon.svg"></a>
                               <a href="#open-modal" class="crs-srt" style="display:none;">Other's <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/expand_icon.svg"></a>
                             </div>
                           </div>

                           <div id="open-modal" class="modal-window">
                             <div>
                               <a href="#" title="Close" class="modal-close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/close.svg" alt="close"></a>
                               <h4 class="modal-title" id="modalLabel"><b>Courses In Progress
                                   (<?php echo count($allCourseArray); ?>)</b></h4>

                               <div class="ar-othr-crsOvrfl">
                                 <!-- 1 -->
                                 <?php
                                  if ($allCourseArray) :
                                    foreach ($allCourseArray as $allCourse) :
                                      setup_postdata($allCourse);

                                  ?>
                                     <div class="ar-cntn-fll ar-mrg-btm">
                                       <?php
                                        $imgbg = get_the_post_thumbnail_url($allCourse);
                                        $imgLc = get_stylesheet_directory_uri() . '/assets/img/428x320.jpg';
                                        ?>
                                       <img src="<?php if ($imgbg) {
                                                    echo $imgbg;
                                                  } else {
                                                    echo $imgLc;
                                                  } ?>" class="ar-crs-img">

                                       <div class="ar-crs-dt">
                                         <h4 class="ar-crs-ttl">
                                           <b><?php echo get_the_title($allCourse); ?></b>
                                         </h4>

                                         <div class="ar-crs-prgr">
                                           <?php

                                            $progress = bp_course_get_user_progress($user_id, $allCourse);

                                            ?>
                                           <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd">
                                           </progress>
                                           <h5 class="ar-crs-cmplt"><b><?php
                                                                        if (empty($progress)) {
                                                                          echo '0';
                                                                        } else {
                                                                          echo $progress;
                                                                        }
                                                                        ?> %
                                             </b> Complete</h5>
                                         </div>

                                         <h5 class="ar-crs-btmsub"><b>Last
                                             active:</b><?php
                                                        //  $active = wplms_user_course_check($user_id,$allCourse);
                                                        //  var_dump($active);
                                                        ?> Today</h5>
                                       </div>

                                       <hr class="hrforline">
                                       <div class="ar-btn-lrn">
                                         <?php the_course_button($allCourse); ?>
                                       </div>

                                     </div>
                                 <?php
                                    endforeach;
                                  endif;
                                  ?>

                               </div>
                             </div>
                           </div>






                           <?php
                            if ($singleCourseArray) :
                              foreach ($singleCourseArray as $OneCourse) :
                                setup_postdata($OneCourse);
                            ?>
                               <div class="ar-cntn-fll">
                                 <?php
                                  $imgbg = get_the_post_thumbnail_url($OneCourse);
                                  $imgLc = get_stylesheet_directory_uri() . '/assets/img/428x320.jpg';
                                  ?>
                                 <img src="<?php if ($imgbg) {
                                              echo $imgbg;
                                            } else {
                                              echo $imgLc;
                                            } ?>" class="ar-crs-img">

                                 <div class="ar-crs-dt">
                                   <h4 class="ar-crs-ttl">
                                     <b><?php echo get_the_title($OneCourse); ?></b>
                                   </h4>

                                   <div class="ar-crs-prgr">
                                     <?php
                                      $progress = bp_course_get_user_progress($user_id, $OneCourse);
                                      ?>
                                     <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd">
                                     </progress>
                                     <h5 class="ar-crs-cmplt"><b>
                                         <?php
                                          if (empty($progress)) {
                                            echo '0';
                                          } else {
                                            echo $progress;
                                          }
                                          ?> % </b> Complete</h5>
                                   </div>

                                   <h5 class="ar-crs-btmsub"><b>Last active:</b><?php
                                                                                //  $active = wplms_user_course_active_check($user_id,$OneCourse);
                                                                                //  var_dump($active);
                                                                                ?>
                                     Today</h5>
                                 </div>

                                 <hr class="hrforline">
                                 <div class="ar-btn-lrn">
                                   <?php the_course_button($OneCourse); ?>
                                 </div>
                               </div>
                           <?php
                              endforeach;
                            endif;
                            ?>




                         </div>
                       </div>


                       <div class="ar-crs-prgrs" style="margin-top: 30px;">
                         <div class="ar-crsr-ttl">Enrol In Similar Courses</div>
                         <?php


                          $cat_number = 1;
                          $all_course_obj = [];
                          $valCatID = array_unique($valCatID, SORT_STRING);
                          $num_of_cat = count($valCatID);
                          $ppp = floor(6 / $num_of_cat);
                          foreach ($valCatID as $cat) {
                            $related_args = '$related_args_' . $cat_number;

                            $related_args = array(
                              'post_type' => 'course',
                              'posts_per_page' => $ppp,
                              'post_status' => 'publish',
                              'post__not_in'      => $allCourseArray,
                              'orderby'   => 'meta_value_num',
                              'order' => 'DESC',
                              'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                  'taxonomy' => 'course-cat',
                                  'field' => 'slug',
                                  'terms' => $cat
                                )
                              ),
                              'meta_query' => array(
                                array(
                                  'key'     => 'vibe_students',
                                ),
                              )
                            );

                            $related_obj = '$related_' . $cat_number;
                            $related_obj = new WP_Query($related_args);
                            $all_course_obj[] = $related_obj;
                          }

                          $related = $all_course_obj;
                          ?>

                         <div class="mha_sliderClass">
                           <?php
                            // dd($related);
                            foreach ($related as $rel) {

                              if ($rel->have_posts()) :
                            ?>
                               <?php while ($rel->have_posts()) : $rel->the_post(); ?>
                                 <div>
                                   <div class="d-flex-simi">
                                     <?php
                                      if (has_post_thumbnail()) {
                                        the_post_thumbnail('', array('class' => 'ar-crs-img'));
                                      } else {
                                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/428x320.jpg" class="ar-crs-img">';
                                      }
                                      ?>
                                     <div class="ar-crs-dt">
                                       <h4 class="ar-crs-ttl"><?php //echo get_post_meta(get_the_ID(), 'vibe_students', true); 
                                                              ?>
                                         <b><?php the_title(); ?></b>
                                       </h4>
                                       <a href="<?php the_permalink(); ?>" class="ar-more-link">More Information <i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                     </div>
                                   </div>
                                 </div>
                               <?php endwhile; ?>

                           <?php
                              endif;
                              wp_reset_postdata();
                            }
                            ?>
                         </div>



                       </div>



                       <script type="text/javascript">
                         // jQuery(document).ready(function($) {
                         //   jQuery('.your-class').slick({
                         //     infinite: false,
                         //     slidesToShow: 3,
                         //     slidesToScroll: 1,
                         //     autoplay: false,
                         //     autoplaySpeed: 2000,
                         //     responsive: [{
                         //         breakpoint: 768,
                         //         settings: {
                         //           arrows: true,
                         //           centerMode: true,
                         //           centerPadding: '40px',
                         //           slidesToShow: 2
                         //         }
                         //       },
                         //       {
                         //         breakpoint: 480,
                         //         settings: {
                         //           arrows: true,
                         //           centerMode: true,
                         //           centerPadding: '40px',
                         //           slidesToShow: 1
                         //         }
                         //       }
                         //     ]
                         //   });
                         // });

                         //
                         jQuery(document).ready(function(jQuery) {
                           jQuery('.menu-list li a').click(function(e) {

                             jQuery('.menu-list li.activemenu').removeClass(
                               'activemenu');

                             var $parent = jQuery(this).parent();
                             $parent.addClass('activemenu');
                             e.preventDefault();
                           });
                         });
                       </script>


                       <div class="sec4">

                         <div class="box1">
                           <h3 class="sec3h1">Learning Statistics</h3>
                           <?php
                            $totalCourse = count($allCourseArray);
                            $activeCourses = ($continueCount + $startCount);
                            $completedCourses = ($completedCount + $evaluatedCount);
                            ?>

                           <div class="Statistics">

                             <div class="st1">

                               <div class="rowhead">
                                 <h4 class="tnme">0 Mins</h4>
                                 <h5 class="tsub">Your Total Time Learning</h5>
                               </div>

                               <div class="rowheadf">
                                 <h5 class="tsubp1">Course Completion Percentage</h5>
                                 <h5 class="tsubp"><?php echo round($completedCourses * 100 / $totalCourse, 2); ?>%</h5>
                               </div>

                               <div class="rowheadf">
                                 <a href="#" class="tsubp1">Courses Completed</a>
                                 <h5 class="tsubp">
                                   <?php
                                    echo $completedCourses;
                                    ?>
                                 </h5>
                               </div>

                               <div class="rowheadf">
                                 <a href="#" class="tsubp1">Courses In Progress</a>
                                 <h5 class="tsubp">
                                   <?php
                                    echo $activeCourses;
                                    ?>
                                 </h5>
                               </div>

                               <div class="rowheadf brdr">
                                 <a href="#" class="tsubp1">Total Courses</a>
                                 <h5 class="tsubp"><?php echo $totalCourse; ?></h5>
                               </div>

                             </div>

                             <div class="sttc-2nd">
                               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/statistics_empty.svg" class="sttcimg">
                               <h5 class="sttcsub">Your biggest competition is yourself! Track
                                 your study hours and watch your learning journey.</h5>
                             </div>

                           </div>
                         </div>


                         <div class="box2">
                           <h3 class="sec3h1">Medals {Beta}</h3>

                           <div class="modtop">
                             <div class="medels">

                               <div class="medsm">
                                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/medals-gold.svg" class="sec4p2-img">
                                 <div class="med2tt">
                                   <h4 class="modtnme">Gold</h4>
                                   <h5 class="modtsub">Learn 3 days in a week to earn Gold
                                   </h5>
                                 </div>
                               </div>

                               <div class="medsm">
                                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/medals-silver.svg" class="sec4p2-img">
                                 <div class="med2tt">
                                   <h4 class="modtnme">Gold</h4>
                                   <h5 class="modtsub">Learn 3 days in a week to earn Gold
                                   </h5>
                                 </div>
                               </div>

                               <div class="medsm">
                                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/medals-bronze.svg" class="sec4p2-img">
                                 <div class="med2tt">
                                   <h4 class="modtnme">Gold</h4>
                                   <h5 class="modtsub">Learn 3 days in a week to earn Gold
                                   </h5>
                                 </div>
                               </div>

                             </div>
                           </div>

                           <div class="modbottom">
                             <h3 class="sec3h2">Next Medal</h3>

                             <div class="medsm1 dis-mbile">
                               <div class="med3tt">
                                 <h4 class="mbtname">You are 1 day away from earning</h4>
                               </div>
                             </div>

                             <div class="medels2">

                               <div class="medsm1 dis-none-mbile">
                                 <div class="med3tt">
                                   <h4 class="mbtname">You are 1 day away from earning</h4>
                                 </div>
                               </div>

                               <div class="medsm2">
                                 <progress max="100" value="50" class="prog">

                                 </progress>
                               </div>

                               <div class="medsm3">
                                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/medals-bronze-mini.svg" class="miniimg">
                               </div>

                               <div class="medsm4">
                                 <div class="med2tt">
                                   <h4 class="modlatsnm">Bronze</h4>
                                 </div>
                               </div>

                             </div>

                           </div>

                           <div class="med-button">
                             <a href="#" class="fndcr">
                               Find Another Course
                             </a>
                           </div>

                         </div>

                       </div>

                     </div>
                   </div>
                 </div>



               </div>

               <!-- 2nd tab content end -->
               <div class="tab-pane fade" id="tab2default">

                 <div class="cards">

                   <div class="card-item">
                     <div class="card-badge">1</div>
                     <div class="card-body">

                       <div class="hdttl">Resume</div>
                       <img class="card-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/resume-builder-illustration.svg" alt="" />
                       <p class="card-text-n">Let employers know how skilled you are with our <b>free Resumé Builder!</b></p>
                       <a class="btncard" href="">Create Your Free Resumé</a>
                     </div>
                   </div>

                   <div class="card-item">
                     <div class="card-badge">1</div>
                     <div class="card-body">
                       <div class="hdttl prcolor">Workplace Personality Assessment</div>
                       <div class="uncardh">
                         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/top-careers.svg">
                         <p class="uhead">Top Career Paths</p>


                         <span class="brdrrght"></span>
                         <img class="brdrlft" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/self-improvement-courses.svg">
                         <p class="uhead">Top Self Improvement Courses</p>
                         <span class="brdrrght"></span>

                         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/top-strengths.svg">
                         <p class="uhead">Top 4 Strengths</p>
                       </div>
                       <p class="card-text-n"><b>Preferred by 80% employers,</b> take our Workplace
                         Personality Assessment to discover who you truly are</p>
                       <a class="btncard prcolorh" href="">Start Your Free Assessment</a>
                     </div>
                   </div>

                   <div class="card-item">
                     <div class="card-badge">1</div>
                     <div class="card-body">
                       <div class="hdttl blcolor">Mental Wellbeing Check-Up</div>
                       <img class="card-img blcolor" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/welliba-illustration.webp" alt="" />
                       <p class="card-text-n"><b>Measure your emotional and physical wellbeing</b> by answering a set of questions</p>
                       <a class="btncard blcolorh" href="">Assess Your Mental Wellbeing</a>
                     </div>
                   </div>
                 </div>

                 <div class="panel-body">
                   <div class="tab-content">
                     <div class="tab-pane fade in active" id="tab1default">

                       <div class="tab1-full">
                         <h2 class="tab1h">Get Personalised Course & Career Recommendations!</h2>
                         <div class="tab1sub">
                           <p>Tell us what your learning goals and career objectives are, and we
                             will recommend the best courses for you to enrol in. </p>
                         </div>
                         <a href="" class="btn tab1btn">Get Recommendations</a>
                       </div>

                     </div>
                   </div>
                 </div>
               </div>

               <!-- 3rd tab content end -->
               <div class="tab-pane fade" id="tab3default">
                 <div class="nav3-hbadge">1</div>
                 <div class="panel-body">
                   <div class="tab-content">
                     <div class="tab-pane fade in active" id="tab3default">

                       <div class="tab3-full bgcolr">
                         <div class="imglft3" style="display:block;">
                           <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/earn-banner-illustration-left (1).svg">
                         </div>
                         <div class="midd3">
                           <h2 class="tab3h">Learn, Share And Earn!</h2>
                           <h2 class="tab3sub">Join The Skillwise Affiliate Programme</h2>
                           <div class="tab1sub">
                             <p>By becoming an Skillwise Affiliate
                               Programme Member, you can earn income
                               for yourself AND help empower others by
                               introducing them to free learning and the
                               other services we provide.</p>
                           </div>
                           <button class="btn tab3btn">Become An Affiliate Member</button>
                         </div>
                         <div class="imgrght3" style="display:block;">
                           <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/earn-banner-illustration-right.svg">
                         </div>
                       </div>

                     </div>
                   </div>
                 </div>

                 <h2 class="tab1h2" id="tab3default">Attend Skillwise’s <b>Free Webinar</b> on the <b>Affiliate Programme</b></h2>

                 <div class="carditemlast">

                   <div class="cardbodylast">
                     <div class="lastheader">
                       <div class="titllast3">Introducing The Skillwise Affiliate Programme</div>
                       <div class="badgelast3">FREE</div>
                     </div>

                     <div class="middleheader">

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calendar.svg">
                         </div>
                         <div class="datewla">November 24</div>
                       </div>

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Time.svg">
                         </div>
                         <div class="timewla">21:00 (GMT+6)</div>
                       </div>

                     </div>

                     <p class="card-text-n">Speak directly with an Affiliate representative to learn more
                       about earning an income while empowering millions around the world.</p>

                     <div class="prflpost">

                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/0fZUSA3dMREmeGJLhVQS1648478387.png" class="ppostimg">

                       <div class="ppost">
                         <h4 class="ppostttl">Mustafa Ali Khan</h4>
                         <h5 class="ppostsub">Speaker</h5>
                       </div>

                     </div>
                     <a class="btncard rgrcolor" href="#">Register Now</a>
                   </div>

                   <div class="cardbodylast">
                     <div class="lastheader">
                       <div class="titllast3">Introducing The Skillwise Affiliate Programme</div>
                       <div class="badgelast3">FREE</div>
                     </div>

                     <div class="middleheader">

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calendar.svg">
                         </div>
                         <div class="datewla">November 24</div>
                       </div>

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Time.svg">
                         </div>
                         <div class="timewla">21:00 (GMT+6)</div>
                       </div>

                     </div>

                     <p class="card-text-n">Speak directly with an Affiliate representative to learn more
                       about earning an income while empowering millions around the world.</p>

                     <div class="prflpost">

                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/0fZUSA3dMREmeGJLhVQS1648478387.png" class="ppostimg">

                       <div class="ppost">
                         <h4 class="ppostttl">Mustafa Ali Khan</h4>
                         <h5 class="ppostsub">Speaker</h5>
                       </div>

                     </div>
                     <a class="btncard rgrcolor" href="#">Register Now</a>
                   </div>

                   <div class="cardbodylast">
                     <div class="lastheader">
                       <div class="titllast3">Introducing The Skillwise Affiliate Programme</div>
                       <div class="badgelast3">FREE</div>
                     </div>

                     <div class="middleheader">

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/calendar.svg">
                         </div>
                         <div class="datewla">November 24</div>
                       </div>

                       <div class="onem">
                         <div class="iclast3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Time.svg">
                         </div>
                         <div class="timewla">21:00 (GMT+6)</div>
                       </div>

                     </div>

                     <p class="card-text-n">Speak directly with an Affiliate representative to learn more
                       about earning an income while empowering millions around the world.</p>

                     <div class="prflpost">

                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/0fZUSA3dMREmeGJLhVQS1648478387.png" class="ppostimg">

                       <div class="ppost">
                         <h4 class="ppostttl">Mustafa Ali Khan</h4>
                         <h5 class="ppostsub">Speaker</h5>
                       </div>

                     </div>
                     <a class="btncard rgrcolor" href="#">Register Now</a>
                   </div>


                 </div>

               </div>
             </div>
           </div>


         </div>

         <div class="tab-pane" id="premium">
           <div class="ar-banner-cmn">
             <div class="titandtx">
               <h1 class="bn-title">Upgrade to Premium</h1>
             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>
         </div>

         <div class="tab-pane" id="certificates">
           <div class="ar-banner-cmn">
             <div class="titandtx">
               <h1 class="bn-title">My Certificates</h1>
             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>
           <div class="container">

             <?php $userCertificates = bp_course_get_user_certificates($user_id); ?>

             <div class="row">
               <table class="table certifct-btm" id="desktopCerts">
                 <thead>
                   <tr>
                     <th scope="col">Course</th>
                     <th scope="col">Recieved Date</th>
                     <th scope="col">Status</th>
                     <th scope="col">View Certificate</th>
                   </tr>
                 </thead>

                 <?php
                  foreach ($userCertificates as $courseIdCertificate) {
                    //$certInfo = get_post_meta($courseIdCertificate, 'vibe_certificate_template', true);
                    $courseCertLink = bp_get_course_certificate(array('course_id' => $courseIdCertificate, 'user_id' => get_current_user_id()));

                    //$hasInfoCertificate = get_post_meta($certInfo);
                    // echo '<pre>';
                    // var_dump($hasInfoCertificate);
                    // echo '</pre>';

                    //$date = bp_get_course_certificate_date( 179, $user_id );
                    // var_dump($date);


                    //echo do_shortcode('[certificate_student_date]');
                  ?>
                   <tbody>
                     <th scope="col"><?php echo get_the_title($courseIdCertificate); ?></th>
                     <th scope="col">12-12-22</th>
                     <th scope="col">Achieved</th>
                     <th scope="col"><a target="_blank" href="<?php echo $courseCertLink; ?>">Click here</a></th>
                   </tbody>
                 <?php

                  }
                  ?>
               </table>
               <hr>

               <table class="table certifct-btm" id="desktopCerts">
                 <thead>
                   <tr>
                     <th scope="col">Course</th>
                     <th scope="col">Date Recieved</th>
                     <th scope="col">Status</th>
                     <th scope="col">Order Now</th>
                   </tr>
                 </thead>



                 <?php

                  $pendingCertificates = array_diff($allCourseArray, $userCertificates);
                  if ($pendingCertificates) {
                    foreach ($pendingCertificates as $courseIdCertificateExtra) {

                  ?>
                     <tbody>
                       <th scope="col"><?php echo get_the_title($courseIdCertificateExtra); ?></th>
                       <th scope="col">13-12-2022</th>
                       <th scope="col">Pending</th>
                       <th scope="col"><a target="_blank" href="#">Click here</a></th>
                     </tbody>
                 <?php
                    }
                  } else {
                    echo '<tbody>';
                    echo '<th>No pending certificate</th>';
                    echo '</tbody>';
                  }

                  ?>
               </table>
             </div>

             <div class="get_certificates">
               <div class="tab1-full">
                 <h2 class="tab1h">Get Personalised Certifications & Career Bost!</h2>
                 <div class="tab1sub">
                   <p>Tell us what your learning goals and career objectives are, and we will recommend the
                     best courses for you to enrol in. </p>
                 </div>
                 <a href="#" class="btn tab1btn">Get Certifications</a>
               </div>
             </div>
           </div>
         </div>

         <div class="tab-pane" id="settings">

           <div class="ar-banner-cmn">
             <div class="titandtx">
               <h1 class="bn-title">Profile Settings</h1>
             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>






           <div class="container mha_settings_panel">
             <?php do_action('bp_template_content'); ?>

             <form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/general'; ?>" method="post" class="standard-form" id="settings-form">

               <?php if (!is_super_admin()) : ?>
                 <div class="first_settings1">
                   <label for="pwd"><?php _e('Current Password <span>(required to update email or change current password)</span>', 'vibe'); ?></label>
                   <input type="password" name="pwd" id="pwd" size="16" value="" class="settings-input small" /> &nbsp;<a href="<?php echo wp_lostpassword_url(); ?>" title="<?php _e('Password Lost and Found', 'vibe'); ?>"><?php _e('Lost your password?', 'vibe'); ?></a>
                 </div>
               <?php endif; ?>
               <div class="first_settings2">
                 <label for="email"><?php _e('Account Email', 'vibe'); ?></label>
                 <input type="text" name="email" id="email" value="<?php echo bp_get_displayed_user_email(); ?>" class="settings-input" />
               </div>
               <div class="first_settings3">
                 <label for="pass1"><?php _e('Change Password <span>(leave blank for no change)</span>', 'vibe'); ?></label>
                 <input type="password" name="pass1" id="pass1" size="16" value="" class="settings-input small" /> &nbsp;<?php _e('New Password', 'vibe'); ?><br />
                 <input type="password" name="pass2" id="pass2" size="16" value="" class="settings-input small" /> &nbsp;<?php _e('Repeat New Password', 'vibe'); ?>
               </div>
               <?php do_action('bp_core_general_settings_before_submit'); ?>

               <div class="submit">
                 <input type="submit" name="submit" value="<?php _e('Save Changes', 'vibe'); ?>" id="submit" class="auto" />
               </div>

               <?php do_action('bp_core_general_settings_after_submit'); ?>

               <?php wp_nonce_field('bp_settings_general'); ?>

             </form>
             <div class="settings_box_others row">
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/premium.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Premium</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Go Premium</a>
                 </div>
               </div>
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/learner-record.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Learner Record</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Download</a>
                 </div>
               </div>
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/referrals.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Referrals</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Referral a Friend</a>
                 </div>
               </div>
             </div>
             <div class="settings_box_others row">
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/premium.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Premium</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Go Premium</a>
                 </div>
               </div>
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/learner-record.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Learner Record</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Download</a>
                 </div>
               </div>
               <div class="col-md-4 settings_own">
                 <div class="settings_own_img">
                   <img src="https://alison.com/html/site/img/profile/referrals.png" alt="">
                 </div>
                 <div class="settings_own_content">
                   <h2>Referrals</h2>
                   <p>Upgrade to Premium</p>
                   <a href="#" class="btn_for_settings">Referral a Friend</a>
                 </div>
               </div>
             </div>
             <br>
             <br>

           </div>

         </div>

         <div class="tab-pane" id="support">
           <div class="ar-banner-cmn">
             <div class="titandtx">
               <h1 class="bn-title">Helpline Corner</h1>
             </div>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dashboard-top-right-img.svg" class="imgclass" alt="">
           </div>
           <div class="container">
             <div class="row">
               <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>
             </div>
           </div>
         </div>


       </div>
     </div>

   </div>


 <?php } else {
    echo '<h1>this is from else </h1>';
  ?>

   <?php
    $header_style =  vibe_get_customizer('header_style');
    if ($header_style == 'transparent' || $header_style == 'generic') {
      echo '<section id="title">';
      do_action('wplms_before_title');
      echo '</section>';
    }
    ?>

   <section id="content">
     <div id="buddypress">
       <div class="<?php echo vibe_get_container(); ?>">
         <div class="row">
           <div class="col-md-3 col-sm-4">
             <?php do_action('bp_before_member_home_content'); ?>
             <div class="pagetitle">
               <div id="item-header" class="<?php
                                            $image = bp_attachments_get_user_has_cover_image();
                                            echo (empty($image) ? '' : 'cover_image') ?>" role="complementary">
                 <?php locate_template(array('members/single/member-header.php'), true); ?>

               </div><!-- #item-header -->
             </div>
             <div id="item-nav" class="">
               <div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
                 <ul>

                   <?php bp_get_displayed_user_nav(); ?>

                   <?php do_action('bp_member_options_nav'); ?>

                 </ul>
               </div>
             </div><!-- #item-nav -->
           </div>

           <div class="col-md-9 col-sm-8 box" style="position: relative;">
             <div class="padder box-body">


             <?php } ?>