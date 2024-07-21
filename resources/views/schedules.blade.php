@extends('index')

@section('content')
    <div class="container mt-4">
        <div id='calendar'></div>
    </div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek'
      },
      buttonText: {
        month: 'month',
        week: 'week',
      },
      selectable: true,
      select: function(info) {
        window.location.href = `{{ url('/event/create') }}`;
      },
      editable: true,
    //   ?start=${info.startStr}&end=${info.endStr}
      events: @json(session('events') ?? [])
    });
    calendar.render();
  });
</script>
@endsection
