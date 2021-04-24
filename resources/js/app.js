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
Vue.component('apartments-component', require('./components/ApartmentsComponent.vue').default);
Vue.component('show-component', require('./components/ShowComponent.vue').default);
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
        beds:'1',
        rooms:'1',
        services:[
            'WiFi',
            'Animali Ammessi',
            'Pulizie',
            'Posto Macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista mare'
        ],
        selectedServices:[],
        active:false,
        activeIndex:0,
        apartmentId:'',
        formActive:false,
        noResults:false,


    },
    methods:{

        getApartments: function(){
            const self = this;
            self.apartments=[];
            axios.get('http://127.0.0.1:8000/api/get-apartments?address='+ self.searchAddress +'&range='+ self.rangeKm)
            .then(function(response) {
            self.apartments = response.data;
            })
        },

        getApartmentIndex: function (index) {
            return this.activeIndex = index;
        },

        filterVisible: function(apartment) {
            if(apartment.visible === 'true') {
                return true;
            }
        },

        filterRooms: function(apartment) {
            if(this.rooms === '0' || this.rooms == apartment.rooms) {
                return true;
            }
        },

        filterBeds: function(apartment) {
            if(this.beds === '0' || this.beds == apartment.beds) {
                return true;
            }
        },

        filterServices: function(apartment) {

                //costruito funziona per filtrare i servizi
                //create due variabili utility
                //la funzione passa il singolo appartmaneto che + già stato ciclato nell'html dal v-for
                const apartmentServices = [];
                let counter = 0;

                //all'interno dell'appartamento ciclo i servizi appartenenti all'appartamento, e li inserisco in un array
                apartment.services.forEach(service =>{
                    apartmentServices.push(service.service_name);
                });

                //ciclo i servizi che ho selezionato nell'input e li confronto con il servizi all'interno dell'array popolato in precedenza
                //per ogni servizio che trova riscontro il contatore aumenta di 1
                this.selectedServices.forEach(selectedService => {
                    /* console.log(selectedService); */
                    apartmentServices.forEach(apartmentService => {
                        if (apartmentService === selectedService) {
                            counter = counter +1;
                        };
                    });
                });

                /* console.log(apartmentServices);
                console.log(counter);
                console.log('lunghezza array:' + this.selectedServices.length); */


                //se il contatore è uguale alla lunghezza dell'array dei servizi scelti nell'input filtro
                //ritorna true
                if (counter === this.selectedServices.length) {

                    return true
                };


        },

        activeContent: function () {
            this.active = true;
        },




    },
    mounted() {


    }

});
