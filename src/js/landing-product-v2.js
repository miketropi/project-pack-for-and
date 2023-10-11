;((w, $) => {
  'use strict';

  class LandingProductV2 {

    constructor($element) {
      this.$container = $element;
    }
  
    loadMore() {
      const self = this;
      this.$container.on('click', '.btn-loadmore', function() {
        const $btn = $(this);
        console.log($btn);
      })
    }
  }

  $(() => {
    $('.landing-product-v2').each(function() {
      new LandingProductV2($(this));
    })
  })

})(window, jQuery);