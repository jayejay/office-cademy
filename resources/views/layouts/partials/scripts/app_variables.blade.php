<script>
    var baseUrl = "{{ url('/') }}";
    var areaName = "{{str_is('*admin*', $currentPath) ? '/admin':''}}";
    var locale = "{{$locale}}";
</script>