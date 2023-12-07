const { createApp } = Vue;

createApp({
  data() {
    return {
      appointments: [],
      users: [],
      events: [],
      recentUsers: [],
      selectedUseriD: [],
      selectedAppointmentId: [],
      selectedAppointments: [],
      allAppointmentIdS: [],
      selecteToUpdate: 0,
      dateAppointment: "",
      messageAppointment: "",
      searchFromAUsers: "",
      SearchAppointment: "",
      eventTitle: "",
      eventDate: null,
      gmail: "",
      totalUserJoined: 0,
      totalUserActive: 0,
      totalAppointPending: 0,
      totalAppointActive: 0,
    };
  },
  methods: {
    allUsersAdmin: function () {
      const vue = this;
      var data = new FormData();
      data.append("Method", "allUsersAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.users = [];
        vue.totalUserJoined = r.data.length;

        for (var u of r.data) {
          if (u.status == 1) {
            vue.totalUserActive = r.data.length;
          }
          vue.users.push({
            user_id: u.user_id,
            profile: u.profile,
            fullname: u.fullname,
            email: u.email,
            role: u.role,
            status: u.status,
            created: u.created,
          });
        }
      });
    },
    allEventsAdmin: function () {
      const vue = this;
      var data = new FormData();
      data.append("Method", "allEventsAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.events = [];

        for (var u of r.data) {
          vue.events.push({
            events_id: u.events_id,
            event_title: u.event_title,
            event_date: u.event_date,
            color: u.color,
            created_at: u.created_at,
            updated_at: u.updated_at,
          });
        }
      });
    },
    setAppointmentToUserAdmin: function (appId) {
      const vue = this;
      var data = new FormData();
      data.append("Method", "setAppointmentToUserAdmin");
      data.append("date", vue.dateAppointment);
      data.append("message", vue.messageAppointment);
      data.append("appId", appId);
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        alert(r.data);
      });
    },
    viewAppointmentInCartAdmin: function () {
      const vue = this;
      var data = new FormData();
      data.append("Method", "viewAppointmentInCartAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.appointments = [];

        for (var u of r.data) {
          vue.gmail = u.email;
          vue.allAppointmentIdS.push(u.appointId);
          vue.appointments.push({
            appointId: u.appointId,
            fullname: u.fullname,
            email: u.email,
            orNumber: u.orNumber,
            wheel: u.wheel,
            stats: u.status,
            message: u.message,
            engineNumber: u.engineNumber,
            appointmentDate: u.appointmentDate,
            seriesModel: u.seriesModel,
            yearModel: u.yearModel,
            created_at: u.created_at,
          });
        }
      });
    },
    selectedAppointment: function (id) {
      const vue = this;
      var data = new FormData();
      data.append("Method", "viewAppointmentInCartAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.selectedAppointmentId = [];

        for (var u of r.data) {
          if (u.appointId == id) {
            vue.selectedAppointmentId.push({
              appointId: u.appointId,
              fullname: u.fullname,
              email: u.email,
              orNumber: u.orNumber,
              wheel: u.wheel,
              stats: u.status,
              engineNumber: u.engineNumber,
              appointmentDate: u.appointmentDate,
              seriesModel: u.seriesModel,
              yearModel: u.yearModel,
              created_at: u.created_at,
            });
          }
        }
      });
    },
    updateUserAdmin: function (user_id) {
      const vue = this;
      var data = new FormData();
      data.append("Method", "updateUserAdmin");
      data.append("status", vue.selecteToUpdate);
      data.append("user_id", user_id);
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        if (r.data == 200) {
          if (vue.selecteToUpdate == 1) {
            alert("User has been successfully Unrestricted");
            vue.allUsersAdmin();
          } else {
            alert("User has been successfully Restricted");
            vue.allUsersAdmin();
          }
        } else {
          alert("User is missing!");
        }
      });
    },
    selectedUser: function (id) {
      const vue = this;
      var data = new FormData();
      data.append("Method", "allUsersAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.selectedUseriD = [];

        for (var u of r.data) {
          if (u.user_id == id) {
            vue.selectedUseriD.push({
              user_id: u.user_id,
              profile: u.profile,
              fullname: u.fullname,
              email: u.email,
              role: u.role,
              status: u.status,
              created: u.created,
            });
          }
        }
      });
    },
    getSchedule: function () {
      const vue = this;
      var data = new FormData();
      data.append("Method", "viewAppointmentAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        var schedule = [];

        r.data.forEach(function (item) {
          schedule.push({
            groupId: item.id,
            title: item.fn,
            start: item.ad,
            color: item.cl,
          });
        });

        var calendarEl = document.getElementById("calendar1");

        calendar1 = new FullCalendar.Calendar(calendarEl, {
          selectable: true,
          plugins: ["timeGrid", "dayGrid", "list", "interaction"],
          timeZone: "Asia/Manila",
          defaultView: "dayGridMonth",
          contentHeight: "auto",
          eventLimit: true,
          dayMaxEvents: 4,
          header: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
          },
          events: schedule,
        });
        calendar1.render();
      });
    },
    dateToString: function (date) {
      let d = new Date(date);
      return d.toDateString() + ", " + d.toLocaleTimeString();
    },
    getDate: function (date) {
      let d = new Date(date);
      return d.getDate();
    },
    theLocaleString: function (date) {
      let d = new Date(date);
      return d.toLocaleString("en-US", { month: "long" });
    },
    getTheHours: function (date) {
      let d = new Date(date);
      return d.toLocaleTimeString();
    },
    confirmselectedappointment: function () {
      for (let i = 0; i < this.selectedAppointment.length; i++) {
        this.approveAppointment(this.selectedAppointment[i], this.gmail);
        this.viewAppointmentInCartAdmin();
      }
    },
    approveAppointment(id, gmail) {
      const vue = this;
      var data = new FormData();
      data.append("Method", "updateApproveAppointment");
      data.append("appId", id);
      data.append("gmail", gmail);
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        this.viewAppointmentInCartAdmin();
      });
    },
    approveAll() {
      for (let i = 0; i < this.selectedAppointments.length; i++) {
        this.approveAppointment(this.selectedAppointments[i], this.gmail);
        this.viewAppointmentInCartAdmin();
      }
    },
    approveAllIds() {
      for (let i = 0; i < this.allAppointmentIdS.length; i++) {
        this.approveAppointment(this.allAppointmentIdS[i], this.gmail);
        this.viewAppointmentInCartAdmin();
      }
    },
    setEventSchedule() {
      const vue = this;
      if (!vue.eventDate) {
        alert("No Date");
      } else if (!vue.eventTitle) {
        alert("No Title");
      } else {
        var data = new FormData();
        data.append("Method", "setEventSchedules");
        data.append("eventTitle", vue.eventTitle);
        data.append("eventDate", vue.eventDate);
        axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
          if (r.data == 200) {
            alert("Events Added!");
          } else {
            alert(r.data);
          }
        });
      }
    },
    recentUserAdmin() {
      const vue = this;
      var data = new FormData();
      data.append("Method", "recentUserAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.recentUsers = [];

        for (var v of r.data) {
          vue.recentUsers.push({
            profile: v.profile,
            fullname: v.fullname,
            email: v.email,
            created: v.created,
          });
        }
      });
    },
    recentAppointmentAdmin() {
      const vue = this;
      var data = new FormData();
      data.append("Method", "recentAppointmentAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.totalAppointPending = r.data.length;
      });
    },
    totalAppointActives() {
      const vue = this;
      var data = new FormData();
      data.append("Method", "recentAppointmentActiveAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        vue.totalAppointActive = r.data.length;
      });
    },
    chartDoughnot() {
      const vue = this;
      var data = new FormData();
      data.append("Method", "allUsersAdmin");
      axios.post("../../Backend/mainRoutes.php", data).then(function (r) {
        const xValues = ["Total User", "Active User", "Pending Appointments", "Approved Appointment"];
        const yValues = [vue.totalUserJoined, vue.totalUserActive, vue.totalAppointPending, vue.totalAppointActive];
        const barColors = [
          "#00aba9",
          "#2b5797",
          "#e8c3b9",
          "#1e7145",
        ];

        new Chart("doughnutChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [
              {
                backgroundColor: barColors,
                data: yValues,
              },
            ],
          },
          options: {
            title: {
              display: true,
              text: "World Wide Wine Production 2018",
            },
          },
        });
      });
    },
  },
  computed: {
    searchFromUsers: function () {
      if (!this.searchFromAUsers) {
        return this.users;
      }

      return this.users.filter(
        (user) =>
          user.fullname
            .toLowerCase()
            .includes(this.searchFromAUsers.toLowerCase()) ||
          user.email.toLowerCase().includes(this.searchFromAUsers.toLowerCase())
      );
    },
    searchFromAppointment: function () {
      if (!this.searchFromAUsers) {
        return this.appointments;
      }

      return this.appointments.filter(
        (u) =>
          u.fullname
            .toLowerCase()
            .includes(this.searchFromAUsers.toLowerCase()) ||
          u.email.toLowerCase().includes(this.searchFromAUsers.toLowerCase())
      );
    },
  },
  created: function () {
    this.getSchedule();
    this.allUsersAdmin();
    this.recentUserAdmin();
    this.viewAppointmentInCartAdmin();
    this.allEventsAdmin();
    this.recentAppointmentAdmin();
    this.totalAppointActives();
    this.chartDoughnot();
  },
}).mount("#admin-vue");
