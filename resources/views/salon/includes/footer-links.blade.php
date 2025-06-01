<!-- JAVASCRIPT -->
<script src="{{ asset('salon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('salon/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('salon/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('salon/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('salon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

<script>
  window.choicesInstances = {};

  (function () {
    const originalInit = window.Choices?.prototype?.init;

    if (!originalInit) {
      // Wait until Choices is defined
      Object.defineProperty(window, 'Choices', {
        configurable: true,
        set(val) {
          Object.defineProperty(window, 'Choices', {
            value: val,
            configurable: true,
            writable: true,
          });

          // Hook into init
          const originalInit = val.prototype.init;

          val.prototype.init = function () {
            const el = this.passedElement.element;
            const id = el.id || `choices-${Math.random().toString(36).slice(2, 8)}`;

            el.choicesInstance = this;
            window.choicesInstances[id] = this;

            return originalInit.apply(this, arguments);
          };
        },
      });
    } else {
      window.Choices.prototype.init = function () {
        const el = this.passedElement.element;
        const id = el.id || `choices-${Math.random().toString(36).slice(2, 8)}`;

        el.choicesInstance = this;
        window.choicesInstances[id] = this;

        return originalInit.apply(this, arguments);
      };
    }
  })();
</script>


<script src="{{ asset('salon/assets/libs/choices/choices.js') }}"></script>
<script src="{{ asset('salon/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- apexcharts -->
<script src="{{ asset('salon/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ asset('salon/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('salon/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!--Swiper slider js-->
<script src="{{ asset('salon/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('salon/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- notifications init -->
<script src="{{ asset('salon/assets/js/pages/notifications.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('salon/assets/js/app.js') }}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script defer src="{{ asset('salon/assets/js/common.js') }}"></script>
@include('display_errors')