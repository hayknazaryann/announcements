<template>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Announcements</h4>
                </div>
                <div class="card-body">
                    <div class="col-12 mb-2 text-end">
                        <router-link :to='{name:"announcements.create"}' class="btn btn-primary">Create</router-link>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">Image</th>
                                <th width="20%">Title</th>
                                <th width="35%">Description</th>
                                <th width="15%">Price</th>
                                <th width="5%">Actions</th>
                            </tr>
                            </thead>
                            <tbody v-if="announcements.length > 0">
                                <tr v-for="(announcement,key) in announcements" :key="key">
                                    <td>{{ announcement.id }}</td>
                                    <td>
                                        <img :src="announcement.image_urls[0].value" alt="" width="100%">
                                    </td>
                                    <td>{{ announcement.title }}</td>
                                    <td>{{ announcement.description }}</td>
                                    <td>{{ announcement.price }}</td>
                                    <td>
                                        <router-link :to='{name:"announcements.show",params:{id:announcement.id}}' class="btn btn-success">Show</router-link>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="6" align="center">No Announcements1 Found.</td>
                                </tr>
                            </tbody>
                        </table>

                        <pagination align="center" :data="announcementsData" @pagination-change-page="getAnnouncements"></pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import pagination from '../../laravel-vue-pagination'

    export default {
        name: "Index.vue",
        components: {
            pagination
        },
        data(){
            return {
                announcementsData:{
                    type:Object,
                    default:null
                },
                announcements: []
            }
        },
        mounted(){
            this.getAnnouncements();
        },
        methods:{
            async getAnnouncements(page = 1){
                await this.axios.get('/api/announcements?page=' + page).then(response=>{
                    this.announcementsData = response.data;
                    this.announcements = this.announcementsData.data;
                }).catch(error=>{
                    this.announcementsData = {};
                    this.announcements = []
                })
            },
        }
    }
</script>

<style scoped>

</style>
