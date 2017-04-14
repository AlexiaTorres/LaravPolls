<?php

namespace App\Helpers;

/**
 * Class Socialite.
 */
class Socialite
{
    /**
     * Generates social login links based on what is enabled.
     *
     * @return string
     */
    public function getSocialLinks()
    {
        $socialite_links = [
            "<a href='". route('auth.social.login', 'twitter')."' class=\"btn btn-block btn-social btn-lg btn-twitter\"><span class=\"fa fa-twitter\"></span> Sign in with Twitter</a>",
            "<a href='". route('auth.social.login', 'github')."' class=\"btn btn-block btn-social btn-lg btn-github\"><span class=\"fa fa-github\"></span> Sign in with GitHub</a>",
        ];

        return array_reduce($socialite_links, function ($carry, $item){
            return $carry.$item."<br>";
        }, '');
    }

    /**
     * List of the accepted third party provider types to login with.
     *
     * @return array
     */
    public function getAcceptedProviders()
    {
        return [
            'github',
            'twitter',
        ];
    }
}
