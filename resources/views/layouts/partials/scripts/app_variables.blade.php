<script>
    var baseUrl = "{{ url('/') }}";
    var areaName = "{{str_is('*admin*', $currentPath) ? '/admin':''}}";
    var locale = "{{isset($locale) ? $locale : ''}}";
</script>