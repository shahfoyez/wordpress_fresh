<?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/Format.php');
?>
<?php
class ForYou {
    private $fm;
    public function __construct() {
        $this->fm=new Format();
    }
    public function getUserSubmit($userId) {
        global $wpdb;
        $table_name = 'wp_for_you';
        $userId =$this->fm->validation($userId);
        // check if user already submitted the data
        $userSubmit = $wpdb->get_results($wpdb->prepare("
            SELECT * 
            FROM wp_for_you
            WHERE user_id = %d", 
            $userId
        ) );
       return $userSubmit;
    }

    public function insert($data, $userId) {
        global $wpdb;
        $table_name = 'wp_for_you';
        $userId =$this->fm->validation($userId);
        
        // check if user already submitted the data
        $userSubmit = $this->getUserSubmit($userId);

        if($userSubmit){
            $msg="<span class='foy-error'>You form has already submitted.</span>";
			return $msg;
        }
        // main goal
        $mainGoal =$this->fm->validation($data['main-goal']);
        //course cats
        $courseCats = $data['course_cat'];
        $courseCats = implode(',',$courseCats);
        // sub cats
        $subCategories = '';
        $subCatStr = '';
        for($i=0; $i<3; $i++){
            $subCats = $data['course-sub-cat-'.$i];
            foreach($subCats as $subCat ){
                $subCategories = implode(',',$subCats);
            }
            $subCatStr = $subCatStr.','.$subCategories;
        }
        $subCatStr = ltrim($subCatStr, ",");
        // career cats
        $careerCats = $data['career-cat'];
        $careerCats = implode(',',$careerCats);
        // career stage
        $careerStage =$this->fm->validation($data['career-stage']);
        if($mainGoal =="" || $courseCats =="" || $subCatStr =="" || $careerCats =="" || $careerStage =="" || $userId =="" ){
            $msg="<span class='foy-error'>There is some error!</span>";
			return $msg;
        }
        // Insert query
        $insertData = array(
            'main_goal' => $mainGoal,
            'course_cats' => $courseCats,
            'sub_cats' =>  $subCatStr,
            'career_cats' => $careerCats,
            'career_stage' => $careerStage,
            'user_id' => $userId
        );
        $insert = $wpdb->insert($table_name, $insertData);
        // redirect to avoid resubmitting form data on refresh
        if($insert){   
            $msg = 1;
        }else{
            $msg = 0;
        }
        echo "<script>window.location = '?recommendation=".$msg."';</script>";
     }
     // get the recommended courses
     public function userRecommendedCourses($dataSubmitted) {
        global $wpdb;
        $courseCats = $dataSubmitted->course_cats;
        // $cats = explode(",",$courseCats);
        $subCats = $dataSubmitted->sub_cats;
        // $subs = explode(",",$subCats);

        $courses = $wpdb->get_results(
            $wpdb->prepare("
                SELECT *, t.name as parent_name
                FROM wp_posts p
                INNER JOIN wp_term_relationships tr ON (p.ID = tr.object_id)
                INNER JOIN wp_term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
                INNER JOIN wp_terms t ON (tt.term_id = t.term_id)
                WHERE p.post_type = 'course'
                AND p.post_status = 'publish'
                AND tt.taxonomy = 'course-cat'
                AND (tt.parent IN ($courseCats) AND tt.term_id IN ($subCats))
                ORDER BY tt.parent DESC
            ")
        );

        $catCourse = [];
        if ( $courses ) {
            $curParent = '';
            $oldParent = '';
            $curPostId = '';
            $oldPostId = '';
            
            foreach ( $courses as $course ) {
                // get the parent name 
                $curParent = get_term( $course->parent, 'course-cat' )->name;
                $curPostId = $course->ID;
                // check if the parent is different
                if($curParent != $oldParent){
                    // check if category key already exists
                    if (!array_key_exists($curParent, $catCourse)) {
                        // create an empty array with category as key
                        $catCourse[$curParent] = array();
                    }  
                    $oldParent = get_term( $course->parent, 'course-cat' )->name;
                }
                // check if current category already has same course
                $filtered = array_filter($catCourse[$curParent], function($post) use($curPostId ){
                    return $post->ID == $curPostId;
                });
                if(!count($filtered)>0){
                    array_push($catCourse[$curParent], $course);
                } 
            }
            return $catCourse;
        } else {
            return $catCourse;
        }
    }
    public function resetForm($userId){
        global $wpdb;
        $query = $wpdb->prepare( "
            DELETE 
            FROM wp_for_you 
            WHERE user_id = %d", 
            $userId
        );
        $result = $wpdb->query($query);

        if($result === false) {
            $msg= 2;
        } elseif($result === 0) {
            $msg= 0;
        } else {
            $msg= 1;
        }
        echo "<script>window.location = '?reset=".$msg."';</script>";


    }
}