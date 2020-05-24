export const state = () => ({
  courses: [],
  course: []
})

export const mutations = {
  SET_COURSES(state, value) {
    state.courses = value
  },
  SET_COURSE(state, value) {
    state.course = value
  }
}

export const actions = {
  async get({commit}) {
    await this.$axios.$get('/api/course/all').then(function (resp) {
      commit('SET_COURSES', resp.data.courses)
    })
  },
  async getCourse({commit}, slug) {
    await this.$axios.$get('/api/courses/' + slug).then(function (resp) {
      commit('SET_COURSE', resp.data)
    })
  }
}
