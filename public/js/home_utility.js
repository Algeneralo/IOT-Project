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

// called when the client connects
function onConnect(context) {
    connected = true;
    subscribe(iot_id)
}


function onConnected(reconnect, uri) {
    console.log('connected');
    connected = true;
//  publish(1)
}

function onFail(context) {
    connected = false;
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
    connected = false;
}

// called when a message arrives
function onMessageArrived(message) {
    //hint! message.payloadString, destinationName, topic
    let topic = message.destinationName.split('/')[3];
    let device_div = "#" + message.destinationName.split('/')[1];
    let stemp = safeTagsRegex(message.payloadString);
    if (topic === "t" || topic === "s") {
        let device_class = "." + topic;
        $(device_div).find(device_class).html(stemp);
    }
    if (topic === "h" && stemp === "true") {
        $(device_div).attr('data-original-title', 'Heating!');
        $(device_div).removeClass("bg-primary").removeClass('bg-success').addClass("bg-heating");
    }
    if (topic === "c" && stemp === "true") {
        $(device_div).attr('data-original-title', 'Cooling!');
        $(device_div).removeClass("bg-heating").removeClass('bg-success').addClass("bg-primary");
    }


}

// hostname, port, iot_id, user, pass
function connect(hostname, port, iot_id, user, pass) {
    var hostname = 'm15.cloudmqtt.com';
    var port = 32060;   // webSocketPort
    var clientId = 'brew-web-' + makeid();

    var path = '/';
    var user = 'fsoyuhgt';
    var pass = '4RGUx0JxSbDn';

    iot_id = "1234567890";
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
    console.log('sub +t');

    var topic = iot_id + '/+/ftss/s';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +s');

    var topic = iot_id + '/+/ftss/h';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +h');

    var topic = iot_id + '/+/ftss/c';
    var qos = 0;
    client.subscribe(topic, {qos: Number(qos)});
    console.log('sub +c');
}

function unsubscribe() {
    var topic = '1234567890/+/ftss/t';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });

    var topic = '1234567890/+/ftss/s';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });
    var topic = '1234567890/+/ftss/h';
    client.unsubscribe(topic, {
        onSuccess: unsubscribeSuccess,
        onFailure: unsubscribeFailure,
        invocationContext: {topic: topic}
    });
    var topic = '1234567890/+/ftss/c';
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

function removeClass(myClass) {
    var element = document.getElementById("b1");
    element.className = element.className.replace('/\b' + myClass + '\b/g', "");
}

function addClass(myClass) {
    var element, arr;
    element = document.getElementById("b1");
    arr = element.className.split(" ");
    if (arr.indexOf(myClass) == -1) {
        element.className += " " + myClass;
    }
}
