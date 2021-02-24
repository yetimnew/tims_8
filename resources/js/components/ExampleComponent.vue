<template>
  <li class="nav-item dropdown">
    <a
      id="notifications"
      rel="nofollow"
      data-target="#"
      href="#"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      class="nav-link"
      ><i class="fa fa-bell-o"></i
      ><span class="badge bg-red badge-corner">12</span></a
    >
    <ul aria-labelledby="notifications" class="dropdown-menu">
      <li>
        <a rel="nofollow" href="#" class="dropdown-item">
          <div class="notification">
            <div class="notification-content">
              <i class="fa fa-envelope bg-green"></i>You have 6 new messages
            </div>
            <div class="notification-time">
              <small>4 minutes ago</small> <small>4 minutes ago</small>
            </div>
          </div></a
        >
      </li>
      <li>
        <a rel="nofollow" href="#" class="dropdown-item">
          <div class="notification">
            <div class="notification-content">
              <i class="fa fa-twitter bg-blue"></i>You have 2 followers
            </div>
            <div class="notification-time">
              <small>4 minutes ago</small>
            </div>
          </div></a
        >
      </li>
      <li>
        <a rel="nofollow" href="#" class="dropdown-item">
          <div class="notification">
            <div class="notification-content">
              <i class="fa fa-upload bg-orange"></i>Server Rebooted
            </div>
            <div class="notification-time">
              <small>4 minutes ago</small>
            </div>
          </div></a
        >
      </li>
      <li>
        <a rel="nofollow" href="#" class="dropdown-item">
          <div class="notification">
            <div class="notification-content">
              <i class="fa fa-twitter bg-blue"></i>You have 2 followers
            </div>
            <div class="notification-time">
              <small>10 minutes ago</small>
            </div>
          </div></a
        >
      </li>
      <li>
        <a
          rel="nofollow"
          href="#"
          class="dropdown-item all-notifications text-center"
        >
          <strong>view all notifications </strong></a
        >
      </li>
    </ul>
  </li>
</template>

<script>
export default {
  //   mounted() {
  //     console.log("Component mounted.");
  //   },
  created() {
    // alert(this.listen());
    // this.listen();
  },
  data() {
    return {
      leladata: "lela neger new",
    };
    // operation: $operation,
  },
  methods: {
    listen() {
      Echo.channel("operation").listen("OperationCreatedEvent", (operation) => {
        // console.log(operation);
        alert(operation);
      });
    },
  },
};
</script>
