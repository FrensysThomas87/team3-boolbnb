<template>

        <div class="apartment-box" v-on:click="$emit('send-index'), $emit('active-main'), $emit('apartment-id'),$emit('disactive-message')">

            <h2 class="apartment-title">{{apartments.title}}</h2>


            <div class="pic-container float-l">
                <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                <img v-else src="/images/placeholder/casadefault.jpg" alt="">
            </div>
            <div class="description-container float-l">
                <h3>Indirizzo:</h3>
                <p class="apartment-address">{{apartments.address}}</p>
                <h3>Prezzo:</h3>
                <p class="apartment-price">€{{apartments.price}}</p>
                <h5><i class="fas fa-home fa-lg"></i></h5>
                <p>
                    <span class="apartment-guests">{{apartments.max_guests}} ospiti</span>
                    <span class="apartment-rooms">{{apartments.rooms}} camere</span>
                    <span class="apartment-beds">{{apartments.beds}} letti</span>
                    <span class="apartment-baths">{{apartments.baths}} bagni</span>
                    <span class="apartment-mq">{{apartments.sq_meters}}mq</span>
                </p>
            </div>


            <!-- <h3 class="apartment-address">{{apartments.address}}</h3> -->
            <div>
                <!-- <span class="apartment-rooms">Numero Camere: {{apartments.rooms}}</span>
                <span class="apartment-beds">Numero Letti: {{apartments.beds}}</span> -->


            </div>
        </div>
</template>

<script>
export default {
  name: 'ApartmentsComponent',
    props:{
        apartments : Object,
    },


}
</script>

<style lang="scss" scoped>

    .float-l{
            float:left;
            }

    .apartment-box{
        border-bottom: 1px solid #ccc;
        padding: 25px;
        height: 350px;
        cursor: pointer;





        .pic-container{
            width: 44%;
            height: 72%;
            margin: 15px 0;


              &:hover img{
                transition: all .5s ease-out 0s;
                transform: scale(1.1);

                // overflow: hidden;
        }


            img{
                width: 100%;
                height: 100%;
                border-radius: 5px;
                box-shadow: 5px 5px 10px 2px #ccc;

            }
        }



        .apartment-title{
            margin-bottom: 16px;
        }
        .description-container{
            // font-size: 10px;
            width:50%;
            margin:15px;
            vertical-align: middle;
            padding:15px;



            p{
                font-size:15px;
                // margin-left: 10px;
                // margin-top:5px;
            }

            .apartment-address,.apartment-price{
                margin-bottom: 15px;
            }
        }








        // > div > .apartment-beds{
        //     font-size: 10px;

        // }

        // > div > .apartment-rooms{
        //     font-size: 10px;

        // }
    }

</style>
