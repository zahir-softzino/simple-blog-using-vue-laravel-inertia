<script setup>
    defineProps({blog:Object})

</script>
<template>
    <div class="d-flex justify-content-center mt-5">
        <div class="card col-md-8">
            <div class="card-header d-flex justify-content-center">
                <h3><strong><b>Blog Details</b></strong></h3>
            </div>
            <div class="card-body">
                <div v-if="blog.image">
                    <img :src="blog.image" alt="Image" width="100%" height="400px"/>
                </div>
                <div v-else>
                    <img :src="imagePath" alt="Image" width="100%" height="400px"/>
                </div>
                <div class="mt-3">
                    <h3><strong><b>{{ blog.title }}</b></strong></h3>
                </div>
                <div class="mt-2">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ blog.description }}</p>
                </div>
            </div>
        </div>

    </div>

</template>