/*
 *  Document   : be_comp_calendar.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Calendar Page
 */

// Full Calendar, for more examples you can check out http://fullcalendar.io/
class pageCompCalendar {
  /*
   * Add event to the events list
   *
   */
  static addEvent() {
    let eventInput = document.querySelector('.js-add-event');
    let eventInputVal = '';

    // When the add event form is submitted
    document.querySelector('.js-form-add-event').addEventListener('submit', e => {
      e.preventDefault();

      // Get input value
      eventInputVal = eventInput.value;

      // Check if the user entered something
      if (eventInputVal) {
        let eventList = document.getElementById('js-events');
        let newEvent = document.createElement('li');
        let newEventDiv = document.createElement('div');

        // Prepare new event div
        newEventDiv.classList.add('js-event');
        newEventDiv.classList.add('p-2');
        newEventDiv.classList.add('fs-sm');
        newEventDiv.classList.add('fw-medium');
        newEventDiv.classList.add('rounded');
        newEventDiv.classList.add('bg-info-light');
        newEventDiv.classList.add('text-info');
        newEventDiv.textContent = eventInputVal;
        
        // Prepare new event li
        newEvent.appendChild(newEventDiv);

        // Add it to the events list
        eventList.insertBefore(newEvent, eventList.firstChild);

        // Clear input field
        eventInput.value = '';
      }
    });
  }

  /*
   * Init drag and drop event functionality
   *
   */
  static initEvents() {
    new FullCalendar.Draggable(document.getElementById('js-events'), {
      itemSelector: '.js-event',
      eventData: function (eventEl) {
        return {
          title: eventEl.textContent,
          backgroundColor: getComputedStyle(eventEl).color,
          borderColor: getComputedStyle(eventEl).color
        };
      }
    });
  }
  
  /*
   * Init calendar demo functionality
   *
   */
  static initCalendar() {
    let date = new Date();
    let d = date.getDate();
    let m = date.getMonth();
    let y = date.getFullYear();

    // Hacer la solicitud a la API de los eventos
    fetch('/api/eventsCalendar')
    .then(response => response.json())
    .then(data => {
      // Formatear los datos en el formato deseado
      const events = data.map(event => ({
        title: event.title,
        start: new Date(event.start),
        end: new Date(event.end),
        allDay: Boolean(event.allDay),
        url: "requisitionDetail?id="+event.url,
        color: event.color
      }));

        let calendar = new FullCalendar.Calendar(document.getElementById('js-calendar'), {
          themeSystem: 'standard',
          firstDay: 1,
          editable: true,
          droppable: true,
          headerToolbar: {
            left: 'title',
            right: 'prev,next today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
          },
          drop: function (info) {
            info.draggedEl.parentNode.remove();
          },
          events: events  // Usar los eventos obtenidos de la API
        });
          // Renderizar el calendario
          calendar.render();
    }).catch(error => console.error('Error al obtener datos:', error));

  }
  /*
   * Init functionality
   *
   */
  static init() {
    this.addEvent();
    this.initEvents();
    this.initCalendar();
  }
}

// Initialize when page loads
One.onLoad(pageCompCalendar.init());