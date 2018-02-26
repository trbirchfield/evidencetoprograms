@extends('client::layouts.default')
@section('headline', 'What Does it Mean for a Program to be Evidence-based?')
@section('section', '1.0')
@section('next_section', '1/1')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row search-index">
            <div class="small-3 columns doc-left" id="mid-page1">
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p>The website of the National Council on Aging features interactive training modules on several topics related to evidence-based programming. Series 1: Intro to Health Promotion Programs contains two modules that provide in-depth information on EBPs: <a href="http://ncoa_archive.ncoa.org/improve-health/center-for-healthy-aging/online-training-modules/series-1-intro-to-health.html" target="_blank">Website</a>.</p>
                    <p>The first module (Introduction: What Do We Mean By Evidence-Based?) of the Using What Works: Adapting Evidence-Based Programs to Fit Your Needs series of the National Cancer Institute provides details on the significance of EBPs: <a href="http://cancercontrol.cancer.gov/use_what_works/mod1/start.htm" target="_blank">Website.</a></p>
                </div>
            </div>
            <div class="small-9 columns doc-right">
                <p>Health promotion programs that have been found to produce positive outcomes based on the results of rigorous evaluations are often termed &ldquo;evidence-based.&rdquo; To be identified as an evidence-based program (EBP), an intervention or program must be thoroughly evaluated by researchers who are able to attribute positive outcomes to the intervention itself.</p>
                <p>When you look at various programs to see if they are evidence-based, you will come across many evaluation study designs <span class="reference">(see Table 1)</span>. You do not need to be an expert in research methods to understand these study designs, but it is useful to understand some basic terms. The following terms are used when describing participants in studies.</p>
                <ul class="document-list">
                    <li><em>Experimental group</em> &mdash; Individuals in the experimental group are taking part in the program that is being evaluated in the study.</li>
                    <li><em>Comparison group</em> &mdash; Individuals in the comparison group are not taking part in the program that is being evaluated. They may not be enrolled in any program or they may be enrolled in some alternative program. Members of the comparison group may or may not be similar in characteristics to the members of the experimental group <span class="reference">(see Table 1 for an example)</span>.</li>
                    <li><em>Control group</em> &mdash; Individuals in the control group are not taking part in the program that is being evaluated; however, they may be enrolled in some alternative program. Members of the control group are likely similar in characteristics to members of the experimental group <span class="reference">(see Table 1 for an example)</span>.</li>
                </ul>
            </div>
        </div>
        <div class="row search-index">
            <div class="large-12 columns">
                <h6 class="caption">Table 1 - Evaluation study designs</h6>
                <table>
                    <thead>
                        <tr>
                            <th>Type and description</th>
                            <th>Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="30%">
                                <em>Non-experimental</em><br />
                                Includes an experimental group, but no control or comparison group.
                            </td>
                            <td width="70%">
                                Researchers develop a new exercise program for seniors. They enroll all of the seniors at Senior Center A in the program (this is an experimental group). Both before and after the program, the researchers administer a survey that assesses the seniors’ confidence in regards to exercising. The researchers find that the seniors have greater exercise confidence after completing the program. <br /><br />
                                Because the researchers did not use a comparison or control group, they do not know if the same outcome (i.e., increased exercise confidence) would have occurred if they had used a traditional exercise program.
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                <em>Quasi-experimental</em><br />
                                Includes an experimental group and a comparison group.
                            </td>
                            <td width="70%">
                                Researchers develop a new exercise program for seniors. They enroll all of the seniors at Senior Center A in the new program (this is the experimental group). They enroll all of the seniors at Senior Center B in a traditional exercise program (this is the comparison group). The researchers administer a survey that assesses confidence in regards to exercising to all of the seniors both before and after the programs. The researchers find that the seniors at Senior Center A see a greater increase in their exercise confidence than the seniors at Senior Center B. <br /><br />
                                At first glance, it appears as though the new exercise program produced a superior outcome. However, this may not be the case. The seniors enrolled in the exercise programs were not randomly assigned to the new or traditional program; they were assigned based on which senior center they attended. If the seniors at Senior Center A are younger or have fewer medical conditions than those at Senior Center B, then these group differences may account for the superior outcome at Senior Center A.
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                <em>Experimental </em><br />
                                Includes an experimental group and a control group.
                            </td>
                            <td width="70%">
                                Researchers develop a new exercise program for seniors. The names of all of the seniors at Senior Center A and Senior Center B are placed in a large bowl. The names are mixed up and then half of the names are drawn out of the bowl. These seniors are enrolled in the new exercise program (this is the experimental group). The seniors whose names remain in the bowl are enrolled in a traditional exercise program (this is the control group). The researchers administer a survey that assesses confidence in regards to exercising to all of the seniors both before and after the programs. The researchers find that the seniors enrolled in the new exercise program see a greater increase in exercise confidence than the seniors enrolled in the traditional exercise program.<br /><br />
                                The research indicates that the new exercise program produces a superior outcome. Because the seniors were randomly assigned to the new or traditional program, it is unlikely the participants in the two programs differed significantly in terms or their ages or medical conditions. Therefore, group differences likely did not play a role in the outcomes. Researchers can attribute the greater increase in exercise confidence among those enrolled in the new exercise program to the components of the program.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row search-index">
            <div class="small-3 columns doc-left">
                <h6 class="caption  no-print">
                    Figure 1. <br />Basic criteria for evidence-based programs
                </h6>
                <div class="figure1">
                    <div class="figure-square color1">
                        <p>1. Researchers find the program to have positive outcomes in an evaluation study</p>
                    </div>
                    <div class="figure-square color2">
                        <p>2. The positive outcomes can be attributed to components of the program itself</p>
                    </div>
                    <div class="figure-square color3">
                        <p>3. The evaluation study is peer-reviewed by experts who are knowledgeable about the topic</p>
                    </div>
                    <div class="figure-square color4">
                        <p>4. The program is approved or endorsed by a research organization or federal agency</p>
                    </div>
                </div>
            </div>
            <div class="small-9 columns doc-right">
                <p>When evaluation researchers have identified evidence supporting a particular program, they will often publish their findings in peer-reviewed scientific journals. Publishing their findings allows experts in the field who are not associated with the evaluation to examine the evaluation and determine if they agree with the methods used and with the conclusions drawn about the effects of the program. Evaluation researchers may also submit evidence to research organizations and federal agencies that will examine the evidence and approve or endorse the programs they find to have solid bases of evidence <span class="reference">(see
                Figure 1)</span>. This approval or endorsement communicates to others in the field that these programs have met various standards of effectiveness <span class="reference">(see <a href="/section/2/3">Identifying Evidence-Based Interventions</a> for more information)</span>.</p>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="next just-next">
                        <a href="/section/1/1"><span>Next</span>Advantages of evidence-based programs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
