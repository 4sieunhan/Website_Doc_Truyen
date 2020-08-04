<!-- Jquery Core Js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core Js -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<!-- Select Plugin Js -->
<script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{asset('plugins/node-waves/waves.js')}}"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>
<!-- Morris Plugin Js -->
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<!-- JQuery Steps Plugin Js -->
<script src="{{asset('plugins/jquery-steps/jquery.steps.js')}}"></script>
<!-- Sweet Alert Plugin Js -->
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<!-- ChartJs -->
<script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/pages/index.js')}}"></script>
<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('js/pages/forms/editors.js')}}"></script>
<script src="{{asset('js/pages/examples/profile.js')}}"></script>
<!-- Demo Js -->
<script src="{{asset('js/demo.js')}}"></script>
<!-- Bootstrap Colorpicker Js -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<!-- Multi Select Plugin Js -->
<script src="{{asset('plugins/multi-select/js/jquery.multi-select.js')}}"></script>
<!-- Ckeditor -->
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<!-- TinyMCE -->
<script src="{{asset('plugins/tinymce/tinymce.js')}}"></script>
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<!-- Dropzone Plugin Js -->
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script>
    CKEDITOR.replace( 'description', {
    uiColor: '#A9E3EC',
});
CKEDITOR.replace( 'content', {
    uiColor: '#A9E3EC',
});
</script>
<script>
    $("#upfile1").click(function () {
    $("#file1").trigger('click');
});
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upfile1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file1").change(function(){
        readURL(this);
    });
</script>


