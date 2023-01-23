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
    var keyword = jQuery('#s').val();
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
 