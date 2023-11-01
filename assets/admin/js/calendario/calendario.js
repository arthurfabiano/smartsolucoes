$(document).ready(function () {
    var calendar = $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay,listMonth",
        },
        editable: true,
        events: "/ajax?controller=Calendario&action=getCalendario&param=",
        displayEventTime: true,
        editable: true,
        eventRender: function (event, element, view) {
            if (event.allDay === "true") {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,

        select: function (start, end, allDay) {
            var formattedStartDate = moment(start).format("YYYY-MM-DD");
            var formattedEndDate = moment(end).format("YYYY-MM-DD");
            document.getElementById("title").value = '';

            $("#modal-calendario").modal("show");

            $("#btnSubmit").on("click", function () {
                var data = {
                    start: formattedStartDate,
                    end: formattedEndDate,
                    title: document.getElementById("title").value
                };

                $.ajax({
                    url: "/ajax",
                    data: {
                        controller: "Calendario",
                        action: "store",
                        param: data,
                    },
                    type: "POST",
                    success: function (data) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                });

                calendar.fullCalendar("unselect");
            });
        },

        eventClick: function(info) {
            $("#modal-calendario-edit").modal("show");
            document.getElementById("edt-title").value = info.title;
            document.getElementById("id-event").value = info.id;
        },
    });

    $("#btnAtualizar").on("click", function (start, end) {
        var data = {
            id: document.getElementById("id-event").value,
            title: document.getElementById("edt-title").value
        };

        $.ajax({
            url: "/ajax",
            data: {
                controller: "Calendario",
                action: "update",
                param: data,
            },
            type: "POST",
            success: function (data) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (error) {
                console.error(error);
            }
        });

        calendar.fullCalendar("unselect");
    });

    $("#btnDelete").on("click", function () {
        var data = {
            id: document.getElementById("id_event").value
        };

        $.ajax({
            url: "/ajax",
            data: {
                controller: "Calendario",
                action: "delete",
                param: data,
            },
            type: "POST",
            success: function (data) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (error) {
                console.error(error);
            }
        });

        calendar.fullCalendar("unselect");
    });
});