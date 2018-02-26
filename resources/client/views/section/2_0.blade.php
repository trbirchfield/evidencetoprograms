@extends('client::layouts.default')
@section('headline', 'Choosing Which Program to Implement')
@section('section', '2.0')
@section('prev_section', '1/3')
@section('next_section', '2/1')

@section('content')
    <section class="document-view">
        @include('client::layouts.section_header')
        <div class="row search-index">
            <div class="small-9 small-offset-3 columns doc-right">
                <p>The sheer variety of available EBPs can be overwhelming. The existence of multiple programs that address similar topics can leave an organization wondering how the programs differ and if there is any benefit to implementing one instead of the others. There is no reason to feel overwhelmed or randomly select a program. A little organizational self-examination and planning can help you identify and select a suitable program. </p>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="document-nav">
                    <div class="previous">
                        <a href="/section/1/3"><span>Previous</span>Organizational readiness to implement evidence-based programs
                        </a>
                    </div>
                    <div class="next">
                        <a href="/section/2/1"><span>Next</span>Identifying an important health issue
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
