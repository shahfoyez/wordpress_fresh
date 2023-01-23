<div class="searchform">
    <form id="search" action="">
        <input type="hidden" name="post_type" value="course">
        <input type="text" class="s" id="ss" name="s" placeholder="Search over 3000+ courses..." value="" autocomplete="off" onkeyup="foyFunction()">
        <div id="foy-loading" class="spinner-border" role="status">
            <img src="https://project12.wpengine.com/wp-content/uploads/2023/01/1494.gif">
        </div>
        <button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
            
    </form>
    <div class="foy-suggestion-box" id="foy-suggestion-box">
        <!-- course suggestion -->
    </div>
</div>
<script type="text/javascript">
function foyFunction(){
    jQuery('#foy-loading').css( 'display', 'block' );
    var keyword = jQuery('#ss').val();
    if(keyword.length < 3){
        jQuery('#foy-suggestion-box').html("");
        jQuery('#foy-suggestion-box').css( 'display', 'none' );
        jQuery('#foy-loading').css( 'display', 'none' );
    } else {
        jQuery.ajax({
            url: ajaxurl,
            type: 'get',
            data: { 
                action: 'data_fetch', 
                keyword: keyword  
            },
            success: function(data) { 
                jQuery('#foy-suggestion-box').html( data );
                jQuery('#foy-suggestion-box').css( 'display', 'block' );
                jQuery('#foy-loading').css( 'display', 'none' );
            }          
        });
    }
}
</script>
<style>
	.makingTheAlilikeSearchForm .searchform input#s {
    border: none;
     
}

.makingTheAlilikeSearchForm .searchform {
    max-width: 700px;
    margin: 0 auto;
}
#ss {
    padding: 20px 20px 20px 20px;
    border-radius: 50%;
    border: 1px solid rgba(0,0,0,.08);
    color: #888;
    width: 100%;
    margin: 0px;
}
i.fa.fa-search {
    color: #000000;
    font-size: 20px;
    border: none !important;
}
button.sbtn {
    border: none;
    background: #ffffff;
}
form#search {
    display: flex;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: baseline;
    align-content: center;
    border: 1px solid #d5d5d5;
    border-radius: 50px;
    margin: 8px 5px;
    padding: 5px 10px;
}

.foy-suggestion-box {
    background: #ffffff;
    width: 100%;
    padding: 15px;
    border-radius: 8px;
    box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
    display: none;
}
.foy-course-list img {
    height: 45px;
    width: 60px;
    border-radius: 3px;
    margin-right: 5px;
}
.foy-suggestion-box hr{
    margin-top: 10px !important;
    margin-bottom: 10px !important;
}
.foy-suggestion-box hr:last-child {
    display: none;
}
#foy-loading{ 
    display: none;
}
#foy-loading img {
    height: 40px;
    width: 40px;
}
.foy-suggestion-box h3 {
    margin: 0px;
    font-size: 12px;
}
.foy-course-list {
    align-items: center;
    display: flex;
    justify-content: start;
}

</style>
 