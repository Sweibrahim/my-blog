<template>
    <div>
        <button style="margin-left: 15px; height: 36px" class="btn btn-primary" @click="followUser"
            v-text="buttonText"></button>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    props: ['userId', 'follows'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {

        return {
            status: this.follows,
        }
    },
    methods: {
        followUser() {
            axios.post('/follow/' + this.userId)
                .then(Response => {
                    {
                        this.status = !this.status;
                        console.log(Response.data);
                    }
                })
                .catch(errors => {
                    if (errors.Response.status == 401) {
                        window.location = '/login';
                    }
                });
        }
    },
    computed: {
        buttonText() {
            return (this.status) ? 'unfollow' : 'follow'
        }
    }
}
</script>
