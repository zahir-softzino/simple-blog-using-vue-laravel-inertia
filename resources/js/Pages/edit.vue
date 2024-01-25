<script setup>
import { useForm, router } from '@inertiajs/vue3';
// import { router } from '@inertiajs/vue3';

const blogs = defineProps({
    errors:Object,
    blog:Object,
});

const form = useForm({
    'title': blogs.blog.title,
    'description': blogs.blog.description,
    'image' : blogs.blog.image,
})

function update(id){
    // console.log(form);
    // console.log(form.image);
    // console.log(form.imagePath);
    router.put('/blogs/'+id, form);
}
</script>

<template>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-8 card">
            <div class="card-header">
                <h4>Edit Blog</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="update(blog.id)" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">&nbsp;Title <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" v-model="form.title" id="" name="title">
                        <div class="text-denger text-xs" v-if="errors.title">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description">&nbsp; Description <span style="color: red;">*</span></label>
                        <textarea v-model="form.description" name="description" id="" class="form-control" rows="10"></textarea>
                        <div class="text-denger text-xs" v-if="errors.description">
                            {{ errors.description }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile">&nbsp; Image</label>
                        <input type="file" class="form-control" @input="form.image = $event.target.files[0]" accept="image/*" id="formFile">
                        <div v-if="blog.image">
                            <img :src="blog.image" alt="Image" width="150px" height="100px"/>
                        </div>
                        <div v-else>
                            <img :src="imagePath" alt="Image" width="150px" height="100px"/>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="formFile" class="form-label">Select Image</label>
                        <input class="form-control" type="file" id="formFile" @input="form.image = $event.target.files[0]" accept="image/*">
                    </div> -->

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    

                </form>
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