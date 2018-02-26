@extends('client::layouts.default')
@section('headline', 'Identifying Evidence-based Interventions')
@section('section', '2.3')
@section('prev_section', '2/2')
@section('next_section', '2/4')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page3">
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p>The Community Tool Box, produced by the University of Kansas, provides descriptions and links to dozens of websites that explore promising health promotion and disease prevention approaches and programs. Formore information, visit their <a href="http://ctb.ku.edu/en/promisingapproach/Databases_Best_Practices.aspx" target="_blank">Website</a></p>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>Researchers will often submit evidence about programs to research organizations or federal agencies that will examine the evidence and approve or endorse the programs they find to have solid bases of evidence. These research organizations and agencies generate databases (sometimes termed registries or clearinghouses) that catalogue and provide various details about the approved or endorsed EBPs. In general, each database contains programs that address a specific age group (e.g., children and adolescents, seniors, families with children) or health topic (e.g., cancer prevention and treatment, parenting, environmental quality). Each organization and agency has its own specific criteria for what constitutes evidence-based. This information is provided on the websites of the organizations and agencies.</p>
                <p>When looking at databases, you may encounter two related, yet distinct types. First, there are databases that catalogue and detail actual programs. With these databases, you can identify a prepackaged, ready-to-implement program to implement with your organization’s audience. For example, if you are looking to implement a smoking cessation program, you would be able to identify a self-contained program (containing implementation instructions, curriculum components, and resources) that will meet the needs of your audience. Second, there are databases that catalogue and detail broad policies or approaches that have positive impacts on health. For example, you can learn from one database that increasing the price of cigarettes and offering free smoking cessation programs are strategies that have been shown to decrease smoking rates. The program databases are useful for organizations that are ready to implement programs with their audiences. The policy and approach databases are generally more useful to program developers, researchers, and policymakers. Examples of both types of databases are provided below.</p>
                <h2>Databases of evidence based-programs</h2>
                <p>Most EBP databases allow you to search for programs using various criteria (e.g., age group, setting, outcome of interest). While numerous interventions are listed in the databases, they are not exhaustive—only interventions submitted by researchers are listed. Subsequently, you may need to examine various sources before selecting a program.</p>
                <ul class="document-list">
                    <li><em>National Registry of Evidence-based Programs and Practices</em> &mdash; Sponsored by the Substance Abuse and Mental Health Services Administration, this registry contains mental health and substance abuse interventions that have been reviewed and rated by independent reviewers. A general description of each program, descriptions of the outcomes, lists of studies and materials reviewed, and contact information to learn more about the programs are provided. Additionally, each program is given a quality and readiness for dissemination rating. The registry can be <a href="http://www.samhsa.gov/nrepp" target="_blank">accessed here</a>.</li>
                    <li><em>National Council on Aging</em> &mdash; The National Council on Aging provides detailed program descriptions and information about evidence for programs that address the health needs of seniors. The included programs fall into one of four categories: chronic disease, falls prevention, physical activity, or behavioral health. The program descriptions can be <a href="http://www.ncoa.org/improve-health/center-for-healthy-aging/offering-evidence-based.html" target="_blank">accessed here</a>.</li>
                    <li><em>Research-tested Intervention Programs</em> &mdash; Sponsored by the National Cancer Institute, this database contains cancer control interventions and program materials. For each featured program, a full program summary (including an About the Study section), a program score, and related publications are presented. The database can be <a href="http://rtips.cancer.gov/rtips/index.do" target="_blank">accessed here</a></li>
                   <li><em>Evidence-Based Leadership Council</em> &mdash; The Evidence-Based Leadership Council provides a great resource for those seeking to learn more about innovative programs, proven to help people manage and improve their health and well-being. Included evidence-based programs are in the areas of chronic disease and medication management, physical activity, fall management, and depression. The website can be <a href="http://www.eblcprograms.org/" target="_blank">accessed here</a>.</li>
                    <li><em>Aging Texas Well Clearinghouse</em> &mdash; Sponsored by the Texas Department of Aging and Disability Services, this clearinghouse features national and state level evidence-based information and research. Research syntheses and direct links to over 100 evidence-based programs and resources are provided. The clearinghouse can be <a href="http://www.agingtexaswell.org/initiatives/ebased/index.cfm" target="_blank">accessed here</a>.</li>
                </ul>
                <h2>Datebases of evidence-based policies and approaches</h2>
                <p>Most databases of evidence-based policies and approaches allow you to search by topic (e.g., alcohol use, diabetes, community safety). Generally, the databases detail the research supporting, or failing to support, each listed policy or approach.</p>
                <ul class="document-list">
                    <li><em data-tooltip class="has-tip" data-options="hover_delay: 50;" title="Readiness questions help you estimate how ready your organization is to implement an EBP. <br />As you answer each question, you will be provided with suggested actions to advance your readiness.">The Community Guide</em> &mdash; Sponsored by the Centers for Disease Control and Prevention, this guide provides research-based recommendations regarding what works to improve the health of the public. The recommendations are made after a scientific and systematic review process. The topics addressed range from birth defects and adolescent health to obesity and violence. The guide can be <a href="http://thecommunityguide.org/index.html" target="_blank">accessed here</a>.</li>
                    <li><em>What Works for Health</em> &mdash; Featured on the County Health Rankings website (which is sponsored by the Robert Wood Johnson Foundation and the University of Wisconsin Population Health Institute), this database provides rankings for policies, programs, and system changes in four areas: health behaviors, clinical care, social and economic factors, and physical environment. The database can be <a href="http://www.countyhealthrankings.org/programs" target="_blank">accessed here</a>.</li>
                </ul>
                <questions question-id="2"></questions>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/2"><span>Previous</span>Prioritizing needs
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/4"><span>Next</span>Support from organizational stakeholders and presence of program champions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
