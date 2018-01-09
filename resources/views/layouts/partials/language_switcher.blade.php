<a href="#">
    {{LaravelLocalization::getCurrentLocale()}}
    <span class="caret"></span>
</a>
<ul class="dropdown-menu" role="menu" aria-labelledby="languages">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li role="presentation">
            <a role="menuitem" tabindex="-1" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
