<template>
        <div>
            <h1>{{apartments.address}}</h1>
        </div>
</template>

<script>
export default {
  name: 'ApartmentsComponent',
    props:{
        apartments: Object
    },

}
</script>

<style lang="scss" scoped>

</style>
