jQuery(function($){
   
  var   $container = $('#container'),
        filter = $('.post-categories.filter span').click(function(){
            var $this = $(this);
            filter.removeClass('active');
            $this.addClass('active');
           $container.isotope({filter: $this.data('target')}); 
           return false;
        })
    ;
    filter.first().addClass('active');
  
 
    $container.isotope({
        masonry: {
        columnWidth: 354,
        columnHeight: 260,
        isAnimated: true,
		isResizable: true,
        gutter: 10
      }
    });	
    
    
    
});