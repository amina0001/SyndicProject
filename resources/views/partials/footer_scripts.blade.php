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
        $(function () {
            $('#datetimepicker3').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true
            });
        });
        $(function () {
            $('#datetimepicker4').datetimepicker({
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
            modal.find('.modal-body #titledup').val(titre);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pricedup').val(price);
            modal.find('.modal-body #datedup').val(date);
            modal.find('.modal-body #id').val(id);
        });
        $("#myModal_update_depense").on("hidden.bs.modal", function(){

            jQuery('.alert-danger').hide();


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
            jQuery('.alert-danger').hide();


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
        $("#myModal_ajout").on("hidden.bs.modal", function(){
            jQuery('.alert-danger').hide();
        });
        $("#myModal_update_recette").on("hidden.bs.modal", function(){
            jQuery('.alert-danger').hide();

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    'id':$('input[name=id]').val(),
                }
            });
            console.log(jQuery('#price').val());
            jQuery.ajax({
                url: "{{ url('/recette/update') }}",
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




        $("#myModal_update_reunion").on("hidden.bs.modal", function(){
            jQuery('.alert-danger').hide();


        });
        $("#myModal_ajout_reunion").on("hidden.bs.modal", function(){
            jQuery('.alert-danger').hide();


        });
    });
</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#submitajoutdepense').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),

                }
            });
            console.log(jQuery('#price').val());
            jQuery.ajax({
                url: "{{ url('/depense/create') }}",
                method: 'post',
                data: {
                    titre: jQuery('#titled').val(),
                    price: jQuery('#priced').val(),
                    date: jQuery('#dated').val(),

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
        jQuery('#submitajoutdepenseup').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    'id':$('input[name=id]').val(),

        }
            });
            jQuery.ajax({
                url: "{{ url('/depense/update') }}",
                method: 'post',
                data: {
                    id: jQuery('#id').val(),
                    titre: jQuery('#titledup').val(),
                    price: jQuery('#pricedup').val(),
                    date: jQuery('#datedup').val(),

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




<script type="text/javascript">

    jQuery(document).ready(function ($) {
        console.log("hhh");

        $('#myModal_update_reunion').on('show.bs.modal', function (event) {
            console.log("hhh");
            var button = $(event.relatedTarget)
            console.log( button.data('id'));

            var description = button.data('description')

            var category = button.data('category')
            var date = button.data('date')
            var user_id = button.data('user_id')
            var id = button.data('id')
            var modal = $(this)


            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #categoryrnup').val(category);

            modal.find('.modal-body #descriptionrnup').val(description);

            modal.find('.modal-body #daternup').val(date);


        });
        $('#myModal_delete_reunion').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);

        });


    });


</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajoutloc').click(function(e){
            console.log("nn");

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                }
            });
            jQuery.ajax({
                url: "{{ url('/recette/loc/create') }}",
                method: 'post',
                data: {
                    category: jQuery('#categoryloc').val(),
                    nom: jQuery('#nomloc').val(),
                    price: jQuery('#priceloc').val(),
                    date: jQuery('#dateloc').val(),

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








    jQuery(document).ready(function(){
        jQuery('#submitajoutreunion').click(function(e){
            console.log("nn");

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                }
            });
            jQuery.ajax({
                url: "{{ url('/reunion/create') }}",
                method: 'post',
                data: {
                    category: jQuery('#categoryr').val(),
                    description: jQuery('#descriptionr').val(),
                    date: jQuery('#dater').val(),

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

    jQuery(document).ready(function(){
        jQuery('#submitupdatereunion').click(function(e){
            console.log("nn");

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    'id':$('input[name=id]').val(),

                }
            });
            jQuery.ajax({
                url: "{{ url('/reunion/update') }}",
                method: 'post',
                data: {
                    category: jQuery('#categoryrnup').val(),
                    description: jQuery('#descriptionrnup').val(),
                    date: jQuery('#daternup').val(),
                    id: jQuery('#id').val(),
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


    $('#myModal_update_recette_loc').on('show.bs.modal', function (event) {
        console.log("update recette loc");
        var button = $(event.relatedTarget)
        var nom = button.data('nom')
        var category = button.data('category')
        var description = button.data('description')
        var price = button.data('price')
        var date = button.data('date')
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #nomlocup').val(nom);
        modal.find('.modal-body #categorylocup').val(category);
        modal.find('.modal-body #descriptionlocup').val(description);
        modal.find('.modal-body #pricelocup').val(price);
        modal.find('.modal-body #datelocup').val(date);
        modal.find('.modal-body #idlocup').val(id);
    });
    jQuery(document).ready(function(){
        jQuery('#updateloc').click(function(event){
            console.log("nn");

            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    'id':$('input[name=id]').val(),

                }
            });

            jQuery.ajax({
                url: "{{ url('recette/loc/update') }}",
                method: 'post',
                data: {
                    category: jQuery('#categorylocup').val(),
                    nom: jQuery('#nomlocup').val(),
                    price: jQuery('#pricelocup').val(),
                    date:jQuery('#datelocup').val(),
                    id: jQuery('#idlocup').val(),
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

    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('#dtBasicExample1').DataTable();
        $('#dtBasicExample2').DataTable();


    });
    $(document).ready(function(){
        $('[data-tooltip="tooltip"]').tooltip();
    });
</script>
</body>
</html>
