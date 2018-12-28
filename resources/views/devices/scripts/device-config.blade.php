<script>
    // this is for testing
    {{--(function () {--}}
    {{--$.ajax({--}}
    {{--url: 'http://localhost:9000/testApi',--}}
    {{--// url: 'http://192.168.123.1/heart',--}}
    {{--type: 'GET',--}}
    {{--cache: true,--}}
    {{--data: {--}}
    {{--_token: "{{csrf_token()}}",--}}
    {{--},--}}
    {{--dataType: 'JSON',--}}
    {{--success: function (data) {--}}
    {{--// prepareFormData();--}}
    {{--alert('se');--}}
    {{--}, statusCode: {--}}
    {{--404: function (e) {--}}
    {{--alert('page not found');--}}
    {{--console.log(e.responseJSON.error);--}}
    {{--}--}}
    {{--}, error: function (data, textStatus, jqXHR) {--}}

    {{--}--}}
    {{--});--}}
    {{--})();--}}
    /*End*/
    getHeart();

    // check device status until success
    function getHeart() {
        console.log("Get Heart from device");
        $.ajax({
            // url: 'http://localhost:9000/testApin',
            url: 'http://192.168.123.1/heart',
            type: 'GET',
            cache: true,
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                console.log("Success to get Heart");
                prepareFormData();
            }, error: function (data, textStatus, jqXHR) {

                getHeart();
            }
        });
    }

    /**
     *preparing the form data then put it
     *
     */
    function prepareFormData() {
        let networks = getNetworks();
        let deviceID = getDeviceID();
        let data = {'networks': networks, 'deviceID': deviceID};
        putFormData(data);
    }

    function getDeviceID() {
        console.log("Get device ID");
        deviceID = "";
        $.ajax({
            // url: 'http://localhost:9000/testApid?callback=sss',
            url: 'http://192.168.123.1/device-info',
            type: 'GET',
            async: false,
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {

                console.log("success getting device id");
                return deviceID = data.hardware_device_id;
            }, error: function (error) {
                console.log(error);
                alert("Device Not Found")
            }
        });
        return deviceID;
    }

    function getNetworks() {
        let networks = [];
        console.log("get networks");
        $.ajax({
            // url: 'http://localhost:9000/testApin',
            url: 'http://192.168.123.1/networks',
            type: 'GET',
            async: false,
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                console.log("success getting network");
                networks = data.networks;
            }, statusCode: {
                503: function () {
                    alert('Initial Wi-Fi scan not finished yet,wait .... minutes');
                    getNetworks();
                }
            }, error: function (error) {
                // alert("Sonmething went wrong");
            }
        });
        return networks;
    }

    // display the configuration form and insert data on it(networks and deviceID)
    function putFormData(data) {
        console.log("put form");
        $("#searchingAlert").attr("style", "display: none !important");
        $("#foundAlert").attr("style", "display: flex !important");
        $("#configDiv").attr("style", "display: block !important");
        for (counter = 0; counter < data.networks.length; counter++) {
            $('#ssid').append($('<option>').text(data.networks[counter].ssid).attr('value', data.networks[counter].ssid));
        }
        $("#device_id").val(data.deviceID);

    }

    // config the device after precess confirm
    $("#createDeviceForm button").on("click", function (e) {
        e.preventDefault();
        console.log("Config the device");
        $(this).find('button').attr('disabled', 'disabled');
        // let configData = prepareData();
        $.ajax({
            // url: 'http://localhost:9000/testApic',
            url: 'http://192.168.123.1/config',
            type: 'PUT',
            async: false,
            data: JSON.stringify(prepareData()),
            dataType: 'JSON',
            success: function (data) {
                console.log("success device configuration");
                saveDevice()
            }, statusCode: {
                400: function (e) {
                    alert(e.responseJSON.error);
                    $(this).find('button').removeAttr('disabled');
                },
                403: function (e) {
                    alert(e.responseJSON.error);
                    $(this).find('button').removeAttr('disabled');
                    // saveDevice()
                },
            }, error: function (error) {
                console.log("error with device config,trying again....");
                $("#createDeviceForm button").click();
                // $(this).find('button').removeAttr('disabled');
            }
        });
    });

    // data that needed for device configuration
    function prepareData() {
        fname = $("#fname").val();
        return {
            "name": fname,
            "device_stats_interval": 60,
            "wifi": {
                "ssid": $("#ssid").val(),
                "password": $("#wifiPassword").val(),
            },
            "mqtt": {
                "host": "{{$mqtt->ip}}",
                "port": "{{$mqtt->port}}",
                "base_topic": "{{\Illuminate\Support\Facades\Auth::user()->iot_id}}/",
                "auth": true,
                "username": "{{$mqtt->user}}",
                "password": "{{$mqtt->password}}"
            },
            "ota": {
                "enabled": true
            }
        };
    }

    function saveDevice() {
        console.log("trying to save device to db");
        $("#foundAlert").attr("style", "display: none !important");
        $("#searchingNetworkAlert").attr("style", "display: flex !important");
        $("#configData").attr("style", "display: none !important");
        //check if the user connect the witf after 10s
        setTimeout(checkServerStatus(), 10000);
    }

    //check if the user connect to WiFi or not
    function checkServerStatus() {
        $.ajax({
            url: '{{url('/checkServer')}}',
            type: 'get',
            async: false,
            data: {
                _token: "{{csrf_token()}}"
            },
            dataType: 'JSON',
            success: function (data) {

                $('#createDeviceForm').submit();
            }, error: function (error) {
                $("#configAdd").attr("style", "display: block !important");
            }
        });
    }

    $("#configAdd a").on("click", function () {
        checkServerStatus();
    });
</script>