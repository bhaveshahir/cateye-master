<script>
        $('.collapse_btn').one('click', function(){
            $selectTbody = $(this).closest('.parent_1').parent('tbody');

            $.post('ajax/transactions.php', function(data) {
              $selectTbody.append(data);
              
            })
            .done(function showRows(select) {
                // $(select).closest('.parent_1').parent('tbody').append('response');
                $elm = $(select).closest('.parent_1').nextAll('.child_1');
                $elm2 = $(select).closest('.parent_1').siblings('.parent_1_1').nextAll('.child_1_1');

                if($elm.is(":hidden")) {
                    $elm.addClass('in');
                    $elm2.removeClass('in');
                }
                else if($elm.is(":visible")) {
                    $elm.removeClass('in');
                    $elm2.removeClass('in');
                }

               $(select).toggleClass('fa-plus-circle fa-minus-circle');
            });  
        })
        

        

        function showRows_1(select) {
            $elm2 = $(select).closest('.parent_1_1').nextAll('.child_1_1');

            if($elm2.is(":hidden")) {
                $elm2.addClass('in');
            }
            else if($elm2.is(":visible")) {
                $elm2.removeClass('in');
            }

           $(select).toggleClass('fa-plus fa-minus')
        }
    </script>