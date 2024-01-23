<script setup>

    import { router, useForm } from '@inertiajs/vue3';
    
    const form= useForm({
        title:null,
        description: null,
        image: null,
    });

    function submit(){
        router.post('/blogs', form);
    }

</script>

<template>
    <div class="card">
        <div class="card-header">
            <h4>Create Blog</h4>
        </div>
        <div class="card-body">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputTitle" class="form-label">Title</label>
                    <input type="string" class="form-control" v-model="form.title" id="exampleInputTitle" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputDiscription" class="form-label">Description</label>
                    <input type="text" class="form-control" v-model="form.description" id="exampleInputdescription">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Select Image</label>
                    <input class="form-control" type="file" id="formFile" @input="form.image = $event.target.files[0]" accept="image/*">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>