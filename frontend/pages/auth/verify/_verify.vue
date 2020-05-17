<template>
  <a-spin />
</template>
<script>
  export default {
    async mounted() {
      await this.verify();
    },
    methods: {
      async verify() {
        const id = this.$route.params.verify.split('-').pop();
        const token = this.$route.params.verify.split('-')[0];

        await this.$axios.$get('sanctum/csrf-cookie');
        let resp = await this.$axios.post('/api/verify', {
          token: token,
          id: id
        });

        console.log(resp.data.data.success);

        if (resp.data.data.success == true) {
          this.$router.replace({name: 'index'});
        }
      }
    }
  }
</script>
