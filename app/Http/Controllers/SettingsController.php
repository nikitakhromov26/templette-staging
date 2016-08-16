<?php

namespace Vanguard\Http\Controllers;

use Vanguard\Events\Settings\Updated as SettingsUpdated;
use Illuminate\Http\Request;
use Settings;

/**
 * Class SettingsController
 * @package Vanguard\Http\Controllers
 */
class SettingsController extends Controller
{
    /**
     * Display general settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function general()
    {
        return view('settings.general');
    }

    /**
     * Display Authentication & Registration settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function auth()
    {
        return view('settings.auth');
    }

    /**
     * Handle application settings update.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $this->updateSettings($request->except("_token"));

        return back()->withSuccess('Settings updated successfully.');
    }

    /**
     * Update settings and fire appropriate event.
     *
     * @param $input
     */
    private function updateSettings($input)
    {
        foreach($input as $key => $value) {
            Settings::set($key, $value);
        }

        Settings::save();

        event(new SettingsUpdated);
    }

    /**
     * Enable system 2FA.
     *
     * @return mixed
     */
    public function enableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => true]);

        return back()->withSuccess("Two-Factor Authentication enabled successfully.");
    }

    /**
     * Disable system 2FA.
     *
     * @return mixed
     */
    public function disableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => false]);

        return back()->withSuccess("Two-Factor Authentication disabled successfully.");
    }

    /**
     * Enable registration captcha.
     *
     * @return mixed
     */
    public function enableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => true]);

        return back()->withSuccess("reCAPTCHA enabled successfully.");
    }

    /**
     * Disable registration captcha.
     *
     * @return mixed
     */
    public function disableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => false]);

        return back()->withSuccess("reCAPTCHA disabled successfully.");
    }

    /**
     * Display notification settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notifications()
    {
        return view('settings.notifications');
    }
}