<script setup>
import { router } from '@inertiajs/vue3';


defineProps({blogs:Object})

function distroy(id){
    router.delete('/blogs/'+id);
}

function edit(id){
    router.get('/blogs/'+id);
}

function add(){
    router.get('/blogs/create');
}
</script>

<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="col-md-12 row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <h3>Welcome to Simple Blog Using <strong>vue</strong> and <strong>inertia</strong></h3>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end">
                        <button class="btn btn-primary" @click.prevent="add()">Create new blog</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col-8">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="blog in blogs">
                            <td v-if="blog.image">
                                <img :src="blog.image" alt="Image" width="150px" height="100px"/>
                            </td>
                            <td v-else>
                                <img :src="imagePath" alt="Image" width="150px" height="100px"/>
                            </td>
                            <td  scope="col-3">{{ blog.title }}</td>                            
                            <td style="white-space: nowrap;">
                                <!-- <button class="btn btn-info">View</button> -->
                                <button class="btn btn-primary" @click.prevent = "edit(blog.id)">Edit</button>
                                &nbsp;
                                <button class="btn btn-danger" @click.privent = "distroy(blog.id)">Delete</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

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