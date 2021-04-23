<template>
        <div class="apartment-box" v-on:click="$emit('send-index'), $emit('active-main'), $emit('apartment-id'),$emit('disactive-message')">
            <h2 class="apartment-title">{{apartments.title}}</h2>


            <div class="pic-container">
                <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                <img v-else src="/images/placeholder/casadefault.jpg" alt="">
            </div>
            <div class="description-container">
                <h3>Descrizione</h3>
                <p>{{apartments.description}}</p>
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

    .apartment-box{
        border-bottom: 1px solid black;
        padding: 15px;
        height: 300px;


        .pic-container{
            width: 44%;
            height: 72%;
            float: left;

            img{
                width: 100%;
                height: 100%;
                border-radius: 5px;

            }
        }



        .apartment-title{
            margin-bottom: 16px;
        }
        .apartment-description{
            font-size: 10px;

        }

        // img{
        //     width: 57%;
        //     height: 57%;
        //     float: left;
        //     border-radius: 5px;
        // }

        .description-container{

            float: left;
                h3,p{
                    margin-left:15px;
                }

                h3{
                    float: left;
                    vertical-align: top;
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
