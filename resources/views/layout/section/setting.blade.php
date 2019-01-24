{{ Html::script('assets/user/js/setting.js') }}
<div class="container">
    <div class="modal fade" id="myModalSetting" role="dialog">
        <div class="modal-dialog modal-lg">
            <div id="setting-border" class="modal-content">
                <div class="modal-header">
                    <button id="close-modal" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">{{ trans('page.setting') }}</h3>
                </div>
                <div class="modal-phone">
                    <div id="phone-check">
                        @include('layout.section.setting_phone')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
