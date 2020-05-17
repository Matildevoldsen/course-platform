<template>
  <container>
    <div v-if="this.courses.courses">
      <a-row type="flex" justify="center" align="middle">
        <a-col v-for="course in this.courses.courses" :key="course.id" :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
          <card :title="course.title" :link="course.slug">
            <p>{{ course.description}}</p>
          </card>
        </a-col>
      </a-row>
    </div>
  </container>
</template>
<script>
  import container from '../components/Container';
  import card from '../components/Card';
  import {mapState} from 'vuex'

  export default {
    async fetch({store}) {
      return await store.dispatch('courses/get')
    },
    components: {
      container: container,
      card: card
    },
    computed: {
      ...mapState(['courses'])
    },
  }
</script>
