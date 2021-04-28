<template>

        <div class="apartment-box"
            v-on:click="$emit('send-index'),
                        $emit('active-main'),
                        $emit('apartment-id'),
                        $emit('disactive-message'),
                        $emit('add-view')
                        ">
            <div class="content-container">
                <div class="pic-container">
                    <img v-if="apartments.profile_pic" :src="apartments.profile_pic" alt="">
                    <img v-else src="/images/placeholder/casadefault.jpg" alt="">
                    <div class="price">
                        <span class="apartment-price">€ {{apartments.price}}</span>
                    </div>
                    <div class="badge-sponsor" v-if="apartments.sponsored">
                        <i class="fas fa-medal"></i>
                    </div>
                </div>
                <div class="description-container">
                    <div>
                        <h4 class="apartment-title">{{apartments.title}}</h4>
                        <p class="apartment-address">{{apartments.address}}</p>
                    </div>

                </div>
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

    .content-container{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .apartment-box{

        box-shadow: 0px 0px 10px 1px #ccc;
        padding: 25px;
        width: 90%;
        cursor: pointer;
        border-radius: 15px;
        margin-bottom: 15px;

        &:hover{
            transition: all .5s ease-out 0s;
            transform: scale(1.02);
        }


        .pic-container{
            width: 100%;
            height: 72%;
            margin: 15px 0;
            position: relative;

            .price{
                position: absolute;
                background: rgba($color: #fff, $alpha: 0.8);
                border-radius: 5px;
                padding: 5px;
                right: 15px;
                bottom: 10px;
                min-width: 50px;
                text-align: center;
            }

            img{
                width: 100%;
                height: 100%;
                border-radius: 5px;
                box-shadow: 5px 5px 10px 2px #ccc;

            }

            .badge-sponsor{
                position: absolute;
                background: rgba($color: #fff, $alpha: 0.8);
                border-radius: 5px;
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                bottom: 10px;
                left: 15px;
                font-size: 20px;
            }
        }

        .description-container{
            width: 100%;

            p{
                font-size:15px;
                // margin-left: 10px;
                // margin-top:5px;
            }

            .apartment-address,.apartment-price{
                margin-bottom: 15px;
            }
        }

    }

</style>
