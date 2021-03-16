<template>
  <div id="app">
    <NavBar></NavBar>
    <div class="container-fluid">
      <router-view />
    </div>
  </div>
</template>

<script>

import NavBar from '@/components/layout/NavBar';

export default {
  name: 'App',
  components: {
    NavBar
  }
}
</script>

<style>

</style>
