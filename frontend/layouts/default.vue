<template>
  <div>
    <WINavBar>
      <div class="nav-left">
        <WINavItem>
          <n-link to="/">Home</n-link>
        </WINavItem>
      </div>

      <template v-if="this.$auth.loggedIn">
        <a-dropdown>
          <a class="ant-dropdown-link">
            {{ this.$auth.user.name }}
          </a>
          <a-menu slot="overlay">
            <a-menu-item key="viewProfile">
              View Profile
            </a-menu-item>
            <a-menu-item key="viewProfile" v-if="this.$auth.user.is_admin">
              <n-link to="/admin/courses/new">New Course</n-link>
            </a-menu-item>
            <a-menu-item key="account">
              Account Settings
            </a-menu-item>
            <a-menu-item key="subscription">
              Subscription Settings
            </a-menu-item>
            <a-menu-item v-on:click="logout" key="logout">
              Logout
            </a-menu-item>
          </a-menu>
        </a-dropdown>
      </template>
      <template v-else>
        <div class="nav-right">
          <WINavItem>
            <nuxt-link :to="'/auth/login'">
              <a-button type="primary">Login</a-button>
            </nuxt-link>
          </WINavItem>

          <WINavItem>
            <nuxt-link :to="'/auth/register'">
              <a-button>Register</a-button>
            </nuxt-link>
          </WINavItem>
        </div>
      </template>
    </WINavBar>

    <nuxt/>
  </div>
</template>
<script>
  import WINavBar from "./Navbar/WINavBar";
  import WINavItem from "./Navbar/WINavItem";

  export default {
    components: {
      WINavBar,
      WINavItem
    },
    methods: {
      logout() {
        this.$auth.logout()
      }
    }
  }
</script>
