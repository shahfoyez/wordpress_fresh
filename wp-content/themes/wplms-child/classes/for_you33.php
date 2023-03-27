<?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/Format.php');
?>
<?php
class ForYou {
    private $fm;
    public function __construct() {
        global $wpdb;
        $this->fm=new Format();
        // wp_for_you
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
        var_dump($userSubmit);
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
        if($insert){
            $msg="<span class='foy-success'>Successful! Your form has been submitted successfully</span>";
            var_dump($_SERVER['HTTP_REFERER']);
            // echo "<script>window.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
            echo "<script>window.location='".$_SERVER['HTTP_REFERER']."?msg=".$msg."'</script>";
			// return $msg;
        }else{
            $msg="<span class='foy-error'>There is some error!</span>";
			return $msg;
        }
     }
     public function userRecommendedCourse($dataSubmitted) {
        global $wpdb;
        $table_name = 'wp_for_you';
        $courseCats = $dataSubmitted->course_cats;
        $cats = explode(",",$courseCats);

        $subCats = $dataSubmitted->sub_cats;
        $subs = explode(",",$subCats);
        // echo '<pre>';
        // var_dump($cats);
        // echo '</pre>';


        // check if user already submitted the data
        $args = array(
            'post_type' => 'course',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'course-cat',
                    'field'    => 'term_id',
                    'terms'    => $cats,
                ),
                array(
                    'taxonomy' => 'course-cat',
                    'field'    => 'term_id',
                    'terms'    => $subs,
                ),
            ),
        );
        $courses = get_posts( $args );
        
        echo '<pre>';
        dd($courses);
        echo '</pre>';
    }

}