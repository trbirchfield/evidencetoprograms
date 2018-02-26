@extends('client::layouts.default')
@section('headline', 'Prioritizing Needs')
@section('section', '2.2')
@section('prev_section', '2/1')
@section('next_section', '2/3')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row">
            <div class="small-3 columns doc-left search-index" id="mid-page5">
                <h6 class="caption no-print">
                    Figure 4. <br />Generic health needs prioritization matrix
                </h6>
                <div class="sidebar-table-container">
                    <table class="sidebar-table no-print">
                        <tr>
                            <td>
                                <b>Quadrant 1:</b><br/>
                                High priority
                            </td>
                            <td>
                                <b>Quadrant 3:</b><br/>
                                Moderate priority (low-cost,minimal effort interventions)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Quadrant 2:</b><br/>
                                Moderate priority (innovative program development &#38; evaluation)
                            </td>
                            <td>
                                <b>Quadrant 4:</b><br/>
                                Low priority
                            </td>
                        </tr>
                    </table>
                </div>
                <h6 class="caption no-print">
                    Figure 5. <br />Example health needs prioritization matrix
                </h6>
                <div class="sidebar-table-container">
                    <table class="sidebar-table no-print">
                        <tr>
                            <td>
                                <b>Quadrant 1:</b><br/>
                                Having access to regular screenings for high blood pre-<br />ssure and diabetes
                            </td>
                            <td>
                                <b>Quadrant 3:</b><br/>
                                Having a health fair to attend
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Quadrant 2:</b><br/>
                                Having access to low-cost prescription medications
                            </td>
                            <td>
                                <b>Quadrant 4:</b><br/>
                                Having access to vaccines for potential biote-<br />rrorism agents (e.g., anthrax)
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="print-border">
                    <h5>Additional Resource</h5>
                    <p>The Centers for Disease Control and Prevention provides the <a href="http://www.cdc.gov/healthycommunitiesprogram/tools/change.htm" target="_blank">CHANGE Tool</a>, a system that helps communities identify and prioritize health needs. </p>
                    <p>The National Association of County &#38; City Health Officials (NACCHO) describes several different methods of prioritizing health needs in its publication <a href="http://www.naccho.org/topics/infrastructure/accreditation/upload/Prioritization-Summaries-and-Examples.pdf" target="_blank">First Things First: Prioritizing Health Problems</a>.</p>
                </div>
            </div>
            <div class="small-9 columns doc-right search-index">
                <p>After primary and secondary data collection techniques have been used to determine the health needs of your audience, it is time to decide which health need(s) to address with an EBP. Though several approaches can be used to prioritize health needs, the most efficient approach is often to develop a simple matrix that ranks needs based on their importance and changeability (see Figure 4). In the context of this matrix, health needs can take many forms, including health diagnoses (e.g., heart disease, diabetes, cancer), behaviors (e.g., smoking, alcohol use, sedentary lifestyles), and social determinants of health (e.g., environmental pollution, public transportation availability, housing conditions). The importance of health needs can be determined using a number of criteria, such as prevalence (i.e., percent of the population affected), severity, financial impact, and urgency.</p>
                <p>The meaning of the term changeability differs slightly based on the need in question. In regards to health diagnoses, changeability refers to the likelihood of reducing rates or mitigating complications of the disease. In regards to behaviors, changeability refers to the likelihood of decreasing or increasing a particular behavior among program participants. In regards to social determinants of health, changeability refers to the likelihood that a program will modify an environmental condition or health policy.</p>
                <p>Very important needs that are easily changed should be placed in Quadrant 1. These needs should be your highest priority. Needs that are very important but difficult to change should be placed in Quadrant 2. These needs are of moderate priority. While it may be unwise for your organization to address them, these are needs that should be addressed by program developers through the development of innovative programs and subsequent evaluation studies. Less important needs that can be changed easily should be placed in Quadrant 3. Interventions that address these needs should be implemented if they are low-cost and require minimal effort and resources. Less important needs that are difficult to change should be placed in Quadrant 4. Generally, it is unwise to expend effort and resources on these needs. See Figure 5 for an example of a completed matrix.</p>
                <p>The importance and changeability of a health need varies depending on the nature of an organization and the audience for which a program will be implemented. For example, Sudden Infant Death Syndrome awareness and prevention are important health needs among parents of infants, but not among older adults. Likewise, osteoarthritis is an important health need among older adults, but is less important among teenage athletes. A senior center may determine that lack of access to transportation to medical visits is a less changeable need, while a transportation agency may determine this is an easily changeable need. Similarly, providing convenient and low-cost flu vaccines may be feasible for a community clinic, but not for a church group. These examples illustrate how each and every prioritization matrix may be unique.</p>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/2/1"><span>Previous</span>Identifying an important health issue
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/3"><span>Next</span>Identifying evidence-based interventions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
