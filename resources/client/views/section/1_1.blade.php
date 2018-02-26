@extends('client::layouts.default')
@section('headline', 'Advantages of Evidence-based Programs')
@section('section', '1.1')
@section('prev_section', '1/0')
@section('next_section', '1/2')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page2">
                <h6 class="caption no-print">
                    Figure 2. Title IIID requirement for <br />evidence-based programming
                </h6>
                <div class="figure-gray">
                    <div class="figure-gray-title">
                        OAA Title IIID
                    </div>
                    <div class="figure-gray-body">
                        <ul>
                            <li>The Disease Prevention and Health Promotion Services Program (Title IIID) of the Older Americans Act provides grants to States and Territories based on their share of the population aged 60 and over for education and implementation activities that support healthy lifestyles and promote healthy behaviors.</li>
                            <li>Over the past few years, the Aging Network has moved towards using evidence-based health promotion and disease prevention programs.</li>
                            <li>The Fiscal Year 2012 Congressional appropriations now require that OAA Title IIID funding be used only for programs and activities that have been demonstrated to be evidence-based.</li>
                            <li>The Administration on Aging's definition of evidence-based and example programs can be found <a href="http://www.aoa.acl.gov/AoA_Programs/HPW/Title_IIID/index.aspx" target="_blank">HERE</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>There are a number of advantages to selecting and implementing EBPs. Several of these are discussed below.</p>
                <ul class="document-list">
                    <li><em>Increased likelihood of the program working</em> &mdash; You will be implementing a program known to work, as opposed to implementing a program you hope will work.</li>
                    <li><em>Efficient use of limited resources</em> &mdash; Instead of putting limited resources towards the development of a new program, you can select a previously developed and well-packaged program that is ready for implementation.</li>
                    <li><em>Ease of use</em> &mdash; The developers of many EBPs have packaged their materials with step-by-step instructions so the programs can be easily implemented in community settings. Moreover, most of these programs come with evaluation materials (surveys, knowledge assessments, etc.) so community organizations are not left having to develop and assess the validity of their own.</li>
                    <li><em>Securing funding</em> &mdash; The positive outcomes demonstrated in research can help secure funding for EBPs. In fact, many funding agencies and policymakers require that EBPs be implemented with their funding <span class="reference">(see Figure 2 for an example)</span>.</li>
                    <li><em>Community buy-in and partnership formation</em> &mdash; The demonstrated outcomes of EBPs are attractive to community members and potential partners, facilitating community buy-in and the formation of partnerships.</li>
                    <li><em>Advocating for programs</em> &mdash; The demonstrated outcomes provide justification when advocating for new programs or when defending existing ones.</li>
                    <li><em>Participant preference</em> &mdash; Potential participants have become more knowledgeable about health promotion programs and have ongoing access to abundant information regarding these programs via the internet. It is increasingly common for potential participants to seek out or request programs that are evidence-based.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/1/0"><span>Previous</span>What does it mean for a program to be evidence-based?</a>
                    </div>
                    <div class="next">
                        <a href="/section/1/2"><span>Next</span>Disadvantages of evidence-based programs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
