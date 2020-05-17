export const state = () => {
  courses: []
}

export const mutations = {
  SET_COURSES(state, value) {
    state.courses = value
  }
}

export const actions = {
  async get({commit}) {
    await this.$axios.$get('/api/course/all').then(function (resp) {
      commit('SET_COURSES', resp.data.courses)
    })
  }
}
