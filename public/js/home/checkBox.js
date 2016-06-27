$(function () {
 $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
 });

 $('.button-checkbox').each(function () {
        // Settings
        var $widget = $(this),
        $button = $widget.find('button'),
        $checkbox = $widget.find('input:checkbox'),
        color = $button.data('color'),
        settings = {
            on: {
                icon: 'glyphicon glyphicon-unchecked'
            },
            off: {
                icon: 'glyphicon glyphicon-check'
            }
        };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
          //  updateDisplay();
      });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "off" : "on");

            // Set the button's icon
            $button.find('.state-icon')
            .removeClass()
            .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                .removeClass('btn-default')
                .addClass('btn-' + color + ' active');                

                postOcorrencia($button.attr("value"), $button);
            }
            else {
                $button
                .removeClass('btn-' + color + ' active')
                .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }

        function postOcorrencia(id, button){
            var res = id.split("-");
            $.post('/admin/alarmes/checkOcorrencia',
            {
                '_token': $('meta[name=csrf-token]').attr('content'),
                alarmeID: res[0],
                leituraID: res[1]
            })
            .error(
               // ...
               )
            .success(
                function(data){
                // button.fadeOut( "slow" );
                //var hey = $("#dataTable > button :parent tr");
               // hey.fadeOut( "slow" );
                var disapear = $("#dataTable input[id=checked]").closest('tr')
                disapear.fadeOut( "slow" );
                //console.log(hey);
            }
            );
        }
        init();
    });
});