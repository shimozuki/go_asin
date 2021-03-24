<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/vendors/js/ui/prism.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/datatables/datatable.js')}}"></script>
<!-- END: Page JS-->

{{-- BEGIN: EDITOR --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
  $('#editor').summernote({
    placeholder: 'Write here ...',
    tabsize: 2,
    height: 500
  });

  $('#editor2').summernote({
    placeholder: 'Write here ...',
    tabsize: 2,
    height: 200
  });

  $('#editor3').summernote({
    placeholder: 'Write here ...',
    tabsize: 2,
    height: 200
  });
</script>
{{-- END: CKEDITOR --}}

