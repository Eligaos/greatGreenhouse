$(document).ready(function(){
    $('[data-title]').tooltip({
      placement: 'top auto',
      trigger: 'manual'
    });
    
    $('input').on('change', function(){
        var hasValue = $(this).val();
        var $div = $(this).closest('div.input-group');
                
        if(hasValue){
            $(this).one('hidden.bs.tooltip', function(){
                $div.removeClass('has-error');
            });
        } else {
            $div.addClass('has-error');
        }
        
        $(this).tooltip(hasValue ? 'hide' : 'show');
    });
    
    window.setTimeout(function(){
        $('input').trigger('change');
    }, 1000);
});
