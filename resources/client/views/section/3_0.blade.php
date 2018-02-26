@extends('client::layouts.default')
@section('headline', 'Evaluation Planning')
@section('section', '3.0')
@section('prev_section', '2/9')
@section('next_section', '3/1')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page8">
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p><a href="http://www.cdc.gov/obesity/downloads/CDC-Evaluation-Workbook-508.pdf" target="_blank">The Centers for Disease Control and Prevention’s Developing an Effective Evaluation Plan</a> is a comprehensive workbook to guide organizations through evaluation planning.</p>
                    <p>An introduction to program evaluation of programs for older adults is available on the <a href="/public/content/EvaluatingEBPrograms_Intro.pdf" target="_blank">National Council on Aging’s website</a>.</p>
                    <p>Online tutorials on program evaluation are available from the <a href="http://www.samhsa.gov/capt/tools-learning-resources/evaluation-tools-resources" target="_blank">Substance Abuse and Mental Health Services Administration.</a></p>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>Evaluation is the search for evidence that confirms a program has been implemented and attributes outcomes to the intervention. In other words, evaluation reveals which program components were implemented, how they were implemented, and if impacts (such as changes in health status or disease rates) are due to the program itself or to some factor outside of the program. Listed below are several reasons to conduct evaluation.</p>
                <ul class="document-list">
                    <li>To determine if program objectives were achieved</li>
                    <li>To develop quality assurance and control methods for the program</li>
                    <li>To identify the strengths and weaknesses of the program</li>
                    <li>To determine if the program can be generalized to another audience or setting</li>
                    <li>To identify hypotheses regarding health behavior for future programs and studies</li>
                    <li>To build the evidence base</li>
                    <li>To fulfill obligations to funders</li>
                    <li>To be accountable to stakeholders and your audience</li>
                </ul>
                <p>Program evaluation should be considered during program planning. If evaluation is not considered until after the program is completed, opportunities to collect important data will be missed. Notably, you will want to collect baseline data on your participants. Baseline data is information about participants (e.g., health status, opinions, knowledge, behaviors) that is gathered before a program begins. Having baseline data allows you to compare the participants’ post-intervention information to their pre-intervention information. For example, if you are implementing a nutrition program, you may compare their pre- and post-intervention rates of fruit and vegetable consumption to determine if the intervention had an impact. Additionally, you may choose to keep attendance logs during program sessions. This is another evaluation activity that cannot be conducted unless evaluation planning occurs before program implementation.</p>
                <p>Two types of evaluation are generally conducted: process evaluation and impact/outcome evaluation. Both types are described in the subsequent text.</p>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/9"><span>Previous</span>Obtaining funding
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/3/1"><span>Next</span>Process evaluation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
