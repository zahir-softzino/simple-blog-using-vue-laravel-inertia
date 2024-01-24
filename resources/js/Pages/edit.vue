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
    router.put('/blogs/'+id, form);
}
</script>

<template>
    <div class="d-flex justify-cintent-center">
        <div class="col-md-8 card">
            <div class="card-header">
                <h4>Edit Blog</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="update(blog.id)" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-control">Title</label>
                        <input type="text" v-model="form.title" id="" name="title">
                        <div class="text-denger text-xs" v-if="errors.title">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-control">Description</label>
                        <textarea v-model="form.description" name="description" id="" class="form-control" rows="10"></textarea>
                        <div class="text-denger text-xs" v-if="errors.description">
                            {{ errors.description }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-control">Image</label>
                        <input type="file" class="form-control" @change="form.image = $event.target.files[0]" accept="image/*" id="" name="image">
                        <div v-if="blog.image">
                            <img :src="blog.image" alt="Image" width="150px" height="100px"/>
                        </div>
                        <div v-else>
                            <img :src="imagePath" alt="Image" width="150px" height="100px"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

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