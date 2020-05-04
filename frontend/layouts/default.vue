<template>
  <div>
    <WINavBar>
      <div class="nav-left">
        <WINavItem>
          <n-link to="/">Home</n-link>
        </WINavItem>
        <WINavItem>
          <n-link to="/">About</n-link>
        </WINavItem>
      </div>

      <template v-if="$auth.loggedIn">
        {{ $auth.user.name }}
      </template>
      <template v-if="!$auth.loggedIn">
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
    }
  }
</script>
