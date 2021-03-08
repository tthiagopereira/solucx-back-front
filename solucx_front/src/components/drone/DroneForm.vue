<template>
  <div>
    <div class="container mt-5">
      <b-form @submit.prevent="store()">

        <b-form-group id="input-group-1" label="Número do drone:" label-for="input-1" description="Informe o numero do drone">
          <b-form-input id="input-1" v-model="drone.id" type="text" placeholder="Entre o numero do drone" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe a URL da IMAGE:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.image" placeholder="Entre com o image" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o name:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.name" placeholder="Entre com o name" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o address:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.address" placeholder="Entre com o address" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o battery:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.battery" placeholder="Entre com o battery" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o max speed:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.max_speed" placeholder="Entre com o max speed" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o average speed:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.average_speed" placeholder="Entre com o average speed" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o fly:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.fly" placeholder="Entre com o fly" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-3" label="status:" label-for="input-3">
          <b-form-select
              id="input-3"
              v-model="drone.status"
              :options="status"
              required
          ></b-form-select>
        </b-form-group>
        <b-button type="submit" variant="primary">Submit</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
import Drone from '@/model/Drone';

export default {
  data() {
    return {
      drone: new Drone(),
      message: '',
      status: ['success', 'failed'],
      show: true
    }
  },
  methods: {
    store() {
      this.$http.post('/api/drones/'+this.drone.id, this.drone)
      .then(() => {
        err => console.log(err)
        this.$router.push('/')
      })
    }
  }
}
</script>