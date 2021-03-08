import Vue from 'vue'
import Router from 'vue-router'
import Drones from '@/components/drone/Drones';
import DroneForm from '@/components/drone/DroneForm';

Vue.use(Router)

export default new Router({
    routes:[
        {path: '/', component: Drones},
        {path: '/create/drone', component: DroneForm}
    ]
})