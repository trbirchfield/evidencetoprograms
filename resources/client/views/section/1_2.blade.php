@extends('client::layouts.default')
@section('headline', 'Disadvantages of Evidence-based Programs')
@section('section', '1.2')
@section('prev_section', '1/1')
@section('next_section', '1/3')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row search-index">
            <div class="small-9 small-offset-3 columns doc-right">
                <p>Though there are numerous advantages to implementing EBPs, there are also a number of challenges. Several of these are discussed below.</p>
                <ul class="document-list">
                    <li><em>Match with target audience</em> &mdash; Many EBPs were developed for and evaluated after implementation within a particular target audience (e.g., seniors with depression, heart attack survivors, assisted living residents). While positive outcomes were found by researchers among these particular audiences, the programs may not produce similar results among other audiences.</li>
                    <li><em>Limited adaptability</em> &mdash; EBPs are intended to be implemented as designed <span class="reference">(see <a href="/section/4/1">What is Fidelity?</a>)</span>. Thus, there is often limited room to adapt or customize programs to local audiences.</li>
                    <li><em>Cost</em> &mdash; Many EBPs are copyrighted, which means you must gain permission from the developers or purchase licenses to implement the programs. You may also need to purchase manuals or workbooks and your staff may need to attend training sessions. The expenses associated with licenses, materials, and trainings may add up, making a program quite costly to implement. Moreover, the researchers who developed the programs may have provided participant incentives (e.g., t-shirts, gift cards) to encourage participation in the programs. If your organization cannot provide these incentives, you may have a more difficult time recruiting and retaining participants.</li>
                    <li><em>Exclusion of beneficial programs due to lack of empirical research</em> &mdash; Restricting program offerings to those that are evidence-based may mean some programs that produce positive outcomes are excluded simply because they have not been researched.</li>
                    <li><em>Unknown long-term effects</em> &mdash; There is no research on the long-term effects of many EBPs. Therefore, it is unknown if these programs produce benefits 5 or 10 years after their implementation.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/1/1"><span>Previous</span>Advantages of evidence-based programs</a>
                    </div>
                    <div class="next">
                        <a href="/section/1/3"><span>Next</span>Support from organizational stakeholders and presence of program champions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
