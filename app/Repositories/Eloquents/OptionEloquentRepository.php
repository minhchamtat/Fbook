<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Option;
use App\Repositories\Contracts\OptionRepository;

class OptionEloquentRepository extends AbstractEloquentRepository implements OptionRepository
{
    public function model()
    {
        return new Option;
    }

    public function getData($data = [], $dataSelect = ['*'])
    {
        return $this->model()
        ->select($dataSelect)
        ->where($data)
        ->get();
    }

    public function setting()
    {
        if (!\Cache::has('textFooters')) {
            \Cache::forever('textFooters', $this->model()->where(['key' => 'text_footer'])->get());
        }
        if (!\Cache::has('banners')) {
            \Cache::forever('banners', $this->model()->where(['key' => 'banner'])->get());
        }
        if (!\Cache::has('bannerBooks')) {
            \Cache::forever('bannerBooks', $this->model()->where(['key' => 'banner_book'])->first());
        }
        if (!\Cache::has('apps')) {
            \Cache::forever('apps', $this->model()->where(['key' => 'app'])->get());
        }
        if (!\Cache::has('textBanners')) {
            \Cache::forever('textBanners', $this->model()->where(['key' => 'text_banner'])->get());
        }
        if (!\Cache::has('textApps')) {
            \Cache::forever('textApps', $this->model()->where(['key' => 'app_text'])->get());
        }
        if (!\Cache::has('contacts')) {
            \Cache::forever('contacts', $this->model()->where(['key' => 'contact'])->get());
        }
        if (!\Cache::has('address')) {
            \Cache::forever('address', $this->model()->where(['key' => 'address'])->get());
        }
        if (!\Cache::has('emails')) {
            \Cache::forever('emails', $this->model()->where(['key' => 'email'])->get());
        }
        $data['textFooters'] = \Cache::get('textFooters');
        $data['banners'] = \Cache::get('banners');
        $data['bannerBooks'] = \Cache::get('bannerBooks');
        $data['apps'] = \Cache::get('apps');
        $data['textBanners'] = \Cache::get('textBanners');
        $data['textApps'] = \Cache::get('textApps');
        $data['contacts'] = \Cache::get('contacts');
        $data['address'] = \Cache::get('address');
        $data['emails'] = \Cache::get('emails');

        return $data;
    }

    public function updateImgtOption($value, $key)
    {
        $countOption = $this->model()->where('key', $key)->first();
        $data['key'] = $key;
        if ($countOption) {
            $data['value'] = $value;

            return $countOption->update($data);
        } else {
            $data['value'] = $value;

            return $this->model()->create($data);
        }
        \Cache::forever('textFooters', $this->model()->where(['key' => 'text_footer'])->get());
    }

    public function updateBanner($id, $value)
    {
        $countImgBanner = $this->model()->where('id', $id)->first();
        if ($countImgBanner) {
            $data['id'] = $id;
            $data['value'] = $value;

            return $countImgBanner->update($data);
        } else {
            $data['key'] = 'app';
            $data['value'] = $value;

            return $this->model()->create($data);
        }
        \Cache::forever('textBanners', $this->model()->where(['key' => 'text_banner'])->get());
    }

    public function updateTextApp($id, $value)
    {
        $countTextApp = $this->model()->where('id', $id)->first();
        if ($countTextApp) {
            $data['id'] = $id;
            $data['value'] = $value;

            return $countTextApp->update($data);
        } else {
            $data['key'] = 'app_text';
            $data['value'] = $value;

            return $this->model()->create($data);
        }
        \Cache::forever('textApps', $this->model()->where(['key' => 'app_text'])->get());
    }

    public function deleteApp($id)
    {
        $this->model()->destroy($id);
    }
}
