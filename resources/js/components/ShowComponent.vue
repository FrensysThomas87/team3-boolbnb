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
                    <!-- Mappa - background img su CSS -->
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
                <ul style="float: right; margin-right:20px">
                    <li>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-sponsor">
                            Sponsorizza
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-sponsor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Acquista Sponsor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Scegli uno Sponsor
                                    </div>
                                    <div style="display:flex; justify-content:center">
                                        <button v-on:click ="$emit('send-bronze')">
                                            <form action="">
                                                <h3>BRONZE</h3>
                                                <h5>Costo: 2,99€</h5>
                                                <h5>Durata: 24H</h5>
                                                <input id="bronze" type="hidden" value="24" name="time">
                                                <input id="bronze" type="hidden" value="2.99" name="price">
                                                <input id="bronze" type="hidden" value="bronze" name="title">
                                            </form>
                                        </button>
                                        <button v-on:click ="$emit('send-silver')" style="margin-right:15px; margin-left: 15px;">
                                            <form id="bronze" action="">
                                                <h3>Silver</h3>
                                                <h5>Costo: 5,99€</h5>
                                                <h5>Durata: 72H</h5>
                                                <input type="hidden" value="72" name="time">
                                                <input type="hidden" value="5.99" name="price">
                                                <input type="hidden" value="silver" name="title">
                                            </form>
                                        </button>
                                        <button v-on:click ="$emit('send-gold')">
                                            <form action="">
                                                <h3>Gold</h3>
                                                <h5>Costo: 9,99€</h5>
                                                <h5>Durata: 144H</h5>
                                                <input id="bronze" type="hidden" value="144" name="time">
                                                <input id="bronze" type="hidden" value="9.99" name="price">
                                                <input id="bronze" type="hidden" value="Gold" name="title">
                                            </form>
                                        </button>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form class ="delete" action="" method="POST">
                                            <button class="btn btn-danger" type="submit" value="submit">DELETE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Proprietario appartamento -->
            <!-- <div class="apartment-user">
                <i class="fas fa-user fa-2x"></i>
                <span>User name, surname</span>

            </div> -->


            <!-- Descrizione appartamento -->
            <div class="apartment-description">
                <h2>Description</h2>
                <p>{{apartments.description}}</p>
            </div>



            <!-- Servizi appartamento -->
            <div class="apartment-services">
                <h2>Services</h2>
                <ul>
                    <li v-for="service in apartments.services">
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
                <button v-on:click="$emit('active-message')" type="button" class="my-btn-msg btn btn-primary">
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


