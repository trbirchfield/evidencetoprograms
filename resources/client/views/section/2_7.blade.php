@extends('client::layouts.default')
@section('headline', 'Match with Clientele')
@section('section', '2.7')
@section('prev_section', '2/6')
@section('next_section', '2/8')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page6">
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p><a href="http://whatworks.uwex.edu/attachment/whatworks_03.pdf" target="_blank">Guidelines for Selecting an Evidence‐Based Program</a>, developed by the Cooperative Extension of the University of Wisconsin-Madison, provides guidance for selecting an appropriate EBP.</p>
                    <p><a href="http://implementation.fpg.unc.edu/resources/hexagon-tool-exploring-context" target="_blank">The Hexagon Tool</a>, featured on the Active Implementation Hub of the State Implementation &#38; Scaling-up of Evidence-based Practices Center and the National Implementation Research Network, helps organizations select suitable EBPs.</p>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>A suitable EBP will be a good match for your clientele. Several factors to consider are described below.</p>
                <ul class="document-list">
                    <li><em>Intended audience</em> &mdash; It is useful to identify the audience for which the intervention was initially developed. The likelihood of achieving positive outcomes increases when you implement an EBP that was developed for and tested on an audience similar to yours. For example, if a smoking cessation program was developed and tested on adolescents, it may not produce similar results among older adults.</li>
                    <li><em>Clientele interest</em> &mdash; It is beneficial to balance the interests of your audience with the needs identified in your needs assessment. Even if you have identified diabetes prevention as a priority need, you may find it difficult to gain the attention of your audience members if they are chiefly interested in learning computer skills. You may need to address their concerns first or find a way to address both their concerns and the priority needs.</li>
                    <li><em>Cultural and linguistic relevance</em> &mdash; It is best to evaluate EBPs to determine if they are based on models and contain content that are culturally appropriate for your audience. Consider if program materials reflect and support your audience’s culture (e.g., spiritual beliefs, family structure, traditional foods)? Also consider if the materials are written in a language that is suitable for your participants. For a non-English speaking audience, you may need to select a program that is available in multiple languages. If your audience includes individuals with low literacy levels, you may need to evaluate the readability levels of potential programs. In both cases, you may want to choose a program that includes pictures in its written materials and involves abundant discussion and demonstrations.</li>
                    <li><em>Contextual relevance</em> &mdash; Contextual factors, such as geographical location, time of year, or availability of transportation, will influence the suitability of a program. For example, it may be counterproductive to begin a weight management program immediately before the Thanksgiving and Christmas holidays if a large percentage of your audience celebrates these. Similarly, an aquatic aerobics program would be best to implement during the summer if your organization only has access to an outdoor pool.</li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/6"><span>Previous</span>Match with organizational resources
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/8"><span>Next</span>Establishing partnerships
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
