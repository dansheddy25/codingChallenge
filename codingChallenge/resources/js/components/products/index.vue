<script setup>
import axios from "axios";
import { onMounted, ref } from "vue"
import { useRouter } from "vue-router"

const router = useRouter()

let products = ref([])

 onMounted(async() =>{
     getProducts()
 })


const newProduct = () => {
    router.push('/product/new')
}

const getProducts = async () => {
    let response = await axios.get("/api/get_all_product")
    products.value = response.data.products
}

const ourImage = (img) => {
    return "/upload/"+img
}
</script>

<template>
<div class="container">
    <div class="products__list table  my-3">
              
        <div class="customers__titlebar dflex justify-content-between align-items-center">
            <div class="customers__titlebar--item">
                <h1 class="my-1">Products</h1>
            </div>
        </div>

        <div class="table--heading mt-2 products__list__heading " style="padding-top: 20px;background:#FFF">
            <!-- <p class="table--heading--col1">&#32;</p> -->
            <p class="table--heading--col1">image</p>
            <p class="table--heading--col2">
                Product
            </p>
            <p class="table--heading--col3">Description</p>
            <p class="table--heading--col4">
                Price
            </p>
        </div>

        
        <div class="table--items products__list__item" v-for="item in products" :key="item.id" v-if="products.length > 0">
            <div class="products__list__item--imgWrapper">
                <img class="products__list__item--img" src="ourImage(item.image)"  style="height: 40px;" v-if="item.image">
            </div>
            <p  class="table--items--col2">
                {{ item.name }}
            </p>
            <p class="table--items--col3">
                {{ item.description }} 
            </p>
            <p class="table--items--col4">
                {{ item.price }}
            </p>     
            
        </div>
        <div class="table--items products__list__item" v-else>
        <p>Product not found</p>
        </div>

    </div>
</div>
</template>