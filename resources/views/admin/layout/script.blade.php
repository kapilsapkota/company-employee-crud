<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/assets/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('backend/assets/dist/js/pages/dashboard2.js')}}"></script>--}}
<!-- SweetAlert2 -->
<script src="{{asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('backend/assets/plugins/toastr/toastr.min.js')}}"></script>
<!-- Summernote-->
<script src="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>



<script>
    //No Inspect Copy Code
    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });
    // document.onkeydown = function(e) {
    //     if(event.keyCode === 123) { return false; }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode === 'I'.charCodeAt(0)) { return false; }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode === 'C'.charCodeAt(0)) { return false; }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode === 'J'.charCodeAt(0)) { return false; }
    //     if(e.ctrlKey && e.keyCode === 'U'.charCodeAt(0)) { return false; }
    // }
    $(function (){
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if(\Illuminate\Support\Facades\Session::has('success_message'))
        Toast.fire({
            icon: 'success',
            title: '{{\Illuminate\Support\Facades\Session::get('success_message')}}'
        })
        @php \Illuminate\Support\Facades\Session::forget('success_message') @endphp
        @endif
        @if(\Illuminate\Support\Facades\Session::has('error_message'))
        Toast.fire({
            icon: 'error',
            title: '{{\Illuminate\Support\Facades\Session::get('error_message')}}'
        })
        @php \Illuminate\Support\Facades\Session::forget('error_message') @endphp
        @endif
    });
</script>

@yield('js')
