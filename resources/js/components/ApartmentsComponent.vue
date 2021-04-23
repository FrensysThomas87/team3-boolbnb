<template>
        <div class="apartment-box" v-on:click="$emit('send-index'), $emit('active-main'), $emit('apartment-id'),$emit('disactive-message')">
            <h2 class="apartment-title">{{apartments.title}}</h2>


            <div class="pic-container float-l">
                <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                <img v-else src="/images/placeholder/casadefault.jpg" alt="">
            </div>
            <div class="description-container float-l">
                <h3>Indirizzo:</h3>
                <p>{{apartments.address}}</p><br>
                <h3>Prezzo:</h3>
                <p>€{{apartments.price}},00</p>
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
        border-bottom: 1px solid black;
        padding: 15px;
        height: 350px;


        .pic-container{
            width: 44%;
            height: 72%;
            margin: 15px 0;


            img{
                width: 100%;
                height: 100%;
                border-radius: 5px;

            }
        }



        .apartment-title{
            margin-bottom: 16px;
        }
        .description-container{
            font-size: 10px;
            width:50%;
            margin:15px;
            vertical-align: middle;



            p{
                font-size:15px;
                // margin-left: 10px;
                // margin-top:5px;
            }
        }








        > div > .apartment-beds{
            font-size: 10px;

        }

        > div > .apartment-rooms{
            font-size: 10px;

        }
    }

</style>
