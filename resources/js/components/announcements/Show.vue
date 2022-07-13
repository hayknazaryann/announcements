<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{announcement.title}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="col-12" v-for="(image_url,index) in announcement.image_urls">
                                <img :src="image_url.value" alt="" width="100%">
                            </div>
                        </div>
                        <div class="col-8">
                            <p>Price: {{announcement.price}}</p>
                            <p>Description: {{announcement.description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        data(){
            return {
                announcement:{},
                img_urls:{}
            }
        },
        created(){
            this.getAnnouncement(this.$route.params.id);
        },
        methods:{
            async getAnnouncement(id){

                await this.axios.get('/api/announcements/' + id).then(response=>{
                    this.announcement = response.data.data;
                }).catch(error=>{
                    this.announcement = null
                })
            },
        }
    }
</script>

<style scoped>

</style>
