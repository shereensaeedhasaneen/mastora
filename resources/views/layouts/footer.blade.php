</body>
<footer>
    <div class="row justify-content-end align-items-center h-100">
        <div class="col-4 justify-content-end">
          <!--<p class="footer-text">® جميع الحقوق محفوظة | بنك ناصر الاجتماعي</p>-->
          <img src="{{asset('mastora/img/aswaaq.png')}}">
        </div>
    </div>
</footer>

  <script src="/mastora/js/jquery-3.3.1.min.js"></script>
  <script src="/mastora/js/bootstrap.bundle.min.js"></script>
  <script src="/mastora/js/jquery.nice-select.min.js"></script>

  <script>
      $(document).ready(function() {
          $("select").niceSelect();
      })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('mastora/js/main.js')}}"></script>
  <script src="{{asset('mastora/js/main-forms.js')}}"></script>
  <script src="{{asset('mastora/js/switchPages-forms.js')}}"></script>
  <script src="{{asset('mastora/js/upload-file.js')}}"></script>
  <script src="{{asset('mastora/js/toastAlert.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--DataTable-->

  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('mastora/js/dataTables.bootstrap5.min.js')}}"></script>
  <script>
      $(document).ready(function() {
          $('#AllApplications').DataTable(
            {
                "order": []
            }
          );
      } );
      $(document).ready(function() {

@if (count($errors) > 0)
Swal.fire({

             icon: 'error',
             title: 'برجاء التاكد من الباينات  ',
             showConfirmButton: false,
             timer: 3000})
@endif




@if (Session::has('success'))
    Swal.fire({

    icon: 'success',
    title: {{Session::get('success')}},
    showConfirmButton: false,
    timer: 3000})

@endif
});
  </script>


</body>
</html
