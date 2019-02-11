/*******************************************************************************
 * Copyright (c) 2015 IBM Corp.
 *
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * and Eclipse Distribution License v1.0 which accompany this distribution.
 *
 * The Eclipse Public License is available at
 *    http://www.eclipse.org/legal/epl-v10.html
 * and the Eclipse Distribution License is available at
 *   http://www.eclipse.org/org/documents/edl-v10.php.
 *
 * Contributors:
 *    James Sutton - Initial Contribution
 *******************************************************************************/

/*
Eclipse Paho MQTT-JS Utility
This utility can be used to test the Eclipse Paho MQTT Javascript client.
*/

// Create a client instance
var client = null;
var connected = false;
var currentUnit = true;
var temporaryUnit = true;
var targetGlobalValue = null;
//initialize iot_id
iot_id = null;

// called when the client connects
function onConnect(context) {
    connected = true;
    subscribe(iot_id)
}


function onConnected(reconnect, uri) {
    console.log('onConnected');
    connected = true;
//  publish(1)
}

function onFail(context) {
    console.log('onFail');
    connected = false;
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
    console.log('lost connection');
    console.trace(responseObject);
    console.log(responseObject);
    connected = false;
}

// called when a message arrives
function onMessageArrived(message) {
    //hint! message.payloadString, destinationName, topic
    let topic = message.destinationName.split('/')[3];
    let device_div = "#" + message.destinationName.split('/')[1];
    let stemp = safeTagsRegex(message.payloadString);
    if (topic === "s") {
        let device_class = "." + topic;
        // me add to try
        //        let sblob = message.destinationName.split('/')[0];
        //  let sblob = document.getElementsByClassName('s').innerText;
        let blob = $(device_div).find(device_class).text();
        let sblob = blob.split('/', 1)[0];
        //let sblob = document.querySelectorAll($(device_div).find('.s'));
//        console.log(blob);
//        console.log(sblob);
        $(device_div).find(device_class).html(sblob + "/ " + stemp + "°");
    }
    if (topic === "t") {
        let device_class = "." + topic;
        $(device_div).find(device_class).html(stemp + "°");
    }
    if (topic === "o" && stemp === "0") {
        $(device_div).attr('data-original-title', 'Stopped!');
        $(device_div).removeClass("bg-primary").removeClass('bg-danger').removeClass('bg-success').addClass("bg-secondary");
        $(device_div).find('.oo').attr('class', 'fa fa-2x fa-times-circle text-white-75 oo');
    }
    if (topic === "o" && stemp === "1") {
        $(device_div).attr('data-original-title', 'Target Temp!');
        $(device_div).removeClass("bg-danger").removeClass('bg-primary').removeClass('bg-secondary').addClass("bg-success");
        $(device_div).find('.oo').attr('class', 'fa fa-2x fa-check-circle text-white-75 oo');
    }
    if (topic === "o" && stemp === "2") {
        $(device_div).attr('data-original-title', 'Heating!');
        $(device_div).removeClass("bg-primary").removeClass('bg-success').removeClass('bg-secondary').addClass("bg-danger");
        $(device_div).find('.oo').attr('class', 'fa fa-2x fa-arrow-alt-circle-up text-white-75 oo');
    }
    if (topic === "o" && stemp === "3") {
        $(device_div).attr('data-original-title', 'Cooling!');
        $(device_div).removeClass("bg-danger").removeClass('bg-success').removeClass('bg-secondary').addClass("bg-primary");
        $(device_div).find('.oo').attr('class', 'fa fa-2x fa-arrow-alt-circle-down text-white-75 oo');
    }


}

// hostname, port, iot_id, user, pass
// function connect(hostname, port, iot_id, user, pass) {
function connect(hostname, port, user, pass, iot_id) {
//  console.log(iot_id);
//  console.log(port);
//    var hostname = 'm15.cloudmqtt.com';
//    var port = 32060;   // webSocketPort
//    var port = 20000 + prt;   // webSocketPort
//    var clientId = 'brew-web-' + makeid();
    var clientId = iot_id;
    this.iot_id = iot_id;
    var path = '/';
//    var user = 'fsoyuhgt';
//    var user = iot_id;
//    var pass = '4RGUx0JxSbDn';

//    var iot_id = "1234567890";
    var keepAlive = 60;
    var timeout = 3;
    var tls = true;
    var automaticReconnect = true;
    var cleanSession = true;

    var lastWillTopic = '';
    var lastWillQos = 0; // 0 | 1 | 2
    var lastWillRetain = false;
    var lastWillMessageVal = '';
    // var port = 12060;
    // var sslPort = 22060;

    if (path.length > 0) {
        client = new Paho.Client(hostname, Number(port), path, clientId);
    } else {
        client = new Paho.Client(hostname, Number(port), clientId);
    }

    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;
    client.onConnected = onConnected;


    var options = {
        invocationContext: {host: hostname, port: port, path: client.path, clientId: clientId},
        timeout: timeout,
        keepAliveInterval: keepAlive,
        cleanSession: cleanSession,
        useSSL: tls,
        reconnect: automaticReconnect,
        onSuccess: onConnect,
        onFailure: onFail
    };


    if (user.length > 0) {
        options.userName = user;
    }

    if (pass.length > 0) {
        options.password = pass;
    }

    if (lastWillTopic.length > 0) {
        var lastWillMessage = new Paho.Message(lastWillMessageVal);
        lastWillMessage.destinationName = lastWillTopic;
        lastWillMessage.qos = lastWillQos;
        lastWillMessage.retained = lastWillRetain;
        options.willMessage = lastWillMessage;
    }

    // connect the client
    client.connect(options);
}

function disconnect() {
    client.disconnect();
    connected = false;
}

function subscribe() {

    var topic = iot_id + '/+/ftss/t';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +t ' + topic);

    var topic = iot_id + '/+/ftss/s';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +s');

    var topic = iot_id + '/+/ftss/o';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +o');
}

function unsubscribe() {
    var topic = iot_id + '/+/ftss/t';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });

    var topic = iot_id + '/+/ftss/s';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });
    var topic = iot_id + '/+/ftss/o';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });
}

function unsubscribeSuccess(context) {
}

function unsubscribeFailure(context) {
}

function clearHistory() {
}


// Just in case someone sends html
function safeTagsRegex(str) {
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

function logMessage(type, ...content) {
}

//function removeClass(myClass) {
//    var element = document.getElementById("b1");
//    element.className = element.className.replace('/\b' + myClass + '\b/g', "");
//}

//function addClass(myClass) {
//    var element, arr;
//    element = document.getElementById("b1");
//    arr = element.className.split(" ");
//    if (arr.indexOf(myClass) == -1) {
//        element.className += " " + myClass;
//    }
//}
