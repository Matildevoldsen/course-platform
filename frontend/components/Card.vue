<template>
  <a-card :title="title">
    <template v-if="link">
      <n-link slot="extra" :to="'/courses/' + link">Watch Now</n-link>
    </template>
    <slot></slot>
  </a-card>
</template>
<script>
  export default {
    props: {
      title: String,
      description: String,
      thumbnail: String,
      link: String
    }
  }
</script>
