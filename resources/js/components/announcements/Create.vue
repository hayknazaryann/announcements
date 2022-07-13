<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Announcement</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-bind:class="{ 'is-invalid': (errors['title'] !== undefined)}" v-model="announcement.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  class="form-control" v-bind:class="{ 'is-invalid': (errors['description'] !== undefined)}" v-model="announcement.description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <label>Image Url</label>

                                    <div class="col-10">
                                        <div class="form-group" v-for="(image_url, index) in announcement.image_urls">
                                            <input type="text" class="form-control" v-bind:class="{ 'is-invalid': (errors['image_urls.' + index + '.value'] !== undefined)}" v-model="image_url.value"/>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" @click="addInput">
                                                Add
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" v-bind:class="{ 'is-invalid': (errors['price'] !== undefined)}" v-model="announcement.price">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Add",
        data(){
            return {
                counter: 0,
                errors: [],
                announcement:{
                    title:"",
                    description:"",
                    price: 0,
                    image_urls: [
                        {
                            value: '',
                        }
                    ]
                }
            }
        },
        methods:{
            async create(){
                await this.axios.post('/api/announcements',this.announcement).then(response=>{
                    this.$router.push({name:"announcements"})
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                })
            },
            addInput() {
                if (this.announcement.image_urls.length < 3){
                    this.announcement.image_urls.push({
                        value: '',
                    });
                }

            }
        }
    }
</script>

<style scoped>

</style>
