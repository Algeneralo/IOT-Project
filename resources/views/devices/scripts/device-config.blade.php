<script>
    getHeart();

    // check device status until success
    function getHeart() {
        $.ajax({
            url: '{{url('/getHeart')}}',
            type: 'GET',
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                console.log("true1");
                if (data.status == 204) {
                    getFormData();
                } else getHeart();
            }, error: function (error) {
                alert('something went wrong!');
                console.log(error.responseJSON)
            }
        });
    }

    // get network data and device id
    function getFormData() {
        $.ajax({
            url: '{{url('/deviceFormData')}}',
            type: 'GET',
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 500) {
                    console.log("error put")
                    alert('something went wrong!');
                }
                putFormData(data)
            }, error: function (error) {
                alert('something went wrong!');
                console.log(error.responseJSON)
            }
        });
    }

    function putFormData(data) {
        console.log("true2");
        $("#searchingAlert").attr("style", "display: none !important");
        $("#foundAlert").attr("style", "display: flex !important");
        $("#configDiv").attr("style", "display: block !important");
        for (counter = 0; counter < data.networks.length; counter++) {
            $('#ssid').append($('<option>').text(data.networks[counter].ssid).attr('value', data.networks[counter].ssid));
        }
        console.log(data.deviceID);
        $("#device_id").val(data.deviceID);

    }
</script>