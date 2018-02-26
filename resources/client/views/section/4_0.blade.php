@extends('client::layouts.default')
@section('headline', 'Implementing an Evidence Based Programs with Fidelity')
@section('section', '4.0')
@section('nav_id', 'navigation-bottom')
@section('prev_section', '3/3')
@section('next_section', '4/1')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-9 small-offset-3 columns doc-right search-index">
            <h2>What is Fidelity?</h2>
                <p>Fidelity is a determination of the extent to which a program is being implemented as designed. EBPs, by definition, have been rigorously evaluated and found to produce positive outcomes <span class="reference">(see <a href="/section/1/0">What Does it Mean for a Program to be Evidence-Based?</a> for more information)</span>. In other words, it is the components of a given program, and the way in which these components are implemented, that generate the outcomes. If program implementers dilute or deviate from program components, the program outcomes may differ significantly from those seen in previous evaluations.</p>
                <p>Several aspects of fidelity are listed below. Ideally, program implementers would carefully assess every aspect of fidelity in a systematic manner. Unfortunately, when implementing programs in community settings, the ideal may not be realistic due to resource limitations. When this is the case, it is important to turn to the materials provided with your EBP to determine which aspects of fidelity are emphasized by the program developers. There will likely be a fidelity monitoring tool (such as a checklist) provided with the program materials. The elements highlighted in the tool will indicate where you should direct your efforts. If a fidelity monitoring tool is not provided, then it is a good idea to contact the program developers to ask their suggestions for fidelity monitoring. (The contact information for program developers can be found in databases of EBPs, including those discussed under <a href="/section/2/3">Identifying Evidence-Based Interventions</a>.) The program developers may emphasize some or all of the following aspects of fidelity.</p>
                <ul class="document-list">
                    <li><em>Adherence</em> is the extent to which program components were implemented as prescribed by the program model. All program components should be considered, including methods, content, and activities.</li>
                    <li><em>Exposure</em> (or dosage) refers to the interactions that participants had with program elements. Interactions include in-person contact (e.g., class sessions, support group meetings, home visits), as well as the provision of program materials (e.g., worksheets, fitness equipment, books) or services (e.g., referrals, fitness center access, health assessments).</li>
                    <li><em>Delivery quality</em> refers to the manner in which program elements were implemented. Aspects of delivery quality include the skill of interventionists or leaders and the adequacy of the facilities, equipment, and supplies used for implementation.</li>
                    <li><em>Inclusion/exclusion of target audience members</em> refers to the characteristics of your participants in comparison to the characteristics of the audience for which the program was designed. For example, if your organization is implementing an exercise program designed for older adults with arthritis, you will want to determine if your participants are older adults with arthritis. (You want to assess this because differences between your participants and those for whom the program was designed can help explain disparities between your outcomes and those found in evaluation studies.)</li>
                    <li><em>Participant responsiveness</em> is the extent to which participants engaged in program activities. Simply attending a session does not have the same impact as actively taking part in the session (e.g., asking questions, contributing to discussions). Thus, the degree to which participants actually engage in program activities will influence outcomes.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/3/3"><span>Previous</span>Forming Expectations
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/4/1"><span>Next</span>Fidelity monitoring
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
