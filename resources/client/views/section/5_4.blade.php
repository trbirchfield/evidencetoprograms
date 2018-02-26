@extends('client::layouts.default')
@section('headline', 'Quality Assurance')
@section('section', '5.4')
@section('prev_section', '5/3')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page12">
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p><a href="/public/content/AoA_Quality_Assurance_Expectations-9-16-w-text-boxes.pdf" target="_blank">The National Council on Aging</a> provides a brief on the Administration on Aging recommendations for quality assurance.</p>
                    <p>National Council on Aging offers <a href="https://www.ncoa.org/wp-content/uploads/IssueBrief_ReAim_Final-2.pdf" target="_blank">RE-AIM for Program Planning: Overview and Applications</a>.</p>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>Quality assurance (QA) is a collection of planned, systematic activities applied to ensure that program components are being implemented well. Initiatives to improve program activities and prevent mistakes or defects also constitute QA. Despite the initial appearance of similarity, QA differs from evaluation in that QA focuses on ongoing work instead of final outcomes at a particular point in time. In an era where funding opportunities are often competitive, QA is critical because it demonstrates to funders and stakeholders that EBPs are credible, worthwhile investments.</p>
                <p>Continuous Quality Improvement (CQI), an ongoing quality improvement process that is closely related to QA, involves four steps: <em>(1) planning</em> (e.g., selecting implementation objectives and methods of monitoring program delivery), <em>(2) monitoring</em> (e.g., collecting process and outcome data and obtaining feedback from stakeholders), <em>(3) evaluating</em> (e.g., analyzing data collected during monitoring to identify challenges and develop solutions for them), and <em>(4) making corrective changes</em> (e.g., implementing solutions to identified challenges in order to improve overall program performance and participant satisfaction).</p>
                <p>A QA program that integrates CQI will include the following components.</p>
                <ul class="document-list">
                    <li>A specified timeline for QA activities and designated roles and responsibilities for personnel.</li>
                    <li>Personnel and stakeholder orientation to the QA plan and procedures.</li>
                    <li>Designated performance indicators including measures of participant reach, organizational capacity, and program delivery.</li>
                    <li>Mechanisms for personnel to conduct periodic reviews of fidelity and assess performance using indicators.</li>
                    <li>Protocols for taking corrective action when fidelity is jeopardized or performance requires improvement.</li>
                </ul>
                <p>The concept of QA can initially seem abstract and difficult to apply, but frameworks such as RE-AIM (described in the subsequent section) can help organizations implement QA in logical, manageable pieces.</p>
                <h2>RE-AIM framework</h2>
                <p>The RE-AIM framework was developed as a model for the planning, evaluation, reporting, and review of translational research and practice. (Translation is the process of taking a program originally implemented in a controlled &ldquo;laboratory-like&rdquo; setting and making it suitable for implementation in the community.) The framework has five components from which the framework name is drawn: Reach, Effectiveness, Adoption, Implementation, and Maintenance. Each component and its significance are described in Table 5. Information about the development and application of RE-AIM can be found at <a href="http://www.re-aim.org" target="_blank">www.re-aim.org</a>.</p>
            </div>
        </div>
        <div class="row search-index">
            <div class="large-12 columns">
                <h6 class="caption">Table 5 - RE-AIM components</h6>
                <table class="table-5">
                    <thead>
                        <tr>
                            <th>Component</th>
                            <th>Definition</th>
                            <th>Significance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%">
                                Reach
                            </td>
                            <td width="40%">
                                The extent to which a program reaches the intended audience.
                            </td>
                            <td width="40%">
                                Assesses the adequacy of program marketing, participant recruitment, and participant retention strategies.
                            </td>
                        </tr>

                        <tr>
                            <td width="20%">
                                Effectiveness
                            </td>
                            <td width="40%">
                                The impacts and outcomes of an intervention in terms of measures such as disease rates, behaviors, knowledge, quality of life, and healthcare expenses.
                            </td>
                            <td width="40%">
                                Evaluates whether a program is producing positive changes in audience members’ well-being.
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Adoption
                            </td>
                            <td width="40%">
                                The extent to which organizations and implementation sites deliver and embed the program into their ongoing activities and the level of organizational support provided for it.
                            </td>
                            <td width="40%">
                                Investigates the adequacy of program partners, resources, and the implementation process (e.g., session locations, frequency, skill of personnel).
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Implementation
                            </td>
                            <td width="40%">
                                Fidelity monitoring.
                            </td>
                            <td width="40%">
                                Determines if the program is being implemented as designed, regardless of the setting or which staff member is delivering the program.
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Maintenance
                            </td>
                            <td width="40%">
                                The extent to which a program becomes institutionalized or a routine part of an organization’s activities.
                            </td>
                            <td width="40%">
                                Assesses the extent to which the program is accessible to new participants and the sustainability infrastructure.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/5/3"><span>Previous</span>Sustainability</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
