<div class="row">
    <div class="small-3 columns doc-left">
        <h3>Section <span>@yield('section')</span></h3>
    </div>
    <div class="small-9 columns doc-right">
        <h1 class="headline">@yield('headline')</h1>
        <p class="clearfix navigation" id="@yield('nav_id')">
            @if ($section == 1 and $subsection == 0)
                <a id="next" href="/section/@yield('next_section')">Next Section</a>
            @elseif ($section == 5 and $subsection == 4)
                <a id="previous" href="/section/@yield('prev_section')">Previous Section</a>
            @else
                <a id="previous" href="/section/@yield('prev_section')">Previous Section</a>
                <a id="next" href="/section/@yield('next_section')">Next Section</a>
            @endif
        </p>
    </div>
</div>
