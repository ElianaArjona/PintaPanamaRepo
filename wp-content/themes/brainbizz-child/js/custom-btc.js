jQuery(function($) {
    var qsRegex;
    var filters;

   



        var grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
            getSortData:{
                number: '.number parseInt'
            },
            sortBy: ['number'],
            sortAscending: true,
            filter: function(){
                var $this = $(this);
                var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
                var inputResult = filters ? $this.is( filters ) : true;
                console.log(searchResult);
                return searchResult && inputResult;
            }
        });
        $("#practices, #titles").change(function(){
            var practicesFilter;
            var titlesFilter;
            
            console.log(practicesFilter);
            if(practicesFilter != '*' || titlesFilter != '*'){
                practicesFilter =  ($("#practices").val() == "*") ? "":`.${$("#practices").val()}`;
                titlesFilter =  ($("#titles").val() == "*") ? "":`.${$("#titles").val()}`;                
                filters = `${practicesFilter}${titlesFilter}`;
                // console.log(`${practicesFilter}${titlesFilter}`);
                console.log(filters);
                grid.isotope();
            }else{
                grid.isotope({filter: '*'});
            }
        });
        var quicksearch = $(".btc_search").keyup(debounce(function(){
            var quicksearch = $(".btc_search").val();
            console.log(quicksearch);
            qsRegex = new RegExp(quicksearch, 'gi' );
            grid.isotope();
        },200));
        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
              clearTimeout( timeout );
              var args = arguments;
              var _this = this;
              function delayed() {
                fn.apply( _this, args );
              }
              timeout = setTimeout( delayed, threshold );
            };
          }
        
        // $("#partido_tag, #provincia_tag,#circuito_tag, #year_tag").change(function(){
        //   if($("#partido_tag").val() != '*' || $('#provincia_tag').val() != '*' || $('#circuito_tag').val() != '*'){
        //     var filterPartido = ($("#partido_tag").val() == "*") ? "":`.${$("#partido_tag").val()}`;
        //     var filterProvincia = ($("#provincia_tag").val() == "*") ? "": `.${$("#provincia_tag").val()}`;
        //     var filterCircuito = ($("#circuito_tag").val() == "") ? "*": `.${$("#circuito_tag").val()}`;
        //     // console.log(`${filterPartido}${filterProvincia}`);
        //     console.log(filterCircuito);
        //     grid.isotope({filter: `${filterPartido}${filterProvincia}${filterCircuito}`});
        //   }else{
        //     grid.isotope({filter: '*'});
        //   }
        // });
  
  
        // var $quicksearch = $("#circuito_tag").keyup(debounce(function(){
        //   // var searcBar = ($(this).val() == '')? '*':`.${$(this).val()}`;
        //   if($(this).val() != ''){
        //     qsRegex = new RegExp( "^\\s*\\b("+$quicksearch.val()+")", 'gi' );
        //     grid.isotope();
        //   }else{
        //     grid.isotope({filter: '*'});
        //   }
        // }));
  
        // debounce so filtering doesn't happen every millisecond
        // function debounce( fn, threshold ) {
        //   var timeout;
        //   return function debounced() {
        //     if ( timeout ) {
        //       clearTimeout( timeout );
        //     }
        //     function delayed() {
        //       fn();
        //       timeout = null;
        //     }
        //     setTimeout( delayed, threshold || 100 );
        //   };
        // }
  });