@extends('client::layouts.default')

@section('content')
    <section class="page-content" ng-controller="FaqController" ng-cloak>
        <div class="row">
            <div class="column medium-3">
                <ul class="faq-categories">
                    <li ng-repeat="category in categories" ng-class="{ active: activeCategory === category.id }"><a href="#" ng-click="changeCategory($event, category.id)" ng-bind="category.title"></a></li>
                </ul>
            </div>
            <div class="column medium-9">
                <div class="faq-questions content-box">
                    <div class="toggle-all text-right">
                        <a href="#">[ Open All ]</a>
                    </div>
                    <dl class="accordion">
                        <div ng-repeat="category in categories" ng-show="category.id === activeCategory">
                            <dd class="accordion-navigation" ng-repeat="question in category.questions">
                                <a href="#question-<% $index %>"><h3><span ng-bind="question.question"></span> <i class="fa fa-plus"></i></h3></a>
                                <div id="question-<% $index %>" class="content">
                                    <span ng-bind-html="question.answer"></span>
                                </div>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="row">
                    <div class="column medium-9">
                        <div class="content-box">
                            <h3>Can't find the answer to your question?</h3>
                            <p class="lead"><i>Use the form below.</i></p>
                            <form name="faqForm" action="/" method="POST" id="faqForm" class="faq-form" ng-submit="submitQuestion($event, faqForm)" novalidate>
                                <div class="form-group field-wrap text form-label required" ng-init="formData.name = ''" ng-class="{ error: faqForm.name.$invalid && (faqForm.$submitted) }">
                                    <input type="text" name="name" placeholder="Full Name" ng-model="formData.name" validation="required" />
                                    <small class="form-messages error" ng-messages="faqForm.name.$error" ng-if="faqForm.name.$invalid && (faqForm.$submitted)" ng-cloak>
                                        <span ng-message="required">Please enter your full name.</span>
                                    </small>
                                </div>
                                <div class="form-group field-wrap text form-label required" ng-init="formData.email = ''" ng-class="{ error: faqForm.email.$invalid && (faqForm.$submitted) }">
                                    <input type="text" name="email" placeholder="Email Address" ng-model="formData.email" validation="required|email" />
                                    <small class="form-messages error" ng-messages="faqForm.email.$error" ng-if="faqForm.email.$invalid && (faqForm.$submitted)" ng-cloak>
                                        <span ng-message="required">Please enter your email.</span>
                                        <span ng-message="email">Please enter a valid email address.</span>
                                    </small>
                                </div>
                                <div class="form-group field-wrap text form-label required" ng-init="formData.question = ''" ng-class="{ error: faqForm.question.$invalid && (faqForm.$submitted) }">
                                    <textarea name="question" placeholder="Ask your Question" ng-model="formData.question" validation="required"></textarea>
                                    <small class="form-messages error" ng-messages="faqForm.question.$error" ng-if="faqForm.question.$invalid && (faqForm.$submitted)" ng-cloak>
                                        <span ng-message="required">Please enter your question.</span>
                                    </small>
                                </div>
                                <button type="submit" class="button success rm-m-bot" ng-class="{'button-loading' : formProcessing}" ng-disabled="formProcessing">Submit your question <img src="{{ asset_path('img/button-loading.gif') }}" class="spinner" /></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
