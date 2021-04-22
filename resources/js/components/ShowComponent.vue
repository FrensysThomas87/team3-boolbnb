<template>
        <div class="apartment-box">
            <h1 class="apartment-title">{{apartments.title}}</h1>
            <h3 class="apartment-address">{{apartments.address}}</h3>
            <img style="width:300px;" src="/images/placeholder/casadefault.jpg" alt="">
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
