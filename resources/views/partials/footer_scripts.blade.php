<!-- Right Panel -->
{{--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
{{--<script src="js/jquery-2.1.4.min.js"></script>--}}

{{--
<script src="js/bootstrap.min.js"></script>
--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

{{--
<script src="/js/jquery-2.1.4.min.js"></script>
--}}


<script src="/js/popper.min.js"></script>


<script src="/js/plugins.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>


<script src="js/main_syndic.js"></script>
{{--/******************************************depense js***********************************************************/--}}
<script type="text/javascript">

    jQuery(document).ready(function ($) {
        console.log("hhh");
        $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true
            });
        });
        $(function () {
            $('#datetimepicker2').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true
            });
        });
        $('#myModal_update_depense').on('show.bs.modal', function (event) {
            console.log("update depense");
            var button = $(event.relatedTarget)
            var titre = button.data('titre')
            var description = button.data('description')
            var price = button.data('price')
            var date = button.data('date')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #titre').val(titre);
            modal.find('.modal-body #titre').val(titre);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #date').val(date);
            modal.find('.modal-body #id').val(id);
        });
        $('#myModal_delete_depense').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
        });
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)

            var img = button.data('image')
            var modal = $(this)
            $('.modal-body').append('<img class="myImg" style="width:100%;"  src=" /storage/' + img  + '">');
        });

        $("#myModal").on("hidden.bs.modal", function(){
            $(".modal-body").html("");
        });
    });

</script>
{{--
/******************************************depense js**********************************************************/--}}

{{--
/******************************************recette js**********************************************************/--}}
<script type="text/javascript">

    jQuery(document).ready(function ($) {
        console.log("hhh");
       /* $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss',

                sideBySide: true
            });
        });
        $(function () {
            $('#datetimepicker2').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss',

                sideBySide: true
            });
        });*/
        $('#myModal_update_recette').on('show.bs.modal', function (event) {
            console.log("recette update");
            var button = $(event.relatedTarget)
            console.log( button.data('id'));
            var app = button.data('app')
            var description = button.data('description')
            var price = button.data('price')
            var image = button.data('image')
            var date = button.data('date')
            var user_id = button.data('user_id')
            var id = button.data('id')
            var modal = $(this)


            modal.find('.modal-body #appup').val(app);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #priceup').val(price);
            modal.find('.modal-body #dateup').val(date);


        });
        $('#myModal_delete_recette').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);

        });

    });


</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            console.log(jQuery('#price').val());
            jQuery.ajax({
                url: "{{ url('/recette/create') }}",
                method: 'post',
                data: {
                    price: jQuery('#price').val(),
                    app: jQuery('#app').val(),
                    date: jQuery('#date').val(),

                    _token: '{{csrf_token()}}',

                },
                success: function(result){
                    if(result.errors)
                    {
                            jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>'+value+'</li>');
                        });
                        console.log("n1");

                    }
                    else
                    {
                        jQuery('.alert-danger').hide();

                        location.reload();
                        console.log("n2");
                    }
                }});
        });
    });
</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmitupdate').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            console.log(jQuery('#price').val());
            jQuery.ajax({
                url: "{{ url('/recette/create') }}",
                method: 'post',
                data: {
                    price: jQuery('#priceup').val(),
                    app: jQuery('#appup').val(),
                    date: jQuery('#dateup').val(),

                    _token: '{{csrf_token()}}',

                },
                success: function(result){
                    if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>'+value+'</li>');
                        });
                        console.log("n1");

                    }
                    else
                    {
                        jQuery('.alert-danger').hide();

                        location.reload();
                        console.log("n2");
                    }
                }});
        });
    });
</script>
</body>
</html>