@extends('client::layouts.default')
@section('headline', 'Match with Organizational Resources')
@section('section', '2.6')
@section('prev_section', '2/5')
@section('next_section', '2/7')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-9 small-offset-3 columns doc-right search-index">
                <p>EBPs span the continuum in terms of the resources that are required for their implementation. Therefore, it is important to compare the availability of the following resources to those required to implement a program of interest.<p>
                <ul class="document-list">
                    <li><em>Costs</em> &mdash; The costs of implementing EBPs vary widely. Some are nearly free to implement; others require that implementing organizations attend training sessions, buy curricula, and purchase licenses.
                    <li><em>Training and reporting capabilities</em> &mdash; Depending on the program, personnel may need to attend initial and/or ongoing training sessions in order to implement the program. Additionally, some program developers require that organizations collect and submit evaluation data on program participants. Before choosing a program, it is important to consider if program personnel will be able to meet its training and reporting requirements.</li>
                    <li><em>Personnel</em> &mdash; Some programs must be implemented by personnel with specific skills or credentials. For example, an organization will need access to certified fitness instructors to implement many physical fitness EBPs. Similarly, licensed chemical dependency counselors are needed to implement many substance abuse-related EBPs.</li>
                    <li><em>Facilities, equipment, and supplies</em> - Each EBP requires the availability of specific facilities, equipment, and/or supplies. A nutrition-related EBP may require access to a kitchen and cooking equipment and supplies. Likewise, a physical activity program may require access to exercise equipment, a walking trail, or a swimming pool.</li>
                </ul>
                <p>Do not give up if your organization lacks the resources to implement a particular EBP. Continue searching for similar programs that match your resources and explore the possibility of partnerships with other organizations <span class="reference">(see <a href="/section/2/8">Establishing Partnerships</a> for more information)</span>.</p>
                <questions question-id="5"></questions>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/5"><span>Previous</span>Match with organizational purpose
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/7"><span>Next</span>Match with clientele
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
