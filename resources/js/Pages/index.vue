<script setup>

    import { router } from '@inertiajs/vue3';

    defineProps({blogs:Object})

    function show(id){
        router.get('/blogs/'+id+'/singleshow');
    }

</script>

<template>
    <div class="container" style="background-color: whitesmoke;">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3>Welcome to Simple Blog Using <strong>vue</strong> and <strong>inertia</strong></h3>

            </div>
            <div class="card-body">

                <!-- <div class="col-md-12"> -->
                    <div class="row">
                        <!-- <div v-for="blog in blogs">
                            {{ blog.title }} <br>
                        </div> -->
                        <div class="col-md-6" v-for="blog in blogs">
                            
                            <div class="card mt-2" style="border-radius: 10px;">
                                <div class="card-image" v-if="blog.image">
                                    <img :src="blog.image" alt="Image" width="100%" height="300px"/>
                                </div>
                                <div class="card-image" v-else>                                    
                                    <img :src="imagePath" alt="Image" width="100%" height="100%"/>
                                </div>
                                <div class="card-title">
                                    <h4>{{ blog.title }}</h4>
                                </div>
                                <div class="card-body">
                                    <!-- <p>{{ substr_replace(blog.description), '...', 200) }}</p> -->
                                    <p>{{ (blog.description).substring(0,500) }}</p>
                                    <button class="btn btn-info" @click.prevent="show(blog.id)">Read More</button>
                                </div>
                            </div>

                            
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-image">
                                    <img src="#" alt="" srcset="">
                                </div>
                                <div class="card-title">
                                    <h4>this is title</h4>
                                </div>
                                <div class="card-body">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, quos repellat? Rerum, quidem molestiae quam optio et consequuntur voluptates laborum vel porro aspernatur repellat sit nihil dignissimos quae cumque dolore?</p>
                                    <button class="btn btn-info">Read More</button>
                                </div>
                            </div>
                            
                        </div> -->
                        
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      imagePath: "/blog-definition.png",
    };
  },
};
</script>