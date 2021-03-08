<template>
  <div>
    <div class="container mt-5">
      <b-form @submit.prevent="store()">
        <h2 v-if="id">Atualizar drone {{ id }}</h2>
        <h2 v-else>Cadastrar drone</h2>

        <b-form-group id="input-group-1" label="Número do drone:" label-for="input-1" description="Informe o numero do drone">
          <b-form-input id="input-1" v-model="drone.id" v-if="id" type="number" placeholder="Entre o numero do drone" required></b-form-input>
          <b-form-input id="input-1" v-model="drone.id" v-else type="number" placeholder="Entre o numero do drone" required></b-form-input>
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
          <b-form-input id="input-2" v-model="drone.battery" type="number" placeholder="Entre com o battery" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o max speed:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.max_speed" type="number" placeholder="Entre com o max speed" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o average speed:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.average_speed" type="number" placeholder="Entre com o average speed" required></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Informe o fly:" label-for="input-2">
          <b-form-input id="input-2" v-model="drone.fly" type="number" placeholder="Entre com o fly" required></b-form-input>
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
      id: this.$route.params.id,
    }
  },
  created() {
    this.show()
  },
  methods: {
    store() {
      if(this.id) {

        this.$http.put('/api/drones/'+this.id, this.drone)
            .then(() => {
              this.drone = new Drone(),err => console.log(err)
              this.$router.push('/')
            })

      }else{

        this.$http.post('/api/drones/'+this.drone.id, this.drone)
            .then(() => {
                  err => console.log(err),
                  this.$router.push('/')}
            )
      }

    },

    show() {
      if(this.id) {
        this.$http.get(`/api/drones/${this.id}`)
            .then(resp => {
              this.drone = resp.data
            })
      }
    }
  }
}
</script>