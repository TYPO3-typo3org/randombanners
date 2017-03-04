$(document).ready(function() {
    $('.tx-randombanners').randomize();
    $('.tx-randombanners a').on('click', function(){
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data:  {
                'eID': 'randombanners',
                'banner': $(this).attr('data-uid')
            },
            success: function() {
                return true;
            }
        });
    });
});

/**
 * Rearrange child elements in random order
 *
 * @see http://jsfiddle.net/C6LPY/2/
 */
(function($) {
    $.fn.randomize = function() {
        return this.each(function() {
            var parent = $(this);
            var children = parent.children();
            while(children.length) {
                parent.append(children.splice(Math.floor(Math.random() * children.length), 1)[0]);
            }
        });
    }
})(jQuery);