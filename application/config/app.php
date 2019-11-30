<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => 'سوق واثق',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => 'true',

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url'    => 'https://sooqwatheq.co',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'ar',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => 'single',

    'log_level' => 'debug',

    /*
    |--------------------------------------------------------------------------
    | Enable RTL
    |
    |--------------------------------------------------------------------------
    */

    'rtl' => true,

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Intervention\Image\ImageServiceProvider::class,
        Jenssegers\Agent\AgentServiceProvider::class,
        SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
        Thujohn\Twitter\TwitterServiceProvider::class,
        ConsoleTVs\Charts\ChartsServiceProvider::class,
        \SocialiteProviders\Manager\ServiceProvider::class,
        PragmaRX\Firewall\Vendor\Laravel\ServiceProvider::class,
        Netshell\Paypal\PaypalServiceProvider::class,
        Mews\Purifier\PurifierServiceProvider::class,
        Artesaos\SEOTools\Providers\SEOToolsServiceProvider::class,
        Snowfire\Beautymail\BeautymailServiceProvider::class,
        SammyK\LaravelFacebookSdk\LaravelFacebookSdkServiceProvider::class,
        AlbertCht\InvisibleReCaptcha\InvisibleReCaptchaServiceProvider::class,
        Unicodeveloper\Paystack\PaystackServiceProvider::class,
        Mollie\Laravel\MollieServiceProvider::class,
        Spatie\Newsletter\NewsletterServiceProvider::class,
        Cartalyst\Stripe\Laravel\StripeServiceProvider::class,
        EmailChecker\Laravel\EmailCheckerServiceProvider::class,
        Kim\Defender\DefenderServiceProvider::class,
        LaravelHungary\Barion\BarionServiceProvider::class,
        NotificationChannels\SmscRu\SmscRuServiceProvider::class,
        CashUAony\Phpanonymous\PhpAnonymousCashUProviders::class,
        JD\Cloudder\CloudderServiceProvider::class,
        Propaganistas\LaravelPhone\PhoneServiceProvider::class,
        Artistas\PagSeguro\PagSeguroServiceProvider::class,
        Anand\LaravelPaytmWallet\PaytmWalletServiceProvider::class,

        //

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App'                 => Illuminate\Support\Facades\App::class,
        'Artisan'             => Illuminate\Support\Facades\Artisan::class,
        'Auth'                => Illuminate\Support\Facades\Auth::class,
        'Blade'               => Illuminate\Support\Facades\Blade::class,
        'Bus'                 => Illuminate\Support\Facades\Bus::class,
        'Cache'               => Illuminate\Support\Facades\Cache::class,
        'Config'              => Larapack\ConfigWriter\Facade::class,
        'Cookie'              => Illuminate\Support\Facades\Cookie::class,
        'Crypt'               => Illuminate\Support\Facades\Crypt::class,
        'DB'                  => Illuminate\Support\Facades\DB::class,
        'Eloquent'            => Illuminate\Database\Eloquent\Model::class,
        'Event'               => Illuminate\Support\Facades\Event::class,
        'File'                => Illuminate\Support\Facades\File::class,
        'Gate'                => Illuminate\Support\Facades\Gate::class,
        'Hash'                => Illuminate\Support\Facades\Hash::class,
        'Lang'                => Illuminate\Support\Facades\Lang::class,
        'Log'                 => Illuminate\Support\Facades\Log::class,
        'Mail'                => Illuminate\Support\Facades\Mail::class,
        'Notification'        => Illuminate\Support\Facades\Notification::class,
        'Password'            => Illuminate\Support\Facades\Password::class,
        'Queue'               => Illuminate\Support\Facades\Queue::class,
        'Redirect'            => Illuminate\Support\Facades\Redirect::class,
        'Redis'               => Illuminate\Support\Facades\Redis::class,
        'Request'             => Illuminate\Support\Facades\Request::class,
        'Response'            => Illuminate\Support\Facades\Response::class,
        'Route'               => Illuminate\Support\Facades\Route::class,
        'Schema'              => Illuminate\Support\Facades\Schema::class,
        'Session'             => Illuminate\Support\Facades\Session::class,
        'Storage'             => Illuminate\Support\Facades\Storage::class,
        'URL'                 => Illuminate\Support\Facades\URL::class,
        'Input'               => Illuminate\Support\Facades\Input::class,
        'Validator'           => Illuminate\Support\Facades\Validator::class,
        'View'                => Illuminate\Support\Facades\View::class,
        'Image'               => Intervention\Image\Facades\Image::class,
        'Agent'               => Jenssegers\Agent\Agent::class,
        'QrCode'              => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
        'Translate'           => Stichoza\GoogleTranslate\TranslateClient::class,
        'Protocol'            => App\Library\Config\Protocol::class,
        'Helper'              => App\Library\Config\Helper::class,
        'Random'              => App\Library\Tools\Random::class,
        'TextManager'         => App\Library\Tools\TextManager::class,
        'Uploader'            => App\Library\Tools\Uploader::class,
        'EverestCloud'        => App\Library\Cloud\EverestCloud::class,
        'Theme'               => App\Library\Tools\Theme::class,
        'IP'                  => App\Library\Locale\IP::class,
        'Countries'           => App\Library\Locale\Countries::class,
        'Currencies'          => App\Library\Locale\Currencies::class,
        'Tracker'             => App\Library\Locale\Tracker::class,
        'Spam'                => App\Library\Protector\Spam::class,
        'Profile'             => App\Library\Account\Profile::class,
        'Roles'               => App\Library\Account\Roles::class,
        'Facebook'            => App\Library\FacebookSDK\Facebook::class,
        'AutoShare'           => App\Library\Tools\AutoShare::class,
        'TwitterShare'        => Thujohn\Twitter\Facades\Twitter::class,
        'FacebookSDK'         => SammyK\LaravelFacebookSdk\FacebookFacade::class,
        'Charts'              => ConsoleTVs\Charts\Facades\Charts::class,
        'Socialite'           => Laravel\Socialite\Facades\Socialite::class,
        'Newsletter'          => Spatie\Newsletter\NewsletterFacade::class,
        'Firewall'            => PragmaRX\Firewall\Vendor\Laravel\Facade::class,
        'PayPal'              => Netshell\Paypal\Facades\Paypal::class,
        'Purifier'            => Mews\Purifier\Facades\Purifier::class,
        'SEO'                 => Artesaos\SEOTools\Facades\SEOTools::class,
        'SEOMeta'             => Artesaos\SEOTools\Facades\SEOMeta::class,
        'OpenGraph'           => Artesaos\SEOTools\Facades\OpenGraph::class,
        'Paystack'            => Unicodeveloper\Paystack\Facades\Paystack::class,
        'Mollie'              => Mollie\Laravel\Facades\Mollie::class,
        'Stripe'              => Cartalyst\Stripe\Laravel\Facades\Stripe::class,
        'EmailChecker'        => EmailChecker\Laravel\EmailCheckerFacade::class,
        'Defender'            => Kim\Defender\DefenderFacade::class,
        'Barion'              =>  LaravelHungary\Barion\BarionFacade::class,
        'CashU'               => CashUAony\Phpanonymous\CashU::class,
        'Cloudder'            => JD\Cloudder\Facades\Cloudder::class,
        'PagSeguro'           => Artistas\PagSeguro\PagSeguroFacade::class,
        'PagSeguroRecorrente' => Artistas\PagSeguro\PagSeguroRecorrenteFacade::class,
        'PaytmWallet'         => Anand\LaravelPaytmWallet\Facades\PaytmWallet::class,

    ],

];