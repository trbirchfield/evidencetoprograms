@extends('client::layouts.default')

@section('content')
    <section class="page-content" ng-controller="ProgramsController" ng-init="getPrograms()" ng-cloak>
        <div class="row">
            <div class="column medium-10 medium-centered">
                <p class="programs-intro">Featured Programs is a collection of video presentations from the experts in the area of evidence-based programming. Each video is focused on a particular section or subsection of the website, as evident by the title of the video. The experts share their knowledge and experience about the programs they have been involved with. After watching the videos you should have fairly good idea of each section of website is and what the experts have to say.</p>
           </div>
        </div>
        <div class="row">
            <div class="column small-12">
                <ul class="small-block-grid-3 medium-block-grid-3 large-block-grid-3">
                    <li ng-repeat="program in programs">
                        <a href="#" class="program-thumb" ng-click="showDetail(program.id, $event)">
                            <img ng-src="<% program.image %>" class="program-img" />
                            <div class="program-title" ng-bind="program.title"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="modal-container" ng-class="{ 'is-visible': modalVisible }">
            <div class="modal-overlay" ng-click="dismissDetail()"></div>
            <div class="modal program-detail">
                <div class="content-box">
                    <a href="#" class="modal-close" ng-click="dismissDetail($event)"><i class="fa fa-times"></i></a>
                    <h2 class="program-title" ng-bind="program.title"></h2>
                    <div class="program-video" ng-show="program.video_id">
                        <iframe width="640" height="420" ng-src="<% program.video_url %>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="program-description" ng-bind-html="program.description"></div>
                    <div class="program-responses" ng-if="program.responses.length">
                        <h4><span ng-bind="program.responses.length"></span> Responses</h4>
                        <div class="response" ng-repeat="response in program.responses">
                            <div ng-bind="response.content"></div>
                            <div class="response-meta">
                                <i>Posted by <span ng-bind="response.posted_by"></span></i>
                            </div>
                        </div>
                    </div>
                    <div class="program-comment">
                        <h4>Add a new comment</h4>
                        <form name="commentForm" action="/" method="POST" id="commentForm" class="comment-form" ng-submit="postComment(commentForm, $event)" novalidate>
                            <input type="hidden" name="program_id" value="<% program.id %>" ng-model="formData.program_id" />
                            <div class="row" style="min-width: auto; width: auto; margin: 0 -15px;">
                                <div class="column medium-6">
                                    <div class="form-group field-wrap text form-label required" ng-init="formData.name = ''" ng-class="{ error: commentForm.name.$invalid && (commentForm.$submitted) }">
                                        <input type="text" name="name" placeholder="First Name" ng-model="formData.name" validation="required" />
                                        <small class="form-messages error" ng-messages="commentForm.name.$error" ng-if="commentForm.name.$invalid && (commentForm.$submitted)" ng-cloak>
                                            <span ng-message="required">Please enter your first name.</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="column medium-6">
                                    <div class="form-group field-wrap text form-label required" ng-init="formData.email = ''" ng-class="{ error: commentForm.email.$invalid && (commentForm.$submitted) }">
                                        <input type="text" name="email" placeholder="Email Address" ng-model="formData.email" validation="required|email" />
                                        <small class="form-messages error" ng-messages="commentForm.email.$error" ng-if="commentForm.email.$invalid && (commentForm.$submitted)" ng-cloak>
                                            <span ng-message="required">Please enter your email.</span>
                                            <span ng-message="email">Please enter a valid email address.</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-wrap text form-label required" ng-init="formData.comment = ''" ng-class="{ error: commentForm.comment.$invalid && (commentForm.$submitted) }">
                                <textarea name="comment" placeholder="Your Comment" ng-model="formData.comment" validation="required"></textarea>
                                <small class="form-messages error" ng-messages="commentForm.comment.$error" ng-if="commentForm.comment.$invalid && (commentForm.$submitted)" ng-cloak>
                                    <span ng-message="required">Please enter your comment.</span>
                                </small>
                            </div>
                            <button type="submit" class="button success rm-m-bot" ng-class="{'button-loading' : formProcessing}" ng-disabled="formProcessing">Post comment <img src="{{ asset_path('img/button-loading.gif') }}" class="spinner" /></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
