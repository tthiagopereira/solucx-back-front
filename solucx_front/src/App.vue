<template>
  <div id="app">
    <NavBar></NavBar>
    <div class="container-fluid">
      <Drones></Drones>
    </div>
  </div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'
import NavBar from '@/components/layout/NavBar';
import Drones from '@/components/drone/Drones';
export default {
  name: 'App',
  components: {
    NavBar, Drones
  }
}
</script>

<style>

</style>
