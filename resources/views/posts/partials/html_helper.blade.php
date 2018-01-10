<div class="dropdown">
    <button class="btn btn-sm dropdown-toggle" id="html-helper" type="button" data-toggle="dropdown">Html-Helper
        <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="html-helper">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_heading')' class="html_tags">Heading</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='<p></p>' class="html_tags">Paragraph</a></li>
        <li role="presentation"><a role="menuitem" id="panel-html" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_panel')' class="html_tags">Panel</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_code')' class="html_tags">Code</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_material_icons')' class="html_tags">Material icons</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='<div class="" id="" name=""></div>' class="html_tags">Div</a></li>
        {{--<li role="presentation" class="divider"></li>--}}
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_ordered_list')' class="html_tags">Ordered List</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_unordered_list')' class="html_tags">Unordered List</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_table')' class="html_tags">Table</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_plain_html')' class="html_tags">Plain Html</a></li>
        <li role="presentation"><a role="menuitem" id="panel-html" tabindex="-1" href="#" data-html='@include('posts.partials.html_templates.template_accordeon')' class="html_tags">Accordeon</a></li>
    </ul>
</div>
