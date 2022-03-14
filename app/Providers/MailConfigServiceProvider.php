<?php

namespace App\Providers;

use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('setting')) {
            // $mail = DB::table('setting')->first();
            $sender_email = DB::table('setting')->where("setting_key","notification_sender_email")->first();
            $sender_name = DB::table('setting')->where("setting_key","notification_sender_name")->first();

            $smtp_host = DB::table('setting')->where("setting_key","smtp_host")->first();
            $smtp_username = DB::table('setting')->where("setting_key","smtp_username")->first();
            $smtp_password = DB::table('setting')->where("setting_key","smtp_password")->first();
            $smtp_port = DB::table('setting')->where("setting_key","smtp_port")->first();
            $encryption = DB::table('setting')->where("setting_key","encryption")->first();

            if ($smtp_host) //checking if table is not empty
            {
                $config = array(
                    'driver'     => "smtp",
                    'host'       => $smtp_host,
                    'port'       => $smtp_port,
                    'from'       => array('address' => $sender_email, 'name' => $sender_name),
                    'encryption' => $encryption,
                    'username'   => $smtp_username,
                    'password'   => $smtp_password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                Config::set('mail', $config);
            }
        }
    }
}