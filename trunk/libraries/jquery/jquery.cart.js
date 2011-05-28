$(document).ready(function(){
    // for add item to cart
    $('[rel=addToCart]').click(function(){
        var $this = $(this);
        flyToCart($this);
        return false;
    });
    // event drag - drop
    $('[rel=addToCart] img').draggable({
        containment: 'document',
        opacity: 0.6,
        revert: 'invalid',
        helper: 'clone',
        zIndex: 100
    });

    // fly to cart when user click to product item
    function flyToCart ($this, fn)
    {
        var itemImgObj  = $this.children('img'),
            cartOffsetX = $('#shopping_cart').offset().left - itemImgObj.offset().left + 3, // offset top of cart
            cartOffsetY = $('#shopping_cart').offset().top - itemImgObj.offset().top; // offset top of cart

        $this.prepend('<img src="' + itemImgObj.attr('src') + '" id="itemFly" />');
        $('#itemFly')
            .css({'position' : 'absolute', zIndex: '999999'})
            .animate({opacity: 0.6}, 100 )
            .animate({
                opacity: 0.1,
                marginLeft: cartOffsetX,
                marginTop: cartOffsetY,
                width: $('#shopping_cart').width(),
                height: $('#shopping_cart').height()
            }, 1200, function(){
                $(this).remove();
                if(typeof fn == 'function') { fn(); } // if fn is the function, then calling it
            });
        ;
    }

});