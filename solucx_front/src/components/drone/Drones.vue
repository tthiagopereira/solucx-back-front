<template>
  <div>

    <div class="row mt-5">
      <div class="col-md-4">
        <router-link :to="`/create/drone`" class="btn btn-success">Cadastrar Drone</router-link>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>

    <div class="row mt-5" ></div>
    <div class="row">
      <div class="col-md-2">
        <h2>Pesquisa:</h2>
      </div>
      <div class="col-md-4">
        <input class="form-control" id="txtName" v-on:keyup.enter="pesquisaDroneId" type="text" placeholder="ID do drone, aperte Enter para pesquisar">
      </div>
      <div class="col-md-4">
      </div>
    </div>
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
          <router-link class="" :to="`/update/drone/${drone.id}`">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
          </router-link>

          <a v-b-modal.modal-1 @click="destroy(drone.id)" class="py-3 px-md-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
              <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
            </svg>
          </a>

          <router-link :to="`/show/drone/${drone.id}`">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </router-link>
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
      droneShow: '',
      id: 0,
      droneId: 0,
      max: 100,
      pesquisaDrone: null,
      mainProps: { blankColor: '#777', width: 75, height: 75, class: 'm1' }
    };
  },
  watch: {

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

    show(id) {
      this.$http.get('/api/drones/'+id)
          .then(resp => {
            this.drones = resp.data
            if(this.drones.length == 0) {
              alert('Não existe esse drone')
            }
          });
    },

    index() {
      this.$http.get('/api/drones/')
          .then(resp => { this.drones = resp.data;});
    },

    destroy(id) {
      this.$http.delete('/api/drones/'+id)
      .then(() => this.index());
    },

    addMessage: function(event){
      alert(event.target.value)
      console.log(event.target.value)
      //stuff
    },
    pesquisaDroneId: function(event){
      this.droneId = event.target.value;
      this.drones = ''
      this.show(this.droneId)
    }
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