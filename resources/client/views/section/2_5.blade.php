@extends('client::layouts.default')
@section('headline', 'Match with Organizational Purpose')
@section('section', '2.5')
@section('prev_section', '2/4')
@section('next_section', '2/6')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-9 small-offset-3 columns doc-right search-index">
                <p>The vision, mission, goals, and objectives of your organization are its lifeblood. Thus, they are important considerations when selecting an EBP. The selection of a program that conflicts with the purpose of your organization can set the program up for failure, as well as cause confusion among organizational personnel and clientele regarding the identity of the organization. Several factors to consider are described below.</p>
                <ul class="document-list">
                    <li><em>Health topic</em> &mdash; The EBP should address a health topic that is relevant to the organization. For example, a recreation center that offers gym memberships and sports programs would likely find a physical fitness EBP to be congruent with its purpose. However, an HIV prevention program may or may not be congruent with its purpose.</li>
                    <li><em>Program content</em> &mdash; The specific information provided about the health topic should be compatible with your organization’s values. For example, a faith-based organization may find an abstinence-only sex education program to align more closely with its values than a comprehensive sex education program.</li>
                    <li><em>Intervention strategies</em> &mdash; The theoretical-base of any intervention strategies and the specific approaches utilized should be acceptable to the organization. For example, a community center may not feel comfortable with an intervention that includes a needle exchange program as an approach to reducing the transmission of blood-borne diseases among intravenous drug users. However, the community center may feel comfortable offering an intervention that provides education on how to prevent the spread of blood-borne diseases.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/4"><span>Previous</span>Support from organizational stakeholders and presence of program champions
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/6"><span>Next</span>Match with organizational resources
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
