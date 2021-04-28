<template>
        <div class="apartment-box">

            <!-- Title + address -->
            <div class = "apartment-top">
                <h1 class="apartment-title"><a :href="'/apartments/' + apartments.id">{{apartments.title}}</a></h1>
                <h6 class="apartment-address"><i class="fas fa-map-marker-alt fa-lg"></i>{{apartments.address}}</h6>
            </div>

             <!-- Immagine appartamento + mappa -->
             <div class="main-box">
                 <!-- Box left -->
                 <div class="main-box-left">
                    <!-- Immagine appartamento -->
                    <a :href="'/apartments/' + apartments.id">
                        <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                        <img v-else src="/images/placeholder/casadefault.jpg" alt="">
                    </a>
                 </div>

                 <!-- Box right -->
                 <div class="main-box-right">
                    <!-- Mappa -->
                    <img
                        class="map-search"
                        :src = "'https://api.tomtom.com/map/1/staticimage?layer=basic&style=main&format=png&zoom=14&center=' + apartments.longitude +'%2C%20' + apartments.latitude + '&width=658&height=400&view=Unified&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr'"
                    >
                 </div>
             </div>

            <!-- Proprietà appartamento -->
            <div class="apartment-properties">
                <!-- Lista proprietà appartamento -->
                <ul>
                    <li><i class="fas fa-home fa-2x"></i></li>
                    <li><span class="apartment-guests">{{apartments.max_guests}} ospiti</span></li>
                    <li><span class="apartment-rooms">{{apartments.rooms}} camere</span></li>
                    <li><span class="apartment-beds">{{apartments.beds}} letti</span></li>
                    <li><span class="apartment-baths">{{apartments.baths}} bagni</span></li>
                    <li><span class="apartment-mq">{{apartments.sq_meters}}mq</span></li>
                </ul>
                <!-- Check in - orari -->
                <ul>
                    <li class="apartment-check-in"><span><i class="far fa-clock fa-lg"></i> Check in: {{apartments.check_in}}</span></li>
                    <li class="apartment-check-out"><span><i class="fas fa-clock fa-lg"></i> Check out: {{apartments.check_out}}</span></li>
                </ul>

            </div>

            <!-- Proprietario appartamento -->
            <!-- <div class="apartment-user">
                <i class="fas fa-user fa-2x"></i>
                <span>User name, surname</span>

            </div> -->


            <!-- Descrizione appartamento -->
            <div class="apartment-description">
                <h2>Descrizione</h2>
                <p>{{apartments.description}}</p>
            </div>



            <!-- Servizi appartamento -->
            <div class="apartment-services">
                <h2>Servizi</h2>
                <ul>
                    <li v-for="(service, key) in apartments.services" :key="key">
                        <i class="far fa-dot-circle"></i>
                        <span> {{service.service_name}}</span>
                    </li>
                </ul>
            </div>

            <!-- Prezzo appartamento -->
            <div class="apartment-booking">
                <h2><i class="fas fa-tag"></i> Prezzo: {{apartments.price}}€ /notte</h2>
                <!-- <h2><i class="far fa-eye"></i> Visualizzazioni: {{apartments.view_count}} </h2> -->
            </div>

            <!-- Messaggi appartamento -->
            <div class="apartment-messages">
                <button v-on:click="$emit('active-message')"  type="button" class="my-btn-msg btn btn-primary">
                    <i class="far fa-comment"></i> INVIA MESSAGGIO</button>
            </div>
        </div>
</template>

<script>
export default {
  name: 'ShowComponent',
    props:{
        apartments : Object
    },

}
</script>

<style lang="scss" scoped>

</style>


