<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\OptionRepository;
use Session;

class SettingController extends Controller
{
    protected $option;

    public function __construct(
        OptionRepository $option
    ) {
        $this->option = $option;
    }

    public function getOption($key)
    {
        $conditionText = [
            'key' => $key,
        ];

        return $this->option->getData($conditionText);
    }

    public function indexSetting()
    {
        $data['text'] = $this->getOption('text_footer');
        $data['banners'] = $this->getOption('banner');
        $data['bannerBook'] = $this->getOption('banner-sach')->first();
        $data['logo'] = $this->getOption('logo')->first();
        $data['apps'] = $this->getOption('app');
        $data['textBanners'] = $this->getOption('text_banner');
        $data['textApps'] = $this->getOption('app-text');
        $data['contacts'] = $this->getOption('contact');
        $data['address'] = $this->getOption('address');
        $data['emails'] = $this->getOption('email');

        return view('admin.setting.option', $data);
    }

    public function postEditText(Request $request)
    {
        $value = $request->value;
        $key = 'text_footer';
        $texts = $this->option->updateImgtOption($value, $key);
        $condition = [
            'key' => 'text_footer',
        ];
        $value = $this->option->getData($condition)->first();

        return $value->value;
    }

    public function postEditImg(Request $request)
    {
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            if ($request->banner != null) {
                $request->img->move(config('view.image_paths.slide'), $img);
                $id = $request->banner;
                $this->option->updateBanner($id, $img);
            } else {
                $request->img->move(config('view.image_paths.banner'), $img);
                $id = $request->banners;
                $this->option->updateBanner($id, $img);
            }
        }
    }

    public function postEditTextBanner(Request $request)
    {
        $id = $request->id;
        $value = $request->value;
        $this->option->updateBanner($id, $value);
        $condition = [
            'id' => $id,
        ];
        $data = $this->option->getData($condition)->first();
        
        return $data->value;
    }

    public function postAddApp(Request $request)
    {
        try {
            if ($request->idTextApp == null) {
                if ($request->hasFile('avatar')) {
                    $img = $request->avatar->getClientOriginalName();
                    $request->avatar->move(config('view.image_paths.logo'), $img);
                    $id = null;
                    $this->option->updateBanner($id, $img);
                    $value = $request->name;
                    $this->option->updateTextApp($id, $value);
                    $data['apps'] = $this->getOption('app');
                    $data['textApps'] = $this->getOption('app-text');
                    session()->flash('success', __('admin.success'));

                    return view('admin.setting.app', $data);
                } else {
                    return response()->json([
                        'data' => '0',
                    ]);
                }
            } else {
                $idText = $request->idTextApp;
                $idImg = $request->idImgApp;
                $value = $request->name;
                if ($request->hasFile('avatar')) {
                    $img = $request->avatar->getClientOriginalName();
                    $request->avatar->move(config('view.image_paths.logo'), $img);
                    $this->option->updateBanner($idImg, $img);

                    $value = $request->name;
                    $this->option->updateTextApp($idText, $value);
                    $data['apps'] = $this->getOption('app');
                    $data['textApps'] = $this->getOption('app-text');
                    session()->flash('success', __('admin.success'));

                    return view('admin.setting.app', $data);
                } else {
                    $this->option->updateTextApp($idText, $value);
                    $data['apps'] = $this->getOption('app');
                    $data['textApps'] = $this->getOption('app-text');
                    session()->flash('success', __('admin.success'));

                    return view('admin.setting.app', $data);
                }
            }
        } catch (Exception $e) {
            Session::flash('unsuccess', trans('settings.unsuccess.error', ['messages' => $e->getMessage()]));

            return view('admin.error.error');
        }
    }

    public function postDeleteApp(Request $request)
    {
        try {
            $this->option->deleteApp($request->idText);
            $this->option->deleteApp($request->idApp);
            session()->flash('success', __('admin.success'));

            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('unsuccess', trans('settings.unsuccess.error', ['messages' => $e->getMessage()]));

            return view('admin.error.error');
        }
    }
}
