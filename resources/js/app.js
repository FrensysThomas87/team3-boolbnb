/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import axios from 'axios'
 import Vue from 'vue'
 import vSelect from "vue-select"
 window.Vue = Vue;
 require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('apartmens-component', require('./components/ApartmentsComponent.vue').default);
Vue.component('v-select', vSelect);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        apartments:[],
        searchAddress:"",
        rangeKm:'20',
        beds:0,
        rooms:0,
        services:[
            'Wifi',
            'Animali Ammessi',
            'Pulizie',
            'Posto Macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista mare'
        ],
        selectedServices:[],

    },
    methods:{

        getApartments: function(){
            const self = this;
            self.apartments=[];
            axios.get('http://127.0.0.1:8000/api/get-apartments?address='+ self.searchAddress +'&range='+ self.rangeKm)
            .then(function(response) {
            self.apartments = response.data;
            })
        }
       /*  getCoordinate: function(address){
            const self = this;
            axios.get('https://api.tomtom.com/search/2/geocode/' + address + '.json?limit=1&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr')
            .then(function(response) {
            var coordinate=[];
            coordinate = response.data.results[0].position;
            self.latitude = coordinate.lat;
            self.longitude = coordinate.lon;
            });
        } */
    },
    mounted() {


    }

});
