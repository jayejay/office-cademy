<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" id="languages" type="button" data-toggle="dropdown">
        {{LaravelLocalization::getCurrentLocale()}}
        {{App::getLocale()}}
        {{--@lang('custom.Choose language')--}}
        <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="languages">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li role="presentation">
                <a role="menuitem" tabindex="-1" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
