<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UsermetaRepository;
use App\Repositories\Contracts\UserRepository;
use Auth;
use Session;

class SettingController extends Controller
{
    protected $usermeta;
    protected $user;

    public function __construct(
        UsermetaRepository $usermeta,
        UserRepository $user
    ) {
        $this->usermeta = $usermeta;
        $this->user = $user;
    }

    public function postSaveSetting($phone, $display)
    {
        return $this->postPhoneSetting($phone, $display);
    }

    public function postSetting()
    {
        $id = Auth::id();
        $data = [
            'key' => 'display_phone',
            'user_id' => $id,
        ];
        $displayPhone = $this->usermeta->find($data);
        // $data = [
        //     'id' => $id,
        // ];
        $phones = $this->user->phoneUser([
            'id' => $id,
        ]);
        $phone = $phones[0]->phone;
        $language = $this->usermeta->find([
            'key' => 'website-language',
            'user_id' => $id,
        ]);

        return view('layout.section.setting', compact('displayPhone', 'phone', 'language'));
    }

    public function postPhoneSetting($phone, $radio)
    {
        $pattern = '/^(\+84|0)\d{9,10}$/';
        if (preg_match($pattern, $phone)) {
            $id = Auth::id();
            $data = [
                'phone' => $phone,
            ];
            $this->user->update($id, $data);
            $this->usermeta->updateDisplayPhone($id, $radio);
            $dataPhone = [
                'key' => 'display_phone',
                'user_id' => $id,
            ];
            $displayPhone = $this->usermeta->getDataSetting($dataPhone);
            $data = [
                'id' => $id,
            ];
            $phones = $this->user->phoneUser($data);
            $phone = $phones[0]->phone;
            $language = $this->usermeta->find([
                'key' => 'website-language',
                'user_id' => $id,
            ]);

            return view('layout.section.setting_phone', compact('displayPhone', 'phone', 'language'));
        } else {
            return response()->json([
                'data' => '0',
            ]);
        }
    }

    public function postLanguage($language)
    {
        $data = [
            'user_id' => Auth::id(),
            'key' => 'website-language',
        ];
        $this->usermeta->settingLanguage(Auth::id(), $language);
        Session::put('website-language', $this->usermeta->find($data)->value);

        return response()->json($language);
    }
}
