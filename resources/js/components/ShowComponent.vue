<template>
        <div class="apartment-box">
            <h1 class="apartment-title">{{apartments.title}}</h1>
            <h3 class="apartment-address">{{apartments.address}}</h3>
            <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
            <img v-else src="/images/placeholder/casadefault.jpg" alt="">
            <div>
                <p>description: {{apartments.description}}</p>
                <span class="apartment-rooms">Numero Camere: {{apartments.rooms}}</span>
                <span class="apartment-beds">Numero Letti: {{apartments.beds}}</span>
                <span class="apartment-baths">Numero Bagni: {{apartments.baths}}</span>
                <span class="apartment-mq">Numero Mq: {{apartments.sq_meters}}</span>
            </div>

            <div>
                <h4>PRICE: {{apartments.price}}</h4>
            </div>
            <button class="btn btn-primary btn-default" v-on:click="$emit('active-message')">Chiedi Info</button>

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

    button{
        margin-bottom: 15px;
    }

    img{
        width: 27%;
        height: 52%;
    }



</style>
