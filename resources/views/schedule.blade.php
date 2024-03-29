@extends('layouts.backend')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('js/plugins/fullcalendar/fullcalendar.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/fullcalendar-sch/scheduler.min.css') }}">
    <style>

      body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
      }

      #calendar {
        max-width: 900px;
        margin: 50px auto;
      }

    </style>
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugins/fullcalendar-sch/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/fullcalendar-sch/fullcalendar.min.js') }}"></script>

    <!-- kevin: raw scheduler script -->
    <script src="{{ asset('js/plugins/fullcalendar-sch/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/fullcalendar-sch/scheduler.min.js') }}"></script>

    <!-- kevin: raw script -->
    <script>
      $(function() { // document ready

        $('#calendar').fullCalendar({
          now: '2018-04-07',
          editable: true,
          aspectRatio: 1.8,
          scrollTime: '00:00',
          header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineThreeDays,agendaWeek,month'
          },
          defaultView: 'timelineDay',
          views: {
            timelineThreeDays: {
              type: 'timeline',
              duration: { days: 3 }
            }
          },
          resourceGroupField: 'building',
          resources: [
            { id: 'a', building: '460 Bryant', title: 'Auditorium A' },
            { id: 'b', building: '460 Bryant', title: 'Auditorium B', eventColor: 'green' },
            { id: 'c', building: '460 Bryant', title: 'Auditorium C', eventColor: 'orange' },
            { id: 'd', building: '460 Bryant', title: 'Auditorium D', children: [
              { id: 'd1', title: 'Room D1', occupancy: 10 },
              { id: 'd2', title: 'Room D2', occupancy: 10 }
            ] },
            { id: 'e', building: '460 Bryant', title: 'Auditorium E' },
            { id: 'f', building: '460 Bryant', title: 'Auditorium F', eventColor: 'red' },
            { id: 'g', building: '564 Pacific', title: 'Auditorium G' },
            { id: 'h', building: '564 Pacific', title: 'Auditorium H' },
            { id: 'i', building: '564 Pacific', title: 'Auditorium I' },
            { id: 'j', building: '564 Pacific', title: 'Auditorium J' },
            { id: 'k', building: '564 Pacific', title: 'Auditorium K' },
            { id: 'l', building: '564 Pacific', title: 'Auditorium L' },
            { id: 'm', building: '564 Pacific', title: 'Auditorium M' },
            { id: 'n', building: '564 Pacific', title: 'Auditorium N' },
            { id: 'o', building: '564 Pacific', title: 'Auditorium O' },
            { id: 'p', building: '564 Pacific', title: 'Auditorium P' },
            { id: 'q', building: '564 Pacific', title: 'Auditorium Q' },
            { id: 'r', building: '564 Pacific', title: 'Auditorium R' },
            { id: 's', building: '564 Pacific', title: 'Auditorium S' },
            { id: 't', building: '564 Pacific', title: 'Auditorium T' },
            { id: 'u', building: '564 Pacific', title: 'Auditorium U' },
            { id: 'v', building: '564 Pacific', title: 'Auditorium V' },
            { id: 'w', building: '564 Pacific', title: 'Auditorium W' },
            { id: 'x', building: '564 Pacific', title: 'Auditorium X' },
            { id: 'y', building: '564 Pacific', title: 'Auditorium Y' },
            { id: 'z', building: '564 Pacific', title: 'Auditorium Z' }
          ],
          events: [
            { id: '1', resourceId: 'b', start: '2018-04-07T02:00:00', end: '2018-04-07T07:00:00', title: 'event 1' },
            { id: '2', resourceId: 'c', start: '2018-04-07T05:00:00', end: '2018-04-07T22:00:00', title: 'event 2' },
            { id: '3', resourceId: 'd', start: '2018-04-06', end: '2018-04-08', title: 'event 3' },
            { id: '4', resourceId: 'e', start: '2018-04-07T03:00:00', end: '2018-04-07T08:00:00', title: 'event 4' },
            { id: '5', resourceId: 'f', start: '2018-04-07T00:30:00', end: '2018-04-07T02:30:00', title: 'event 5' }
          ]
        });

      });

    </script>
    @endsection

@section('content')
<!-- Page Content -->
<div class="row no-gutters flex-md-10-auto">
        <div class="content">
                <div class="block-content block-content-full">
                    <!-- Calendar Container -->
                    <div id='calendar'></div>
            </div>
</div>
<!-- END Page Content -->
@endsection
