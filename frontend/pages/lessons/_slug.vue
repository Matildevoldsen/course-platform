<template>
  <div id="course" v-if="lesson">
    <section class="header">
      <h1>{{ lesson.title }}</h1>
      <p>{{ lesson.description }}</p>
    </section>
    <section class="lessons">
      <container>
        <template v-if="course.lessons">
          <a-row type="flex" justify="center" align="middle">
            <a-col v-for="lesson in this.course.lessons" :key="course.id" :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
              <card :title="lesson.title" :link="lesson.slug">
                <p>{{ lesson.description}}</p>
              </card>
            </a-col>
          </a-row>
        </template>
      </container>
    </section>
  </div>
</template>
<script>
  import {mapState} from 'vuex'
  import Card from "../../components/Card";
  import container from "../../components/Container";

  export default {
    async fetch() {
      await this.$store.dispatch('courses/getCourse', this.$route.params.slug);
    },
    components: {Card, container},
    async mounted() {
      if (await this.course.redirect == true) {
        await this.$notification.open({
          message: 'Error',
          description: this.course.errors.root,
        });

        await this.$router.back();
      }
    },
    computed: {
      ...mapState({
        course: state => state.courses.course
      })
    }
  }
</script>
<style>
  #course .header {
    display: flex;
    flex-direction: column;
    height: 60vh;
    justify-content: center;
    align-items: center;
    background-color: #1890ff;
    padding: 5px;
    margin-bottom: 15px;
  }

  #course .header h1 {
    font-size: 36px;
    color: #fff;
  }

  #course .header h1, #course .header p {
    text-align: center;
  }

  #course .header p {
    margin-top: 15px;
    font-size: 20px;
    color: #fefcfc;
  }
</style>
