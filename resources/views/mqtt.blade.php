@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">MQTT Tool</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Tools</li>
                    <li class="breadcrumb-item active" aria-current="page">MQTT</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

  <!-- Connection panel -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span id="connectionStatus">Connection - Disconnected.</span>
        </div>
        <div class="panel-body" id="serverCollapse">
          <form>
            <div class="row">

              <div class="col-lg-5">
                <div class="form-group">
                  <label for="hostInput">Host</label>
                  <input type="text" class="form-control" id="hostInput" value="m15.cloudmqtt.com">
                </div>
              </div>
              <div class="col-lg-1">
                <div class="form-group">
                  <label for="portInput">Port</label>
                  <input type="text" class="form-control" id="portInput" value="32060">
                </div>

              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="clientIdInput">Client ID</label>
                  <input type="text" class="form-control" id="clientIdInput" value="js-1234">
                </div>
              </div>
              <div class="col-lg-1">
                <div class="form-group">
                  <label for="clientConnectButton"></label>
                  <a id="clientConnectButton" class="btn btn-default" onclick="connectionToggle();">Connect</a>
                </div>
              </div>
            </div>
              <div class="row">

              <div class="col-lg-2">
                <div class="form-group">
                  <label for="pathInput">Path</label>
                  <input type="text" class="form-control" id="pathInput" value="/">
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="userInput">Username</label>
                  <input type="text" class="form-control" id="userInput" value="fsoyuhgt">
                </div>
              </div>

              <div class="col-lg-2">
                <div class="form-group">
                  <label for="passInput">Password</label>
                  <input type="password" class="form-control" id="passInput">
                </div>
              </div>

              <div class="col-lg-1">
                <div class="form-group">
                  <label for="keepAliveInput">Keepalive</label>
                  <input type="text" class="form-control" id="keepAliveInput" value="60">
                </div>
              </div>

              <div class="col-lg-1">
                <div class="form-group">
                  <label for="timeoutInput">Timeout</label>
                  <input type="text" class="form-control" id="timeoutInput" value="3">
                </div>
              </div>

              <div class="col-lg-1">
                <div class="form-group">
                  <label for="tlsInput">TLS</label>
                  <input type="checkbox" class="special-checkbox" id="tlsInput" value="" checked>
                </div>
              </div>
              <div class="col-lg-1">
                <div class="form-group">
                  <label for="cleanSessionInput">Clean Session</label>
                  <input type="checkbox" class="special-checkbox" id="cleanSessionInput" value="" checked>
                </div>

              </div>
              <div class="col-lg-1">
                <div class="form-group">
                  <label for="automaticReconnectInput">Automatic Reconnect</label>
                  <input type="checkbox" class="special-checkbox" id="automaticReconnectInput" value="" checked>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-3">
                <div class="form-group">
                  <label for="lwtInput">Last Will Topic</label>
                  <input type="text" class="form-control" id="lwtInput">
                </div>
              </div>

              <div class="col-lg-1">
                <div class="form-group">
                  <label for="lwQosInput">QoS</label>
                  <select class="form-control" id="lwQosInput">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-1">
                <div class="form-group">
                  <label for="lwRetainInput">Retain</label>
                  <input type="checkbox" class="special-checkbox" id="lwRetainInput" value="">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                  <label for="lwMInput">Last Will Message</label>
                  <textarea class="form-control" id="lwMInput" rows="3"></textarea>
                </div>
              </div>
            </div>
        </div>
        </form>
</div>
<!-- End of Connection panel -->


<div class="row ">
  <!-- Subscription panel -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Subscribe
      </div>
      <div class="panel-body" id="subscribeCollapse">

        <form class="form-horizontal">

          <div class="form-group">
            <label for="subscribeTopicInput" class="col-sm-2 control-label">Topic</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="subscribeTopicInput" value="world" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="subscribeQosInput" class="col-sm-2 control-label">QoS</label>
            <div class="col-sm-10">
              <select class="form-control" id="subscribeQosInput" disabled>
                <option>0</option>
                <option>1</option>
                <option>2</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button id="subscribeButton" type="button" class="btn btn-default" onclick="subscribe();" disabled>Subscribe</button>
              <button id="unsubscribeButton" type="button" class="btn btn-default" onclick="unsubscribe();" disabled>Unsubscribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Subscription panel -->
  <!-- Publish panel -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Publish Message
      </div>
      <div class="panel-body" id="publishCollapse">
        <form >
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <label for="publishTopicInput">Topic</label>
                  <input type="text" class="form-control" id="publishTopicInput" value="world" disabled>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="publishQosInput">QoS</label>
                  <select class="form-control" id="publishQosInput" disabled>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
              </div>
            </div>
            <div class="col-lg-1">
              <div class="form-group">
                <label for="publishRetainInput">Retain</label>
                <input type="checkbox" class="special-checkbox" id="publishRetainInput" value="" disabled>
              </div>
            </div>
            <div class="col-lg-1">
              <div class="form-group">
                <label for="publishButton"></label>
                <button id="publishButton" type="button" class="btn btn-default" onclick="publish();" disabled>Publish</a>
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col-lg-12">
            <div class="form-group">
              <label for="publishMessageInput">Message</label>
              <textarea class="form-control" id="publishMessageInput" rows="3"></textarea>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Publish panel -->
</div>
<div class="row">


  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a class="chevron-toggle" data-toggle="collapse" data-target="#subscriptionsCollapse" href="#collapseOne">
                      Last Messages
                  </a>
      </div>
      <div class="panel-body collapse in fixed-height-panel" id="subscriptionsCollapse">
        <table class="table table-hover table-condensed tableSection" id="lastMessageTable">
          <thead>
            <tr>
              <th>Topic</th>
              <th>Payload</th>
              <th>Time</th>
              <th>QoS</th>
            </tr>
          </thead>
          <tbody>

          </tbody>

        </table>
      </div>
    </div>

  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a class="chevron-toggle" data-toggle="collapse" data-target="#historyCollapse" href="#collapseOne">
                      History
                      </a>
      </div>
      <div class="panel-body collapse in fixed-height-panel" id="historyCollapse">
        <span class="right"><a href="#" onclick="clearHistory()">Clear History</a></span>
        <table class="table table-hover table-condensed  tableSection" id="incomingMessageTable">

          <thead>
            <tr>
              <th>Topic</th>
              <th>Payload</th>
              <th>Time</th>
              <th>Qos</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a class="chevron-toggle" data-toggle="collapse" data-target="#consoleCollapse" href="#collapseOne">
                      Console
                      </a>
      </div>
      <div class="panel-body collapse in fixed-height-panel-pre" id="consoleCollapse">
        <pre id="consolePre" class="pre-scrollable"></pre>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Source Paho MQTT Client-->
<script src="{{ URL::asset('js/paho-mqtt.js') }}"></script>
<!--<script src="../src/paho-mqtt.js"></script>-->

<!-- Utility Javascript -->
<script src="{{ URL::asset('js/utility.js') }}"></script>


</div>
<!-- END Page Content -->
@endsection
