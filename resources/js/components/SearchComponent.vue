<template>
        <div>
            <select class="form-select" multiple aria-label="multiple select example">
                <option v-for="service in services" :key="service" :value="service">{{service}}</option>
            </select>
        </div>
</template>

<script>
export default {
  name: 'SearchComponent',
    props:{
        services: Array,
        selectedServices: Array,
    },

    data: function(){
        return{
            myselected: this.selectedServices,
        }

    }

}
</script>

<style lang="scss" scoped>

</style>
