@extends('client::layouts.default')

@section('content')
    <section class="document-view">
        <div class="row">
            <div class="small-10 small-offset-1 columns" ng-controller="ContactFormController">
                @if (session('message'))
                    <p class="form-success">{{ session('message') }}</p>
                @endif
                <form name="form" action="/contact" method="POST" id="form" class="contact-form" ng-submit="submit($event, form)" novalidate>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="email_trap_123">
                    <h5 class="indicates-required"><span>*</span> Indicates Required</h5>
                    <div class="row">
                        <div class="small-6 columns">
                            <div class="inner-form">
                                <div class="form-group field-wrap text form-label required" ng-init="formData.name = '{{ old('name') }}'" ng-class="{ error: form.name.$invalid && (form.$submitted) }">
                                    <label for="name" class="show-for-ie">Name</label>
                                    <span class="needed">*</span>
                                    <input type="text" name="name" value="" placeholder="Name" ng-model="formData.name" validation="required">
                                    <small class="form-messages error" ng-messages="form.name.$error" ng-if="form.name.$invalid && (form.$submitted)" ng-cloak>
                                        <span ng-message="required">Please enter your name.</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="small-6 columns">
                            <div class="inner-form">
                                <div class="form-group field-wrap text form-label required" ng-init="formData.email = '{{ old('email') }}'" ng-class="{ error: form.email.$invalid && (form.$submitted) }">
                                    <label for="email" class="show-for-ie">Email</label>
                                    <span class="needed">*</span>
                                    <input type="text" name="email" value="" placeholder="Email Address" ng-model="formData.email" validation="required|email">
                                    <small class="form-messages error" ng-messages="form.email.$error" ng-if="form.email.$invalid && (form.$submitted)" ng-cloak>
                                        <span ng-message="required">An email address is required.</span>
                                        <span ng-message="email">Please enter a valid email.</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            <div class="inner-form">
                                <div class="field-wrap text form-label contact-radio">
                                    <label for="Work Setting">work Setting</label>
                                    <p>Work Setting</p>
                                    <ul>
                                        <li><input type="radio" name="setting" value="Community-based organization">Community-based organization</li>
                                        <li><input type="radio" name="setting" value="Governmental agency">Governmental agency</li>
                                        <li><input type="radio" name="setting" value="Faith-based organization">Faith-based organization</li>
                                        <li><input type="radio" name="setting" value="Healthcare organization">Healthcare organization</li>
                                        <li><input type="radio" name="setting" value="Occupational health">Occupational health</li>
                                        <li><input type="radio" name="setting" value="School or university">School or university</li>
                                        <li><input type="radio" name="setting" value="Student in related field">Student in related field</li>
                                        <li><input type="radio" name="setting" value="Voluntary health agency">Voluntary health agency</li>
                                        <li><input type="radio" name="setting" value="Other">Other</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns">
                            <div class="inner-form">
                                <div class="field-wrap text form-label contact-radio">
                                    <label for="Familiarity">Familiarity with evidence-based programming </label>
                                    <p>Familiarity with evidence-based programming</p>
                                    <ul>
                                        <li><input type="radio" name="familiarity" value="Not at all familiar">Not at all familiar</li>
                                        <li><input type="radio" name="familiarity" value="Moderately familiar">Moderately familiar</li>
                                        <li><input type="radio" name="familiarity" value="Very familiar">Very familiar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns">
                            <div class="inner-form">
                                <div class="form-group field-wrap text form-label" ng-init="formData.help = '{{ old('help') }}'" ng-class="{ error: form.help.$invalid && (form.$submitted) }">
                                    <div class="contact-radio">
                                        <label for="Familiarity">How can we help?</label>
                                        <span class="needed">*</span>
                                        <p>How can we help?</p>
                                        <ul>
                                            <li><input type="radio" name="help" ng-model="formData.help" value="I want to ask a question" validation="required">I want to ask a question </li>
                                            <li><input type="radio" name="help" ng-model="formData.help" value="I want to provide feedback on the site" validation="required">I want to provide feedback on the site</li>
                                            <li><input type="radio" name="help" ng-model="formData.help" value="Recommend an additional resource" validation="required">Recommend an additional resource</li>
                                            <li><input type="radio" name="help" ng-model="formData.help" value="Report a technical issue with the site" validation="required">Report a technical issue with the site </li>
                                            <li><input type="radio" name="help" ng-model="formData.help" value="Other" validation="required">Other</li>
                                        </ul>
                                    </div>
                                    <small class="form-messages error" ng-messages="form.help.$error" ng-if="form.help.$invalid && (form.$submitted)" ng-cloak>
                                        <span ng-message="required">Please tell us how we can help you.</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns">
                            <div class="inner-form">
                                <div class="form-group field-wrap textarea form-label required" ng-init="formData.message = '{{ old('message') }}'" ng-class="{ error: form.message.$invalid && (form.$submitted) }">
                                    <label for="message" class="show-for-ie">Message</label>
                                    <span class="needed">*</span>
                                    <textarea name="message" rows="0" cols="0" placeholder="Message" ng-model="formData.message" validation="required"></textarea>
                                    <small class="form-messages error" ng-messages="form.message.$error" ng-if="form.message.$invalid && (form.$submitted)" ng-cloak>
                                        <span ng-message="required">Please enter a message.</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns text-right">
                            <button type="submit" class="button success rm-m-bot">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
