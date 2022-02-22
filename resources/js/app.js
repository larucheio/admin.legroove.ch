import 'bootstrap'
import 'flatpickr'

import { Calendar } from '@fullcalendar/core'
import frLocale from '@fullcalendar/core/locales/fr';
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import bootstrap5Plugin from '@fullcalendar/bootstrap5'

document.addEventListener('DOMContentLoaded', (event) => {
  let calendarEl = document.getElementById('fullcalendar')
  if (calendarEl) {
    let calendar = new Calendar(calendarEl, {
      plugins: [ dayGridPlugin, timeGridPlugin, listPlugin , bootstrap5Plugin ],
      themeSystem: 'bootstrap5',
      locale: frLocale,
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      eventSources: [
        {
          url: '/fullcalendar/json/bookings',
          color: 'green'
        },
        {
          url: '/fullcalendar/json/activities',
          color: 'blue'
        },
      ],
    })

    calendar.render()
  }
})
