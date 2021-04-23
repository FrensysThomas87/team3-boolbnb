<template>
        <div class="apartment-box">
            <!-- Title + address -->
            <div class = "apartment-top">
                <h1 class="apartment-title">{{apartments.title}}</h1>
                <h6 class="apartment-address"><i class="fas fa-map-marker-alt fa-lg"></i>{{apartments.address}}</h6>
            </div>


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
                <ul>
                    <li class="apartment-check-in"><span><i class="far fa-clock fa-lg"></i> Check in: {{apartments.check_in}}</span></li>
                    <li class="apartment-check-out"><span><i class="fas fa-clock fa-lg"></i> Check out: {{apartments.check_out}}</span></li>
                </ul>
            </div>
            <!-- <div class="apartment-user">
                <i class="fas fa-user fa-2x"></i>
                <span>User name, surname</span>

            </div> -->

            <!-- <div class="apartment-check-in"> -->

            <div class="apartment-description">
                <h2>Description</h2>
                <p>{{apartments.description}}</p>
            </div>
            <!-- </div> -->



            <div class="apartment-services">
                <h2>Services</h2>
                <ul>
                    <li><i class="far fa-dot-circle"></i> Wifake </li>
                    <li><i class="far fa-dot-circle"></i> Animali fake</li>
                    <li><i class="far fa-dot-circle"></i> Colazione fake</li>
                    <li><i class="far fa-dot-circle"></i> Cancellazione prenotazione gratuita</li>
                </ul>
            </div>

            <div class="apartment-booking">
                <h2><i class="fas fa-tag"></i> Prezzo: {{apartments.price}}€ /notte</h2>
                <h2><i class="far fa-eye"></i> Visualizzazioni: {{apartments.view_count}} </h2>
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
    //Typography

    .apartment-box{
        font-family: "Montserrat", sans-serif, Arial, sans-serif;
        font-size: 16px;
        line-height: 1.71429;
        // line-height: 2;
        font-weight: 400;

        letter-spacing: normal;
    }

    h1{
        font-size: 26px;
        font-weight: 600;
        line-height: 0.88;
        margin-bottom: 15px;
        // letter-spacing: .075em;
    }

    h2, h3 , h4 , h5{
        line-height: 1.2;

    }

    h2{
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    h3{
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    h4{
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    h5{
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    h6{
        font-size: 14px;
        text-decoration: underline;
        font-weight: 500;
        margin-bottom: 8px;
    }

    p{
        font-size: 16px;
        color: grey;
        margin-bottom: 8px;
    }

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

    // Padding sezioni
    .apartment-top,
    // .main-box,  NON APPLICARE PADDING
    .apartment-properties,
    .apartment-description,
    .apartment-services,
    .apartment-booking{
        padding:15px 0;
    }

    .apartment-top{
        i{
            padding-right: 5px;
        }
    }

    .apartment-properties{

        border-bottom: 1px solid lightgrey;
        .apartment-description{
            font-style: italic;
        }

        ul{
            @include resetListBullets;
            display: inline-block;
            padding: 0px;
            padding-right: 30px;
            margin-bottom:0px;


        }

        li{
            @include menu-inline-li-common;
            margin-right: 5px;
        }


    }

    .apartment-description{
        border-bottom: 1px solid lightgrey;
    }

    .apartment-services{
        border-bottom: 1px solid lightgrey;

        ul{
            @include resetListBullets;
            padding: 0 15px;
        }

    }
    button{
        margin: 15px 0;
    }

    img{
        width: 27%;
        height: 52%;
    }


</style>


// TODO
// 1.Mettere colori definitivi
