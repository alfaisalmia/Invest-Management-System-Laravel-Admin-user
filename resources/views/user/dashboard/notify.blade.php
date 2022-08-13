<link rel="stylesheet" href="{{ asset('adminLte/plugins/iziToast/iziToast.min.css') }}">
<script src="{{ asset('adminLte/plugins/iziToast/iziToast.min.js') }}"></script>

@if(session()->has('notify'))
    @foreach(session('notify') as $msg)
        <script type="text/javascript">
            (function($) { 
                "use strict";
                iziToast.{{ $msg[0] }}({message:"{{ trans($msg[1]) }}", position: "topRight"});
            })(jQuery);
        </script>
    @endforeach
@endif

@if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
        (function($) { 
            "use strict";
            @foreach ($errors as $error)
            iziToast.error({
                message: '{{ trans($error) }}',
                position: "topRight"
            });
            @endforeach
        })(jQuery);
    </script>

@endif
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>
