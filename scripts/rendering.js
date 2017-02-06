$(document).ready(
  function()
  {
    //Binding resizable items
    $(".resizable-scale").parents(".card").resize( function()
      {
        var $parent = $(this);
        var $elem = $parent.find(".resizable-scale");
        
        var initSize = $elem.data("init-size");
        $elem.css({
          '-webkit-transform' : 'scale(' + initSize / 140 + ')',
          '-moz-transform'    : 'scale(' + initSize / 140 + ')',
          '-ms-transform'     : 'scale(' + initSize / 140 + ')',
          '-o-transform'      : 'scale(' + initSize / 140 + ')',
          'transform'         : 'scale(' + initSize / 140 + ')'
        });
    });
  }
);
