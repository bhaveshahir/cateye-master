    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- http://www.daterangepicker.com/#examples -->
     <?php 
        if ($_SERVER['HTTP_HOST'] == '23.89.193.244'){
            define('DYNAMIC_URL', '/~cateyedashboard');
        }   
        else {
            define('DYNAMIC_URL', '');
        }
        
    ?>

    <script type="text/javascript" src="http://23.89.193.244/~cateyedashboard/js/moment.min.js"></script>
    <script type="text/javascript" src="http://23.89.193.244/~cateyedashboard/js/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
            var start = moment().subtract(30, 'minutes');
            var end = moment();
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));                
            }
            $('#reportrange').daterangepicker({
                opens: 'left',
                startDate: start,
                endDate: end,
                timePicker: true,
                ranges: {
                    'Last 30 minutes': [moment().subtract(30, 'minutes'), moment(), $('#reportrange span').html('Last 30 minutes')],
                    'Last 1 hour': [moment().subtract(1, 'hour'), moment()],
                    'Last 6 hours': [moment().subtract(6, 'hour'), moment()],
                    'Last 24 hours': [moment().subtract(24, 'hour'), moment()],
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            // cb(start, end);
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '[data-range-key="Last 30 minutes"]', function(){
            $('#reportrange span').html('Last 30 minutes')
        })
        $(document).on('click', '[data-range-key="Last 1 hour"]', function(){
            $('#reportrange span').html('Last 1 hour')
        })
        $(document).on('click', '[data-range-key="Last 6 hours"]', function(){
            $('#reportrange span').html('Last 6 hours')
        })
        $(document).on('click', '[data-range-key="Last 24 hours"]', function(){
            $('#reportrange span').html('Last 24 hours')
        })
        $(document).on('click', '[data-range-key="Today"]', function(){
            $('#reportrange span').html('Today')
        })
        $(document).on('click', '[data-range-key="Last 7 Days"]', function(){
            $('#reportrange span').html('Last 7 Days')
        })
        $(document).on('click', '[data-range-key="Last 30 Days"]', function(){
            $('#reportrange span').html('Last 30 Days')
        })
        $(document).on('click', '[data-range-key="This Month"]', function(){
            $('#reportrange span').html('This Month')
        })
        $(document).on('click', '[data-range-key="Last Month"]', function(){
            $('#reportrange span').html('Last Month')
        })
        $(document).on('click', '[data-range-key="Yesterday"]', function(){
            $('#reportrange span').html('Yesterday')
        })
        $(document).on('click', '[data-range-key="Custom Range"]', function(){
            cb(start, end);
        })
    </script>
    <script type="text/javascript">
        /* Thanks to CSS Tricks for pointing out this bit of jQuery
        https://css-tricks.com/equal-height-blocks-in-rows/
        It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

        equalheight = function(container){

        var currentTallest = 0,
             currentRowStart = 0,
             rowDivs = new Array(),
             $el,
             topPosition = 0;
         $(container).each(function() {

           $el = $(this);
           $($el).height('auto')
           topPostion = $el.position().top;

           if (currentRowStart != topPostion) {
             for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
               rowDivs[currentDiv].height(currentTallest);
             }
             rowDivs.length = 0; // empty the array
             currentRowStart = topPostion;
             currentTallest = $el.height();
             rowDivs.push($el);
           } else {
             rowDivs.push($el);
             currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
          }
           for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
             rowDivs[currentDiv].height(currentTallest);
           }
         });
        }

        $(window).load(function() {
          equalheight('.eq_height');
        });


        $(window).resize(function(){
          equalheight('.eq_height');
        });

        $('#schedules_modal').on('shown.bs.modal', function () {
            equalheight('.eq_height');
        })
        
        $(function () {
         $('[data-toggle="tooltip"]').tooltip()
        })

    </script>