<template>
  <div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h2>Detalhe do Drone {{ drone.id}}</h2>
          <b-card title="" :img-src=drone.image img-alt="Image" img-top tag="article" style="max-width: 20rem; align-content: center" class="mb-2 text-center">
            <b-card-text class="text-left">
              <p>Name:     {{drone.name}}</p>
              <p>Endereço: {{drone.address}}</p>
              <p>Battery:  {{drone.battery}}</p>
              <p>Max speed:{{drone.max_speed}}</p>
              <p>Average speed: {{drone.average_speed}}</p>
              <p>Fly: {{drone.fly}}</p>
              <p>Status: {{drone.status}}</p>
            </b-card-text>
            <b-button href="/" variant="primary">Voltar</b-button>
          </b-card>
        </div>
        <div class="col-md-4"></div>
      </div>
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
        this.$http.get(`/api/drones/edit/${this.id}`)
            .then(resp => {
              this.drone = resp.data
            })
      }
    }
  }
}
</script>