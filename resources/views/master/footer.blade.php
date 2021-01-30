
   <footer class="main-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <p>Your company &copy; 2017-2020</p>
        </div>
        <div class="col-sm-6 text-right">
          <p>
            Design by
            <a
              href="https://bootstrapious.com/p/admin-template"
              class="external"
              >Bootstrapious</a
            >
          </p>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
</div>
<!-- JavaScript files-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="js/front.js"></script>
{{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"></script> --}}
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="js/charts-home.js"></script>

<script src="{{ asset('js/select2.min.js') }}"> </script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"> </script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"> </script>
<script src="{{ asset('js/buttons.flash.min.js') }}"> </script>
<script src="{{ asset('js/jszip.min.js')}}"> </script>

<script src="{{ asset('js/buttons.html5.min.js') }}"> </script>
<script src="{{ asset('js/buttons.print.min.js') }}"> </script>
<script src="{{ asset('js/toastr.min.js') }}"> </script>

<script src="{{ asset('js/jquery.cookie.js') }}"> </script>
<script src="{{ asset('js/jquery.datetimepicker.full.js') }}"> </script>
<script src="{{ asset('js/moment.js') }}"> </script>

<script src="{{ asset('js/custome_validation.js') }}"> </script>
<script src="{{ asset('js/Chart.min.js') }}"> </script>
<!-- Main File-->

<script>
    @if (Session::has('success'))
      toastr.success('{{ Session::get('success')}}');
      @endif

      @if (Session::has('info'))
      toastr.info('{{ Session::get('info')}}');
      @endif

      @if (Session::has('error'))
      toastr.error('{{ Session::get('error')}}');
      @endif

</script>
@yield('javascript')
</body>

</html>
