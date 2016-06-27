$(function () {
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
            updateDisplay();
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

                postOcorrencia($button.attr("value"));
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

        function postOcorrencia(id){


          /*  $.ajax({
                type: 'POST',
                url: "/admin/alarmes/checkOcorrencia",
                dataType: 'json',
                data: { id_array: id },
                success: function(data) {
                    console.log(data);
                }, error: function(data) {
                    console.log(data);
                },
            });*/
            $.post("/admin/alarmes/checkOcorrencia",
            {
                '_token': $('meta[name=csrf-token]').attr('content'),
                ocorrenciaID: id
            },function(data) {

                if(data) {
                    alert(JSON.stringify(data));
                }
                else {

                    alert('fail!');
                }
            });

          /* $.post("designs/saveimage", 
            { 
                "_token": $( _this ).find( 'input[name=_token]' ).val(),
                'base64_image': yourDesigner.getProductDataURL() 
            }, function(data) {
                if(data) {
                    alert(JSON.stringify(data));
                }
                else {

                    alert('fail!');
                }*/
            }
            init();
        });
});