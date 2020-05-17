<template>
  <div class="container">
    <slot></slot>
  </div>
</template>
<style>
  .container {
    max-width: 1100px;
    margin-top: 20px;
    margin-left: auto;
    margin-right: auto;
  }

  .container .ant-card {
    margin-bottom: 20px;
    width: 350px;
  }

  @media all and (max-width: 1100px) {
    .container {
      width: 95%;
    }

    .container .ant-card {
      width: 100%;
      margin-bottom: 10px;
    }
  }
</style>
