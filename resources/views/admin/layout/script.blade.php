{{ Html::script('admin_asset/assets/vendors/base/vendors.bundle.js') }}
{{ Html::script('admin_asset/assets/demo/default/base/scripts.bundle.js') }}
{{ Html::script('admin_asset/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}
{{ Html::script('admin_asset/assets/app/js/dashboard.js') }}
{{ Html::script('admin_asset/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js') }}
{{ Html::script('admin_asset/assets/tinymce/js/tinymce/tinymce.min.js') }}
<script>
    tinymce.init({
        selector: 'textarea#mytextarea'
      });
</script>
