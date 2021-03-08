<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="danger">
      <router-link to="/">
        <img left width="150"  src="https://solucx.com.br/wp-content/uploads/2020/04/SoluCX-Logotipo-OK-1-Original-azul.png" alt="Logo" />
      </router-link>

    </b-navbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mainProps: { blank: true, width: 75, height: 75, class: 'm1' }
    }
  }
}
</script>

<style>
.tira-link {
  text-decoration: none;
}
</style>