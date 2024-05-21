$('.show-replies-btn').click(function() {
   $(this).addClass('d-none'); 
    $(this).parent().find('.hide-replies-btn').removeClass('d-none');
$(this).parent().find('.replies').removeClass('d-none');
})

$('.hide-replies-btn').click(function() {
    $(this).addClass('d-none');
   $(this).parent().find('.replies').addClass('d-none');
   
    $(this).parent().find('.show-replies-btn').removeClass('d-none');
})
