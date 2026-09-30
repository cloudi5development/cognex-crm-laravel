<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;


class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = [];
        if (Schema::hasTable('settings')) {
            $settings = Setting::whereIn('key', ['smtp_mailer', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name'])->pluck('value', 'key')->all();
        }
        $config['driver']     = Arr::has($settings, 'smtp_mailer') ? $settings['smtp_mailer'] : env('MAIL_MAILER');
        $config['host']       = Arr::has($settings, 'mail_host') ? $settings['mail_host'] : env('MAIL_HOST');
        $config['port']       = Arr::has($settings, 'mail_port') ? $settings['mail_port'] : env('MAIL_PORT');
        $config['username']   = Arr::has($settings, 'mail_username') ? $settings['mail_username'] : env('MAIL_USERNAME');
        $config['password']   = Arr::has($settings, 'mail_password') ? $settings['mail_password'] : env('MAIL_PASSWORD');
        $config['encryption'] = Arr::has($settings, 'mail_encryption') ? $settings['mail_encryption'] : env('MAIL_ENCRYPTION');;

        $config['from']       = array(
            'address'   => Arr::has($settings, 'mail_from_address') ? $settings['mail_from_address'] : env('MAIL_FROM_ADDRESS'),
            'name'      => Arr::has($settings, 'mail_from_name') ? $settings['mail_from_name'] : env('MAIL_FROM_NAME')
        );

        $config['sendmail']   = '/usr/sbin/sendmail -bs -i';
        Config::set('mail', $config);
    }
}
