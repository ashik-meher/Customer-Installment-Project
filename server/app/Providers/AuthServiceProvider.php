<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


// Passport

use Laravel\Passport\Passport;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        // Uncommented For Passport Usage

        'App\Models\Model' => 'App\Policies\ModelPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        Passport::routes();

        $this->registerPolicies();

        //

        // Use Passport routes


    }
}


/*
Bearer Token Test
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYWNkMzY4NWU3ODRmNzExOTYwZDQ0ZWJmYzE3M2FkYTAyMTZjYzUxNDhlMzQxMjE2N2U2NzVhOTc2ODQ0ODZmZWJjY2JiZjZiNjM1NzllYmQiLCJpYXQiOjE2Njk5ODM5ODQsIm5iZiI6MTY2OTk4Mzk4NCwiZXhwIjoxNzAxNTE5OTg0LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.yys00RA15yp-DkSMBjB9bkpcwJDa1Mn_xpA9IKDnHlpuI2uGsjce44rkBIEpHkEU7kfE7Q_4Etl9aVi2Hf32gGkQOCGyrUcBxZJw9azrvsYy3tDXsutF6NvXLQsDbyH9Kp-TcVME_VUTByEXe_P7Orqyqc9YYthQjlxJbFuLqv3Okkrms8UnD7z6H_Wm85kVQaMxzwNQt6x4O5JtTSMwY9aoTUEs7Cc0uOPJ3Nc-EbMc3udVvB5lulRyxDRK81bjnuu6YRpE6_aERKEz1j3XOMiIhcwpKKLHhj3AD6kfKxzCOi0Sqv1hOZYz8Pr5GCdYWTFAJHDXPiGBixWivwKhA7YDpD321rqQ-2fs4D_xWOAFGxNwCyCaDvZMo4EixM57t-NDM0tkXQg9z5zSxm-MRw6j41t31xtccqI7ga1E_lgRqCDD3rFb_QyKSRRtEP9BUm8VgiozfvYeKluunWYlAgYtzLSbmp3EBeAr2r-uxGZ6gn2RAo9Wq6RsegpWMYTHywJjkkhYMjNhI3tNYtjA7f6psBVmtoZ9-7qXGj-lF3sN37W254knF9pAakVQMKmjnilJYyEJuAQifg0VikLxatBIZwd-QVBKUjjAtk_jPb85u909P_8GjavPLw87zMD_Liu6GsocZAYx7HGLHrkEd6wMyS_BHqkbaqb4q8o7f7s

*/