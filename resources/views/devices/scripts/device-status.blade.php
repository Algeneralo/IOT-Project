
<!-- Source Paho MQTT Client-->
<script src="{{ URL::asset('js/paho-mqtt.js') }}"></script>
<!--<script src="../src/paho-mqtt.js"></script>-->

<!-- Utility Javascript -->
<script src="{{ URL::asset('js/device_utility.js') }}"></script>
<script>
    $(function () {
        $('#target').on('click', function () {
            $('#target-box').show();
        })
        $('#target-set').on('click', function () {
            var targetValue = Number.parseFloat($('#target-value').val());
            targetValue = targetValue.toFixed(1);
            publish(0, targetValue);
            $('#target').text(targetValue);
            targetGlobalValue = targetValue;

            var differenceValue = (+$('#temperature').text()) - targetValue;
            $('#target-box').hide();
        })

        $('#target-value').on('keyup', function () {
            if (!$.isNumeric($('#target-value').val())) {
                $('#target-set').attr('disabled', 'disabled')
            }
            else {
                $('#target-set').removeAttr('disabled')
            }
        })
    })

    connect();
</script>