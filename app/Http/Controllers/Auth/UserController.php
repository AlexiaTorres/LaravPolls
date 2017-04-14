<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Helpers\Socialite as SocialiteHelper;
/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var SocialiteHelper
     */
    protected $helper;

    /**
     * UserController constructor.
     *
     * @param UserRepository  $user
     * @param SocialiteHelper $helper
     */
    public function __construct(User $user, SocialiteHelper $helper)
    {
        $this->user = $user;
        $this->helper = $helper;
    }

    /**
     * @param Request $request
     * @param $provider
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function login(Request $request, $provider)
    {
        // There's a high probability something will go wrong
        $user = null;

        // If the provider is not an acceptable third party than kick back
        if (! in_array($provider, $this->helper->getAcceptedProviders())) {
            return redirect()->route('welcome')->withFlashDanger(trans('auth.socialite.unacceptable', ['provider' => $provider]));
        }

        /*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (! $request->all()) {
            return $this->getAuthorizationFirst($provider);
        }

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $this->user->findOrCreateSocial($this->getSocialUser($provider), $provider);
        } catch (GeneralException $e) {
            return redirect()->route('/')->withFlashDanger($e->getMessage());
        }

        if (is_null($user) || ! isset($user)) {
            return redirect()->route('welcome')->withFlashDanger(trans('exceptions.frontend.auth.unknown'));
        }

        // User has been successfully created or already exists
        Auth::login($user, true);

        // Set session variable so we know which provider user is logged in as, if ever needed
        session([config('access.socialite_session_name') => $provider]);

        // Return to the intended url or default to the class property
        return redirect()->intended(route('welcome'));
    }

    /**
     * @param  $provider
     *
     * @return mixed
     */
    private function getAuthorizationFirst($provider)
    {
        $socialite = Socialite::driver($provider);

        return $socialite->redirect();
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    private function getSocialUser($provider)
    {
        return Socialite::driver($provider)->user();
    }
}
