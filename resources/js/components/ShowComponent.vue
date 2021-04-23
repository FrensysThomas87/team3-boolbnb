<template>
        <div class="apartment-box">
            <!-- Title + address -->
            <h1 class="apartment-title">{{apartments.title}}</h1>
            <h4 class="apartment-address">{{apartments.address}}</h4>


             <div class="main-box">
                 <!-- Box left -->
                 <div class="main-box-left">
                      <!-- Inserisci placeholder se immagine vuota -->
                    <!-- <img class= "" style="width:300px;" src="/images/placeholder/casadefault.jpg" alt=""> -->
                    <!-- <div class="pic-container"> -->
                        <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                        <img v-else src="/images/placeholder/casadefault.jpg" alt="">
                    <!-- </div> -->
                 </div>

                 <!-- Box right -->
                 <div class="main-box-right">
                    <!-- Mappa -->
                    <!-- <img  src="https://lh3.googleusercontent.com/proxy/hKuhG_ipMzNTOluMhdno-8T4Bz0bwhWLQ0ps4I-I0d3v0yEJquvIhAgWSnrSnNk2d4SKf8DBAo4yCkwG2XRosD4wUU_cDZIIr1vb82Qq-EwmInKBxQT0hoVO" alt=""> -->
                 </div>


             </div>

            <div class="apartment-properties">
                <ul>
                    <li><i class="fas fa-home fa-2x"></i></li>
                    <li><span class="apartment-guests">{{apartments.max_guests}} ospiti</span></li>
                    <li><span class="apartment-rooms">{{apartments.rooms}} camere</span></li>
                    <li><span class="apartment-beds">{{apartments.beds}} letti</span></li>
                    <li><span class="apartment-baths">{{apartments.baths}} bagni</span></li>
                    <li><span class="apartment-mq">{{apartments.sq_meters}}mq</span></li>
                </ul>
            <!-- <div class="apartment-user">
                <i class="fas fa-user fa-2x"></i>
                <span>User name, surname</span>

            </div> -->

            <div class="apartment-check-in">
                <ul>
                    <li class="apartment-check-in"><i class="far fa-clock fa-lg"></i> Check in: {{apartments.check_in}}</li>
                    <li class="apartment-check-out"><i class="fas fa-clock fa-lg"></i> Check out: {{apartments.check_out}}</li>
                </ul>
            </div>
                <p class="apartment-description">{{apartments.description}}</p>
            </div>



            <div class="apartment-services">
                <h2>Services</h2>
                <ul>
                    <li><i class="fas fa-plus"></i> Wifake</li>
                    <li><i class="fas fa-plus"></i> Animali fake</li>
                    <li><i class="fas fa-plus"></i> Colazione fake</li>
                    <li><i class="fas fa-plus"></i> Cancellazione prenotazione gratuita</li>
                </ul>
            </div>

            <div class="apartment-booking">
                <h4><i class="fas fa-tag"></i> Prezzo: {{apartments.price}}€ /notte</h4>
                <h4><i class="far fa-eye"></i> Visualizzazioni: {{apartments.view_count}} </h4>
                <button v-on:click="$emit('active-message')" type="button" class="btn btn-primary"><i class="fas fa-credit-card"></i> PRENOTA</button>
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
    // Common
    @mixin resetListBullets{
        list-style: none;
    }

    // MENU INLINE LI STYLES COMMON************
    @mixin menu-inline-li-common{
        display: inline-block;
        cursor: pointer;
    }

    .main-box{
        display: flex;
        width: 100%;
        height: 400px;
        // background-color: blue;
        // border: 1px solid black;
        border-radius: 30px;
        overflow: hidden;


        &-left{
            width: 50%  ; //Sottrai padding pagina
            height: 100%;
            background-color:blue;
            img{
                height: 100%;
            }
            // background-image: url("/images/placeholder/casadefault.jpg");

        }
        &-right{
            width:50% ; //Sottrai padding pagina
            height: 100%;
            background-color: blue;
            background-image: url('https://lh3.googleusercontent.com/proxy/hKuhG_ipMzNTOluMhdno-8T4Bz0bwhWLQ0ps4I-I0d3v0yEJquvIhAgWSnrSnNk2d4SKf8DBAo4yCkwG2XRosD4wUU_cDZIIr1vb82Qq-EwmInKBxQT0hoVO');
        }
        &-left, &-right{
            display:inline-block;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

            img{
                width: 100%;
            }
        }
    }

    .apartment-properties{

        border-bottom: 1px solid grey;
        .apartment-description{
            font-style: italic;
        }

        ul{
            @include resetListBullets;
            padding: 0px;
        }

        li{
            @include menu-inline-li-common;
        }


    }

    .apartment-services{
        border-bottom: 1px solid grey;

        ul{
            @include resetListBullets;
            padding: 15px;
        }

    }
    button{
        margin-bottom: 15px;
    }

    img{
        width: 27%;
        height: 52%;
    }



</style>


// TODO
// 1.Mettere colori definitivi
