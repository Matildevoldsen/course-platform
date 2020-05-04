<template>
  <nav class="navbar">
    <a class="logo">
      Tilly Wittrup
    </a>

    <label for="toggler" class="icon">
      <a-icon type="menu" />
    </label>
    <input type="checkbox" v-model="checked" id="toggler"/>
    <div class="navbar-container">
      <div class="backdrop" @click="close"></div>
      <label for="toggler" class="close-btn">
        <a-icon type="close" />
      </label>
      <ul class="navbar-items">
        <slot></slot>
      </ul>
    </div>
  </nav>
</template>
<script>
  export default {
    name: 'WINavBar',
    data() {
      return {
        checked: false
      }
    },
    methods: {
      close() {
        this.checked = false
      }
    }
  }
</script>
