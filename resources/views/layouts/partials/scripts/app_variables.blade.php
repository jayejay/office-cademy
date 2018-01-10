<script>
    var baseUrl = "{{ url('/') }}";
    var areaIsAdmin = "{{str_is('*admin*', $currentPath) ? 1 : 0}}";
    var locale = "{{isset($locale) ? $locale : ''}}";
    var postShowUrl = "{{str_is('*admin*', $currentPath) ? route('posts.admin.show') : route('posts.show')}}";
</script>