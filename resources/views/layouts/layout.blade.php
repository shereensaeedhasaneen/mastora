
  @yield('mainContent')  
</body>
    <footer>
        <div class="row justify-content-end align-items-center h-100">
            <div class="col-4">
              <p class="footer-text">® جميع الحقوق محفوظة | بنك ناصر الاجتماعي</p>
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
      <script src="{{asset('mastora/js/main.js')}}"></script>
      <script src="{{asset('mastora/js/main-forms.js')}}"></script>
      <script src="{{asset('mastora/js/switchPages-forms.js')}}"></script>
  
      <!--DataTable-->
  
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="{{asset('mastora/js/dataTables.bootstrap5.min.js')}}"></script>
      <script>
          $(document).ready(function() {
              $('#AllApplications').DataTable();
          } );
      </script>
  </body>
  </html