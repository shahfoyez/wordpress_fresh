<?php

if (!defined('ABSPATH')) { exit; }

class WPLMS_Assignments_FrontEnd{

    public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_Assignments_FrontEnd();

        return self::$instance;
    }

    public function __construct(){ 
        add_filter('wplms_course_creation_tabs',array($this,'add_assignment_creation'));
        add_action('wplms_course_curriculum_front_end_generator',array($this,'assignment_block'));

        add_action('wp_footer',array($this,'assignment_front_end_script'));
        
    }

    function add_assignment_creation($tabs){

        if(!empty($tabs['course_curriculum']['fields'])){
            $tabs['course_curriculum']['fields'][0]['buttons']['add_course_assignment']=__('ADD ASSIGNMENT','wplms-assignments' );    
        }

       
        return $tabs;
    }

    function assignment_block(){
        ?>
        <li class="new_assignment hide new_unit">
            <div class="add_cpt">
                <div class="col-md-6">
                    <a class="more"><i class="icon-users"></i> <?php _e('Select existing assignment','wplms-assignments' ); ?></a>
                    <div class="select_existing_cpt">
                        <select data-cpt="wplms-assignment" data-placeholder="<?php _e('Search an assignment','wplms-assignments' ); ?>">
                        </select>
                        <a class="use_selected_curriculum button"><?php _e('Set Assignment','wplms-assignments' ); ?></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a class="more"><i class="icon-user"></i> <?php _e('Create new assignment','wplms-assignments' ); ?></a>
                    <div class="new_cpt">
                        <input type="text" class="form_field vibe_curriculum_title" name="name" placeholder="<?php _e('Assignment title','wplms-assignments' ); ?>">
                        <input type="hidden" class="vibe_cpt" value="wplms-assignment" />
                        <a class="button small create_new_curriculum"><?php _e('Create Assignment','wplms-assignments' ); ?></a>
                    </div>
                </div>
            </div>
            <a class="rem"><i class="icon-x"></i></a> 
        </li>
        <?php
    }

    function assignment_front_end_script(){
        ?>
        <script>
            jQuery('document').ready(function ($){
                $('#add_course_assignment').on('click',function(event){
                    var clone = $('.new_assignment').clone().attr('id','id'+Math.floor(Math.random()*100));
                    clone.removeClass('hide');
                    clone.addClass('new_unit');
                    clone.find('.select_existing_cpt select').addClass('selectcurriculumcpt');
                    clone.find('input[name="name"]').attr('name','name'+Math.floor(Math.random()*100));
                    $('ul.curriculum').append(clone);
                    $('#course_curriculum').trigger('add_section');
                    return false;
                });
                $('#course_curriculum').on('active',function (){
                    $('select.chosen[multiple]').select2();
                });
            });
        </script>
        <style>
        li.new_assignment {
            display: inline-block;
            width: 100%;
            margin: 30px;
            position: relative;
        }
        li.new_assignment a.rem {position:absolute;top:0;right:0;}
        </style>
        <?php
    }
}

WPLMS_Assignments_FrontEnd::init();