$('document').ready(function() {
  $(window).scroll(function() {
    if ($(window).scrollTop() > 10) {
        $('#navBar').addClass('floatingNav');
    } else {
        $('#navBar').removeClass('floatingNav');
    }
});
    /**
     * Product toggle
     */
    
    $('#makanan').click(function(){
      $('#fmakanan').removeClass("d-none");
      $('#fminuman').addClass("d-none");
      $('#fkerajinan').addClass("d-none");
    });
    $('#minuman').click(function(){
      $('#fmakanan').addClass("d-none");
      $('#fminuman').removeClass("d-none");
      $('#fkerajinan').addClass("d-none");
    });
    $('#kerajinan').click(function(){
      $('#fmakanan').addClass("d-none");
      $('#fminuman').addClass("d-none");
      $('#fkerajinan').removeClass("d-none");
    });
    
    
    /**
     * search toggle
     */
  
    const $searchContainer = $("[data-search-wrapper]");
    const $searchBtn = $("[data-search-btn]");
  
    $searchBtn.click(function() {
      $searchContainer.toggleClass("active");
      
    });
  
  
    /**
     * whishlist & cart toggle
     */
  
    const $panelBtns = $("[data-panel-btn]");
    const $sidePanels = $("[data-side-panel]");
  
    $panelBtns.click(function() {
      const clickedElemDataValue = $(this).data("panel-btn");
  
      $sidePanels.each(function() {
        if (clickedElemDataValue === $(this).data("side-panel")) {
          $(this).toggleClass("active");
        } else {
          $(this).removeClass("active");
        }
      });
    });
  
  
    /**
     * back to top
     */
  
    const $backTopBtn = $("[data-back-top-btn]");
  
    $(window).scroll(function() {
      $(window).scrollTop() >= 100 ? $backTopBtn.addClass("active")
        : $backTopBtn.removeClass("active");
    });
  
  
    /**
     * product details page
     */
  
    const $productDisplay = $("[data-product-display]");
    const $productThumbnails = $("[data-product-thumbnail]");
  
    $productThumbnails.click(function() {
      $productDisplay.attr("src", $(this).attr("src"));
      $productDisplay.addClass("fade-anim");
  
      setTimeout(function() {
        $productDisplay.removeClass("fade-anim");
      }, 250);
    });

    
  });
  