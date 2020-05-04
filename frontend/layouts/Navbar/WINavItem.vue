<template>
  <li :class="type">
    <slot></slot>
  </li>
</template>
<script>
  export default {
    name: 'WINavItem',
    props: {
      type: String
    }
  }
</script>
