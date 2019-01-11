<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UsermetaRepository;
use App\Repositories\Contracts\UserRepository;
use Auth;

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
        if ($phone == '0') {
            if (isset($display)) {
                $id = Auth::id();
                $this->usermeta->updateDisplayPhone($id, $display);

                return response()->json([
                    'data' => '0',
                ]);
            } else {
                return response()->json([
                    'data' => '1',
                ]);
            }
        } else {
            $pattern = '/^(\+84|0)\d{9,10}$/';
            if (preg_match($pattern, $phone)) {
                $id = Auth::id();
                $data = [
                    'phone' => $phone,
                ];
                $this->user->update($id, $data);
                $this->usermeta->updateDisplayPhone($id, $display);
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

                return view('layout.section.setting_phone', compact('displayPhone', 'phone'));
            } else {
                return response()->json([
                    'data' => '1',
                ]);
            }
        }
    }

    public function postSetting()
    {
        $id = Auth::id();
        $data = [
            'key' => 'display_phone',
            'user_id' => $id,
        ];
        $displayPhone = $this->usermeta->getDataSetting($data);
        $data = [
            'id' => $id,
        ];
        $phones = $this->user->phoneUser($data);
        $phone = $phones[0]->phone;

        return view('layout.section.setting', compact('displayPhone', 'phone'));
    }

    public function getPhoneSetting($phone, $radio)
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

            return view('layout.section.setting_phone', compact('displayPhone', 'phone'));
        } else {
            return response()->json([
                'data' => '0',
            ]);
        }
    }
}
