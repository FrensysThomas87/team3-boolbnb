<template>
        <div class="apartment-box" v-on:click="$emit('send-index'), $emit('active-main'), $emit('apartment-id')">
            <h1 class="apartment-title">{{apartments.title}}</h1>
            <h3 class="apartment-address">{{apartments.address}}</h3>
            <div>
                <span class="apartment-rooms">Numero Camere: {{apartments.rooms}}</span>
                <span class="apartment-beds">Numero Letti: {{apartments.beds}}</span>
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
        border: 1px solid black;

        .apartment-title{
            font-size: 15px;
        }
        .apartment-address{
            font-size: 10px;

        }
        > div > .apartment-beds{
            font-size: 10px;

        }

        > div > .apartment-rooms{
            font-size: 10px;

        }
    }
</style>
