<script setup>

    import { router, useForm } from '@inertiajs/vue3';
    
    defineProps({
        errors:Object
    });

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
    <div class="d-flex justify-content-center mt-5">
        <div class="card col-md-8">
            <div class="card-header">
                <h4>Create Blog</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputTitle" class="form-label">Title</label>
                        <input type="string" class="form-control" v-model="form.title" id="exampleInputTitle" aria-describedby="emailHelp">
                        <div class="text-denger text-xs" v-if="errors.name">
                            {{ errors.name }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDiscription" class="form-label">Description</label>
                        <textarea id="" cols="" rows="10" v-model="form.description" class="form-control"></textarea>
                        <!-- <input type="text-area" class="form-control" v-model="form.description" id="exampleInputdescription"> -->
                        <div class="text-denger text-xs" v-if="errors.description">
                            {{ errors.description }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select Image</label>
                        <input class="form-control" type="file" id="formFile" @input="form.image = $event.target.files[0]" accept="image/*">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</template>