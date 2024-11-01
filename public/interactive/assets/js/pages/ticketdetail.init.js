Array.from(document.querySelectorAll(".favourite-btn")).forEach(function (t) {
    t.addEventListener("click", function (t) {
        this.classList.toggle("active");
    });
});
var str_dt = function (t) {
        var t = new Date(t),
            e =
                "" +
                [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ][t.getMonth()],
            n = "" + t.getDate(),
            t = t.getFullYear();
        return (
            e.length < 2 && (e = "0" + e),
            [(n = n.length < 2 ? "0" + n : n) + " " + e, t].join(", ")
        );
    },
    ticket_list = localStorage.getItem("ticket-list"),
    options = localStorage.getItem("option"),
    ticket_no = localStorage.getItem("ticket_no"),
    ticket = JSON.parse(ticket_list);
if (ticket) {
    (document.getElementById("ticket-title").innerHTML =
        "#VLZ" + ticket_no + " - " + ticket.tasks_name),
        (document.getElementById("t-no").innerHTML = ticket_no),
        (document.getElementById("create-date").innerHTML = str_dt(
            ticket.create_date
        )),
        (document.getElementById("due-date").innerHTML = str_dt(
            ticket.due_date
        )),
        (document.getElementById("c-date").innerHTML = str_dt(
            ticket.create_date
        )),
        (document.getElementById("d-date").innerHTML = str_dt(ticket.due_date));
    let t;
    switch (ticket.status) {
        case "New":
            t = "info";
            break;
        case "Open":
            t = "success";
            break;
        case "Inprogress":
            t = "warning";
            break;
        case "Closed":
            t = "danger";
    }
    let e;
    switch (ticket.priority) {
        case "Low":
            e = "success";
            break;
        case "Medium":
            e = "warning";
            break;
        case "High":
            e = "danger";
    }
    document
        .getElementById("ticket-status")
        .classList.replace("bg-info", "bg-" + t),
        (document.getElementById("ticket-status").innerHTML = ticket.status),
        document
            .getElementById("ticket-priority")
            .classList.replace("bg-danger", "bg-" + e),
        (document.getElementById("ticket-priority").innerHTML =
            ticket.priority);
    var div = document.createElement("div");
    (div.innerHTML = ticket.status),
        (document.getElementById("t-status").value = div.innerText),
        document
            .getElementById("t-priority")
            .classList.replace("bg-danger", "bg-" + e),
        (document.getElementById("t-priority").innerHTML = ticket.priority),
        (document.getElementById("ticket-client").innerHTML =
            ticket.client_name),
        (document.getElementById("t-client").innerHTML = ticket.client_name);
}
