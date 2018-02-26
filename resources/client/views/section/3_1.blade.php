@extends('client::layouts.default')
@section('headline', 'Process Evaluation')
@section('section', '3.1')
@section('prev_section', '3/0')
@section('next_section', '3/2')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-9 small-offset-3 columns doc-right search-index">
                <p>Process evaluation assesses the delivery of a program. It examines factors such as the extent to which the program is being implemented as designed, whether the target population is being reached, and the quality of program delivery. Sometimes process evaluation can also constitute formative evaluation, which is evaluation used to improve or fine tune a program.</p>
                <p>Numerous aspects of program delivery can be assessed with process evaluation. Important aspects to evaluate are described below.</p>
                <ul class="document-list">
                    <li><em>Justification</em> (the extent to which the program addressed an important need) &mdash; Justification can be assessed by comparing needs assessment data with the program to determine if the program addresses a need that was identified during needs assessment.</li>
                    <li><em>Fidelity</em> (the extent to which the program was implemented as designed) &mdash; Fidelity can be assessed with the use of tools such as protocol checklists (either self-administered or administered by a trained observer).</li>
                    <li><em>Dose delivered </em>(the extent to which all program components were implemented) &mdash; Dose delivered can be assessed with program component checklists (either self-administered or administered by a trained observer).</li>
                    <li><em>Dose received</em> (the extent to which participants took part in program components) &mdash; Dose received can be assessed by observing participants’ engagement and measuring knowledge and skill acquisition.</li>
                    <li><em>Reach</em> (the proportion of the intended audience that took part in the intervention) &mdash; Reach can be assessed by dividing the number of individuals who took part in the program by the number of individuals in the intended audience. Attendance logs can help facilitate an assessment of reach.</li>
                    <li><em>Participant satisfaction</em> (the extent to which participants were satisfied with the program) &mdash;Participant satisfaction can be assessed by surveying participants to find out how satisfied they are with the program.</li>
                    <li><em>Recruitment success</em> (which recruitment methods were effective in attracting participants to the program) &mdash; Recruitment success can be assessed by surveying participants to find out how they heard about the program.</li>
                    <li><em>Accountability</em> (the extent to which staff and partners fulfilled their responsibilities) &mdash; Accountability can be assessed by a supervisor comparing actual role and task completion with the roles and tasks assigned during program planning.</li>
                    <li><em>Context</em> (the extent to which environmental characteristics influenced program implementation or outcomes) &mdash; Context can be assessed by surveying participants and program personnel with open-ended questions to determine what they saw and experienced that may have influenced implementation or outcomes.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/3/0"><span>Previous</span>Evaluation Planning
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/3/2"><span>Next</span>Impact and outcome evaluation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
