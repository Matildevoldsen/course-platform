<template>
  <a-layout>
    <a-layout-content style="min-height: calc(100vh - 90px);">
      <a-row style="min-height: 80vh;min-width: 300px;" type="flex" align="middle" justify="center">
        <a-col xl="14" lg="14" sm="24" xs="24" md="16">
          <a-card title="New Course">
            <a-form
              id="components-form-demo-normal-login"
              class="login-form"
              @submit.prevent="handleSubmit"
            >
              <a-form-item
                label="Title"
                :validate-status="errors.title ? 'error' : ''"
                :help="errors.title ? errors.title[0] : ''">
                <a-input required v-model="form.title" placeholder="Course Title">
                </a-input>
              </a-form-item>

              <a-form-item
                label="Description"
                :validate-status="errors.description ? 'error' : ''"
                :help="errors.description ? errors.description[0] : ''">
                <a-input required v-model="form.description" placeholder="Course Description">
                </a-input>
              </a-form-item>

              <a-form-item
                label="Slug"
                :validate-status="errors.slug ? 'error' : ''"
                :help="errors.slug ? errors.slug[0] : ''">
                <a-input required v-model="form.slug" placeholder="Course Slug">
                </a-input>
              </a-form-item>

              <a-form-item
                :validate-status="errors.is_private ? 'error' : ''"
                :help="errors.is_private ? errors.is_private[0] : ''">
                <a-checkbox v-model="form.is_private">Do you want this course to be private?</a-checkbox>
              </a-form-item>

              <a-form-item>
                <a-button v-on:click="handleSubmit" type="primary" html-type="submit" class="login-form-button">
                  New Course
                </a-button>
              </a-form-item>
            </a-form>
          </a-card>
        </a-col>
      </a-row>
    </a-layout-content>
  </a-layout>
</template>
<script>
  export default {
    middleware: 'admin',
    data() {
      return {
        errors: [],
        form: {
          title: '',
          description: '',
          slug: '',
          is_private: true
        }
      }
    },
    methods: {
      async handleSubmit(e) {
        try {
          e.preventDefault();
          await this.$axios.$get('sanctum/csrf-cookie');

          let errors = [];
          await this.$axios.post('/api/course/new', {
            title: this.form.title,
            description: this.form.description,
            slug: this.form.slug,
            is_private: this.form.is_private
          }).then(function (resp) {

          }).catch(function (err) {
            if (err.response.status = 422) {
              errors = err.response.data.errors;
            }
          })

          this.errors = errors
        } catch (e) {
          console.log(e)
        }
      }
    }
  }
</script>
<style>
  .ant-card {
    min-width: 400px;
  }
  #components-form-demo-normal-login .login-form-forgot {
    float: right;
  }

  #components-form-demo-normal-login .login-form-button {
    width: 100%;
  }
</style>
