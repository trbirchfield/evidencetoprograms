@extends('client::layouts.default')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset_version('css/client/styleguide.css') }}">
@stop

@section('footer-js')
    @parent
    <script src="{{ asset_version('vendor/prettify.min.js') }}"></script>
    <script src="{{ asset_version('vendor/slick.js') }}"></script>
    <script src="{{ asset_version('js/client/styleguide.js') }}"></script>
@stop

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="column medium-4">
                <div class="hide-for-small">
                    <div class="sidebar">
                        <h5>Table of Contents</h5>
                        <ul id="toc" class="side-nav">
                            <!-- Table of contents will be inserted here on page load. -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="column medium-8">
                <div class="content">
                    <h1>{{ $page_title }}</h1>

                    <hr />

                    <section id="colors" class="guide-section">
                        <h4>Colors</h4>
                        <p></p>
                        <div class="row swatches">
                            <div class="column medium-3">
                                <div class="swatch">
                                    <div class="swatch-color primary"></div>
                                    <div class="swatch-info"><strong>Primary Blue</strong><br />#008cba</div>
                                </div>
                            </div>
                            <div class="column medium-3 end">
                                <div class="swatch">
                                    <div class="swatch-color secondary"></div>
                                    <div class="swatch-info"><strong>Secondary Gray</strong><br />#e7e7e7</div>
                                </div>
                            </div>
                        </div>
                        <div class="row swatches">
                            <div class="column medium-3">
                                <div class="swatch">
                                    <div class="swatch-color alert"></div>
                                    <div class="swatch-info"><strong>Alert Color</strong><br />#f04124</div>
                                </div>
                            </div>
                            <div class="column medium-3">
                                <div class="swatch">
                                    <div class="swatch-color success"></div>
                                    <div class="swatch-info"><strong>Success Color</strong><br />#43ac6a</div>
                                </div>
                            </div>
                            <div class="column medium-3">
                                <div class="swatch">
                                    <div class="swatch-color warning"></div>
                                    <div class="swatch-info"><strong>Warning Color</strong><br />#f08a24</div>
                                </div>
                            </div>
                            <div class="column medium-3">
                                <div class="swatch">
                                    <div class="swatch-color info"></div>
                                    <div class="swatch-info"><strong>Info Color</strong><br />#a0d3e8</div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="typography" class="guide-section">
                        <h4>Typography</h4>
                        <p></p>
                        <h5>Headers &amp; Subheaders</h5>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-headers-output">Output</a></dd>
                            <dd><a href="#tab-headers-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-headers-output">
<h1>h1. This is a very large header.</h1>

<h2>h2. This is a large header.</h2>

<h3>h3. This is a medium header.</h3>

<h4>h4. This is a moderate header.</h4>

<h5>h5. This is a small header.</h5>

<h6>h6. This is a tiny header.</h6>

<br />

<h5>Subheaders</h5>

<h1 class="subheader">h1. subheader</h1>

<h2 class="subheader">h2. subheader</h2>

<h3 class="subheader">h3. subheader</h3>

<h4 class="subheader">h4. subheader</h4>

<h5 class="subheader">h5. subheader</h5>

<h6 class="subheader">h6. subheader</h6>

<br />
                            </div>
                            <div class="content section-code" id="tab-headers-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>
                            </div>
                        </div>

                        <h5>Lists</h5>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-definition-lists-output">Output</a></dd>
                            <dd><a href="#tab-definition-lists-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-definition-lists-output">
<h6>Definition Lists</h6>
<dl>
    <dt>Lower cost</dt>
    <dd>The new version of this product costs significantly less than the previous one!</dd>
    <dt>Easier to use</dt>
    <dd>We&#39;ve changed the product so that it&#39;s much easier to use!</dd>
    <dt>Safe for kids</dt>
    <dd>You can leave your kids alone in a room with this product and they won&#39;t get hurt (not a guarantee).</dd>
</dl>

<h5>Un-ordered Lists</h5>
<ul class="disc">
    <li>List item with a much longer description or more content.</li>
    <li>List item</li>
    <li>List item
        <ul>
            <li>Nested List Item</li>
            <li>Nested List Item</li>
            <li>Nested List Item</li>
        </ul>
    </li>
    <li>List item</li>
    <li>List item</li>
    <li>List item</li>
</ul>

<h5>Ordered Lists</h5>
<ol>
    <li>List Item 1</li>
    <li>List Item 2</li>
    <li>List Item 3</li>
</ol>
                            </div>
                            <div class="content section-code" id="tab-definition-lists-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>
                            </div>
                        </div>

                        <h5>Paragraphs</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo at est sit amet imperdiet. Phasellus ut nisl risus. Nam blandit lectus eu erat bibendum condimentum. Pellentesque purus lorem, ultrices eu metus ut, viverra porta augue. Donec sed nisi hendrerit, lobortis augue non, hendrerit leo. Etiam pharetra tortor ac leo sagittis, a vehicula eros fermentum. Phasellus tincidunt nulla non auctor consequat. Sed at augue hendrerit, condimentum ex finibus, tristique risus. Integer ullamcorper, libero facilisis dictum euismod, elit nunc eleifend arcu, vel hendrerit eros massa non orci. Duis scelerisque condimentum lacus id vehicula. Nullam vel justo id dui sodales posuere quis sit amet leo. Nam faucibus aliquam euismod.</p>
                        <br />

                        <h5>Blockquotes</h5>
                        <blockquote>I do not fear computers. I fear the lack of them. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.<cite>Isaac Asimov</cite></blockquote>
                    </section>

                    <hr />

                    <section id="alert-boxes" class="guide-section">
                        <h4>Alert Boxes</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-alert-boxes-output">Output</a></dd>
                            <dd><a href="#tab-alert-boxes-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-alert-boxes-output">
<div data-alert class="alert-box radius">
    This is a standard alert (div.alert-box.radius).
    <a href="" class="close">×</a>
</div>

<div data-alert class="alert-box success">
    This is a success alert (div.alert-box.success).
    <a href="" class="close">×</a>
</div>

<div data-alert class="alert-box alert round">
    This is an alert (div.alert-box.alert.round).
    <a href="" class="close">×</a>
</div>

<div data-alert class="alert-box secondary">
    This is a secondary alert (div.alert-box.secondary).
    <a href="" class="close">×</a>
</div>
                            </div>
                            <div class="content section-code" id="tab-alert-boxes-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/alert-boxes";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-alert'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="icons" class="guide-section">
                        <h4>Icons <small>by Font Awesome</small></h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-icons-output">Output</a></dd>
                            <dd><a href="#tab-icons-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-icons-output">
<ul class="small-block-grid-4 large-block-grid-4 text-center">
    <li><h2><i class="fa fa-bars"></i></h2></li>
    <li><h2><i class="fa fa-close"></i></h2></li>
    <li><h2><i class="fa fa-shopping-cart"></i></h2></li>
    <li><h2><i class="fa fa-info"></i></h2></li>
    <li><h2><i class="fa fa-plus"></i></h2></li>
    <li><h2><i class="fa fa-cog"></i></h2></li>
    <li><h2><i class="fa fa-envelope"></i></h2></li>
    <li><h2><i class="fa fa-phone"></i></h2></li>
    <li><h2><i class="fa fa-chevron-up"></i></h2></li>
    <li><h2><i class="fa fa-chevron-right"></i></h2></li>
    <li><h2><i class="fa fa-chevron-down"></i></h2></li>
    <li><h2><i class="fa fa-chevron-left"></i></h2></li>
    <li><h2><i class="fa fa-caret-up"></i></h2></li>
    <li><h2><i class="fa fa-caret-right"></i></h2></li>
    <li><h2><i class="fa fa-caret-down"></i></h2></li>
    <li><h2><i class="fa fa-caret-left"></i></h2></li>
    <li><h2><i class="fa fa-arrow-up"></i></h2></li>
    <li><h2><i class="fa fa-arrow-right"></i></h2></li>
    <li><h2><i class="fa fa-arrow-down"></i></h2></li>
    <li><h2><i class="fa fa-facebook"></i></h2></li>
    <li><h2><i class="fa fa-twitter"></i></h2></li>
    <li><h2><i class="fa fa-facebook"></i></h2></li>
    <li><h2><i class="fa fa-youtube-square"></i></h2></li>
    <li><h2><i class="fa fa-pinterest"></i></h2></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-icons-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/font-awesome/font-awesome";
</pre>
                            </div>
                        </div>
                        <div class="alert-box secondary">
                            This icon font is by Font Awesome. For more icons and documentation, visit <a href="http://fortawesome.github.io/Font-Awesome/">http://fortawesome.github.io/Font-Awesome/</a>.<br /><br />
                            Or, to generate your own icon set, you may use the <a href="https://icomoon.io/">IcoMoon App</a>.
                        </div>
                    </section>

                    <hr />

                    <section id="buttons" class="guide-section">
                        <h4>Buttons</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-buttons-output">Output</a></dd>
                            <dd><a href="#tab-buttons-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-buttons-output">
<div class="row">
    <div class="column medium-6">
        <a href="#" class="tiny button">.tiny.button</a><br />

        <a href="#" class="small button">.small.button</a><br />

        <a href="#" class="button">.button</a><br />

        <a href="#" class="large button">.large.button</a><br />

        <a href="#" class="expand button">.expand.button</a><br />
    </div>

    <div class="column medium-6">
        <a href="#" class="tiny secondary button">.tiny.secondary.button</a><br />

        <a href="#" class="small success radius button">.small.success.radius.button</a><br />

        <a href="#" class="alert round disabled button">.alert.round.disabled.button</a><br />
    </div>
</div>
                            </div>
                            <div class="content section-code" id="tab-buttons-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/buttons";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="button-groups" class="guide-section">
                        <h4>Button Groups</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-button-groups-output">Output</a></dd>
                            <dd><a href="#tab-button-groups-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-button-groups-output">
<ul class="button-group">
    <li><a href="#" class="small button">Button 1</a></li>
    <li><a href="#" class="small button">Button 2</a></li>
    <li><a href="#" class="small button">Button 3</a></li>
</ul>

<ul class="button-group radius">
    <li><a href="#" class="button secondary">Button 1</a></li>
    <li><a href="#" class="button secondary">Button 2</a></li>
    <li><a href="#" class="button secondary">Button 3</a></li>
    <li><a href="#" class="button secondary">Button 4</a></li>
</ul>

<ul class="button-group round even-3">
    <li><a href="#" class="button alert">Button 1</a></li>
    <li><a href="#" class="button alert">Button 2</a></li>
    <li><a href="#" class="button alert">Button 3</a></li>
</ul>

<ul class="button-group round even-4">
    <li><a href="#" class="button success">Button 1</a></li>
    <li><a href="#" class="button success">Button 2</a></li>
    <li><a href="#" class="button success">Button 3</a></li>
    <li><a href="#" class="button success">Button 4</a></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-button-groups-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/buttons";
@import "lib/foundation/button-groups";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="dropdown-buttons" class="guide-section">
                        <h4>Dropdown Buttons</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-dropdown-buttons-output">Output</a></dd>
                            <dd><a href="#tab-dropdown-buttons-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-dropdown-buttons-output">
<a href="#" class="button dropdown" data-dropdown="drop-link">Link Dropdown</a>
<ul id="drop-link" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
<br />

<a href="#" class="button dropdown" data-dropdown="drop-content">Content Dropdown</a>
<div id="drop-content" class="content medium f-dropdown" data-dropdown-content>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus semper metus, vel viverra ante pretium in. Morbi et blandit diam. Phasellus mollis arcu eu dolor semper bibendum. Vivamus bibendum massa eget lectus laoreet, scelerisque ultrices augue feugiat. Integer rhoncus ligula sed orci ornare eleifend auctor fermentum purus. In venenatis ornare nulla, et eleifend libero volutpat bibendum. Donec augue mauris, facilisis a purus eleifend, lacinia elementum elit. Nam consequat vitae sem elementum vestibulum.
</div>

<h6>Directions</h6>

<a href="#" class="button dropdown" data-options="align:top" data-dropdown="drop-top">Top</a>
<ul id="drop-top" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>

<a href="#" class="button dropdown" data-options="align:right" data-dropdown="drop-right">Right</a>
<ul id="drop-right" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>

<a href="#" class="button dropdown" data-options="align:bottom" data-dropdown="drop-bottom">Bottom</a>
<ul id="drop-bottom" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>

<a href="#" class="button dropdown" data-options="align:left" data-dropdown="drop-left">Left</a>
<ul id="drop-left" class="f-dropdown content">
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>

<h6>Hover</h6>
<a href="#" class="button dropdown" data-options="is_hover:true" data-dropdown="drop-hover">Hover Dropdown</a>
<ul id="drop-hover" class="f-dropdown content">
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-dropdown-buttons-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/buttons";
@import "lib/foundation/dropdown-buttons";
@import "lib/foundation/dropdown";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-dropdown'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>

                    </section>

                    <hr />

                    <section id="split-buttons" class="guide-section">
                        <h4>Split Buttons</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-split-buttons-output">Output</a></dd>
                            <dd><a href="#tab-split-buttons-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-split-buttons-output">
<a href="#" class="tiny button split">Tiny Split Button <span data-dropdown="drop-split-1"></span></a>
<ul id="drop-split-1" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
<br />

<a href="#" class="small secondary radius button split">Small Secondary Radius Split Button <span data-dropdown="drop-split-2"></span></a>
<ul id="drop-split-2" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
<br />

<a href="#" class="alert round button split">Round Alert Split Button <span data-dropdown="drop-split-2"></span></a>
<ul id="drop-split-2" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
<br />

<a href="#" class="large success button split">Large Success Split Button <span data-dropdown="drop-split-2"></span></a>
<ul id="drop-split-2" class="f-dropdown" data-dropdown-content>
    <li><a href="#">This is a link</a></li>
    <li><a href="#">This is another</a></li>
    <li><a href="#">Yet another</a></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-split-buttons-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/buttons";
@import "lib/foundation/split-buttons";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-dropdown'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="forms" class="guide-section">
                        <h4>Forms</h4>
                        <p></p>
                        <form>
                            <fieldset>
                                <legend>Fieldset</legend>
                                <div class="row">
                                    <div class="column medium-12">
                                        <label>Input Label</label>
                                        <input type="text" placeholder=".medium-12.columns" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="column large-4">
                                        <label>Input Label</label>
                                        <input type="text" placeholder=".medium-4.columns" />
                                    </div>
                                    <div class="column large-4">
                                        <label>Input Label</label>
                                        <input type="text" placeholder=".medium-4.columns" />
                                    </div>
                                    <div class="column large-4">
                                        <div class="row collapse">
                                            <label>Input Label</label>
                                            <div class="column small-9">
                                                <input type="text" placeholder=".medium-4.columns" />
                                            </div>
                                            <div class="column small-3">
                                                <span class="postfix">.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="column medium-12">
                                        <label>Textarea Label</label>
                                        <textarea placeholder=".small-12.columns"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </section>

                    <hr />

                    <section id="slick-carousel" class="guide-section">
                        <h4>Slick Carousel</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-slick-carousel-output">Output</a></dd>
                            <dd><a href="#tab-slick-carousel-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-slick-carousel-output">
<div class="slick">
    <div><img src="http://foundation.zurb.com/docs/assets/img/examples/comet.jpg" /></div>
    <div><img src="http://foundation.zurb.com/docs/assets/img/examples/earth.jpg" /></div>
    <div><img src="http://foundation.zurb.com/docs/assets/img/examples/launch.jpg" /></div>
    <div><img src="http://foundation.zurb.com/docs/assets/img/examples/satelite.jpg" /></div>
    <div><img src="http://foundation.zurb.com/docs/assets/img/examples/space.jpg" /></div>
</div>
                            </div>
                            <div class="content section-code" id="tab-slick-carousel-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/slick/slick";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['jquery'], function() {
    $('.slick').slick();
});
</pre>
                            </div>
                        </div>
                        <div class="alert-box secondary">For full documentation on Slick carousel visit <a href="http://kenwheeler.github.io/slick/">http://kenwheeler.github.io/slick/</a>.</div>
                    </section>

                    <hr />

                    <section id="flex-video" class="guide-section">
                        <h4>Flex Video</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-flex-video-output">Output</a></dd>
                            <dd><a href="#tab-flex-video-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-flex-video-output">
<div class="flex-video">
    <iframe width="420" height="315" src="http://www.youtube.com/embed/0_EW8aNgKlA" frameborder="0" allowfullscreen=""></iframe>
</div>
                            </div>
                            <div class="content section-code" id="tab-flex-video-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/flex-video";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="loading-element" class="guide-section">
                        <h4>Loading Element</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-loading-element-output">Output</a></dd>
                            <dd><a href="#tab-loading-element-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-loading-element-output">
<h5>.loading.revolve</h5>
<div class="loading-container">
    <div class="loading revolve">
        <div class="ball-1"></div>
        <div class="ball-2"></div>
        <div class="ball-3"></div>
        <div class="ball-4"></div>
    </div>
</div>

<h5>.loading.rotate</h5>
<div class="loading-container">
    <div class="loading rotate">
        <div class="rotate-container-1">
            <div class="ball-1"></div>
            <div class="ball-2"></div>
            <div class="ball-3"></div>
            <div class="ball-4"></div>
        </div>
        <div class="rotate-container-2">
            <div class="ball-1"></div>
            <div class="ball-2"></div>
            <div class="ball-3"></div>
            <div class="ball-4"></div>
        </div>
        <div class="rotate-container-3">
            <div class="ball-1"></div>
            <div class="ball-2"></div>
            <div class="ball-3"></div>
            <div class="ball-4"></div>
        </div>
    </div>
</div>

<h5>.loading.circle-bounce</h5>
<div class="loading-container">
    <div class="loading circle-bounce">
        <div class="ball-1"></div>
        <div class="ball-2"></div>
        <div class="ball-3"></div>
    </div>
</div>

<h5>.loading.rectangle-bounce</h5>
<div class="loading-container">
    <div class="loading rectangle-bounce">
        <div class="box-1"></div>
        <div class="box-2"></div>
        <div class="box-3"></div>
        <div class="box-4"></div>
        <div class="box-5"></div>
    </div>
</div>

<h5>.loading.pulse</h5>
<div class="loading-container">
    <div class="loading pulse">
        <div class="ball"></div>
    </div>
</div>

<h5>.loading.dark.rectangle-bounce</h5>
<div class="loading-container dark">
    <div class="loading dark rectangle-bounce">
        <div class="box-1"></div>
        <div class="box-2"></div>
        <div class="box-3"></div>
        <div class="box-4"></div>
        <div class="box-5"></div>
    </div>
</div>
                            </div>
                            <div class="content section-code" id="tab-loading-element-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/wlion/loading";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="inline-lists" class="guide-section">
                        <h4>Inline Lists</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-inline-lists-output">Output</a></dd>
                            <dd><a href="#tab-inline-lists-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-inline-lists-output">
<ul class="inline-list">
    <li><a href="#">Link 1</a></li>
    <li><a href="#">Link 2</a></li>
    <li><a href="#">Link 3</a></li>
    <li><a href="#">Link 4</a></li>
    <li><a href="#">Link 5</a></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-inline-lists-code">
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/inline-lists";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="labels" class="guide-section">
                        <h4>Labels</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-labels-output">Output</a></dd>
                            <dd><a href="#tab-labels-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-labels-output">
<p>
    <span class="label">Regular Label</span><br />

    <span class="radius secondary label">Radius Secondary Label</span><br />

    <span class="round alert label">Round Alert Label</span><br />

    <span class="success label">Success Label</span><br />
</p>
                            </div>
                            <div class="content section-code" id="tab-labels-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/labels";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="pagination" class="guide-section">
                        <h4>Pagination</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-pagination-output">Output</a></dd>
                            <dd><a href="#tab-pagination-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-pagination-output">
<ul class="pagination">
    <li class="arrow unavailable"><a href="">&laquo;</a></li>
    <li class="current"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">4</a></li>
    <li class="unavailable"><a href="">&hellip;</a></li>
    <li><a href="">12</a></li>
    <li><a href="">13</a></li>
    <li class="arrow"><a href="">&raquo;</a></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-pagination-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/pagination";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="panels" class="guide-section">
                        <h4>Panels</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-panels-output">Output</a></dd>
                            <dd><a href="#tab-panels-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-panels-output">
<div class="panel">
    <h5>This is a regular panel.</h5>
    <p>It has an easy to override visual style, and is appropriately subdued.</p>
</div>

<div class="panel callout radius">
    <h5>This is a radiua callout panel.</h5>
    <p>It&#39;s a little ostentatious, but useful for important content.</p>
</div>
                            </div>
                            <div class="content section-code" id="tab-panels-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/panels";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="reveal" class="guide-section">
                        <h4>Reveal</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-reveal-output">Output</a></dd>
                            <dd><a href="#tab-reveal-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-reveal-output">
<!-- Buttons -->
<p>
    <a href="#" data-reveal-id="modal-1" class="radius button">Example Modal&hellip;</a>
    <a href="#" data-reveal-id="modal-video" class="radius button">Example Video Modal&hellip;</a>
</p>

<!-- Modals -->
<div id="modal-1" class="reveal-modal small" data-reveal>
    <h2>This is a modal.</h2>
    <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
    <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
    <p><a href="#" data-reveal-id="modal-2" class="secondary button">Second Modal&hellip;</a></p>
    <a class="close-reveal-modal">&#215;</a>
</div>

<div id="modal-2" class="reveal-modal small" data-reveal>
    <h2>This is a second modal.</h2>
    <p>See? It just slides into place after the first modal. Very handy when you need subsequent dialogs, or when a modal option impacts or requires another decision.</p>
    <a class="close-reveal-modal">&#215;</a>
</div>

<div id="modal-video" class="reveal-modal small" data-reveal>
    <h2>This modal has video</h2>
    <div class="flex-video">
        <iframe width="420" height="315" src="//www.youtube.com/embed/aiBt44rrslw" frameborder="0" allowfullscreen></iframe>
    </div>
    <a class="close-reveal-modal">&#215;</a>
</div>
                            </div>
                            <div class="content section-code" id="tab-reveal-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/reveal";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-reveal'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="accordions" class="guide-section">
                        <h4>Accordions</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-accordions-output">Output</a></dd>
                            <dd><a href="#tab-accordions-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-accordions-output">
<dl class="accordion" data-accordion>
    <dd>
        <a href="#panel1">Accordion 1</a>
        <div id="panel1" class="content">
            Panel 1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
    </dd>
    <dd>
        <a href="#panel2">Accordion 2</a>
        <div id="panel2" class="content">
            Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
    </dd>
    <dd>
        <a href="#panel3">Accordion 3</a>
        <div id="panel3" class="content">
            Panel 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
    </dd>
</dl>
                            </div>
                            <div class="content section-code" id="tab-accordions-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/accordion";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-accordion'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="tabs" class="guide-section">
                        <h4>Tabs</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-tabs-output">Output</a></dd>
                            <dd><a href="#tab-tabs-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-tabs-output">
<h5>Horizontal</h5>

<dl class="tabs" data-tab>
    <dd class="active"><a href="#panel2-1">Tab 1</a></dd>
    <dd><a href="#panel2-2">Tab 2</a></dd>
    <dd><a href="#panel2-3">Tab 3</a></dd>
    <dd><a href="#panel2-4">Tab 4</a></dd>
</dl>

<div class="tabs-content">
    <div class="content active" id="panel2-1">
        <p>First panel content goes here...</p>
    </div>
    <div class="content" id="panel2-2">
        <p>Second panel content goes here...</p>
    </div>
    <div class="content" id="panel2-3">
        <p>Third panel content goes here...</p>
    </div>
    <div class="content" id="panel2-4">
        <p>Fourth panel content goes here...</p>
    </div>
</div>

<h5>Vertical</h5>

<dl class="tabs vertical" data-tab>
    <dd class="active"><a href="#panel1a">Tab 1</a></dd>
    <dd><a href="#panel2a">Tab 2</a></dd>
    <dd><a href="#panel3a">Tab 3</a></dd>
    <dd><a href="#panel4a">Tab 4</a></dd>
</dl>

<div class="tabs-content vertical">
    <div class="content active" id="panel1a">
        <p>Panel 1 content goes here.</p>
    </div>
    <div class="content" id="panel2a">
        <p>Panel 2 content goes here.</p>
    </div>
    <div class="content" id="panel3a">
        <p>Panel 3 content goes here.</p>
    </div>

    <div class="content" id="panel4a">
        <p>Panel 4 content goes here.</p>
    </div>
</div>
                            </div>
                            <div class="content section-code" id="tab-tabs-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/tabs";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-tab'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="top-bar" class="guide-section">
                        <h4>Top Bar</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-top-bar-output">Output</a></dd>
                            <dd><a href="#tab-top-bar-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-top-bar-output">
<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
            <h1>
                <a href="#">Top Bar Title</a>
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li class="divider"></li>
            <li class="has-dropdown">
                <a href="#">Main Item 1</a>
                <ul class="dropdown">
                    <li><label>Section Name</label></li>
                    <li class="has-dropdown">
                        <a href="#" class="">Has Dropdown, Level 1</a>
                        <ul class="dropdown">
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Level 2</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><label>Section Name</label></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all &rarr;</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li class="has-dropdown">
                <a href="#">Main Item 2</a>
                <ul class="dropdown">
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all &rarr;</a></li>
                </ul>
            </li>
        </ul>
    </section>
</nav>
                            </div>
                            <div class="content section-code" id="tab-top-bar-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/top-bar";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-topbar'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="side-nav" class="guide-section">
                        <h4>Side Nav</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-side-nav-output">Output</a></dd>
                            <dd><a href="#tab-side-nav-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-side-nav-output">
<div class="row">
    <div class="large-4 columns end">
        <ul class="side-nav">
            <li class="active"><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li class="divider"></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
        </ul>
    </div>
</div>
                            </div>
                            <div class="content section-code" id="tab-side-nav-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/side-nav";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="sub-nav" class="guide-section">
                        <h4>Sub Nav</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-sub-nav-output">Output</a></dd>
                            <dd><a href="#tab-sub-nav-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-sub-nav-output">
<dl class="sub-nav">
    <dt>Filter:</dt>
    <dd class="active"><a href="#">All</a></dd>
    <dd><a href="#">Active</a></dd>
    <dd><a href="#">Pending</a></dd>
    <dd><a href="#">Suspended</a></dd>
</dl>
                            </div>
                            <div class="content section-code" id="tab-sub-nav-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/sub-nav";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="tables" class="guide-section">
                        <h4>Tables</h4>
                        <p></p>
                        <table>
                            <thead>
                                <tr>
                                    <th width="200">Table Header</th>
                                    <th>Table Header</th>
                                    <th width="150">Table Header</th>
                                    <th width="150">Table Header</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                    <td>Content Goes Here</td>
                                </tr>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                    <td>Content Goes Here</td>
                                </tr>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                    <td>Content Goes Here</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <hr />

                    <section id="block-grid" class="guide-section">
                        <h4>Block Grid</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-block-grid-output">Output</a></dd>
                            <dd><a href="#tab-block-grid-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-block-grid-output">
<ul class="small-block-grid-2 large-block-grid-4">
    <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg"></li>
    <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg"></li>
    <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg"></li>
    <li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg"></li>
</ul>
                            </div>
                            <div class="content section-code" id="tab-block-grid-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/block-grid";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="thumbnails" class="guide-section">
                        <h4>Thumbnails</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-thumbnails-output">Output</a></dd>
                            <dd><a href="#tab-thumbnails-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-thumbnails-output">
<p>
    <img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg">
    <img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/space-th-sm.jpg">
</p>
                            </div>
                            <div class="content section-code" id="tab-thumbnails-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/thumbs";
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="tooltips" class="guide-section">
                        <h4>Tooltips</h4>
                        <p></p>
                        <dl class="tabs styleguide" data-tab>
                            <dd class="active"><a href="#tab-tooltips-output">Output</a></dd>
                            <dd><a href="#tab-tooltips-code">Code</a></dd>
                        </dl>
                        <div class="tabs-content styleguide">
                            <div class="content active section-output" id="tab-tooltips-output">
<p>
    The tooltips can be positioned on the
    <span data-tooltip class="has-tip" data-width="210" title="I'm on bottom and the default position.">&quot;tip-bottom&quot;</span>, which is the default position,
    <span data-tooltip class="has-tip tip-top noradius" data-width="210" title="I'm on the top and I'm not rounded!">&quot;tip-top&quot; (hehe)</span>,
    <span data-tooltip="left" class="has-tip tip-left" data-width="90" title="I'm on the left!">&quot;tip-left&quot;</span>, or
    <span data-tooltip="right" class="has-tip tip-right" data-width="120" title="I'm on the right!">&quot;tip-right&quot;</span> of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full width and bottom aligned.
</p>
                            </div>
                            <div class="content section-code" id="tab-tooltips-code">
<div class="pre-label">HTML</div>
<pre class="section-html">
<!--
* DO NOT PUT ANYTHING HERE
* It will be removed on page load and replaced
* with the html content from the output tab
-->
</pre>

<div class="pre-label">SCSS</div>
<pre>
@import "lib/foundation/tooltips";
</pre>

<div class="pre-label">JavaScript</div>
<pre>
require(['foundation-tooltip'], function() {
    $(document).foundation();
});
</pre>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section id="favicons" class="guide-section">
                        <h4>Favicons</h4>
                        <p></p>
                        <div class="row">
                            <div class="column medium-4">
                                <p>
                                    <img src="/public/img/ipad3_retina_144x144.png" /><br />
                                    iPad 3 Retina (144x144)
                                </p>
                            </div>
                            <div class="column medium-4">
                                <p>
                                    <img src="/public/img/iphone4_retina_114x114.png" /><br />
                                    iPhone 4 Retina (114x114)
                                </p>
                            </div>
                            <div class="column medium-4">
                                <p>
                                    <img src="/public/img/ipad_72x72.png" /><br />
                                    iPad (72x72)
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column medium-4">
                                <p>
                                    <img src="/public/img/iphone_apple_touch_57x57.png" /><br />
                                    iPhone Apple Touch (57x57)
                                </p>
                            </div>
                            <div class="column medium-4">
                                <p>
                                    <img src="/public/img/favicon.ico" /><br />
                                    Favicon (.ico with 32x32 &amp; 16x16)
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@stop
