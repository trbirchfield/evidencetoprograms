@extends('client::layouts.default')

@section('content')
    @if ($new_announcements)
        <div data-alert class="news-alert alert-box success rm-m-bot text-center scroll">
            <h4>We just added new content!<a href="#news" class="button success rm-m-bot"><span>&darr;</span>  Read More  <span>&darr;</span></a></h4>
            <a href="#" class="close">&times;</a>
        </div>
    @endif
    <section id="intro">
        <img class="lt no-print" src="{{ asset_path('img/top_left.png') }}" alt="img background">
        <img class="lb no-print" src="{{ asset_path('img/bottom_left.png') }}" alt="img background">
        <img class="rt no-print" src="{{ asset_path('img/top_right.png') }}" alt="img background">
        <img class="rb no-print" src="{{ asset_path('img/bottom_right.png') }}" alt="img background">
        <div class="container">
            <div class="headline">
                <img class="no-print intro-img intro-img-left" src="{{ asset_path('img/home-intro-1.png') }}" alt="Intro 1" />
                <h1>Welcome to the Toolkit on<br />Evidence-Based Programming<br />for Seniors!</h1>
                <img class="no-print intro-img intro-img-right" src="{{ asset_path('img/home-intro-2.png') }}" alt="Intro 2" />
            </div>
            <div class="highlight">
                <p>Whether your organization is just beginning to consider<br />evidence-based programming or you have been implementing EBPs for years, <span>we encourage you to explore</span> the materials in the Toolkit and take advantage of any that are beneficial to you.</p>
            </div>
            <div class="explore scroll">
                <a href="#questions" class="btn">Explore</a>
            </div>
            <div class="initial-line">
                <div class="initial-marker"></div>
                <div class="final-marker"></div>
            </div>
        </div>
    </section>
    <section id="questions">
        <div class="row">
            <div class="column small-12">
                <div class="questions clearfix">
                    <div class="push-left question">
                        <h2>Why consider evidence-based programming?</h2>
                        <p>Evidence-based programs (EBPs) are programs that have been:</p>
                        <ul>
                            <li>implemented previously,</li>
                            <li>evaluated by researchers, and </li>
                            <li>found to make positive differences in the lives of participants. </li>
                        </ul>
                        <p>Organizations utilize proven strategies when they implement EBPs.</p>
                    </div>
                    <div class="push-right question">
                        <h2>How can this Toolkit be helpful?</h2>
                        <p>The Toolkit contains materials that build the capacity of community organizations to promote senior health and well-being through evidence-based programming. The materials were shaped by our experiences working with community organizations that serve seniors with EBPs across the state of Texas. The materials, however, are relevant to organizations that implement EBPs for audiences of any age.</p>
                    </div>
                </div>
                <section class="no-screen">
                    <h2>SELECTING A SUITABLE EVIDENCE-BASED PROGRAM</h2>
                    <ul class="routing">
                        <li>1.0 What does it mean for a program to be evidence-based?</li>
                        <li>1.1 Advantages of evidence-based programs</li>
                        <li>1.2 Disadvantages of evidence-based programs</li>
                        <li>1.3 Organizational readiness to implement evidence-based programs</li>
                    </ul>
                    <ul class="routing">
                        <li>2.0 Choosing which program to implement</li>
                        <li>2.1 Identifying an important health issue</li>
                        <li>2.2 Prioritizing needs</li>
                        <li>2.3 Identifying evidence-based interventions</li>
                        <li>2.4 Support from organizational stakeholders and presence of program champions</li>
                        <li>2.5 Match with organizational purpose</li>
                        <li>2.6 Match with organizational resources</li>
                        <li>2.7 Match with clientele</li>
                        <li>2.8 Establishing partnerships</li>
                        <li>2.9 Obtaining funding</li>
                    </ul>
                    <ul class="routing">
                        <li>3.0 Evaluation planning</li>
                        <li>3.1 Process evaluation</li>
                        <li>3.2 Impact and outcome evaluation</li>
                        <li>3.3 Forming expectations</li>
                    </ul>
                        <h2>IMPLEMENTING A SUITABLE EVIDENCE-BASED PROGRAM</h2>
                    <ul class="routing">
                        <li>4.0 Implementing evidence-based programs with fidelity</li>
                        <li>4.1 Fidelity monitoring</li>
                        <li>4.2 Adapting programs to local needs and preferences while maintaining fidelity</li>
                    </ul>
                    <ul class="routing">
                        <li>5.0 Program marketing and participant recruitment</li>
                        <li>5.1 Participant retention</li>
                        <li>5.2 Working with lay leaders</li>
                        <li>5.3 Sustainability</li>
                        <li>5.4 Quality assurance</li>
                    </ul>
                </section>
            </div>
        </div>
    </section>
    <section id="routing" class="no-print">
        <div class="row">
            <div class="column small-12">
                <ul id="selection-door">
                    <li>
                        <a href="#" class="accordion door blue-header">
                            <h2>Select an Evidence Based Program</h2>
                            <h5>Learn more about EBPs and select one for your organization.</h5>
                        </a>
                        <div class="content">
                            <div class="timeline longer-timeline">
                                <div class="line"></div>
                                <div class="middle">
                                    <div class="section s01 left">
                                        <div class="marker"></div>
                                        <div class="entry">
                                            <div class="blue_small_left start">
                                                <h3>Section 1</h3>
                                                <div class="blue_arrow left_side"></div>
                                            </div>
                                            <ul class="sub-section first-hover">
                                                <li><a href="/section/1/0"><span class="s-number">1.0</span><span class="s-title">What does it mean for a program to be evidence-based?</span></a></li>
                                                <li><a href="/section/1/1"><span class="s-number">1.1</span><span class="s-title">Advantages of evidence-based programs</span></a></li>
                                                <li><a href="/section/1/2"><span class="s-number">1.2</span><span class="s-title">Disadvantages of evidence-based programs</span></a></li>
                                                <li><a href="/section/1/3"><span class="s-number">1.3</span><span class="s-title">Organizational readiness to implement evidence-based programs</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="section s02 right rev-anim anim">
                                        <div class="marker"></div>
                                        <div class="entry">
                                            <div class="blue_small_right start">
                                                <h3>Section 2</h3>
                                                <div class="blue_arrow right_side"></div>
                                            </div>
                                            <ul class="sub-section first-hover">
                                                <li><a href="/section/2/0"><span class="s-number">2.0</span><span class="s-title">Choosing which program to implement</span></a></li>
                                                <li><a href="/section/2/1"><span class="s-number">2.1</span><span class="s-title">Identifying an important health issue</span></a></li>
                                                <li><a href="/section/2/2"><span class="s-number">2.2</span><span class="s-title">Prioritizing needs</span></a></li>
                                                <li><a href="/section/2/3"><span class="s-number">2.3</span><span class="s-title">Identifying evidence-based interventions</span></a></li>
                                                <li><a href="/section/2/4"><span class="s-number">2.4</span><span class="s-title">Support from organizational stakeholders and presence of program champions</span></a></li>
                                                <li><a href="/section/2/5"><span class="s-number">2.5</span><span class="s-title">Match with organizational purpose</span></a></li>
                                                <li><a href="/section/2/6"><span class="s-number">2.6</span><span class="s-title">Match with organizational resources</span></a></li>
                                                <li><a href="/section/2/7"><span class="s-number">2.7</span><span class="s-title">Match with clientele</span></a></li>
                                                <li><a href="/section/2/8"><span class="s-number">2.8</span><span class="s-title">Establishing partnerships</span></a></li>
                                                <li><a href="/section/2/9"><span class="s-number">2.9</span><span class="s-title">Obtaining funding</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="section s03 left rev-anim anim">
                                        <div class="marker"></div>
                                        <div class="entry">
                                            <div class="blue_small_left start">
                                                <h3>Section 3</h3>
                                                <div class="blue_arrow left_side"></div>
                                            </div>
                                            <ul class="sub-section first-hover">
                                                <li><a href="/section/3/0"><span class="s-number">3.0</span><span class="s-title">Evaluation planning</span></a></li>
                                                <li><a href="/section/3/1"><span class="s-number">3.1</span><span class="s-title">Process evaluation</span></a></li>
                                                <li><a href="/section/3/2"><span class="s-number">3.2</span><span class="s-title">Impact and outcome evaluation</span></a></li>
                                                <li><a href="/section/3/3"><span class="s-number">3.3</span><span class="s-title">Forming expectations</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="section s04 left rev-anim anim">
                                        <div class="marker-end"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="accordion2 door green-header">
                            <h2>Implement an Evidence Based Program</h2>
                            <h5>Get tips and recommendations for implementing an EBP.</h5>
                        </a>
                        <div class="content">
                            <div class="timeline">
                                <div class="line2"></div>
                                <div class="middle">
                                    <div class="section s01 left">
                                        <div class="marker"></div>
                                        <div class="entry">
                                            <div class="green_small_left start">
                                                <h3>Section 4</h3>
                                                <div class="green_arrow left_side"></div>
                                            </div>
                                            <ul class="sub-section second-hover">
                                                <li><a href="/section/4/0"><span class="s-number">4.0</span><span class="s-title">Implementing evidence-based programs with fidelity</span></a></li>
                                                <li><a href="/section/4/1"><span class="s-number">4.1</span><span class="s-title">Fidelity monitoring</span></a></li>
                                                <li><a href="/section/4/2"><span class="s-number">4.2</span><span class="s-title">Adapting programs to local needs and preferences while maintaining fidelity</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="section s02 right rev-anim anim">
                                        <div class="marker"></div>
                                        <div class="entry">
                                            <div class="green_small_right start">
                                                <h3>Section 5</h3>
                                                <div class="green_arrow right_side"></div>
                                            </div>
                                            <ul class="sub-section second-hover">
                                                <li><a href="/section/5/0"><span class="s-number">5.0</span><span class="s-title">Program marketing and participant recruitment</span></a></li>
                                                <li><a href="/section/5/1"><span class="s-number">5.1</span><span class="s-title">Participant retention</span></a></li>
                                                <li><a href="/section/5/2"><span class="s-number">5.2</span><span class="s-title">Working with lay leaders</span></a></li>
                                                <li><a href="/section/5/3"><span class="s-number">5.3</span><span class="s-title">Sustainability</span></a></li>
                                                <li><a href="/section/5/4"><span class="s-number">5.4</span><span class="s-title">Quality assurance</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="section s05 right rev-anim anim">
                                        <div class="marker"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section id="news" class="no-print">
        <div class="row">
            <div class="column medium-10 medium-centered">
                <div class="news-panel">
                    <h2 class="text-center"><span>News &amp; Announcements</span></h2>
                    <div class="news-carousel">
                        @foreach ($announcements as $announcement)
                            <div class="news-item">
                                <div class="row">
                                    <div class="column medium-4">
                                        <img src="/{{ config('site.uploads.content')}}/{{ $announcement['image'] }}" class="news-image" />
                                    </div>
                                    <div class="column medium-8">
                                        <div class="news-content">
                                            {!! $announcement['announcement'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
