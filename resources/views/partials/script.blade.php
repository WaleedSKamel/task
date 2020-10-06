

<script src="{!! asset('assets/js/vendor/modernizr-3.6.0.min.js') !!}"></script>
<script src="{!! asset('assets/js/vendor/jquery-3.5.1.min.js') !!}"></script>
<script src="{!! asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') !!}"></script>
<script src="{!! asset('assets/js/vendor/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/slick.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery.syotimer.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery.instagramfeed.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery.nice-select.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/wow.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery-ui-touch-punch.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery-ui.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/magnific-popup.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/sticky-sidebar.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/easyzoom.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/scrollup.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/ajax-mail.js') !!}"></script>
<script src="{!! asset('assets/js/main.js') !!}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>

    $(document).ready(function (){
        $.ajax({
            url:'{!! route('get.cart') !!}',
            type:'get',
            success: function (data){
                $('.myCart').html(data.my_cart);
                $('.countCart').html(data.count_cart);
                $('.alertMessage').addClass('hidden');
            }
        });
    });

    $(document).on('click', '.add_cart', function (e){
        e.preventDefault();
        var qty = $(this).parent().parent().find('input').val();
        var item_id = $(this).data('id');
        var session_id = $(this).data('session');
        //console.log(session_id);

        $.ajax({
            url:'{!! route('add.cart') !!}',
            type:'post',
            data:{item_id: item_id ,session_id: session_id ,qty: qty},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data){
                $('.myCart').html(data.my_cart);
                $('.countCart').html(data.count_cart);
                $('.alertMessage').addClass('hidden');

            }
        });

    })

    $(document).on('click','.remove_cart',function (e){
        e.preventDefault();
        var cart_id = $(this).data('id');

        $.ajax({
            url:'{!! route('remove.cart') !!}',
            type:'post',
            data:{cart_id: cart_id },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data){
                $('.myCart').html(data.my_cart);
                $('.countCart').html(data.count_cart);
                $('.alertMessage').addClass('hidden');

            }
        });
    })

    $(document).on('click','.storeOrder',function (e){
        e.preventDefault();
        $.ajax({
            url:'{!! route('store.order') !!}',
            type:'get',
            success: function (data){
                $('.myCart').html(data.my_cart);
                $('.countCart').html(data.count_cart);
                $('.alertMessage').removeClass('hidden');

            }
        });
    })

    $(document).on('keyup','#search_by_name',function (){
        var name = $(this).val();
        $.ajax({
            url:'{!! route('item.search') !!}',
            type:'post',
            data:{name: name },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data){
                $('.filterItems').html(data.my_items);

            }
        });
    })

    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: {!! $items->max('price') !!},
            values: [ 75, {!! $items->max('price') !!} ],
            slide: function( event, ui ) {
                $( "#amount_start" ).val( ui.values[ 0 ] );
                $( "#amount_end" ).val( ui.values[ 1 ]  );
            }
        });
    } );

    function searchByPrice()
    {
        var start = $('#amount_start').val();
        var end = $('#amount_end').val();
        $.ajax({
            url:'{!! route('item.search') !!}',
            type:'post',
            data:{start: start ,end:end },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data){
                $('.filterItems').html(data.my_items);

            }
        });
    }




</script>


