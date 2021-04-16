<template>
    <div class="form-row">
        <div class="col-sm-5">
            <input type="text" :value="latitude" class="form-control" id="latitude" name="latitude"  placeholder="Latitudine" >
        </div>
        <div class="col-sm-5">
            <input type="text" :value="longitude" class="form-control" id="longitude" name="longitude" placeholder="Longitudine" >
        </div>
    </div>

</template>

<script>
export default {
  name: 'CoordinateComponent',
    props: {
        longitude: Number,
        latitude: Number,
    },

}
</script>






<style lang="scss" scoped>

</style>
