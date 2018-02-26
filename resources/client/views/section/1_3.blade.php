@extends('client::layouts.default')
@section('headline', 'Organizational Readiness to Implement Evidence-based Programs')
@section('section', '1.3')
@section('nav_id', 'navigation-bottom')
@section('prev_section', '1/2')
@section('next_section', '2/0')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row search-index">
            <div class="small-9 small-offset-3 columns doc-right">
                <p>Certain factors increase the likelihood that an organization will be successful in EBP implementation. Assessing your organization’s knowledge of evidence-based programming, the degree to which organizational stakeholders support a potential program, and the availability of resources can help you determine if your organization is ready to implement an EBP.</p>
                <p>As you read through the Toolkit, you will come across Readiness Questions that will help you assess these factors. As you answer &ldquo;yes&rdquo; or &ldquo;no&rdquo; to each question, you will be provided with feedback and suggested actions to help further your readiness.</p>
                <p>The Readiness Questions can be found in the following sections: <a href="/section/2/1">Section 2.1</a>, <a href="/section/2/3">Section 2.3</a>, <a href="/section/2/4">Section 2.4</a>, <a href="/section/2/6">Section 2.6</a>, <a href="/section/2/9">Section 2.9</a> and <a href="/section/4/2">Section 4.2</a>
                </ul>
                <p>There is no objective point at which all organizations are ready to implement EBPs, thus there is no way to precisely measure an organization’s readiness. However, the Readiness Questions can help you estimate your organization’s readiness.</p>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/1/2"><span>Previous</span>Disadvantages of evidence-based programs
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/0"><span>Next</span>Choosing which program to implement
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
