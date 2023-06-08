import { Calendar } from '@fullcalendar/core'
import frLocale from '@fullcalendar/core/locales/fr';
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import bootstrap5Plugin from '@fullcalendar/bootstrap5'

let calendar = null
let sources = [
  {
    id: 1,
    url: '/fullcalendar/json/bookings',
    color: 'green',
  },
  {
    id: 2,
    url: '/fullcalendar/json/bookingsUnvalidated',
    color: 'orange'
  },
  {
    id: 3,
    url: '/fullcalendar/json/activities',
    color: 'blue'
  },
  {
    id: 4,
    url: '/fullcalendar/json/activitiesUnvalidated',
    color: 'orange'
  },
  {
    id: 5,
    url: '/fullcalendar/json/blocked',
    color: 'black'
  },
]

function updateEventSource (event, sourceId) {
  if (event.currentTarget.checked) {
    let source = sources.find(source => source.id === sourceId)
    calendar.addEventSource(source)
  } else {
    let source = calendar.getEventSourceById(sourceId)
    source.remove()
  }
}

document.addEventListener('DOMContentLoaded', (event) => {
  let calendarEl = document.getElementById('fullcalendar')
  if (calendarEl) {
    calendar = new Calendar(calendarEl, {
      plugins: [ dayGridPlugin, timeGridPlugin, listPlugin , bootstrap5Plugin ],
      themeSystem: 'bootstrap5',
      locale: frLocale,
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      eventSources: sources
    })

    calendar.render()
  }

  const calendarBookings = document.getElementById('calendarBookings')
  const calendarBookingsUnvalidated = document.getElementById('calendarBookingsUnvalidated')
  const calendarActivities = document.getElementById('calendarActivities')
  const calendarActivitiesUnvalidated = document.getElementById('calendarActivitiesUnvalidated')
  const calendarBlocked = document.getElementById('calendarBlocked')

  if (calendarBookings) {
    calendarBookings.addEventListener('change', (event) => updateEventSource(event, 1))
  }

  if (calendarBookingsUnvalidated) {
    calendarBookingsUnvalidated.addEventListener('change', (event) => updateEventSource(event, 2))
  }

  if (calendarActivities) {
    calendarActivities.addEventListener('change', (event) => updateEventSource(event, 3))
  }

  if (calendarActivitiesUnvalidated) {
    calendarActivitiesUnvalidated.addEventListener('change', (event) => updateEventSource(event, 4))
  }

  if (calendarBlocked) {
    calendarBlocked.addEventListener('change', (event) => updateEventSource(event, 5))
  }
})
