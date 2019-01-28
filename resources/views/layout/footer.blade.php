<footer>
    <div class="space-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <img src="{{ asset(config('view.image_paths.logo') . 'logo3.png') }}" alt="logo" class="logo-footer">
                <h4 class="text-white">{{ __('settings.default.social') }}</h4>
                <ul class="list-inline list-unstyled social-list footer">
                    <li>
                        <a href="{{ asset(config('view.social.facebook')) }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="{{ asset(config('view.social.linkedIn')) }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="{{ asset(config('view.social.gitHub')) }}"><i class="fa fa-github" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h4 class="text-white">{{ __('settings.default.about') }}</h4>
                <ul class="about list-unstyled footer">
                    <li>
                        <a href="">{{ __('settings.default.instruction') }}</a>
                    </li>
                    <li>
                        <a href="{{ asset(config('view.links.feedback')) }}" target="_blank">{{ __('settings.default.feedback') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h4 class="text-white">{{ __('settings.default.contact') }}</h4>
                <ul class="contact list-unstyled footer">
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>{{ $address[0]['value'] }}
                    </li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $emails[0]['value'] }}
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>{{ $contacts[0]['value'] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
