<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!--Toastr js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    $(document).ready(function() {
        //initialize dom elements
        $('.sidenav').sidenav();
        $('.dropdown-trigger').dropdown();
        $('.modal').modal({
            dismissible: false,
            opacity: 0.0
        });
        $('select').formSelect();

        //error notification display for forms
        @if($errors->count())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif

        //success notification display
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}');
        @endif

        //error notification for other actions like Delete
        @if(session()->has('error'))
            toastr.error('{{ session('error') }}');
        @endif

    });
</script>