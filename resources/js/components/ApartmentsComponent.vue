<template>
        <div>
            <h1>{{apartments.title}}</h1>
            <h3>{{apartments.address}}</h3>
            <div>
                <span>Numero Camere: {{apartments.rooms}}</span>
                <span>Numero Letti: {{apartments.beds}}</span>
            </div>
        </div>
</template>

<script>
export default {
  name: 'ApartmentsComponent',
    props:{
        apartments : Object
    },

}
</script>

<style lang="scss" scoped>

</style>
