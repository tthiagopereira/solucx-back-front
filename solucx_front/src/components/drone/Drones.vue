<template>
  <div>

    <div class="row mt-5">
      <div class="col-md-4">
        <router-link :to="`/create/drone`"
                     class="btn btn-success">Cadastrar Drone</router-link>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>

    <div class="row mt-5" ></div>

    <input type="text" v-model="drone_id">
    {{ drone_id}}

    <table class="table">
      <thead>
      <tr>
        <th scope="col">Drone</th>
        <th scope="col">Custumer</th>
        <th scope="col">battery</th>
        <th scope="col">max_speed</th>
        <th scope="col">average_speed</th>
        <th scope="col">fly</th>
        <th scope="col">status</th>
        <th scope="col"
            class="text-center">Ação</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(drone) in drones"
          :key="drone.id">

        <th scope="row">{{ drone.id }}</th>
        <td>
          <!-- <b-img v-bind="mainProps" left :src=drone.image rounded="circle" :alt=drone.image></b-img> -->
          <div class="row">
            <div class="col-md-2">
              <b-avatar variant="info"
                        v-bind="mainProps" left
                        :src="drone.image"
                        rounded="circle"
                        :alt="drone.image"
                        class="mr-3"></b-avatar>
            </div>
            <div class="col-md-10">
              <div class="row">
                <span class="mr-auto"> <h4> {{ drone.name }}</h4></span>
              </div>
              <div class="row mt-0">
                <span class="mr-auto"> {{ drone.address }}</span>
              </div>
            </div>
          </div>
        </td>
        <td><b-progress :value="drone.battery"
                        :max="max" show-progress animated></b-progress>
          {{ drone.battery}}
        </td>
        <td id="estiloValorMax">
          <div class="farmatarValor">
            <span class="tamanho">{{ formatarValor(drone.max_speed)[0] }}</span>
            <span>.{{ formatarValor(drone.max_speed)[1] }} m/h</span>
          </div>
        </td>
        <td>
          <div class="farmatarValor">
            <span class="tamanho">{{ formatarValor(drone.average_speed)[0] }}</span>
            <span>.{{ formatarValor(drone.average_speed)[1] }} m/h</span>
          </div>
        </td>

        <td>
          <b-form-input id="range-1"
                        v-model="drone.fly"
                        type="range"
                        min="0"
                        max="100" disabled></b-form-input>
        </td>
        <td v-if="drone.status == 'failed'">
          <button class="btn btn-danger">
            {{ drone.status }}
          </button>
        </td>
        <td v-else>
          <button class="btn btn-success">
            {{ drone.status }}
          </button>
        </td>
        <td class="text-center">
          <router-link class="btn btn-warning"
                       :to="`/update/drone/${drone.id}`">Alterar</router-link>
          <button class="btn btn-danger" v-b-modal.modal-1
                  @click="destroy(drone.id)"> Deletar</button>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {

  data() {
    return {
      drones: [],
      id: null,
      max: 100,
      drone_id: null,
      mainProps: { blankColor: '#777', width: 75, height: 75, class: 'm1' }
    };
  },
  created() {
    this.index();
  },
  methods: {
    formatarValor(valor) {
      let formatarValor = valor.toLocaleString();
      let formatarPonto = formatarValor.replace(',', '.');
      let formatoArray = formatarPonto.split('.');
      return formatoArray;
    },
    index() {
      this.$http.get('/api/drones')
          .then(resp => { this.drones = resp.data;});
    },
    destroy(id) {
      this.$http.delete('/api/drones/'+id)
      .then(() => this.index());
    },

  }
};
</script>

<style>
.farmatarValor {
  display:inline;
}
.tamanho {
  font-size: 45px;
}
</style>