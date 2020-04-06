


<div id="app">
    <span v-text="msg"></span>
</div>

<script type="text/javascript">
    jQuery('form').submit(function(e){
        e.preventDefault();
        var vm = jQuery(this);
        vm.find('input[type="submit"]').removeClass('button-primary');
        jQuery.ajax({
            data : vm.serialize(),
            type : 'post',
            url  : 'options.php',
        }).done(function(data){
            vm.find('input[type="submit"]').addClass('button-primary');
        }).fail(function(){
            alert('fail')
        })
    })
</script>