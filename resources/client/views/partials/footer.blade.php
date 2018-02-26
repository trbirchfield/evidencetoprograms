<footer>
    <div class="row">
        <div class="column medium-10 medium-centered" ng-controller="NewsletterFormController">
            <div class="panel panel-newsletter">
            <form name="newsletterForm" action="/" method="POST" id="newsletterForm" class="newsletter-form" ng-submit="submit($event, newsletterForm)" novalidate>
                    <div class="row">
                        <div class="column medium-6">
                            If you would like to receive updates when we post new content and tools, please provide your email address.
                        </div>
                        <div class="column medium-6">
                            <div class="row medium-collapse">
                                <div class="column medium-6">
                                    <div class="form-group field-wrap text form-label required rm-m-bot" ng-init="formData.newsletterEmail = ''" ng-class="{ error: newsletterForm.newsletterEmail.$invalid && (newsletterForm.$submitted) }">
                                        <input type="text" name="newsletterEmail" class="newsletter-email rm-m-bot" placeholder="Your Email Address" ng-model="formData.newsletterEmail" validation="required|email" />
                                        <small class="form-messages error" ng-messages="newsletterForm.newsletterEmail.$error" ng-if="newsletterForm.newsletterEmail.$invalid && (newsletterForm.$submitted)" ng-cloak>
                                            <span ng-message="required">Please enter your email.</span>
                                            <span ng-message="email">Please enter a valid email address.</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="column medium-6">
                                    <button class="newsletter-submit button success expand rm-m-bot" ng-class="{'button-loading' : formProcessing}" ng-disabled="formProcessing">Subscribe for Updates</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12">
            <h5 class="footer-intro">This site is brought to you by the Community Research Center for Senior Health in Collaboration with:</h5>
            <ul class="footer-logos">
                <li><img src="{{ asset_path('img/footer/logo-3.gif') }}" alt="Scott &#38; White Healthcare"></li>
                <li><img src="{{ asset_path('img/footer/logo-2.gif') }}" alt="Texas A&#38;M Health Science Center"></li>
                <li><img src="{{ asset_path('img/footer/logo-1_2.jpg') }}" alt="Central Texas Aging and Disability Resource Center"></li>
            </ul>
            <p class="disclaimer">
                By providing links to other sites, the Community Research Center for Senior Health does not guarantee, approve, or endorse the information or products available on these sites.
                @if (Request::is('programs*'))
                    The views and opinions expressed in the featured programs do not necessarily reflects those of CRC-Senior Health.
                @endif
            </p>
        </div>
        <div class="small-12 text-center">
            <p class="privacy-link"><a href="{{ route('privacy') }}">Privacy Policy</a></p>
        </div>
    </div>
    <div class="footer-img"></div>
    @if (App::environment() == 'production')
        @include('client::partials.analytics')
    @endif
</footer>
